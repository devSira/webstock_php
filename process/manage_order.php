<?php
session_start();
// Get data from pages/customer/confirmorder.php
include "../database/update.php";
include "../database/insert.php";
$idproducts = $_POST['idproduct'];
$stockQty = $_POST['stockQty'];
$amounts = $_POST['amounts'];
updateStocks($idproducts, $stockQty);

$idcust = $_SESSION['idcust'];
insertOrder($idcust, $idproducts, $amounts);
insertSupply($idcust, $idproducts, $amounts);
?>