

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shipment</title>
    <link rel="stylesheet" type="text/css" href="../style/shipment.css" />
</head>
<body>

<?php
  include('authentication.php');
  include('sidebar.html');
?>
<main>
<div class="header">
  <h1>THIS IS YOUR SHIPMENT</h1>
  <p>Selamat datang di .......</p>
</div>
<div class="page">
    <a href="#">Histori Shipment</a>
    <a href="shipmentKirim.php">Kirim Barang</a>
</div>
  <div class="tableContainer">
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
        <tr>
          <td>...</td>
          <td>...</td>
          <td>...</td>
          <td>...</td>
          <td>...</td>
          <td><a href="shipment-detail.php?idShipment=...">Lihat Detail</a></td>
        </tr>
        <tr>
          <td>...</td>
          <td>...</td>
          <td>...</td>
          <td>...</td>
          <td>...</td>
          <td><a href="shipment-detail.php?idShipment=...">Lihat Detail</a></td>
        </tr>
        <tr>
          <td>...</td>
          <td>...</td>
          <td>...</td>
          <td>...</td>
          <td>...</td>
          <td><a href="shipment-detail.php?idShipment=...">Lihat Detail</a></td>
        </tr>
        <tr>
          <td>...</td>
          <td>...</td>
          <td>...</td>
          <td>...</td>
          <td>...</td>
          <td><a href="shipment-detail.php?idShipment=...">Lihat Detail</a></td>
        </tr>
        <tr>
          <td>...</td>
          <td>...</td>
          <td>...</td>
          <td>...</td>
          <td>...</td>
          <td><a href="shipment-detail.php?idShipment=...">Lihat Detail</a></td>
        </tr>
        <tr>
          <td>...</td>
          <td>...</td>
          <td>...</td>
          <td>...</td>
          <td>...</td>
          <td><a href="shipment-detail.php?idShipment=...">Lihat Detail</a></td>
        </tr>
        <tr>
          <td>...</td>
          <td>...</td>
          <td>...</td>
          <td>...</td>
          <td>...</td>
          <td><a href="shipment-detail.php?idShipment=...">Lihat Detail</a></td>
        </tr>
        <tr>
          <td>...</td>
          <td>...</td>
          <td>...</td>
          <td>...</td>
          <td>...</td>
          <td><a href="shipment-detail.php?idShipment=...">Lihat Detail</a></td>
        </tr>
        <tr>
          <td>...</td>
          <td>...</td>
          <td>...</td>
          <td>...</td>
          <td>...</td>
          <td><a href="shipment-detail.php?idShipment=...">Lihat Detail</a></td>
        </tr>
        <tr>
          <td>...</td>
          <td>...</td>
          <td>...</td>
          <td>...</td>
          <td>...</td>
          <td><a href="shipment-detail.php?idShipment=...">Lihat Detail</a></td>
        </tr>
        <tr>
          <td>...</td>
          <td>...</td>
          <td>...</td>
          <td>...</td>
          <td>...</td>
          <td><a href="shipment-detail.php?idShipment=...">Lihat Detail</a></td>
        </tr>
        <tr>
          <td>...</td>
          <td>...</td>
          <td>...</td>
          <td>...</td>
          <td>...</td>
          <td><a href="shipment-detail.php?idShipment=...">Lihat Detail</a></td>
        </tr>
        </tbody>
    </table>
  </div>

  <div class="form-container">
    <div class= "cardBoarder">
    <div class="formCard">
    <form action="shipment.php" method="post">
      <input type="hidden" name="idShipment" id="idShipment" />

      <div class="form-group">
        <label for="Pengirim">Pengirim</label>
        <select name="pengirim" id="pengirim">
          </select>
      </div>

      <div class="form-group">
        <label for="tujuan">Tujuan</label>
        <input type="text" name="tujuan" id="tujuan" />
      </div>

      <div class="form-group">
        <label for="tanggal">Tanggal</label>
        <input type="date" name="tanggal" id="tanggal" />
      </div>

      <div class="form-group">
        <label for="deskripsi">Deskripsi</label>
        <input type="text" name="deskripsi" id="deskripsi" />
      </div>

      <div class="form-group">
        <label for="totalHarga">Total Harga</label>
        <input type="number" name="totalHarga" id="totalHarga" />
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
              <tr>
                <td>...</td>
                <td>...</td>
                <td>...</td>
              </tr>
              <tr>
                <td>...</td>
                <td>...</td>
                <td>...</td>
              </tr>
              <tr>
                <td>...</td>
                <td>...</td>
                <td>...</td>
              </tr>
              <tr>
                <td>...</td>
                <td>...</td>
                <td>...</td>
              </tr>
              <tr>
                <td>...</td>
                <td>...</td>
                <td>...</td>
              </tr>
              <tr>
                <td>...</td>
                <td>...</td>
                <td>...</td>
              </tr>
              <tr>
                <td>...</td>
                <td>...</td>
                <td>...</td>
              </tr>
              <tr>
                <td>...</td>
                <td>...</td>
                <td>...</td>
              </tr>
              <tr>
                <td>...</td>
                <td>...</td>
                <td>...</td>
              </tr>
              <tr>
                <td>...</td>
                <td>...</td>
                <td>...</td>
              </tr>
              <tr>
                <td>...</td>
                <td>...</td>
                <td>...</td>
              </tr>
            </tbody>

        </table>

    </div>
</div>
</div>
</main>

<script src="js/shipment.js"></script>
</body>
</html>      
        

