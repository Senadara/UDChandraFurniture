<?php
include ("User.php");
if (isset($_POST)) {
    $usr = new User($_POST['username'], $_POST['password']);
    var_dump($usr);
}
?>
