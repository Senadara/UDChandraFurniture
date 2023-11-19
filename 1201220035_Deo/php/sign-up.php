<?php
include "connection.php";

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_pass = $_POST['confirm_pass'];

$sql = "INSERT INTO users (username, email, password,confirm_pass)
VALUES ('$username', '$email', '$password', '$confirm_pass')";

if ($conn->query($sql) === TRUE) {
    // echo "New record created successfully";
    header("Location: login.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>