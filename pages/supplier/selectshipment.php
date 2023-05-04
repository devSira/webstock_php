<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../../css/style.css">
    <link rel="stylesheet" type="text/css" href="../../css/selectorder.css">
    <title>Select Shipment</title>
    <?php
    session_start();
    include "../../components/navbar.html";
    include "../../components/sidebar.html";
    include "../../database/select.php";
    $supplys = getSupply();
    ?>
</head>

<body>
    <p id="username"><?php echo "Username: $_SESSION[usernamesplr]"; ?></p>
    <h1>Select Shipment</h1>
    <form action="confirmshipment.php" method="POST">
        <table>
            <caption>Shipment Item</caption>
            <thead>
                <tr>
                    <th>IDCustomer</th>
                    <th>IDProduct</th>
                    <th>Quantity</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if($supplys == "No Supplys") {
                    echo "<tr><td colspan=4>No Supplys</td></tr>";
                } else {
                    for($i=0; $i<count($supplys['IDProduct']); $i++) {
                        echo "<tr>";
                                echo "
                                <td>{$supplys['IDCust'][$i]}</td>
                                <td>{$supplys['IDProduct'][$i]}</td>
                                <td>{$supplys['Qty'][$i]}</td>
                                <input type='hidden' name='idproduct[]' value='{$supplys['IDProduct'][$i]}'>
                                <input type='hidden' name='idcustomer[]' value='{$supplys['IDCust'][$i]}'>
                                <input type='hidden' name='Qty[]' value='{$supplys['Qty'][$i]}'>";
                                if($i==0) {
                                    echo "<td rowspan=".count($supplys['IDProduct'])."><input type='submit' value='Transport'></td>";
                                }
                        echo "</tr>";
                    }
                }
                ?>
            </tbody>
        </table>
        <!-- <input type='hidden' name='amount' value='<?php //echo json_encode($amount); ?>'>
        <input type='hidden' name='idproduct' value='<?php //echo json_encode($idProduct); ?>'> -->
        <!-- <input type="submit" value="Transport"> -->
    </form>
</body>
</html>