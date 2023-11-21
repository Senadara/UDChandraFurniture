<?php
class User{
    private $username;
    private $namaLengkap;
    private $email;
    private $alamat;
    private $kota;
    private $provinsi;
    private $negara;
    public function __construct() { 
        $arguments = func_get_args(); 
        $numberOfArguments = func_num_args(); 
        var_dump($numberOfArguments);
        if (method_exists($this, $function =  'ConstructFor'.$numberOfArguments)) { 
            call_user_func_array(array($this, $function), $arguments); 
        } 
    } 
    public function ConstructFor2($nama, $namaLengkap){
        $this->username = $nama;
        $this->$namaLengkap = $namaLengkap;
    }
    public function ConstructFor7($nama, $email,$namaLengkap, $alamat, $kota, $provinsi, $negara){
        $this->username = $nama;
        $this->namaLengkap = $namaLengkap;
        $this->email = $email;
        $this->alamat = $alamat;
        $this->kota = $kota;
        $this->provinsi = $provinsi;
        $this->negara = $negara;
    }
    public function getUser(){
        $data = array("username"=>$this->username, "email"=> $this->email, "namaLengkap"=>$this->namaLengkap, "alamat"=>$this->alamat,
        "kota"=>$this->kota, "provinsi"=>$this->provinsi, "negara"=>$this->negara);
        return $data;
    }
}

?>