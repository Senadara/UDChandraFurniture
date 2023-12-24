<?php
require_once 'DbConnection.php';
class Barang{
private $idBarang;
private $tipe;
private $nama;
private $stok;
private $harga;
private $database;

function __construct($idBarang, $tipe, $nama, $stok, $harga){

    $this->database = new DbConnection();
    $this-> idBarang = $idBarang;
    $this-> tipe = $tipe;
    $this-> nama = $nama;
    $this-> stok = $stok;
    $this-> harga = $harga;
}



}

?>