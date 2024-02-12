/*Saya Muhammad Muhammad Fadlul Hafiizh [2209889] mengerjakan soal latprak_ dalam mata kuliah DPBO.
untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan, Aamiin */

package models;

import java.util.ArrayList;
import java.util.List;

/**
 * Dpr
 */
public class Dpr {
    private int id;
    private String nama;
    private String bidang;
    private String partai;
    private List<Dpr> daftarAnggota;

    //constructor
    public Dpr(int id, String nama, String bidang, String partai) {
        this.id = id;
        this.nama = nama;
        this.bidang = bidang;
        this.partai = partai;
        this.daftarAnggota = new ArrayList<>();
    }
    public Dpr(){
        this.daftarAnggota = new ArrayList<>();
    }

    //enkapsulasi semua atribut
    public int getId() {
        return id;
    }
    public void setId(int id) {
        this.id = id;
    }
    public String getNama() {
        return nama;
    }
    public void setNama(String nama) {
        this.nama = nama;
    }
    public String getBidang() {
        return bidang;
    }
    public void setBidang(String bidang) {
        this.bidang = bidang;
    }
    public String getPartai() {
        return partai;
    }
    public void setPartai(String partai) {
        this.partai = partai;
    }
    public List<Dpr> getMyList() {
        return daftarAnggota;
    }

    //untuk menambahkan obj pada list
    public void addList(Dpr objDpr){
        // List<Dpr> myList = new ArrayList<>();
        this.daftarAnggota.add(objDpr);
    }

    

    
}