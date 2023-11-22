<?php

class User
{
    private $idUser;
    private $username;
    private $password;
    private $namaLengkap;
    private $noHP;
    private $alamat;
    private $isAdmin;

    function __construct($id, $username, $password, $namaLengkap, $noHP, $alamat, $isAdmin)
    {
        $this->idUser = $id;
        $this->username = $username;
        $this->password = $password;
        $this->namaLengkap = $namaLengkap;
        $this->noHP = $noHP;
        $this->alamat = $alamat;
        $this->isAdmin = $isAdmin;
    }

    // getter
    public function getidUser()
    {
        return $this->idUser;
    }
    public function getUsername()
    {
        return $this->username;
    }
    public function getNamaLengkap()
    {
        return $this->namaLengkap;
    }
    public function getNoHp()
    {
        return $this->noHP;
    }
    public function getAlamat()
    {
        return $this->alamat;
    }
    public function getIsAdmin()
    {
        return $this->isAdmin;
    }

    // setter
    public function setIdUser($id)
    {
        $this->idUser = $id;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function setNamaLengkap($namaLengkap)
    {
        $this->namaLengkap = $namaLengkap;
    }

    public function setNoHP($noHP)
    {
        $this->noHP = $noHP;
    }

    public function setAlamat($alamat)
    {
        $this->alamat = $alamat;
    }

    public function setIsAdmin($isAdmin)
    {
        $this->isAdmin = $isAdmin;
    }

    public function tampilData()
    {
        echo "IdUser: " . $this->idUser;
        echo "<br> Username: " . $this->username;
        echo "<br> Nama Lengkap: " . $this->namaLengkap;
        echo "<br> No Hp: " . $this->noHP;
        echo "<br> Alamat: " . $this->alamat;
        echo "<br> IsAdmin: " . $this->isAdmin;
    }
}
