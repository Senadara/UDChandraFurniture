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
    include('sidebar.html');
    $pesan = @$_GET['pesan'];
    if (!empty($pesan)) {
    echo '<script>alert("' . $pesan . '");</script>';
}
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
                  <?php if($_SESSION['role']=='superAdmin'):?>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Telepon</th>
                    <th>Gaji</th>
                    <th>Role</th>
                    <th>Action</th>
                  <?php else: ?>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Telepon</th>
                    <th>Gaji</th>
                    <th>Role</th>
                    <?php endif ?>
                </tr>
              </thead>
              <tbody>

              <?php
              $employee = new UserAdmin();
              $data = $employee->tampilEmployee();
              foreach($data as $d): 
                if($_SESSION['role']=='superAdmin'):
              ?>
              <tr>
                  <form action="#">
                  <input type="hidden" name="dataEmployee" value="<?= htmlentities(json_encode($d)) ?>">
                  <td><?=$d ['idEmployee']?></td>
                  <td><?=$d ['nama']?></td>
                  <td><?=$d ['telp']?></td>
                  <td>Rp. <?=$d ['salary']?></td>
                  <td><?=$d['role']?></td>
                  <td><button class="btnSubmit" onclick="openModal(<?= htmlentities(json_encode($d)) ?>)">Edit</button></td>
                  </form>
              </tr>
              <?php else: ?>
                <tr>
                  <td><?=$d ['idEmployee']?></td>
                  <td><?=$d ['nama']?></td>
                  <td><?=$d ['telp']?></td>
                  <td>Rp. <?=$d ['salary']?></td>
                  <td><?=$d['role']?></td>
              </tr>
              <?php 
              endif;
              endforeach;
              ?>



</tbody>
</table>
</div>
<!-- Modal -->
<div class="overlay" id="overlay"></div>
<div class="modal" id="editModal">
    <!-- Konten modal -->
    <h2>Edit Employee</h2>
    <form action="../login_controller.php" method="post">
        <input type="hidden" name="idEmployee" id="idEmployee">

        <label for="editedNama">Nama:</label>
        <input type="text" id="editedNama" name="editedNama">

        <label for="editedTelp">Telepon:</label>
        <input type="text" id="editedTelp" name="editedTelp">

        <label for="editedEmail">Email:</label>
        <input type="text" id="editedEmail" name="editedEmail">

        <label for="editedPassword">Password:</label>
        <input type="password" id="editedPassword" name="editedPassword">

        <label for="editedSalary">Gaji:</label>
        <input type="text" id="editedSalary" name="editedSalary">

        <label for="editedStatus">Status:</label>
        <select id="editedStatus" name="editedStatus">
            <option value="active">Active</option>
            <option value="nonactive">nonActive</option>
        </select>

        <label for="editedRole">Role:</label>
        <input type="text" id="editedRole" name="editedRole">

        <input type="submit" name="editEmployee" class="btnSubmit" value="Save">
    </form>
    <button class="btnClose" onclick="closeModal()">Close</button>
</div>
    </main>

    <script>
function openModal(data) {
    var idEmployee = document.getElementById('idEmployee');
    var editedNamaInput = document.getElementById('editedNama');
    var editedTelpInput = document.getElementById('editedTelp');
    var editedEmailInput = document.getElementById('editedEmail');
    var editedPasswordInput = document.getElementById('editedPassword');
    var editedSalaryInput = document.getElementById('editedSalary');
    var editedStatusInput = document.getElementById('editedStatus');
    var editedRoleInput = document.getElementById('editedRole');

    idEmployee.value = data.idEmployee;
    editedNamaInput.value = data.nama;
    editedTelpInput.value = data.telp;
    editedEmailInput.value = data.email;
    editedPasswordInput.value = data.password;
    editedSalaryInput.value = data.salary;
    editedStatusInput.value = data.status;
    editedRoleInput.value = data.role;


    document.getElementById('overlay').style.display = 'block';
    document.getElementById('editModal').style.display = 'block';
}


    function closeModal() {
        document.getElementById('overlay').style.display = 'none';
        document.getElementById('editModal').style.display = 'none';
    }
    </script>
</body>
</html>