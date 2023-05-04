<?php
session_start();
// $username = $_POST['username'];
// $password = $_POST['password'];

// if($username == "johndoe" && $password == "password1") {
//     header("Location: ../pages/customer/selectorder.php");
//     $_SESSION['usernamecust'] = $username;
//     $_SESSION['idcust'] = 'c001';
// } else {
//     echo "Invalid username or password";
// }


include "../database/connection.php"; 

$username = $_POST['username'];
$password = $_POST['password'];

// prepare and execute SQL statement
$sql = "SELECT * FROM customers WHERE username='$username' AND password='$password'";
$result = mysqli_query($conn, $sql);

// check if query returns a result
if (mysqli_num_rows($result) > 0) {
    // login successful
    $row = mysqli_fetch_assoc($result);
    print_r($row);
    $_SESSION['usernamecust'] = $row['username'];
    // $_SESSION['passcust'] = $row['password'];
    $_SESSION['custname'] = $row['CustName'];
    $_SESSION['address'] = $row['Address'];
    $_SESSION['tel'] = $row['Tel'];
    $_SESSION['email'] = $row['email'];
    header("Location: ../pages/customer/selectorder.php");
} else {
    // login failed
    // show error message
    echo "Invalid username or password";
}  

?>