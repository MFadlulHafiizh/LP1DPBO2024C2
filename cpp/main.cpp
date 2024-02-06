#include <bits/stdc++.h>
#include "Dpr.cpp"

using namespace std;
void showListDpr(list<Dpr> *llist);
void editDpr(list<Dpr> *llist);
int showOpt(list<Dpr> *llist);

void addDpr(list<Dpr> *llist){
    cout << "Masukan jumlah anggota DPR:" << '\n';
    int n=0;
    cin >> n;

    int id;
    string nama,bidang,partai;
    for (int i = 0; i < n; i++)
    {
        Dpr temp;
        cin >> id >> nama >> bidang >> partai;
        temp.setId(id);
        temp.setNama(nama);
        temp.setNama_bidang(bidang);
        temp.setNama_partai(partai);

        (*llist).push_back(temp);
    }
    cout << "Berhasil menambah anggota, lihat daftar anggota? (y/n):";
    char opt;
    cin >> opt;
    if(opt == 'y'){
        system("cls");
        showListDpr(llist);
    }else{
        system("cls");
    }
}
void removeAnggota(list<Dpr> *llist){
    int id, is_found = 0;
    cout << "Masukan id DPR yang ingin dihapus :";
    cin >> id;
    list<Dpr>::iterator it = (*llist).begin();
    while (it != (*llist).end() && is_found == 0)
    {
        if(it->getId() == id){
            (*llist).erase(it);
            is_found = 1;
        }
        it++;
    }
    if(is_found == 1){
        cout << "Berhasil menghapus anggota, lihat daftar anggota? (y/n):";
        char opt;
        cin >> opt;
        if(opt == 'y'){
            system("cls");
            showListDpr(llist);
        }else{
            system("cls");
        }
    }else{
        cout << "Maaf id anggota dpr tidak ditemukan!\n";
    }
}
void showListDpr(list<Dpr> *llist){
    cout << "Daftar anggota DPR : " << '\n';
    int i = 0;
    for (list<Dpr>::iterator it = (*llist).begin(); it != (*llist).end(); it++)
    {
        cout << "Anggota " << (i+1) << ":\n";
        cout << "id : " << it->getId() <<'\n';
        cout << "Nama : " << it->getNama() <<'\n';
        cout << "Bidang : " << it->getNama_bidang() <<'\n';
        cout<< "Partai : " << it->getNama_partai() << "\n________________________________________" <<"\n\n";
        i++;
    }
}
int showOpt(list<Dpr> *llist){
    int act;
    cout << "\nPilih aksi:\n";
    cout << "1. Input daftar anggota DPR\n";
    cout << "2. Rubah daftar anggota DPR\n";
    cout << "3. Hapus daftar anggota DPR\n";
    cout << "4. Lihat daftar anggota DPR\n";
    cout << "5. Keluar\n";
    cout << "Masukan pilihan anda : ";
    cin  >> act;

    switch (act)
    {
        case 1:
            addDpr(llist);
        break;
        case 2:
            editDpr(llist);
        break;
        case 3:
            removeAnggota(llist);
        break;
        case 4:
            showListDpr(llist);
        break;
        case 5:
            cout << "Selamat tinggal!....\n";
        break;
        default:
            cout << "Pilih menu yang sesuai!\n\n";
        break;
    }

    return act;
}
void editDpr(list<Dpr> *llist){
    int id, is_found = 0;
    cout << "Masukan id DPR yang ingin diubah :";
    cin >> id;

    list<Dpr>::iterator it = (*llist).begin();
    while (it != (*llist).end() && is_found == 0)
    {
        if(it->getId() == id){
            string nama, bidang, partai;
            cout << "Rubah nama : ";
            cin >> nama;
            cout << "Rubah bidang : ";
            cin >> bidang;
            cout << "Rubah partai : ";
            cin >> partai;

            it->setNama(nama);
            it->setNama_bidang(bidang);
            it->setNama_partai(partai);
            is_found = 1;
        }
        it++;
    }
    if(is_found == 1){
        cout << "Berhasil update anggota, lihat daftar anggota? (y/n):";
        char opt;
        cin >> opt;
        if(opt == 'y'){
            system("cls");
            showListDpr(llist);
        }else{
            system("cls");
        }
    }else{
        cout << "Maaf id anggota dpr tidak ditemukan!\n";
    }
}
int main(){
    list<Dpr> llist;
    
    addDpr(&llist);
    int res = showOpt(&llist);
    while(res != 5){
        res = showOpt(&llist);
    }
    return 0;
    
}