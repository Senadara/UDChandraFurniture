<?php
require_once 'config.php';

function login($email, $password, $dbh)
{
    $stmt = $dbh->prepare("SELECT * FROM useradmin WHERE Email = :email AND Password = :password");
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function register($nama, $no, $email, $password, $dbh){
    $stmt = $dbh->prepare("INSERT INTO useradmin (Nama, No_Hp, Email, Password) VALUES (:nama, :telepon, :email, :password)");
    $stmt->bindParam(':nama', $nama);
    $stmt->bindParam(':telepon', $no);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);

    return $stmt->execute();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['login'])){
    $email = $_POST['account'];
    $password = $_POST['password'];

    $user = login($email, $password, $dbh);
    if ($user) {
        header('Location: ./display/dashboard.php');
        exit;
    } else {
        echo "Login gagal. Silakan cek email dan password Anda.";
    }

    }elseif (isset($_POST['register'])){
    $nama = $_POST['nama'];
    $no = $_POST['telepon'];
    $email = $_POST['account'];
    $password = $_POST['password'];

    $resultset = register($nama, $no, $email, $password, $dbh);
    if($resultset){
        header('Location: index.html');
        // exit;
    } else {
        echo "Registrasi gagal. Silakan coba lagi.";
    }
}
}
?>
