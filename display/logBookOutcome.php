<?php
include('authentication.php');
include('sidebar.html');
include('../Logbook.php');

@$idKeuangan = 0;
$validation = true;
@$logbook = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['tampilData'])) {
        // iddetailkeuangan
        $dataBarang = tampilDetailBarang($dataDetail);
    } elseif (isset($_POST['submitFilter'])) {
        $bulan = $_POST['filterBulan'];
        $deskripsi = $_POST['filterDeskripsi'];
        $logbook = getDataLogbook($bulan, $deskripsi);
        if (empty($logbook)) {
            $validation = false;
        }
    } else {
        $logbook = [];
    }
}

if (@$_GET['status'] == 'edit') {
    $id = @$_GET['id'];
    $catatan = new Logbook();
    $dataOnce = $catatan->tampilLogbookOnce($id);
    $status = @$_GET['status'];
}

$pesan = @$_GET['pesan'];
if (!empty($pesan)) {
    echo '<script>alert("' . $pesan . '");</script>';
}

function getDataLogbook($bulan = null, $deskripsi = null)
{
    $keuangan = new Logbook();
    if ($bulan != null || $deskripsi != null) {
        $data = $keuangan->filterLogbook($bulan, $deskripsi, "outcome");
        return $data;
    } else {
        $data = $keuangan->getAllLogbook("outcome");
        return $data;
    }
}

function tampilDetailBarang($dataDetail)
{
    $barang = new DetailPengiriman();
    $idShipment = $dataDetail['idShipment'];
    $dataBarang = $barang->getDetailPengiriman($idShipment);
    return $dataBarang;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>LOGBOOK</title>
    <link rel="stylesheet" type="text/css" href="../style/displayLb.css" />
</head>

<body>
    <!-- SIDEBAR -->
    <!-- SIDEBAR END -->
    <main>
        <div class="header">
            <h1>LOG BOOK</h1>
            <p>Selamat datang di menu logbook UD Chandra Furniture</p>
        </div>
        <div class="menuLogbook">
            <h5><a class="btnPage" href="logBookIncome.php">INCOME</a></h5>
            <h5><a class="btnPage"` href="#">OUTCOME</a></h5>
        </div>
        <div class="containerKeuangan">
            <div class="keuangan">
                <div class="detail">
                    <div class="filter">
                        <h3>DETAIL KEUANGAN</h3>
                        <div class="filterForm">
                            <h4>Filter :</h4>
                            <form action="logBookoutcome.php" method="post">
                                <label for="month">Bulan</label>
                                <input type="month" name="filterBulan" id="filterBulan" />
                                <label for="filterDeskripsi">Cari</label>
                                <input type="text" name="filterDeskripsi" id="filterDeskripsi" />
                                <input type="submit" name="submitFilter" value="Cari" class="btnSubmit hijau"></input>
                                <input type="submit" name="resetFilter" value="Reset" class="btnSubmit red"></input>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="detailItem">
                    <div class="tableUang">
                        <table>
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Jumlah Uang</th>
                                    <th>Deskripsi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (empty($logbook) && $validation) :
                                    $data = getDataLogbook();
                                    foreach ($data as $d) :
                                ?>
                                        <tr>
                                            <td><?= $d['tanggal'] ?> </td>
                                            <td><?= $d['totalUang'] ?></td>
                                            <td><?= $d['deskripsi'] ?></td>
                                            <td><button class="btnSubmit orange"><a href="logBookoutcome.php?status=edit&id=<?= $d['idLogbook'] ?>">Edit</a></button>
                                                <button class="btnSubmit red"><a href="../Logbook_controller.php?status=hapusOutcome&id=<?= $d['idLogbook'] ?>">Hapus</a></button></td>
                                        </tr>
                                <?php
                                    endforeach;
                                else :
                                    $data = $logbook;
                                    foreach ($data as $d) :
                                ?>
                                        <tr>
                                            <td><?= $d['tanggal'] ?> </td>
                                            <td><?= $d['totalUang'] ?></td>
                                            <td><?= $d['deskripsi'] ?></td>
                                            <td><button class="btnSubmit orange"><a href="logBookoutcome.php?status=edit&id=<?= $d['idLogbook'] ?>">Edit</a></button>
                                                <button class="btnSubmit red"><a href="../Logbook_controller.php?=status=hapusOutcome$d ['idLogbook']?>">Hapus</a></button></td>
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
        </div>
        <div class="form">
            <div class="card">
                <h5>OUTCOME</h5>
                <?php
                $data = new Logbook();
                $keuangan = $data->keuangan();
                ?>
                <h2>Rp. <?= number_format($keuangan['outcome']) ?></h2>
            </div>
            <div class="cardFormKeuangan">
                <h3>FORM</h3>
                <form class="formKeuangan" id="formLogbook" action="../Logbook_controller.php" method="post">
                    <input type="hidden" name="type" value="outcome">
                    <input type="hidden" name="id" value="<?= @$dataOnce['idLogbook'] ?>">

                    <label for="tanggal">Tanggal : </label>
                    <input type="datetime-local" name="tanggal" value="<?= @$dataOnce['tanggal'] ?>" />

                    <label for="uang">Jumlah uang : </label>
                    <input type="number" name="uang" value="<?= @$dataOnce['totalUang'] ?>" />

                    <label for="deskripsi">Deskripsi : </label>
                    <input type="text" name="deskripsi" value="<?= @$dataOnce['deskripsi'] ?>" />
                    <br />
                    <input type="submit" name="submitKeuangan" value="<?= @$status == "edit" ? "Simpan Perubahan" : "Simpan" ?>" class="btnSubmit biru" />
                </form>
            </div>
        </div>
    </main>
</body>

</html>
