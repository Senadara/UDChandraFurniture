<?php
    include ("Logbook.php");

    if(@$_GET['status'] == 'hapusIncome'){
        $id = @$_GET['id'];
        $logbook = new Logbook();
        $dataOnce = $logbook -> hapusLogbook($id);
        if($dataOnce){
            header('Location:display/logbookIncome.php?pesan= Berhasil Hapus Barang');
        }
    }elseif(@$_GET['status'] == 'hapusOutcome'){
        $id = @$_GET['id'];
        $logbook = new Logbook();
        $dataOnce = $logbook -> hapusLogbook($id);
        if($dataOnce){
            header('Location:display/logbookOutcome.php?pesan= Berhasil Hapus Barang');
        }
    }

    if(@$_POST['submitKeuangan']=="Simpan Perubahan"){

        $data ['id'] = $_POST['id'];
        $data ['tanggal'] = $_POST['tanggal'];
        $data ['uang'] = $_POST['uang'];
        $data ['type'] = $_POST['type'];
        $data ['deskripsi'] = $_POST['deskripsi'];
    $logbook = new Logbook();
    $status = $logbook -> updateLogbook($data);   
    if($status && $_POST['type'] == "income"){
        header('Location:display/logbookIncome.php?pesan=Berhasil Update logbook');
    }elseif($status && $_POST['type'] == "outcome"){
        header('Location:display/logbookOutcome.php?pesan=Berhasil Update logbook');
    }else{
        echo "error";
    }
    }elseif(@$_POST["submitKeuangan"]=="Simpan"){
        $data ['tanggal'] = $_POST['tanggal'];
        $data ['uang'] = (int)$_POST['uang'];
        $data ['type'] = $_POST['type'];
        $data ['deskripsi'] = $_POST['deskripsi'];
    $logbook = new Logbook();
    $status = $logbook -> tambahLogbook($data);
    if($status && $_POST['type'] == "income"){
        header('Location:display/logbookIncome.php?pesan=Berhasil Update logbook');
    }elseif($status && $_POST['type'] == "outcome"){
        header('Location:display/logbookOutcome.php?pesan=Berhasil Update logbook');
    }else{
        echo "error";
    }
    }

?>