<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Warehouse</title>
        <link rel="stylesheet" type="text/css" href="../style/warehouse.css" />
    </head>
    <body>
        <!-- SIDEBAR -->
        <?php
        include('sidebar.html')
        ?>
        <!-- SIDEBAR END -->

        <!-- Main page -->
        <main>
            <div class="header">
                <h1>EXPLORE THE WAREHOUSE</h1>
                <p>Selamat datang di pusat kontrol gudang kami.</p>
            </div>
            <div class="">
                <div class="warehouse">
                    <div class="bahanBaku">
                        <div class="whhead">
                            <h4>BAHAN BAKU</h4>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>NAMA BARANG</th>
                                    <th>STOCK</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>Sengon</th>
                                    <td>4 Kubik</td>
                                    <td><button class="btnEdit">Edit</button><button class="btnHapus">Hapus</button></td>
                                </tr>
                                <tr>
                                    <th>Sengon</th>
                                    <td>4 Kubik</td>
                                    <td><button class="btnEdit">Edit</button><button class="btnHapus">Hapus</button></td>
                                </tr>
                                <tr>
                                    <th>Sengon</th>
                                    <td>4 Kubik</td>
                                    <td><button class="btnEdit">Edit</button><button class="btnHapus">Hapus</button></td>
                                </tr>
                                <tr>
                                    <th>Sengon</th>
                                    <td>4 Kubik</td>
                                    <td><button class="btnEdit">Edit</button><button class="btnHapus">Hapus</button></td>
                                </tr>
                                <tr>
                                    <th>Sengon</th>
                                    <td>4 Kubik</td>
                                    <td><button class="btnEdit">Edit</button><button class="btnHapus">Hapus</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="bahanJadi">
                        <div class="whhead">
                            <h4>BAHAN JADI</h4>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>NAMA BARANG</th>
                                    <th>STOCK</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>Sengon</th>
                                    <td>4 Kubik</td>
                                    <td><button class="btnEdit">Edit</button><button class="btnHapus">Hapus</button></td>
                                </tr>
                                <tr>
                                    <th>Sengon</th>
                                    <td>4 Kubik</td>
                                    <td><button class="btnEdit">Edit</button><button class="btnHapus">Hapus</button></td>
                                </tr>
                                <tr>
                                    <th>Sengon</th>
                                    <td>4 Kubik</td>
                                    <td><button class="btnEdit">Edit</button><button class="btnHapus">Hapus</button></td>
                                </tr>
                                <tr>
                                    <th>Sengon</th>
                                    <td>4 Kubik</td>
                                    <td><button class="btnEdit">Edit</button><button class="btnHapus">Hapus</button></td>
                                </tr>
                                <tr>
                                    <th>Sengon</th>
                                    <td>4 Kubik</td>
                                    <td><button class="btnEdit">Edit</button><button class="btnHapus">Hapus</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="form-container">
                <form class="edit-form">
                  <label for="namaBarang">Nama Barang:</label>
                  <input type="text" id="namaBarang" name="namaBarang" required>
            
                  <label for="stok">Stok:</label>
                  <input type="number" id="stok" name="stok" required>
            
                  <label for="jenisBahan">Jenis Bahan:</label>
                  <select id="jenisBahan" name="jenisBahan" required>
                    <option value="bahanBaku">Bahan Baku</option>
                    <option value="bahanJadi">Bahan Jadi</option>
                  </select>
            
                  <button class="btnSimpan" type="submit">Simpan Perubahan</button>
                </form>
              </div>
            
        </main>
    </body>
</html>
