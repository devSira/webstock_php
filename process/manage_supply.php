<?php
// Get data from pages/supplier/confirmshipment.php
include "../database/insert.php";
include "../database/delete.php";
$idcust = $_POST['idcust'];
$idproducts = $_POST['idproduct'];
$quantity = $_POST['quantity'];
insertSale($idcust, $idproducts, $quantity);
deleteSupply();
?>