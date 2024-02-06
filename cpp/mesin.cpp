#include "Dpr.cpp"
#include <bits/stdc++.h>

//recall prosedur & function karena ada yang dipanggil ulang pada prosedur/fungsi lainnya
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
        cin >> id >> nama >> bidang >> partai; //input semua atribut pada objek dpr temp
        //set semua atribut sesuai inputan
        temp.setId(id);
        temp.setNama(nama);
        temp.setNama_bidang(bidang);
        temp.setNama_partai(partai);

        // push/masukan objek pada list of dpr object
        (*llist).push_back(temp);
    }

    //setelah berhasil ditambahkan tampilkan opsi apakah ingin melihat semua anggota dpr atau tidak
    cout << "Berhasil menambah anggota, lihat daftar anggota? (y/n):";
    char opt;
    cin >> opt;
    if(opt == 'y'){
        system("cls"); //untuk membersihkan tampilan konsol supaya ga pabeulit hehe
        showListDpr(llist); // tampilkan hasil list dpr yang sudah dirubah
    }else{
        system("cls");
    }
}
void removeAnggota(list<Dpr> *llist){
    int id, is_found = 0;
    cout << "Masukan id DPR yang ingin dihapus :";
    cin >> id; //masukan id anggota yang ingin dihapus
    list<Dpr>::iterator it = (*llist).begin();
    while (it != (*llist).end() && is_found == 0) //iterasi untuk mencari anggota dpr berdasarkan id nya
    {
        if(it->getId() == id){
            (*llist).erase(it); //jika ditemukan id nya maka hapus dan hentikan iterasi while dengan set value is_found ke 1
            is_found = 1;
        }
        it++;
    }

    // jika id ditemukan yang artinya ada yang dihapus maka tampilkan informasi berhasil dihapus
    if(is_found == 1){
        cout << "Berhasil menghapus anggota, lihat daftar anggota? (y/n):";
        char opt;
        cin >> opt;
        if(opt == 'y'){
            system("cls");
            showListDpr(llist); // tampilkan hasil list dpr yang sudah dirubah
        }else{
            system("cls");
        }
    }else{
        cout << "Maaf id anggota dpr tidak ditemukan!\n";
    }
}
void showListDpr(list<Dpr> *llist){ //menampilkan seluruh data dpr yang ada pada list
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
    // menampilkan opsi pilihan aksi terhadap list
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
    cin >> id; //input id dari anggota dpr untuk dicari dan diedit nantinya

    list<Dpr>::iterator it = (*llist).begin();
    while (it != (*llist).end() && is_found == 0) //loop sebanyak seluruh item list atau ketika obj dengan id yang dicari ditemukan
    {
        if(it->getId() == id){
            //bila ditemukan maka input ulang atribut anggota
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
            showListDpr(llist); // tampilkan hasil list dpr yang sudah dirubah
        }else{
            system("cls");
        }
    }else{
        cout << "Maaf id anggota dpr tidak ditemukan!\n";
    }
}
