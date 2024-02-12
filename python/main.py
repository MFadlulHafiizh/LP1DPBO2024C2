#Saya Muhammad Muhammad Fadlul Hafiizh [2209889] mengerjakan soal latprak_1 dalam mata kuliah DPBO.
#untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan, Aamiin

from Dpr import Dpr

def add_anggota(daftarAnggota):
    print("Masukan jumlah anggota DPR:")
    jml = int(input()) #input jumlah anggota yang ingin ditambahkan
    for i in range(jml):
        print("\nMasukan data ke ",i+1)
        nama = input("Masukan nama: ")
        bidang = input("Masukan bidang: ")
        partai = input("Masukan partai: ")
        daftarAnggota.append(Dpr(nama, bidang, partai)) #append atau masukan atribut yang baru diinputkan kedalam objek Dpr sehingga menjadi array of obj dpr

def show_anggota(daftarAnggota):
    header = ["ID", "Nama", "Nama Bidang", "Nama Partai"] #header table
    min_width_col = [2,4,11,11] #panjang minimal tiap kolom, nilai awal berdasarkan panjang judul
    for x in daftarAnggota: #ambil nilai karakter terpanjang berdasarkan semua data pada array of obj dpr pada setiap kolom/atribut
        if len(str(x.get_id())) > min_width_col[0]:
            min_width_col[0] = len(str(x.get_id()))
        if len(x.get_nama()) > min_width_col[1]:
            min_width_col[1] = len(x.get_nama())
        if len(x.get_bidang()) > min_width_col[2]:
            min_width_col[2] = len(x.get_bidang())
        if len(x.get_partai()) > min_width_col[3]:
            min_width_col[3] = len(x.get_partai())

    # print header
    for index, item in enumerate(header): #print header dengan format penambahan garis table dan spasi sesuai karakter terpanjang di kolom nya
        print("{:{}}".format("".join(["| ", item] ) if index == 0 else item, min_width_col[index]), end=" | ")
    print()
    print("-" * (sum(min_width_col) + 11)) #print garis table dari total seluruh karakter terpanjang tiap kolom + 11 dari karakter addon seperti garis table dan spasi yang tidak terhitung pada karakter dalam data array

    for item in daftarAnggota: #print data anggota yang ada pada list dengan format yang sama seperti header
        print("{:{}}".format("".join(["| ", str(item.get_id())] ) if index == 0 else str(item.get_id()), min_width_col[0]), end=" | ")
        print("{:{}}".format("".join(["| ", item.get_nama()] ) if index == 0 else item.get_nama(), min_width_col[1]), end=" | ")
        print("{:{}}".format("".join(["| ", item.get_bidang()] ) if index == 0 else item.get_bidang(), min_width_col[2]), end=" | ")
        print("{:{}}".format("".join(["| ", item.get_partai()] ) if index == 0 else item.get_partai(), min_width_col[3]), end=" |\n")
        
def edit_anggota(daftarAnggota):
    srcId = input("Masukan ID DPR yang ingin diubah :")
    i = 0
    is_found = False
    while i < len(daftarAnggota) and not is_found: #loop mencari id anggota yang diinputkan
        if str(daftarAnggota[i].get_id()) == srcId: #bila id ditemukan maka perbarui dengan input ulang setiap atribut
            daftarAnggota[i].set_nama(input("Rubah nama :"))
            daftarAnggota[i].set_bidang(input("Rubah bidang :"))
            daftarAnggota[i].set_bidang(input("Rubah partai :"))
            is_found = True
        i = i+1

    if is_found:
        print("Data dengan ID ",srcId," Berhasil diubah!")
    else:
        print("Maaf ID yang anda input tidak ditemukan!")

def hapus_anggota(daftarAnggota):
    srcId = input("Masukan ID DPR yang ingin dihapus :")
    i = 0
    is_found = False
    while i < len(daftarAnggota) and not is_found: #loop mencari id anggota yang diinputkan
        if str(daftarAnggota[i].get_id()) == srcId: #bila id ditemukan maka hapus dari array
            daftarAnggota.pop(i)
            is_found = True
        i = i+1

    if is_found:
        print("Data dengan ID ",srcId," Berhasil dihapus!")
    else:
        print("Maaf ID yang anda input tidak ditemukan!")

def show_menu(daftarAnggota):
    print("Pilih aksi:")
    print("1. Input daftar anggota DPR")
    print("2. Rubah daftar anggota DPR")
    print("3. Hapus daftar anggota DPR")
    print("4. Lihat daftar anggota DPR")
    print("5. Keluar")
    inMenu = int(input("Masukan pilihan anda : ")) #inputkan pilihan menu
    if inMenu == 1: #kondisikan inputan menu dan arahkan pada prosedur sesuai pilihannya
        add_anggota(daftarAnggota)
    elif inMenu == 2:
        edit_anggota(daftarAnggota)
    elif inMenu == 3:
        hapus_anggota(daftarAnggota)
    elif inMenu == 4:
        show_anggota(daftarAnggota)
    elif inMenu == 5:
        print("Selamat tinggal!....")
    else:
        print("Pilih menu yang sesuai!")

    return inMenu

daftarAnggota = [] #insialisasi dan inputkan anggota sebagai langkah awal
add_anggota(daftarAnggota)

pilihan = show_menu(daftarAnggota)#tampilkan pilihan menu dan selama tidak memilih menu ke 5 untuk keluar maka pilihan menu akan terus dimunculkan
while pilihan != 5:
    pilihan = show_menu(daftarAnggota)


