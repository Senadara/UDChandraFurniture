<?php
include ("User.php");
include ("conn.php");
if (isset($_POST)) {
    
    $usr = new User($_POST['username'], $_POST['email'], $_POST['name'], $_POST['address'], $_POST['city'], $_POST['province'], $_POST['country']);
    // $sql = "INSERT INTO"
    var_dump($usr);
}
?>
