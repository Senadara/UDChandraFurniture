<?php
    include ("../Barang.php");

    if(@$_GET['status']== 'edit'){
        $id = @$_GET['id'];
        $barang = new Barang();
        $dataOnce = $barang -> tampilBarangOnce($id);
        $status = @$_GET['status'];
    }
    
    $pesan = @$_GET['pesan'];
    if (!empty($pesan)) {
        echo '<script>alert("' . $pesan . '");</script>';
    }

?>
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
        include('authentication.php');
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
                                <?php
                                    $gudang = new Barang();
                                    $data = $gudang->tampilBarang();
                                    foreach($data as $d):
                                    if($d['tipe'] == 'baku'):
                                ?>

                                <tr>
                                    <th><?=$d ['nama'] ?></th>
                                    <td><?=$d ['stok'].' '.$d ['satuan'] ?></td>
                                    <td>
                                        <button class="btnEdit"><a href="warehouse.php?status=edit&id=<?=$d ['idBarang']?>">Edit</a></button>
                                        <button class="btnHapus"><a href="../barang_controller.php?status=hapus&id=<?=$d ['idBarang']?>">Hapus</a></button>
                                    </td>
                                </tr>

                                <?php
                                endif;
                                endforeach;
                                ?>
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
                                    <th>HARGA</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                 <?php
                                    $gudang = new Barang();
                                    $data = $gudang->tampilBarang();
                                    foreach($data as $d):
                                    if($d['tipe'] == 'jadi'):
                                ?>
                                <tr>
                                    <th><?=$d ['nama'] ?></th>
                                    <td><?=$d ['stok'].' '.$d ['satuan'] ?></td>
                                    <td>Rp. <?=$d ['harga']?></td>
                                    <td><button class="btnEdit" ><a href="warehouse.php?status=edit&id=<?=$d ['idBarang']?>">Edit</a></button>
                                    <button class="btnHapus"><a href="../barang_controller.php?status=hapus&id=<?=$d ['idBarang']?>">Hapus</a></button></td>
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
            
            <div class="form-container">
                <h2>Form Barang</h2>
                <form class="edit-form" id="formBarang" action="../barang_controller.php" method="POST">
                <input type="hidden" name="idBarang" value="<?= @$dataOnce['idBarang'] ?>">  
                <label for="namaBarang">Nama Barang:</label>
                  <input type="text" id="namaBarang" name="namaBarang" value="<?= @$dataOnce['nama']?>" required>
            
                  <label for="stok">Stok:</label>
                  <input type="number" id="stok" name="stok" value="<?= @$dataOnce['stok']?>" min="0" required>
                  <label for="satuan">Satuan:</label>
                  <select id="satuan" name="satuan" required>
                    <option value="Kubik" <?= (@$dataOnce['satuan'] == 'Kubik') ? 'selected' : '' ?> >Kubik</option>
                    <option value="Balok" <?= (@$dataOnce['satuan'] == 'Balok') ? 'selected' : '' ?> >Balok</option>
                  </select>              
                  <label for="jenisBarang">Jenis Bahan:</label>
                  <select id="jenisBarang" name="jenisBarang" required>
                    <option value="baku" <?= (@$dataOnce['tipe'] == 'baku') ? 'selected' : '' ?> >Bahan Baku</option>
                    <option value="jadi" <?= (@$dataOnce['tipe'] == 'jadi') ? 'selected' : '' ?> >Bahan Jadi</option>
                  </select>

                  <div>
                    <label for="harga">Harga:</label>
                    <input type="number" name="harga" id="harga" value="<?= (@$dataOnce['harga'] == null) ? '' : $dataOnce['harga'] ?>" min="0">
                  </div>
                                
                  <input class="btnSimpan" type="submit" name="submitBarang" value='<?=@$status == "edit" ? "Simpan Perubahan" : "Simpan"?>'></input>
                </form>
              </div>
            
        </main>
    </body>
</html>
