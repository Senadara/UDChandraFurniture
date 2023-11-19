<?php
include("User.php");
// $usr = new User('dito', 'ditoganteng', 'Gmail', '08581667', 'dito123', 'dito123');

if (isset($_POST)) {
    $user = new User($_POST["name"], $_POST["username"], $_POST["Gmail"], $_POST["phone"], $_POST["password"], $_POST["confirm"]);
    echo "<pre>";
    var_dump($_POST);
    echo "<pre>";
}

// echo "<pre>";
// var_dump($usr);
// echo "<pre>";
// $usr->name = 'dito';
// echo $usr->getName();
// echo " | ";
// echo $usr->setName('dito ganteng');
// echo " | ";
// echo $usr->getName();

