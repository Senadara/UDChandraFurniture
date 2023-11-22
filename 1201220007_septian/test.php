<?php
include("controller.php");

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $user = new UserAdmin($_SERVER['account'], $_SERVER['password']);
    echo "<pre>";
    var_dump($user);
    echo "</pre>";

}
echo "slebewww";
?>