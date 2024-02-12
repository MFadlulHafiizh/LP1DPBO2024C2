<?php
class Dpr{
    private $id;
    private $nama;
    private $bidang;
    private $partai;
    private $foto_url;


    public function __construct($nama = "", $bidang="", $partai="") {
        $this->id = uniqid();
        $this->nama = $nama;
        $this->bidang = $bidang;
        $this->partai = $partai;
    }

    public function getId() {return $this->id;}
    
    public function getFoto() {return $this->foto_url;}

	public function getNama() {return $this->nama;}

	public function getBidang() {return $this->bidang;}

	public function getPartai() {return $this->partai;}

	public function setNama( $nama): void {$this->nama = $nama;}
	
    public function setFoto( $foto): void {$this->foto_url = $foto;}

	public function setBidang( $bidang): void {$this->bidang = $bidang;}

	public function setPartai( $partai): void {$this->partai = $partai;}

	
	

}