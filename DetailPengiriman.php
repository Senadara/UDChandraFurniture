<?php
require_once('DbConnection.php');

class DetailPengiriman
{
    private $idPengiriman;
    private $idBarang;
    private $jumlahPesanan;
    private $totalHarga;
    private $database;

    public function __construct($idPengiriman=null, $idBarang=null, $jumlahPesanan=null, $totalHarga=null){
        $this->database = new DbConnection();
        $this->idPengiriman = $idPengiriman;
        $this->idBarang = $idBarang;
        $this->jumlahPesanan = $jumlahPesanan;
        $this->totalHarga = $totalHarga;
    }

    public function insertDetailPengiriman(){
        $sql="INSERT INTO `detailshipment` (`idShipment`, `idBarang`, `jumlah`, `jumlahHarga`) VALUES (?, ?, ?, ?)";
        $statement = $this->database->db->prepare($sql);
        return $statement->execute([$this->idPengiriman, $this->idBarang, $this->jumlahPesanan, $this->totalHarga]);
    }

    public function getDetailPengiriman($idPengiriman){
        $sql ="SELECT * FROM detailshipment ds INNER JOIN barang b ON b.idBarang = ds.idBarang WHERE idShipment = :id";
        $statement = $this->database->db->prepare($sql);
        $statement->bindParam(':id', $idPengiriman, PDO::PARAM_INT);
        $statement->execute();
        $data = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
}
?>
