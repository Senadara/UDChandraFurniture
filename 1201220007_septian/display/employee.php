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
                  <th>Posisi</th>
                  <th>Gaji</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>John Doe</td>
                  <td>Manager</td>
                  <td>$60,000</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Jane Smith</td>
                  <td>Developer</td>
                  <td>$50,000</td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>Bob Johnson</td>
                  <td>Designer</td>
                  <td>$45,000</td>
                </tr>
                <!-- Tambahkan baris sesuai dengan data karyawan yang Anda miliki -->
              </tbody>
            </table>
          </div>
    </main>
</body>
</html>