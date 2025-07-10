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
        $_SESSION['idUser'] = $data['idRole'];
        $_SESSION['role'] = $data['role'];

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
    }else{
        echo "error";
    }
}elseif(@$_POST['editEmployee']!=null){

    $id = $_POST['idEmployee'];
    $editedNama = $_POST['editedNama'];
    $editedTelp = $_POST['editedTelp'];
    $editedEmail = $_POST['editedEmail'];
    $editedPassword = $_POST['editedPassword'];
    $editedSalary = $_POST['editedSalary'];
    $editedStatus = $_POST['editedStatus'];
    $editedRole = $_POST['editedRole'];
    var_dump($id);

    $userAdmin = new UserAdmin();
    $success = $userAdmin->updateEmployee($id, $editedNama, $editedTelp, $editedEmail, $editedPassword, $editedSalary, $editedStatus, $editedRole);

    if($success) {
       header('Location: ./display/employee.php?pesan=Data employee berhasil diupdate');
    } else {
        header('Location: ./display/employee.php?pesan=Gagal mengupdate data employee');
    }
}


?>