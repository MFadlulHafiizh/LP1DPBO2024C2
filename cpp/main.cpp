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