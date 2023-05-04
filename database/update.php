<?php
include "connection.php";

function updateStocks($idproducts, $stockQty) {
    for($i=0; $i<count($idproducts); $i++) {
        $sql = "UPDATE stocks SET StockQty='$stockQty[$i]' WHERE IDProduct='$idproducts[$i]'";
        if (mysqli_query($_SESSION['conn'], $sql)) {
            // print("Update successfully.<br>");
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    }
}
?>