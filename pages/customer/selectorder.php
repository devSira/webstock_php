<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../../css/style.css">
    <link rel="stylesheet" type="text/css" href="../../css/selectorder.css">
    <title>Select Order</title>
    <?php
    session_start();
    include "../../components/navbar.html";
    include "../../database/select.php";
    $products = getStocks();
    ?>
</head>

<body>
    <!-- Send data to pages/customer/confirmorder.php -->
    <p id="username"><?php echo "Username: $_SESSION[usernamecust]"; ?></p>
    <h1>Select Order</h1>
    <form action="confirmorder.php" method="POST">
        <table>
            <caption>Purchase Item</caption>
            <thead>
                <tr>
                    <th>IDProduct</th>
                    <th>ProductName</th>
                    <th>PricePerUnit</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
                <?php for($i=0; $i<count($products['IDProduct']); $i++) {
                    echo "
                    <tr>
                        <td>{$products['IDProduct'][$i]}</td>
                        <td>{$products['ProductName'][$i]}</td>
                        <td>{$products['PricePerUnit'][$i]}</td>
                        <td><input type='text' name='amount[]' size='1'></td>
                        <input type='hidden' name='idproduct[]' value='{$products['IDProduct'][$i]}'>
                        <input type='hidden' name='productName[]' value='{$products['ProductName'][$i]}'>
                        <input type='hidden' name='pricePerUnit[]' value='{$products['PricePerUnit'][$i]}'>
                        <input type='hidden' name='stockQty[]' value='{$products['StockQty'][$i]}'>
                    </tr>
                    ";
                }?>
            </tbody>
        </table>
        <input type="submit" value="Order">
    </form>
</body>
</html>