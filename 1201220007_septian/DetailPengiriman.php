<?php
require_once('DbConnection.php');

class DetailPengiriman
{
    private $idPengiriman;
    private $idBarang;
    private $jumlahPesanan;
    private $totalHarga;
    private $database;

    public function __construct($idPengiriman, $idBarang, $jumlahPesanan, $totalHarga){
        $this->database = new DbConnection();
        $this->idPengiriman = $idPengiriman;
        $this->idBarang = $idBarang;
        $this->jumlahPesanan = $jumlahPesanan;
        $this->totalHarga = $totalHarga;
    }

    public function insertDetailPengiriman()
    {
        $sql="INSERT INTO `detailshipment` (`idShipment`, `idBarang`, `jumlah`, `harga`) VALUES (?, ?, ?, ?)";
        $statement = $this->database->db->prepare($sql);
        return $statement->execute([$this->idPengiriman, $this->idBarang, $this->jumlahPesanan, $this->totalHarga]);
    }
}
?>
