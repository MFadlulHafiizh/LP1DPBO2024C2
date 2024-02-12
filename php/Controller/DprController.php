<!-- Saya Muhammad Muhammad Fadlul Hafiizh [2209889] mengerjakan soal latprak_1 dalam mata kuliah DPBO.
untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan, Aamiin -->
<?php
include "Models/Dpr.php";

class DprController{
    static function storeDpr($request){
        $newAnggota = new Dpr; //instansiasi class sebagai obj
        $newAnggota->setNama($request['nama']); //isi semua atribut dengan setter berdasarkan apa yang dikrim dari request
        $newAnggota->setBidang($request['bidang']);
        $newAnggota->setPartai($request['partai']);
        $newAnggota->setFoto($request['foto']);

        array_push($_SESSION['dprList'], $newAnggota); //masukan dalam array yang disimpan pada session
        header("Location: " . $_SERVER["PHP_SELF"]); //kembali direct ke halaman sebelumnya (ini berguna juga sebagai flushing session agar setelah melakukan input lalu page di refresh data tidak terinput kembali sehingga terjadi duplikasi)
    }
    static function updateDpr($request){
        $is_found = false;
        $i = 0;
        while($i < count($_SESSION['dprList']) && !$is_found){ //loop untuk mencari data berdasarkan id
            if ($request['id'] == $_SESSION['dprList'][$i]->getId()) { //apabila id yang dikirim kan lewat request ditemukan pada list
                $_SESSION['dprList'][$i]->setNama($request['nama']); //set ulang semua value atributnya berdasarkan request
                $_SESSION['dprList'][$i]->setBidang($request['bidang']);
                $_SESSION['dprList'][$i]->setPartai($request['partai']);
                if($request['foto']){ //lalu makesure dulu apa ada update foto atau ngga
                    if($_SESSION['dprList'][$i]->getFoto() != null){ //ini kalau sebelumnya udah ada foto terus mau di update hapus dulu foto yang lama di storage
                        unlink($_SESSION['dprList'][$i]->getFoto());
                    }
                    $_SESSION['dprList'][$i]->setFoto($request['foto']); //set ulang foto dengan yang baru
                }
                $is_found = true;
            }
            $i++;
        }
        header("Location: " . $_SERVER["PHP_SELF"]);
    }
    static function deleteDpr($request){
        $is_found = false;
        $i = 0;
        while($i < count($_SESSION['dprList']) && !$is_found){
            if ($request['id'] == $_SESSION['dprList'][$i]->getId()) { //mencari data anggota dari list berdasrakan id dari request
                unlink($_SESSION['dprList'][$i]->getFoto()); //hapus foto pada storage
                array_splice($_SESSION['dprList'], $i, 1); //hapus data pada list
            }
            $i++;
        }
        header("Location: " . $_SERVER["PHP_SELF"]);
    }
}