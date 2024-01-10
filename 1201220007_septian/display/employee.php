<?php
require_once '../UserAdmin.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee</title>
    <link rel="stylesheet" type="text/css" href="../style/displayEm.css">
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
            <h1>THIS IS YOUR EMPLOYEE</h1>
            <p>Selamat datang di .......</p>
        </div>
        <div class="table-container">
            <table class="employee-table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nama</th>
                  <th>Telepon</th>
                  <th>Gaji</th>
                  <th>Role</th>
                </tr>
              </thead>
              <tbody>

              <!-- perulangan untuk tabel employee -->
              <?php
              $employee = new UserAdmin();
              $data = $employee->tampilEmployee();
              foreach($data as $d): 
              ?>
              <tr>
                  <td><?=$d ['idEmployee']?></td>
                  <td><?=$d ['nama']?></td>
                  <td><?=$d ['telp']?></td>
                  <td>Rp. <?=$d ['salary']?></td>
                  <td><?=$d['role']?></td>
              </tr>
              <?php 
              endforeach;
              ?>

              </tbody>
            </table>
          </div>
    </main>
</body>
</html>