<?php
  include('authentication.php');
  include('sidebar.html');
  include('../Pengiriman.php');
  include('../DetailPengiriman.php');

  @$dataDetail = [];
  @$dataBarang = [];
  @$histori = [];
  if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(isset($_POST['tampilData'])){
      $dataDetail = json_decode($_POST['dataDetail'], true);
      $dataBarang = tampilDetailBarang($dataDetail);
    }elseif(isset($_POST['submitFilter'])){
      $tanggal = $_POST['filterTanggal'];
      $tujuan = $_POST['filterTujuan'];
      $nama = $_POST['filterNama'];
      $histori = getDataHistori($tanggal, $tujuan, $nama );
    }else{
      $histori = [];
    }
  }

  function getDataHistori($tanggal = null, $tujuan = null, $nama = null){
    $shipment = new Pengiriman();
    if($tanggal != null || $tujuan !=null || $nama != null){
    $data = $shipment-> filterShipment($tanggal, $tujuan, $nama);
    return $data;
    }else{
    $data = $shipment->getDataShipment();
    return $data;
    }
  }

  function tampilDetailBarang($dataDetail){
    $barang = new DetailPengiriman();
    $idShipment = $dataDetail['idShipment'];
    $dataBarang = $barang->getDetailPengiriman($idShipment);
    return $dataBarang;
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shipment</title>
    <link rel="stylesheet" type="text/css" href="../style/shipment.css" />
</head>
<body>

<main>
<div class="header">
  <h1>THIS IS YOUR SHIPMENT</h1>
  <p>Selamat datang di .......</p>
</div>
<div class="page">
    <a href="#">Histori Shipment</a>
    <a href="shipmentKirim.php">Kirim Barang</a>
</div>
<hr>

<div class="title">
<H2>Histori Pengiriman</H2>
<form action="shipment.php" method="post">
    <label for="filterTanggal" class="gap">Tanggal:</label>
    <input type="date" name="filterTanggal" id="filterTanggal"/>

    <label for="filterNama" class="gap">Nama:</label>
    <input type="text" name="filterNama" id="filterNama" />
    
    <label for="filterTujuan" class="gap">Kota:</label>
    <input type="text" name="filterTujuan" id="filterTujuan" />
    
    <button type="submit" name="submitFilter" class="btnSubmit gap">Filter</button>
    <button type="submit" name="resetFilter" class="btnSubmit gap">Reset</button>
</form>
</div>


  <div class="tableContainer">
    <div class="backgroundTabel">
    <table class="tableHistori">
      <thead>
        <tr>
          <th>Pengirim</th>
          <th>Tujuan</th>
          <th>Tanggal</th>
          <th>Deskripsi</th>
          <th>Total Harga</th>
          <th>Lihat Detail</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        if(empty($histori)):       
        $data =  getDataHistori();
        
        foreach($data as $d):
        ?>
        <tr>
          <form action="shipment.php" method="post">
          <input type="hidden" name="dataDetail" value="<?= htmlentities(json_encode($d)) ?>">
          <td><?=$d['nama'] ?></td>
          <td><?=$d['tujuan'] ?></td>
          <td><?=$d['tanggal'] ?></td>
          <td><?=$d['deskripsi'] ?></td>
          <td><?=$d['totalHarga'] ?></td>
          <td><input type="submit" name="tampilData" value="Lihat Detail Pengiriman" class="btnSubmit"/></td>
          </form>
        </tr>
        <?php
          endforeach;
          else:       
            $data = $histori;
            foreach($data as $d):
            ?>
            <tr>
              <form action="shipment.php" method="post">
              <input type="hidden" name="dataDetail" value="<?= htmlentities(json_encode($d)) ?>">
              <td><?=$d['nama'] ?></td>
              <td><?=$d['tujuan'] ?></td>
              <td><?=$d['tanggal'] ?></td>
              <td><?=$d['deskripsi'] ?></td>
              <td><?=$d['totalHarga'] ?></td>
              <td><input type="submit" name="tampilData" value="Lihat Detail Pengiriman" class="btnSubmit"/></td>
              </form>
            </tr>
            <?php
              endforeach;
            endif;
            ?>
        </tbody>
    </table>
  </div>
  </div>

  <div class="form-container">
    <div class= "cardBoarder">
    <div class="formCard">
    <form action="shipment.php" method="post">
      <input type="hidden" name="idShipment" id="idShipment" value="<?= (!empty($dataDetail['array_values']) ? $dataDetail['idShipment'] : '') ?>"/>


      <div class="form-group">
    <label for="Pengirim">Pengirim</label>
    <input type="text" name="pengirim" id="pengirim" value="<?= (!empty($dataDetail['nama']) ? $dataDetail['nama'] : '') ?>" />
</div>

<div class="form-group">
    <label for="tujuan">Tujuan</label>
    <input type="text" name="tujuan" id="tujuan" value="<?= (!empty($dataDetail['tujuan']) ? $dataDetail['tujuan'] : '') ?>" readonly/>
</div>

<div class="form-group">
    <label for="tanggal">Tanggal Waktu</label>
    <input type="text" name="tanggal" id="tanggal" value="<?= (!empty($dataDetail['tanggal']) ? $dataDetail['tanggal'] : '') ?>" readonly/>
</div>

<div class="form-group">
    <label for="deskripsi">Deskripsi</label>
    <input type="text" name="deskripsi" id="deskripsi" value="<?= (!empty($dataDetail['deskripsi']) ? $dataDetail['deskripsi'] : '') ?>" readonly/>
</div>

<div class="form-group">
    <label for="totalHarga">Total Harga</label>
    <input type="number" name="totalHarga" id="totalHarga" value="<?= (!empty($dataDetail['totalHarga']) ? $dataDetail['totalHarga'] : '') ?>" readonly/>
</div>


    </form>
    </div>
    <div class="cardTableDetail">
        <table class="tableDetail" >
            <thead>
              <tr>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Harga</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              if(isset($dataBarang)):
              foreach($dataBarang as $b):
              ?>
              <tr>
                <td><?=$b['nama'] ?></td>
                <td><?=$b['jumlah'] ?></td>
                <td><?=$b['harga'] ?></td>
              </tr>
              <?php 
              endforeach;
            endif;
              ?>
            </tbody>

        </table>

    </div>
</div>
</div>
</main>

<script src="js/shipment.js"></script>
</body>
</html>      
        

