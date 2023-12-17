<?php
require_once ('UserAdmin.php');

if(@$_POST['login'] != null){
    $account = $_POST['account'];
    $pswd = $_POST['password'];

    $usr = new UserAdmin();
    if($account!=null & $pswd!=null){
       $data = $usr->auth($account, $pswd);
       if($data != null){
        session_start();
        $_SESSION['Nama']= $data['Nama'];
        // $_SESSION['nama']= $data['Nama'];

        header('Location:./display/dashboard.php');
       }else{
        header('Location:login.php?pesan=usaername atau password Salah!');
       }


    }else{
        header('Location:login.php?pesan=usaername atau password kosong!');
    }

}


?>