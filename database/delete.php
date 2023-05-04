<?php
session_start();
include "connection.php";

function deleteSupply() {
    $sql = "DELETE FROM supplys";
    if(mysqli_query($_SESSION['conn'], $sql)){
        header("Location: ../pages/supplier/completeshipment.php");
    } else {
      echo "Error inserting data: " . mysqli_error($conn);
    }
}
?>