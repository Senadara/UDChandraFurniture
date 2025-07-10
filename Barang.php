<?php
require_once 'DbConnection.php';
class Barang{
private $idBarang;
private $tipe;
private $nama;
private $stok;
private $satuan;
private $harga;
private $database;

function __construct($idBarang =null, $nama =null, $stok =null, $satuan =null, $tipe =null, $harga =null){
    
    $this->database = new DbConnection();
    if($idBarang !=null && $tipe !=null && $nama !=null && $stok !=null && $satuan !=null && $harga !=null){
    $this-> idBarang = $idBarang;
    $this-> tipe = $tipe;
    $this-> nama = $nama;
    $this-> stok = $stok;
    $this-> satuan = $satuan;
    $this-> harga = $harga;
    }
}

function tampilBarang(){
    $sql = "SELECT * FROM barang WHERE `status` = 'active'";
    $statement = $this->database->db->query($sql);
    $data = $statement->fetchAll(PDO::FETCH_ASSOC);   
    return $data;
}

function tampilBarangOnce($id){
    $sql = "SELECT * FROM barang WHERE idBarang = :id AND `status` = 'active'";
    $statement = $this->database->db->prepare($sql);
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->execute();
    $data = $statement->fetch();
    return $data;
}

function hapusBarang($id){
    // $sql = "DELETE FROM barang WHERE idBarang = :id ";
    $sql = "UPDATE `barang` SET `status` = 'nonactive' WHERE `barang`.`idBarang` = :id;";
    $statement = $this->database->db->prepare($sql);
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    return $statement->execute();
}

function updateBarang($data){
        $sql = "UPDATE barang SET tipe = :tipe, nama = :nama, stok = :stok, satuan = :satuan, harga = :harga WHERE barang.idBarang= :idBarang";
        $statement = $this->database->db->prepare($sql);

        $statement->bindParam(':idBarang', $data['idBarang'], PDO::PARAM_INT);
        $statement->bindParam(':nama', $data['nama'], PDO::PARAM_STR);
        $statement->bindParam(':tipe', $data['tipe'], PDO::PARAM_STR);
        $statement->bindParam(':stok', $data['stok'], PDO::PARAM_INT);
        $statement->bindParam(':satuan', $data['satuan'], PDO::PARAM_STR);
        $statement->bindParam(':harga', $data['harga'], PDO::PARAM_STR);
        
        return $statement->execute();
}

function updateJumlahBarang($id, $jumlah){
    $sql = "UPDATE barang SET stok = :stok WHERE barang.idBarang= :idBarang";
    $statement = $this->database->db->prepare($sql);

    $statement->bindParam(':idBarang', $id, PDO::PARAM_INT);
    $statement->bindParam(':stok',$jumlah, PDO::PARAM_INT);
    
    return $statement->execute();
}

function tambahBarang($data){
    $sql = "INSERT INTO `barang` (`idBarang`, `tipe`, `nama`, `stok`, `satuan`, `harga`) VALUES (NULL, :tipe, :nama, :stok, :satuan, :harga)";
    $statement = $this->database->db->prepare($sql);

    $statement->bindParam(':nama', $data['nama'], PDO::PARAM_STR);
    $statement->bindParam(':tipe', $data['tipe'], PDO::PARAM_STR);
    $statement->bindParam(':stok', $data['stok'], PDO::PARAM_INT);
    $statement->bindParam(':satuan', $data['satuan'], PDO::PARAM_STR);
    $statement->bindParam(':harga', $data['harga'], PDO::PARAM_STR);
    
    return $statement->execute();
}

}

?>