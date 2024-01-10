            <?php
            include('authentication.php');
            include('sidebar.html');
            include('../Logbook.php');
            include ("../Barang.php");
            include ("../Pengiriman.php");
            include ("../UserAdmin.php");

            ?>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <title>DASHBOARD</title>
            <link rel="stylesheet" type="text/css"href="../style/displayDb.css" />
        </head>
        <body>
            <!-- SIDEBAR -->

            <!-- SIDEBAR END -->       
            <main>
                <div class="topDisplay">
                    <div class="section1">
                        <div class="greetingCard">
                            <div class="greeting">
                                <div class="up">
                                <?php
                                $today = new DateTime();
                                $formattedDate = $today->format("l, d F Y");
                                ?>
                                    <p><?= $formattedDate ?></p>
                                </div>
                                <div class="bottom">
                                    <h1>Good Day, BOS</h1>
                                    <p>Have a nice Monday!!!</p>
                                </div>
                            </div>
                            <div class="picture">
                                <img src="../asset/greeting.png" alt="" />
                            </div>
                        </div>
                        <div class="keuangan">
                            <?php  
                            $data = new Logbook();
                            $keuangan = $data->keuangan();
                            ?>
                        
                            <div class="card income">
                                <h3>INCOME</h3>
                                <br />
                                <h1>Rp. <?=number_format($keuangan['income']) ?></h1>
                            </div>
                            <div class="card outcome">
                                <h3>OUTCOME</h3>
                                <br />
                                <h1>Rp. <?=number_format($keuangan['outcome']) ?></h1>
                            </div>
                            <div class="card profit">
                                <h3>PROFIT</h3>
                                <br />
                                <h1>Rp. <?=number_format($keuangan['profit']) ?></h1>
                            </div>
                        </div>
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

                    <div class="section2">
                        <div class="profile">
                            <h3>PROFILE</h3>
                            <div class="about">
                                <div class="profileImg">
                                    <img src="../asset/profile.jpg" alt="" />
                                </div>
                                <div class="desk">
                                    <h4>UD CHANDRA FURNITURE</h4>
                                    <p>Sawmill Industri</p>
                                    <div class="location">
                                        <img src="../asset/location.svg" alt="" />
                                        <p>Kab.Malang Jawatimur</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="shipment">
                            <div class="headShip">
                                <h3>SHIPMENT</h3>
                                
                                    <input type="month">
                                
                            </div>
                            <div class="date">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Senin</th>
                                            <th>Selasa</th>
                                            <th>Rabu</th>
                                            <th>Kamis</th>
                                            <th>Jum'at</th>
                                            <th>Sabtu</th>
                                            <th>Minggu</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>16</td>
                                            <td>17</td>
                                            <td>18</td>
                                            <td>19</td>
                                            <td>20</td>
                                            <td>21</td>
                                            <td>22</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="headDtl">
                                <h4>Januari</h4>
                                <button>
                                    <a href="shipment.php">Lihat Detail</a>
                                </button>
                            </div>
                            <div class="detailDate">
                            <table class="tableDtl">
                             <?php
                                 $shipment = new Pengiriman();
                                 $data = $shipment->getDataShipment();
                                     foreach ($data as $d):
                                    $dateTime = new DateTime($d['tanggal']);
                                    $date = $dateTime->format("d");
        

                                 $dayName = strftime("%A", $dateTime->getTimestamp());
                                ?>
                                    <tr>
                                        <th><?= $dayName ?>, <?= $date ?></th>
                                        <td><?=$d['deskripsi'] ?></td>
                                    </tr>
                                 <?php
                                endforeach;
                                ?>
                            </table>    
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bottomDisplay">
                    <div class="headbtm">
                        <h4>DAFTAR KEHADIRAN</h4>
                    </div>
                    <div class="tbbtm">
                        <div class="tableKehadiran first">
                            <table>
                                <tr>
                                    <th>NAMA</th>
                                </tr>
                                <tr>
                                    <th>DATANG</th>
                                </tr>
                                <tr>
                                    <th>PULANG</th>
                                </tr>
                            </table>
                        </div>
                        <div class="tableKehadiran second">
                            <table class="jamKehadiran">
                            <tr>
                            <?php
                            $employee = new UserAdmin();
                            $data = $employee->tampilEmployee();
                            foreach($data as $d): 
                            ?>
                                <td><?=$d ['nama']?></td>
                            <?php 
                            endforeach;
                            ?>
                            </tr>
                                <tr>
                                    <td>08:00</td>
                                </tr>
                                <tr>
                                    <td>16:00</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </body>
    </html>
