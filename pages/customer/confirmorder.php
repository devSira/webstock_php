<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../../css/style.css">
    <link rel="stylesheet" type="text/css" href="../../css/confirmorder.css">
    <title>Confirm Order</title>
    <?php
    session_start();
    include "../../components/navbar.html";
    // Get data from pages/customer/selectorder.php
    $_SESSION['idproduct'] = $_POST['idproduct'];
    $_SESSION['productName'] = $_POST['productName'];
    $_SESSION['pricePerUunit'] = $_POST['pricePerUunit'];
    $_SESSION['amount'] = $_POST['amount'];
    $_SESSION['stockQty'] = $_POST['stockQty'];
    // $_SESSION['idproduct'] = $_POST['idproduct'];
    // $productName = $_POST['productName'];
    // $pricePerUunit = $_POST['pricePerUunit'];
    // $_SESSION['amount'] = $_POST['amount'];
    // $_SESSION['stockQty'] = $_POST['stockQty'];
    $totalPrice = 0;
    ?>
</head>
<body>
    <!-- Send data to process/manage_order.php -->
    <p id="username"><?php echo "Username: $_SESSION[usernamecust]"; ?></p>
    <h1>Confirm Order</h1>
    <form action="purchaseorder.php" method="POST">
        <table>
            <caption>Purchase Item</caption>
            <thead>
                <tr>
                    <th>IDProduct</th>
                    <th>ProductName</th>
                    <th>PricePerUnit</th>
                    <th>Quantity</th>
                    <th>Price Sum</th>
                    <th>Availability</th>
                </tr>
            </thead>
            <tbody>
                <?php for($i=0; $i<count($$_SESSION['idproduct']); $i++) {
                    if($_SESSION['amount'][$i] == 0 || $_SESSION['amount'][$i] == null) continue;
                    else {
                        if($_SESSION['amount'][$i] > $_SESSION['stockQty'][$i]) {
                            $availability = "<font color=red>out of stock";
                            $_SESSION['amount'][$i] = $_SESSION['stockQty'][$i];
                            $_SESSION['stockQty'][$i] = 0;
                        }
                        else {
                            $availability = "<font color=blue>ready";
                            $_SESSION['stockQty'][$i] = $_SESSION['stockQty'][$i]-$_SESSION['amount'][$i];
                        }
                        $priceSum = $_SESSION['amount'][$i]*$pricePerUunit[$i];
                        $totalPrice += $priceSum;
                        echo "
                            <tr>
                                <td>{$_SESSION['idproduct'][$i]}</td>
                                <td>{$productName[$i]}</td>
                                <td>{$pricePerUunit[$i]}</td>
                                <td>{$_SESSION['amount'][$i]}</td>
                                <td>{$priceSum}</td>
                                <td>{$availability}</td>
                                <input type='hidden' name='idproduct[]' value='{$_SESSION['idproduct'][$i]}'>
                                <input type='hidden' name='stockQty[]' value='{$_SESSION['stockQty'][$i]}'>
                                <input type='hidden' name='productName[]' value='{$productName[$i]}'>
                                <input type='hidden' name='pricePerUunit[]' value='{$pricePerUunit[$i]}'>
                                <input type='hidden' name='priceSum[]' value='{$priceSum}'>
                                <input type='hidden' name='amounts[]' value='{$_SESSION['amount'][$i]}'>
                                <input type='hidden' name='totalPrice' value='{$totalPrice}'>
                            </tr>
                            ";
                        }
                }?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan=6>Total Price: <?php echo $totalPrice; ?></td>
                </tr>
            </tfoot>
        </table>
        <?php if(!$totalPrice == 0) {?>
        <input type='submit' value='Confirm'>
        <?php }?>
        <input type="button" value="Cancle" onclick="history.back()">
    </form>
</body>
</html>