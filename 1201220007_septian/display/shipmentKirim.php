<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shipment</title>
    <link rel="stylesheet" type="text/css" href="../style/shipmentKirim.css" />
</head>
<body>

<?php
include('authentication.php');
include('sidebar.html');
include("../Barang.php");

$pesan = @$_GET['pesan'];
if (!empty($pesan)) {
    echo '<script>alert("' . $pesan . '");</script>';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['jumlahPesanan'], $_POST['idBarang'], $_POST['hargaBarang'], $_POST['stokBarang'], $_POST['satuanBarang'])) {
        $jumlahPesanan = (int)$_POST['jumlahPesanan'];
        $idBarang = $_POST['idBarang'];
        $hargaBarang = (int)str_replace(",", "", $_POST['hargaBarang']);
        $stokBarang = (int)$_POST['stokBarang'];
        $satuanBarang = $_POST['satuanBarang'];

        $itemExists = false;
        foreach ($keranjang as &$k) {
            if ($k['idBarang'] == $idBarang) {
                $totalPesanan = $k['jumlahPesanan'] + $jumlahPesanan;

                if (is_numeric($jumlahPesanan) && $jumlahPesanan > 0 && $totalPesanan <= $stokBarang) {
                    $k['jumlahPesanan'] = $totalPesanan;
                    $k['totalHarga'] = $totalPesanan * $hargaBarang;
                    $k['sisaStok'] = $stokBarang - $totalPesanan;
                    $itemExists = true;
                    break;
                } else {
                    echo "<script>alert('Jumlah pesanan melebihi stok barang. Pastikan jumlah pesanan lebih dari 0 dan tidak melebihi stok barang.');</script>";
                    redirectToForm();
                }
            }      
        }

        if (!$itemExists && is_numeric($jumlahPesanan) && $jumlahPesanan > 0 && $jumlahPesanan <= $stokBarang) {
            $keranjang[] = [
                'idBarang' => $idBarang,
                'namaBarang' => $_POST['namaBarang'],
                'jumlahPesanan' => $jumlahPesanan,
                'satuan' => $satuanBarang,
                'totalHarga' => $jumlahPesanan * $hargaBarang,
                'sisaStok' => $stokBarang - $jumlahPesanan
            ];
        } elseif (!$itemExists && $jumlahPesanan > $stokBarang && $jumlahPesanan <= 0) {
            echo "<script>alert('Jumlah pesanan tidak valid. Pastikan jumlah pesanan lebih dari 0 dan tidak melebihi stok barang.');</script>";
            redirectToForm();
        }

        $_SESSION['keranjang'] = $keranjang;
        echo "<script>closeForm();</script>";
    } elseif(isset($_POST['hapusRow'])) {
        $index = (int)$_POST['hapusIndex'];
        if (isset($keranjang[$index])) {
            unset($keranjang[$index]);
            $keranjang = array_values($keranjang);
            $_SESSION['keranjang'] = $keranjang;
            redirectToForm();
            }
    }
}

function hitungTotalHarga($keranjang) {
    $totalHarga = 0;
    if (!empty($keranjang)) {
        foreach($keranjang as $k) {
            $totalHargaSebelum = $totalHarga;
            $harga = $k['totalHarga'];
            $totalHarga = $totalHargaSebelum + $harga;
        }
    }
    return $totalHarga;
}

function redirectToForm() {
    echo '<script>window.location.href = "shipmentKirim.php";</script>';
    exit;
}
?>

<main>
    <div class="header">
        <h1>THIS IS YOUR SHIPMENT</h1>
        <p>Selamat datang di .......</p>
    </div>

    <div class="page">
        <a href="shipment.php">Histori Shipment</a>
        <a href="#">Kirim Barang</a>
    </div>

    <div class="tableContainer">
        <div class="form-container">
            <h3>Form Pengiriman</h3>
            <div class="formCard">
                <form action="../shipment_controller.php" method="post">
                    <input type="hidden" name="idPengirim" id="idPengirim" value="<?=$_SESSION['idUser']?>"/>

                    <div class="form-group">
                        <label for="Pengirim">Pengirim</label>
                        <input type="text" name="pengirim" id="pengirim" value="<?=$_SESSION['Nama']?>" readonly></input>
                    </div>

                    <div class="form-group">
                        <label for="tujuan">Tujuan</label>
                        <input type="text" name="tujuan" id="tujuan" />
                    </div>

                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="datetime-local" name="tanggal" id="tanggal" />
                    </div>

                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <input type="text" name="deskripsi" id="deskripsi" />
                    </div>
                    
                    <div class="form-group yelllow">
                        <label for="totalHarga">Total Harga</label>
                        <input type="number" name="totalHarga" id="totalHarga" value="<?=hitungTotalHarga($keranjang)?>" readonly/>
                    </div>
                    
                    <input type="submit" name="kirimPesanan" class="btnForm" value="Kirim Pesanan" />
                </form>
            </div>
        </div>

        <div class="tableBarangContainer">
            <div class="title">
                <h3>Product</h3>
                <div>
                    <label for="searchBarangJadi">Cari :</label>
                    <input type="text" id="searchBarangJadi" onkeyup="searchBarangJadi()" placeholder="Masukkan kata kunci...">
                </div>
            </div>

            <div class="bahanJadi">
                <table class="table" id="tableBahanJadi">
                    <thead>
                        <tr>
                            <th onclick="sortTable(0)">NAMA BARANG</th>
                            <th onclick="sortTable(1)">STOCK</th>
                            <th onclick="sortTable(2)">HARGA</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $gudang = new Barang();
                        $data = $gudang->tampilBarang();
                        foreach ($data as $d):
                            if ($d['tipe'] == 'jadi'):
                        ?>
                                <tr onclick="showForm('<?=$d['idBarang']?>', '<?=$d['nama']?>', <?=$d['stok']?>, '<?=$d['satuan']?>', <?=$d['harga']?>)">
                                    <th><?=$d['nama'] ?></th>
                                    <td><?=$d['stok'].' '.$d['satuan'] ?></td>
                                    <td>Rp. <?= number_format($d['harga'])?></td>
                                </tr>
                        <?php
                            endif;
                        endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="form-container" id="formBahanJadi">
        <div class="formPopup">
            <form action="shipmentKirim.php" method="post">
                <input type="hidden" name="idBarang" id="idBarang" />
                <input type="hidden" name="namaBarang" id="namaBarang" />
                <input type="hidden" name="stokBarang" id="stokBarang" />
                <input type="hidden" name="satuanBarang" id="satuanBarang" />
                <input type="hidden" name="hargaBarang" id="hargaBarang" />

                <div class="form-group">
                    <label for="jumlahPesanan">Jumlah Pesanan</label>
                    <input type="number" name="jumlahPesanan" id="jumlahPesanan" />
                </div>
                
                <button type="submit" class="btnForm">Simpan Pesanan</button>
                <button type="button" class="btnForm" onclick="closeForm()">Batal</button>
            </form>
        </div>
    </div>

    <div class="containerKeranjang">
    <div class="title2">
        <h3>Keranjang</h3>
    </div>

    <div class="backgroundTable">
        <table id="keranjangTable" class="tableKeranjang">
            <thead>
                <tr>
                    <th>Nama Barang</th>
                    <th>Jumlah Pesanan</th>
                    <th>Total Harga</th>
                    <th>Action</th> 
                </tr>
            </thead>
            <tbody id="keranjangBody">
                <?php
                if (!empty($keranjang)) :
                    foreach ($keranjang as $index => $item) :
                ?>
                    <form action="shipmentKirim.php" method="post">
                        <input type="hidden" name="hapusIndex" id="hapusIndex" value="<?=$index?>" >
                        <tr>
                            <td><?=$item['namaBarang']?></td>
                            <td><?=$item['jumlahPesanan']." ".$item['satuan']?></td>
                            <td>Rp. <?= number_format($item['totalHarga'])?></td>
                            <td>
                                <input type="submit" name="hapusRow" value="Hapus"></input>
                            </td>
                        </tr>
                    </form>
                <?php
                    endforeach;
                endif;
                ?>
            </tbody>
        </table>
    </div>
</div>
</main>

<script>
    var keranjang = JSON.parse(sessionStorage.getItem('keranjang') || '[]');

    function closeForm() {
        document.getElementById("formBahanJadi").style.display = "none";
    }

    function showForm(id, nama, stok, satuan, harga) {
        document.getElementById("idBarang").value = id;
        document.getElementById("namaBarang").value = nama;
        document.getElementById("stokBarang").value = stok;
        document.getElementById("satuanBarang").value = satuan;
        document.getElementById("hargaBarang").value = harga;
        alert("Nama: " + nama + "\nStok: " + stok + "\nHarga: Rp. " + harga);

        var formBahanJadi = document.getElementById("formBahanJadi");
        formBahanJadi.style.display = "block"

        sessionStorage.setItem('keranjang', JSON.stringify(keranjang));
    }

    function searchBarangJadi() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchBarangJadi");
        filter = input.value.toUpperCase();
        table = document.getElementById("tableBahanJadi");
        tr = table.getElementsByTagName("tr");

        for (i = 1; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("th")[0];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>
</body>
</html>
