<!-- Saya Muhammad Muhammad Fadlul Hafiizh [2209889] mengerjakan soal latprak_1 dalam mata kuliah DPBO.
untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan, Aamiin -->

<?php
include "Controller/DprController.php";
session_start(); //mulai session untuk menampung list dari objek Dpr supaya list bisa diakses secara global
if(!$_SESSION['dprList']){
    $_SESSION['dprList'] = [];
}
$controller = new DprController;
if($_SERVER["REQUEST_METHOD"] == "POST"){ //bila ada kiriman dengan method post dari form
    if(isset($_POST["add"])){ //bila name dari apa yang di post kan itu add
        $request = [
            "nama" => $_POST["nama"],
            "bidang" => $_POST["bidang"],
            "partai" => $_POST["partai"],
        ];//masukan semua kiriman dari form kedalam variable request sebagai parameter ke controller nantinya
        if(!empty($_FILES['foto']['name'])){ //bila ada request foto
            if(move_uploaded_file($_FILES['foto']['tmp_name'], 'storage/'.$_FILES['foto']['name'])){ //masukan foto kedalam storage path
                $request['foto'] = 'storage/'.$_FILES['foto']['name']; //lalu masukan path file kedalam request
            }
        }
    
        $controller->storeDpr($request); //arahkan semua data yang disimpan pada request kedalam fungsi store di controller
    }else if(isset($_POST['delete'])){//bila name dari apa yang di post kan itu delete
        $request['id'] = $_POST['id'];

        $controller->deleteDpr($request);
    }else if(isset($_POST['update'])){//bila name dari apa yang di post kan itu update
        $request = [
            "id" => $_POST['id'],
            "nama" => $_POST["nama"],
            "bidang" => $_POST["bidang"],
            "partai" => $_POST["partai"]
        ];
        if(!empty($_FILES['foto']['name'])){
            if(move_uploaded_file($_FILES['foto']['tmp_name'], 'storage/'.$_FILES['foto']['name'])){
                $request['foto'] = 'storage/'.$_FILES['foto']['name'];
            }
        }

        $controller->updateDpr($request);
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Anggota DPR</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-header">
                        <h2>Tambah Anggota DPR</h2>
                    </div>
                    <div class="card-body">
                        <form id="formTambah" method="POST" enctype='multipart/form-data'>
                            <div class="mb-3">
                                <label class="form-label">Foto</label>
                                <input type="file" name="foto" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nama</label>
                                <input type="text" name="nama" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nama Bidang</label>
                                <input type="text" name="bidang" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nama Partai</label>
                                <input type="text" name="partai" class="form-control">
                            </div>
                            <div class="d-flex justify-content-end">
                                <input type="submit" class="btn btn-primary" name="add" value="Tambah">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
            <table class="table table-dark table-striped-columns">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>Bidang</th>
                        <th>Partai</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if(count($_SESSION['dprList']) > 0){ //cek dulu apakah ada data pada list?
                            foreach ($_SESSION['dprList'] as $key => $value) { ?>
                                <tr>
                                    <td><?= $key+1 ?></td>
                                    <td><img src="<?= $value->getFoto() ?>" alt="" style="width:150px"></td>
                                    <td><?= $value->getNama() ?></td>
                                    <td><?= $value->getBidang() ?></td>
                                    <td><?= $value->getPartai() ?></td>
                                    <td>
                                        <div class="d-flex">
                                            <button class="btn btn-sm btn-warning me-2" type="button" data-bs-toggle="modal" data-bs-target="#modalEditData<?= $value->getId() ?>">Edit</button>
                                            <div class="modal fade" id="modalEditData<?= $value->getId() ?>" tabindex="-1" aria-labelledby="editData<?= $value->getId() ?>Label" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5 text-dark" id="editData<?= $value->getId() ?>Label">Edit Data</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="" method="POST" enctype='multipart/form-data'>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Foto</label>
                                                                    <input type="file" name="foto" class="form-control">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Nama</label>
                                                                    <input type="text" name="nama" class="form-control" value="<?= $value->getNama() ?>">
                                                                    <input type="hidden" name="id" class="form-control" value="<?= $value->getId() ?>">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Nama Bidang</label>
                                                                    <input type="text" name="bidang" class="form-control" value="<?= $value->getBidang() ?>">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Nama Partai</label>
                                                                    <input type="text" name="partai" class="form-control" value="<?= $value->getPartai() ?>">
                                                                </div>
                                                                <div class="d-flex justify-content-end">
                                                                    <input type="submit" class="btn btn-primary" name="update" value="Update">
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <form action="" method="post" class="pb-0">
                                                <input type="hidden" name="id" value="<?= $value->getId() ?>">
                                                <input type="submit" name="delete" value="Hapus" class="btn btn-sm btn-danger"/>
                                            </form>
                                            
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                            <!-- bila tidak ada data pada list maka tambilkan row sebagai informasi belum ada data -->
                        <?php } else{ ?>
                            <tr>
                                <td colspan="6" class="text-center">Data belum tersedia</td>
                            </tr>
                        <?php } ?>

                </tbody>
            </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
  </body>
</html>