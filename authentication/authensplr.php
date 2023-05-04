<?php
session_start();
$username = $_POST['username'];
$password = $_POST['password'];

if($username == "supplier1" && $password == "password1") {
    header("Location: ../pages/supplier/selectshipment.php");
    $_SESSION['usernamesplr'] = $username;
} else {
    echo "Invalid username or password";
}
?>