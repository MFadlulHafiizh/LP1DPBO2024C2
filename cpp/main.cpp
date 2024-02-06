/*Saya Muhammad Muhammad Fadlul Hafiizh [2209889] mengerjakan soal latprak_1 dalam mata kuliah DPBO.
untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan, Aamiin */
#include "mesin.cpp"

using namespace std;

int main(){
    list<Dpr> llist;
    
    addDpr(&llist); //tahap pertama input dulu data pada list of dpr object
    int res = showOpt(&llist); //tampilkan macam macam pilihan menu
    while(res != 5){ //selama tidak memilih menu no 5 maka program akan terus berjalan sesuai permintaan
        res = showOpt(&llist);
    }
    return 0;
}