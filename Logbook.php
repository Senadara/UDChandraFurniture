<?php
require_once('DbConnection.php');

class Logbook
{
    private $idLogbook;
    private $totalUang;
    private $deskripsi;
    private $type;
    private $tanggal;
    private $idKeuangan;
    private $database;

    public function __construct(){
        $this->database = new DbConnection();
    }


    function tambahLogbook($data){
        $sql = "INSERT INTO logbook (totalUang, deskripsi, type, tanggal) VALUES (:uang, :deskripsi, :type, :tanggal)";
        $statement = $this->database->db->prepare($sql);
    
        $statement->bindParam(':deskripsi', $data['deskripsi'], PDO::PARAM_STR);
        $statement->bindParam(':type', $data['type'], PDO::PARAM_STR);
        $statement->bindParam(':tanggal', $data['tanggal'], PDO::PARAM_STR);
        $statement->bindParam(':uang', $data['uang'], PDO::PARAM_INT);
        var_dump($statement);
        var_dump($data);
        return $statement->execute();
    }
    
    public function getAllLogbook($type){
        $sql = "SELECT * FROM logbook l INNER JOIN keuangan k ON l.idKeuangan = k.idKeuangan where type = :type";
        $statement = $this->database->db->prepare($sql);
        $statement->bindParam(':type', $type ,PDO::PARAM_STR);
        $statement->execute();
        $data = $statement->fetchAll(PDO::FETCH_ASSOC);   
        return $data;
    }

    public function updateLogbook($data){
        $sql = "UPDATE `logbook` SET `tanggal` = :tanggal , totalUang = :uang, deskripsi = :deskripsi WHERE `logbook`.`idLogbook` = :id and type = :type;";
        $statement = $this->database->db->prepare($sql);

        $statement->bindParam(':deskripsi', $data['deskripsi'], PDO::PARAM_STR);
        $statement->bindParam(':type', $data['type'], PDO::PARAM_STR);
        $statement->bindParam(':tanggal', $data['tanggal'], PDO::PARAM_STR);
        $statement->bindParam(':id', $data['id'], PDO::PARAM_INT);
        $statement->bindParam(':uang', $data['uang'], PDO::PARAM_INT);
        
        return $statement->execute();
    }

    public function hapusLogbook($idLogbook){
    $sql = "DELETE FROM logbook WHERE idLogbook = :id ";
    $statement = $this->database->db->prepare($sql);
    $statement->bindParam(':id', $idLogbook, PDO::PARAM_INT);
    return $statement->execute();
    }

    function filterLogbook($bulan, $deskripsi, $type){
        $sql = "SELECT * FROM `logbook` WHERE DATE_FORMAT(tanggal, '%Y-%m') = :bulan OR deskripsi LIKE :deskripsi AND type = :type";
        $statement = $this->database->db->prepare($sql);
        $statement->bindParam(':bulan', $bulan, PDO::PARAM_STR);
        $likeDeskripsi = '%' . $deskripsi . '%';
        if($deskripsi == ""){
            $likeDeskripsi = '%null%';
        }
        $statement->bindValue(':deskripsi', $likeDeskripsi, PDO::PARAM_STR);
        $statement->bindParam(':type', $type, PDO::PARAM_STR);
        $statement->execute();
        $data = $statement->fetchAll();
        return $data;
    }
    
    function tampilLogbookOnce($id){
        $sql = "SELECT * FROM logbook WHERE idLogbook = :id";
        $statement = $this->database->db->prepare($sql);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        $data = $statement->fetch();
        return $data;
    }

    function keuangan(){
        $sql = "SELECT * FROM `keuangan`";
        $statement = $this->database->db->prepare($sql);
        $statement->execute();
        $data = $statement->fetch(PDO::FETCH_ASSOC);   
        return $data;
    }
    
}
?>
