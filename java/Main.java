/*Saya Muhammad Muhammad Fadlul Hafiizh [2209889] mengerjakan soal latprak_1 dalam mata kuliah DPBO.
untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan, Aamiin */

/**
 * Main
 */

import java.util.List;
import java.util.Scanner;
import java.util.UUID;

import models.Dpr;

public class Main {
    public static void main(String[] args) {
        Dpr myData = new Dpr();
        
        addMember(myData); //pada tahap pertama input dulu data anggota DPR
        int selectedOpt = 4;
        while (selectedOpt != 5) { //selama tidak memilih menu untuk keluar menu akan terus ditampilkan
            selectedOpt = showMenu(myData);
        }
    }

    private static void addMember(Dpr objDpr){
        System.out.println("Masukan jumlah anggota DPR:");
        int id, jmlAddMember;
        Scanner inJml = new Scanner(System.in);
        jmlAddMember = inJml.nextInt(); //input jumlah anggota yang ingin ditambahkan
        for (int i = 0; i < jmlAddMember; i++) {
            id = Math.abs(UUID.randomUUID().hashCode()); //untuk ID di generate otomatis berisi UUID yang di hash agar menghasilkan kode uniq
            String nama, bidang, partai;
            Scanner inDpr = new Scanner(System.in);
            //input sesuai atribut yang ada pada class dpr dan simpan pada variable
            nama = inDpr.nextLine();
            bidang = inDpr.nextLine();
            partai = inDpr.nextLine();

            //masukan semua variable tadi sebagai new object dpr dan masukan pada addlist sehingga objek dpr kita memiliki list of obj dpr yang baru diinput
            objDpr.addList(
                new Dpr(id, nama, bidang, partai)
            );
        }
    }

    private static void editMember(List<Dpr> daftarAnggota){
        showAnggota(daftarAnggota); //tampilkan dahulu daftar anggota agar bisa terlihat id mana yang ingin di edit
        System.out.print("Masukan ID DPR yang ingin diubah :");
        Scanner inEdit = new Scanner(System.in);
        int srcId = inEdit.nextInt(); //input kan id
        String nama,bidang,partai;
        int i = 0, isFound = 0;
        while (i < daftarAnggota.size() && isFound == 0) {
            if (daftarAnggota.get(i).getId() == srcId) {
                inEdit.nextLine(); //ini untuk membersihkan buffer sehabis input type data berbeda

                //input perubahan semua atribut dari instance dpr
                System.out.print("Rubah nama: ");
                nama = inEdit.nextLine();
                daftarAnggota.get(i).setBidang(nama);

                System.out.print("Rubah bidang: ");
                bidang = inEdit.nextLine();
                daftarAnggota.get(i).setBidang(bidang);

                System.out.print("Rubah partai: ");
                partai = inEdit.nextLine();
                daftarAnggota.get(i).setPartai(partai);

                isFound = 1;
            }
            i++;
        }
        if (isFound == 0) {
            System.out.println("Maaf ID yang anda input tidak ditemukan!");
        }else{
            System.out.println("Data dengan ID "+srcId+" Berhasil diubah!");
        }
    }

    private static void showAnggota(List<Dpr> daftarAnggota){
        int[] mostLengthColumn = new int[]{0,0,0,0}; //untuk menampung jumlah karakter terbanyak pada masing masing kolom table
        for (Dpr elem : daftarAnggota) { //mencari karakter terpanjang dari semua kolom
            if (String.valueOf(elem.getId()).length() > mostLengthColumn[0]) {
                mostLengthColumn[0] = String.valueOf(elem.getId()).length();
            }
            if (elem.getNama().length() > mostLengthColumn[1]) {
                mostLengthColumn[1] = elem.getNama().length();
            }
            if (elem.getBidang().length() > mostLengthColumn[2]) {
                mostLengthColumn[2] = elem.getBidang().length();
            }
            if (elem.getPartai().length() > mostLengthColumn[3]) {
                mostLengthColumn[3] = elem.getPartai().length();
            }
        }

        //memastikan bahwa karakter terpanjang dari masing masing kolom tidak lebih pendek dari header, bila lebih pendek dari header maka set sepanjang header
        mostLengthColumn[0] = mostLengthColumn[0] < 2 ? 2 : mostLengthColumn[0];
        mostLengthColumn[1] = mostLengthColumn[1] < 4 ? 4 : mostLengthColumn[1];
        mostLengthColumn[2] = mostLengthColumn[2] < 11 ? 11 : mostLengthColumn[2];
        mostLengthColumn[3] = mostLengthColumn[3] < 11 ? 11: mostLengthColumn[3];

        //hitung total seluruh karakter terpanjang ditambah dengan spasi dan simbol garis tabel
        int totalLength = mostLengthColumn[0] + mostLengthColumn[1] + mostLengthColumn[2] + mostLengthColumn[3] + 6 + 7;
        for (int i = 0; i < totalLength; i++) {
            System.out.print("_");
        }

        // print header dan data table beserta spasi sesuai karakter terpanjang
        System.out.println();
        System.out.printf("|%-" + (mostLengthColumn[0] + 2) + "s", "ID");
        System.out.printf("|%-" + (mostLengthColumn[1] + 2) + "s", "Nama");
        System.out.printf("|%-" + (mostLengthColumn[2] + 2) + "s", "Nama Bidang");
        System.out.printf("|%-" + (mostLengthColumn[3] + 2) + "s|", "Nama Partai");
        System.out.println();
        for (int i = 0; i < totalLength; i++) {
            System.out.print("-");
        }
        System.out.println();
        for (Dpr elem : daftarAnggota) {
            System.out.printf("|%-" + (mostLengthColumn[0] + 2) + "s", elem.getId());
            System.out.printf("|%-" + (mostLengthColumn[1] + 2) + "s", elem.getNama());
            System.out.printf("|%-" + (mostLengthColumn[2] + 2) + "s", elem.getBidang());
            System.out.printf("|%-" + (mostLengthColumn[3] + 2) + "s|", elem.getPartai());

            System.out.println();
        }
        for (int i = 0; i < totalLength; i++) {
            System.out.print("-");
        }
        System.out.println();
    }

    private static void deleteAnggota(List<Dpr> daftarAnggota){
        showAnggota(daftarAnggota); //tampilkan dahulu daftar anggota agar tidak bingung id mana yang ingin dihapus
        System.out.print("Masukan ID DPR yang ingin dihapus :");
        Scanner inDelete = new Scanner(System.in);
        int srcId = inDelete.nextInt();
        int i = 0, isFound = 0;
        while (i < daftarAnggota.size() && isFound == 0) {
            if (daftarAnggota.get(i).getId() == srcId) {
                daftarAnggota.remove(i); //bila ditemukan maka hapus dari list
                isFound = 1;
            }
            i++;
        }

        if (isFound == 0) {
            System.out.println("Maaf ID yang anda input tidak ditemukan!");
        }else{
            System.out.println("Data dengan ID "+srcId+" Berhasil dihapus!");
        }
    }
    private static int showMenu(Dpr myData){
        Scanner inMenu = new Scanner(System.in);
        int selectedMenu;
        System.out.println(); //menampilkan menu opsi pilihan aksi yang bisa dilakukan
        System.out.println("Pilih aksi:");
        System.out.println("1. Input daftar anggota DPR");
        System.out.println("2. Rubah daftar anggota DPR");
        System.out.println("3. Hapus daftar anggota DPR");
        System.out.println("4. Lihat daftar anggota DPR");
        System.out.println("5. Keluar");
        System.out.print("Masukan pilihan anda ");
        selectedMenu = inMenu.nextInt(); //input pilihan menu
        switch (selectedMenu) {//mengarahkan pada prosedur sesuai menu yang dipilih
            case 1:
                addMember(myData);
            break;
            case 2:
                editMember(myData.getMyList());
            break;
            case 3:
                deleteAnggota(myData.getMyList());
            break;
            case 4:
                showAnggota(myData.getMyList());
            break;
            case 5:
                System.out.println("Selamat tinggal!....");
            break;
            default:
                System.out.println("Pilih menu yang sesuai!");
            break;
        }
        return selectedMenu;
    }
}