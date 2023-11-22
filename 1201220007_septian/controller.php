<?php

class UserAdmin{
    private $idUser = "120";
    private $nama;
    private $noTelp;
    private $akun;
    private $pswd;

    function __construct($akun, $pswd){
        $this->akun = $akun;
        $this->pswd = $pswd;
    }

    function getDataLogin(){
        echo $this->akun;
        echo $this->pswd;
        echo $this->idUser;
    }

    function setAkun($akun){
        $this->nama = $akun;
    }

    function updateId($idBaru){
        $this->idUser += $idBaru;
    }
}
?>