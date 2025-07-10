<?php
require_once 'DbConnection.php';

class UserAdmin{
    private $idUser;
    private $nama;
    private $email;
    private $password;
    private $noHp;
    private $database;

    function __construct($idUser=null, $nama=null, $email=null, $password=null, $noHp=null){

        $this->database = new DbConnection();
        if($nama!=null && $email!=null && $password!=null && $noHp!=null){
            $this -> idUser = $idUser;
            $this -> nama = $nama;
            $this -> email = $email;
            $this -> password = $password;
            $this -> noHp = $noHp;
        }
    }
    

    public function auth($email, $password){
        $sql="SELECT * FROM employee e INNER JOIN role r ON e.idEmployee = r.idEmployee WHERE e.email = :email AND e.password = :password AND r.role != 'employee' AND e.status = 'active' ";
        $statement = $this->database->db->prepare($sql);
        $statement->bindparam(':email', $email, PDO::PARAM_STR);
        $statement->bindparam(':password', $password, PDO::PARAM_STR);
        $statement->execute();
        $data = $statement->fetch();
        return $data;
    }

    public function regis(){
        $sql="INSERT INTO `employee` (`idEmployee`, `nama`, `email`, `password`, `telp`, salary, status ) VALUES (?, ?, ?, ?, ?, 0, 'active')";
        $statement = $this->database->db->prepare($sql);
        return ($statement->execute([$this -> idUser, $this -> nama, $this -> email, $this -> password, $this -> noHp]));
    }

    public function tampilEmployee(){
        $sql="SELECT * FROM employee e INNER JOIN role r ON e.idEmployee = r.idEmployee";
        $statement = $this->database->db->query($sql);
        $data = $statement->fetchAll(PDO::FETCH_ASSOC);   
        return $data;
    }

    public function updateEmployee($id, $nama, $telp, $email, $password, $salary, $status, $role){
        $sql="UPDATE employee e INNER JOIN role r ON e.idEmployee = r.idEmployee SET e.nama = :nama, e.telp = :telp, e.email = :email, e.password = :password, e.salary = :salary, e.status = :status, r.role = :role  WHERE e.idEmployee = :id";
        $statement = $this->database->db->prepare($sql);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->bindParam(':nama', $nama, PDO::PARAM_STR);
        $statement->bindParam(':telp', $telp, PDO::PARAM_STR);
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->bindParam(':password', $password, PDO::PARAM_STR);
        $statement->bindParam(':salary', $salary, PDO::PARAM_INT);
        $statement->bindParam(':status', $status, PDO::PARAM_STR);
        $statement->bindParam(':role', $role, PDO::PARAM_STR);
        
        return $statement->execute(); 
    }



}

