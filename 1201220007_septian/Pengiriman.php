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

    function getDataShipment(){
        $sql = "SELECT * FROM shipment s INNER JOIN role r ON s.idRole = r.idRole INNER JOIN employee e ON e.idEmployee = r.idEmployee;";
        $statement = $this->database->db->query($sql);
        $data = $statement->fetchAll(PDO::FETCH_ASSOC);   
        return $data;
    }

    function filterShipment($tanggal, $tujuan, $nama){
        $sql = "SELECT * FROM shipment s INNER JOIN role r ON s.idRole = r.idRole INNER JOIN employee e ON e.idEmployee = r.idEmployee WHERE DATE(s.tanggal)= :tanggal or s.tujuan = :tujuan or e.nama = :nama ;";
        $statement = $this->database->db->prepare($sql);
        $statement->bindParam(':tanggal', $tanggal ,PDO::PARAM_STR);
        $statement->bindParam(':tujuan', $tujuan ,PDO::PARAM_STR);
        $statement->bindParam(':nama', $nama ,PDO::PARAM_STR);
        $statement->execute();
        $data = $statement->fetchAll();
        return $data;
    }

}

?>