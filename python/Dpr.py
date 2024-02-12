#Saya Muhammad Muhammad Fadlul Hafiizh [2209889] mengerjakan soal latprak_1 dalam mata kuliah DPBO.
#untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan, Aamiin

import uuid
class Dpr:
    #ATRIBUT
    __id = 0
    __nama = ''
    __bidang = ''
    __partai = ''

    #constructor
    def __init__(self,nama="", bidang="", partai=""):
        self.__id = uuid.uuid4()
        self.__nama = nama
        self.__bidang = bidang
        self.__partai = partai

    #enkapsulasi setiap atribut
    def get_id(self):
        return self.__id
    
    def set_id(self, value):
        self.__id = value

    def get_nama(self):
        return self.__nama
    
    def set_nama(self, value):
        self.__nama = value

    def get_bidang(self):
        return self.__bidang
    
    def set_bidang(self, value):
        self.__bidang = value
        
    def get_partai(self):
        return self.__partai
    
    def set_partai(self, value):
        self.__partai = value