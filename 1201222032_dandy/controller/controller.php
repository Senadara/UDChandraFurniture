<?php
include("User.php");

$pengguna = new User("1201212", "Dandy");
$pengguna->username = "halo";


echo $pengguna->idUser;
echo '|';
// echo $pengguna->nama;

$pengguna->setNama('nama');
$pengguna->getData();
