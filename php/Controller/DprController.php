<?php
include "Models/Dpr.php";

class DprController{
    static function storeDpr($request){
        $newAnggota = new Dpr;
        $newAnggota->setNama($request['nama']);
        $newAnggota->setBidang($request['bidang']);
        $newAnggota->setPartai($request['partai']);
        $newAnggota->setFoto($request['foto']);

        array_push($_SESSION['dprList'], $newAnggota);
        header("Location: " . $_SERVER["PHP_SELF"]);
    }
    static function updateDpr($request){
        $is_found = false;
        $i = 0;
        while($i < count($_SESSION['dprList']) && !$is_found){
            if ($request['id'] == $_SESSION['dprList'][$i]->getId()) {
                $_SESSION['dprList'][$i]->setNama($request['nama']);
                $_SESSION['dprList'][$i]->setBidang($request['bidang']);
                $_SESSION['dprList'][$i]->setPartai($request['partai']);
                if($request['foto']){
                    if($_SESSION['dprList'][$i]->getFoto() != null){
                        unlink($_SESSION['dprList'][$i]->getFoto());
                    }
                    $_SESSION['dprList'][$i]->setFoto($request['foto']);
                }
                $is_found = true;
            }
            $i++;
        }
        header("Location: " . $_SERVER["PHP_SELF"]);
    }
    static function deleteDpr($request){
        $is_found = false;
        $i = 0;
        while($i < count($_SESSION['dprList']) && !$is_found){
            if ($request['id'] == $_SESSION['dprList'][$i]->getId()) {
                unlink($_SESSION['dprList'][$i]->getFoto());
                array_splice($_SESSION['dprList'], $i, 1);
            }
            $i++;
        }
        header("Location: " . $_SERVER["PHP_SELF"]);
    }
}