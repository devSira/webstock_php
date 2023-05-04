<?php
session_start();
include "connection.php";

function insertOrder($idcust, $idproducts, $amounts) {
  $last = count($idproducts)-1;
  for($i=0; $i<count($idproducts); $i++) {
    $sql = "INSERT INTO orders (IDCust, IDProduct, Qty)
    VALUES ('$idcust','$idproducts[$i]','$amounts[$i]')";
    if(mysqli_query($_SESSION['conn'], $sql)){
      // echo "Data inserted successfully";
      // if($i == $last) header("Location: ../pages/customer/completeorder.php");
    } else {
      echo "Error inserting data: " . mysqli_error($conn);
    }
  }
}

function insertSupply($idcust, $idproducts, $amounts) {
  $last = count($idproducts)-1;
  for($i=0; $i<count($idproducts); $i++) {
    $sql = "INSERT INTO supplys (IDCust, IDProduct, Qty)
    VALUES ('$idcust','$idproducts[$i]','$amounts[$i]')";
    if(mysqli_query($_SESSION['conn'], $sql)){
      if($i == $last) header("Location: ../pages/customer/purchaseorder.php");
    } else {
      echo "Error inserting data: " . mysqli_error($conn);
    }
  }
}

function insertSale($idcust, $idproducts, $amounts) {
  $last = count($idproducts)-1;
  for($i=0; $i<count($idproducts); $i++) {
    $sql = "INSERT INTO sales (IDCust, IDProduct, Qty)
    VALUES ('$idcust[$i]','$idproducts[$i]','$amounts[$i]')";
    if(mysqli_query($_SESSION['conn'], $sql)){
      // if($i == $last) header("Location: ../pages/supplier/completeshipment.php");
    } else {
      echo "Error inserting data: " . mysqli_error($conn);
    }
  }
}
?>