<?php
include("Pengiriman.php");
include("DetailPengiriman.php");
include('Barang.php');
include('display/authentication.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['kirimPesanan'])) {
        $idRole = $_POST['idPengirim'];
        $tanggal = $_POST['tanggal'];
        $tujuan = $_POST['tujuan'];
        $totalHarga = $_POST['totalHarga'];
        $deskripsi = $_POST['deskripsi'];

        $data = new Pengiriman(null, $idRole, $tanggal, $tujuan, $totalHarga, $deskripsi);
        if($data->insertShipment()){
            $idPengiriman = $data->setIdShipment();

            foreach ($keranjang as $item) {
                $idBarang = $item['idBarang'];
                $jumlahPesanan = $item['jumlahPesanan'];
                $totalHarga = $item['totalHarga'];
                $sisaStok = $item['sisaStok'];

                $detailPengiriman = new DetailPengiriman($idPengiriman, $idBarang, $jumlahPesanan, $totalHarga);
                var_dump($detailPengiriman->insertDetailPengiriman());

                $dataBarang = new Barang();
                $dataBarang->updateJumlahBarang($idBarang, $sisaStok);
            }

            unset($_SESSION['keranjang']);
            header('Location: display/shipmentKirim.php?pesan=Berhasil Kirim Pesanan');
            exit;
        }
    }
}
?>
