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
        $_SESSION['Nama']= $data['nama'];
        // $role = $data['']

        header('Location:./display/dashboard.php');
       }else{
        header('Location:login.php?pesan=usaername atau password Salah!');
       }

    }else{
        header('Location:login.php?pesan=usaername atau password kosong!');
    }
}else if(@$_POST['register'] != null){
    $data = new UserAdmin(null, $_POST['nama'], $_POST['account'], $_POST['password'], $_POST['telepon']);
    if($data->regis()){
        header('Location: register.php?pesan= Register berhasil');
    }
}


?>