<?php
    include ("Barang.php");

    if(@$_GET['status'] == 'hapus'){
        $id = @$_GET['id'];
        $barang = new Barang();
        $dataOnce = $barang -> hapusBarang($id);
        if($dataOnce){
            header('Location:display/warehouse.php?pesan= Berhasil Hapus Barang');
        }
    }

    if(@$_POST['submitBarang']=="Simpan Perubahan"){
        $data ['idBarang'] = $_POST['idBarang'];
        $data ['nama'] = $_POST['namaBarang'];
        $data ['stok'] = $_POST['stok'];
        $data ['satuan'] = $_POST['satuan'];
        $data ['tipe'] = $_POST['jenisBarang'];
        $data ['harga'] = $_POST['harga'];    
    $barang = new Barang();
    $status = $barang -> updateBarang($data);   
    if($status){
        header('Location:display/warehouse.php?pesan=Berhasil Update Barang');
    }else{
        echo "error";
    }
    }elseif(@$_POST["submitBarang"]=="Simpan"){
        $data ['nama'] = $_POST['namaBarang'];
        $data ['stok'] = $_POST['stok'];
        $data ['satuan'] = $_POST['satuan'];
        $data ['tipe'] = $_POST['jenisBarang'];
        $data ['harga'] = $_POST['harga'];    
    $barang = new Barang();
    $status = $barang -> tambahBarang($data);
    if($status){
        header('Location:display/warehouse.php?pesan=Berhasil Tambah Barang');
    }else{
        echo "error";
    }
    }

?>