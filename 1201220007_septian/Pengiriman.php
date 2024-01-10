<?php 
require_once('DbConnection.php');

class Pengiriman{
    private $idShipment;
    private $idRole;
    private $tanggal;
    private $tujuan;
    private $deskripsi;
    private $totalHarga;
    private $database;

    public function __construct($idShipment = null, $idRole = null, $tanggal = null, $tujuan = null,$totalHarga = null, $deskripsi = null) {
       $this->database = new DbConnection();
        $this->idShipment = $idShipment;
        $this->idRole = $idRole;
        $this->tanggal = $tanggal;
        $this->tujuan = $tujuan;
        $this->deskripsi = $deskripsi;
        $this->totalHarga = $totalHarga;
    }

    function insertShipment(){
        $sql="INSERT INTO `shipment` (`idRole`, `tujuan`, `tanggal`, `deskripsi`, `totalHarga`)  VALUES (?, ?, ?, ?, ?)";
        $statement = $this->database->db->prepare($sql);
        return ($statement->execute([$this->idRole, $this->tujuan, $this->tanggal, $this->deskripsi, $this->totalHarga,]));
    }

    function setIdShipment(){
        $sql = "SELECT MAX(idShipment) as idShipment FROM shipment;";
        $statement = $this->database->db->query($sql);
        $data = $statement->fetch(PDO::FETCH_ASSOC);
        $this->idShipment = $data['idShipment'];
        return $this->idShipment;
    }

    function getIdShipment(){
        return $this->idShipment;
    }
}

?>