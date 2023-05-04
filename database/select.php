<?php
include "connection.php";

function getStocks() {
  $sql = "SELECT * FROM stocks";
  $result = mysqli_query($_SESSION['conn'], $sql);
  $arrStocks = array("IDProduct"=>array(), "ProductName"=>array(), "PricePerUnit"=>array(), "StockQty"=>array());
  $i = 0;
  if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      $arrStocks["IDProduct"][$i] = $row["IDProduct"];
      $arrStocks["ProductName"][$i] = $row["ProductName"];
      $arrStocks["PricePerUnit"][$i] = $row["PricePerUnit"];
      $arrStocks["StockQty"][$i] = $row["StockQty"];
      $i++;
    }
    return $arrStocks;
  } else {
    echo "0 results";
  }
}

function getSupply() {
    $sql = "SELECT IDCust, IDProduct, Qty FROM supplys";
    $result = mysqli_query($_SESSION['conn'], $sql);
    $arrSupply = array("IDCust"=>array(), "IDProduct"=>array(), "Qty"=>array());
    $i = 0;
    if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_assoc($result)) {
        $arrSupply["IDCust"][$i] = $row["IDCust"];
        $arrSupply["IDProduct"][$i] = $row["IDProduct"];
        $arrSupply["Qty"][$i] = $row["Qty"];
        $i++;
      }
      return $arrSupply;
    } else {
      return "No Supplys";
    }
}

function getSaleByDate($start_date, $end_date) {
  $sql = "SELECT * FROM sales WHERE TimeSale BETWEEN '$start_date' AND '$end_date'";
  $result = $_SESSION['conn']->query($sql);
  $arrSale = array("IDCust"=>array(), "IDProduct"=>array(), "Qty"=>array(), "TimeSale"=>array());
  $i = 0;
  if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
      $arrSale["IDCust"][$i] = $row["IDCust"];
      $arrSale["IDProduct"][$i] = $row["IDProduct"];
      $arrSale["Qty"][$i] = $row["Qty"];
      $arrSale["TimeSale"][$i] = $row["TimeSale"];
      $i++;
    }
    return $arrSale;
  } else {
    return "0 results";
  }
}

function getCustByID($idcust) {
  $sql = "SELECT * FROM orders WHERE IDCust = '$idcust'";
  $result = $_SESSION['conn']->query($sql);
  $arrCust = array("IDCust"=>array(), "IDProduct"=>array(), "Qty"=>array(), "TimeOrder"=>array());
  $i = 0;
  if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
      $arrCust["IDCust"][$i] = $row["IDCust"];
      $arrCust["IDProduct"][$i] = $row["IDProduct"];
      $arrCust["Qty"][$i] = $row["Qty"];
      $arrCust["TimeOrder"][$i] = $row["TimeOrder"];
      $i++;
    }
    return $arrCust;
  } else {
    return "0 results";
  }
}

?>