<?php
include ("User.php");
if (isset($_POST)) {
    $usr = new User($_POST['username'], $_POST['password'], $_POST['confirmPassword']);
    var_dump($usr);
}
?>
