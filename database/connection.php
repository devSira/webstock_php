<?php
$hostname = "localhost:3307";
$username = "admin1";
$password = "1234";
$database_name = "webstockdb";

$conn = mysqli_connect($hostname, $username, $password, $database_name);

// check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$_SESSION['conn'] = $conn;
// // close connection
// mysqli_close($conn);
?>
