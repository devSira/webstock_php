<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../../css/style.css">
    <link rel="stylesheet" type="text/css" href="../../css/confirmorder.css">
    <title>Confirm Shipment</title>
    <?php
    session_start();
    include "../../components/navbar.html";
    $idcust = $_POST['idcustomer'];
    $idproducts = $_POST['idproduct'];  
    $quantity = $_POST['Qty'];
    $totalQty= 0;
    // $amounts = json_decode($_POST['amount'], true);;
    // $idproducts = json_decode($_POST['idproduct'], true);
    ?>
</head>
<body>
    <p id="username"><?php echo "Username: $_SESSION[usernamesplr]"; ?></p>
    <h1>Confirm Shipment</h1>
    <form action="../../process/manage_supply.php" method="POST">
        <table>
            <caption>Purchase Item</caption>
            <thead>
                <tr>
                    <th>IDCustomer</th>
                    <th>IDProduct</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
                <?php for($i=0; $i<count($idproducts); $i++) {
                    $totalQty += $quantity[$i];
                    echo "
                        <tr>
                            <td>{$idcust[$i]}</td>
                            <td>{$idproducts[$i]}</td>
                            <td>{$quantity[$i]}</td>
                            <input type='hidden' name='idcust[]' value='{$idcust[$i]}'>
                            <input type='hidden' name='idproduct[]' value='{$idproducts[$i]}'>
                            <input type='hidden' name='quantity[]' value='{$quantity[$i]}'>
                        </tr>
                    ";
                }?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan=3>Total Qty: <?php echo $totalQty; ?></td>
                </tr>
            </tfoot>
        </table>        
        <input type="submit" value="Confirm">
        <input type="button" value="Cancle" onclick="history.back()">
    </form>
</body>
</html>