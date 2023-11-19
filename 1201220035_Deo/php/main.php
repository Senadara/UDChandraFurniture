<?php
include("user.php");

if(isset($_POST)){
    $user = new User($_POST['username'], $_POST['email'],$_POST['password'],$_POST['confirm_pass']);

    echo "<pre>";
    var_dump($user);
    echo "</pre>";
}

?>