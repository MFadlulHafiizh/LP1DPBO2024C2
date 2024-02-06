#include <iostream>
#include <string>

using namespace std;

class Dpr{
    private:
        int id;
        string nama;
        string nama_bidang;
        string nama_partai;

    public:
        //constructor sebagai nilai default saat instansiasi
        Dpr(){
            this->nama = "-";
            this->nama_bidang = "-";
            this->nama_partai = "-";
        }

        //enkapsulasi semua atribut
        int getId()
        {
            return this->id;
        }

        void setId(int id)
        {
            this->id = id;
        }

        string getNama()
        {
            return this->nama;
        }

        void setNama(string nama)
        {
            this->nama = nama;
        }

        string getNama_bidang()
        {
            return this->nama_bidang;
        }

        void setNama_bidang(string nama_bidang)
        {
            this->nama_bidang = nama_bidang;
        }

        string getNama_partai()
        {
            return this->nama_partai;
        }

        void setNama_partai(string nama_partai)
        {
            this->nama_partai = nama_partai;
        }

        // destructor
        ~Dpr(){}
        
};