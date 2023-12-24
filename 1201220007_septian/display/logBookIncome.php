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
        <?php
        include('sidebar.html')
        ?>
        <!-- SIDEBAR END -->
        <main>
            <div class="header">
                <h1>LOG BOOK</h1>
                <p>Selamat datang di menu logbook UD Chandra Furniture</p>
            </div>
            <div class="menuLogbook">
                <h5><a class="btnPage" href="#">INCOME</a></h5>
                <h5><a class="btnPage" href="logBookOutcome.php">OUTCOME</a></h5>
            </div>
            <div class="containerKeuangan">
                <div class="keuangan">
                    <div class="detail">
                        <div class="filter">
                            <h3>DETAIL KEUANGAN</h3>
                            <div class="filterForm">
                                <h4>Filter :</h4>
                                <label for="month">Bulan</label>
                                <input type="month" />
                                <label for="searching">Cari</label>
                                <input type="text" name="searching" />
                                <button>Cari</button>
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
                                    <tr>
                                        <td>12 Desember 2023</td>
                                        <td>Rp 2.000.000</td>
                                        <td>penjualan 1</td>
                                        <td><button class="btnEdit">Edit</button><button class="btnHapus">Hapus</button></td>
                                    </tr>
                                    <tr>
                                        <td>12 Desember 2023</td>
                                        <td>Rp 2.000.000</td>
                                        <td>penjualan 1</td>
                                        <td><button class="btnEdit">Edit</button><button class="btnHapus">Hapus</button></td>
                                    </tr>
                                    <tr>
                                        <td>12 Desember 2023</td>
                                        <td>Rp 2.000.000</td>
                                        <td>penjualan 1</td>
                                        <td><button class="btnEdit">Edit</button><button class="btnHapus">Hapus</button></td>
                                    </tr>
                                    <tr>
                                        <td>12 Desember 2023</td>
                                        <td>Rp 2.000.000</td>
                                        <td>penjualan 1</td>
                                        <td><button class="btnEdit">Edit</button><button class="btnHapus">Hapus</button></td>
                                    </tr>
                                    <tr>
                                        <td>12 Desember 2023</td>
                                        <td>Rp 2.000.000</td>
                                        <td>penjualan 1</td>
                                        <td><button class="btnEdit">Edit</button><button class="btnHapus">Hapus</button></td>
                                    </tr>
                                    <tr>
                                        <td>12 Desember 2023</td>
                                        <td>Rp 2.000.000</td>
                                        <td>penjualan 1</td>
                                        <td><button class="btnEdit">Edit</button><button class="btnHapus">Hapus</button></td>
                                    </tr>
                                    <tr>
                                        <td>12 Desember 2023</td>
                                        <td>Rp 2.000.000</td>
                                        <td>penjualan 1</td>
                                        <td><button class="btnEdit">Edit</button><button class="btnHapus">Hapus</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="form">
                    <div class="card">
                        <h5>INCOME</h5>
                        <h2>Rp. XXX.XXX.XXX,00</h2>
                    </div>
                    <h3>FORM</h3>
                    <form>
                        <label for="tanggal">Tanggal : </label>
                        <input type="date" name="tanggal" />

                        <label for="uang">Jumlah uang : </label>
                        <input type="number" name="uang" />

                        <label for="deskripsi">Deskripsi : </label>
                        <input type="text" name="deskripsi" />

                        <br />
                        <input type="submit" value="submit" />
                    </form>
                </div>
            </div>
        </main>
    </body>
</html>
