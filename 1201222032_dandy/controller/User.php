<?php

class User
{
    public $idUser;
    private $nama;
    public $username;
    public $password;
    public $email;
    public $noHP;
    public $role;

    function __construct($idUser, $nama)
    {
        $this->idUser = $idUser;
        $this->nama = $nama;
    }

    function getData()
    {
        echo $this->nama;
    }

    public function setNama($name)
    {
        $this->nama = $name;
    }
}
