<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../../css/style.css">
    <link rel="stylesheet" type="text/css" href="../../css/selectorder.css">
    <title>Customer Information</title>
    <?php
    session_start();
    include "../../components/navbar.html";
    include "../../components/sidebar.html";
    include "../../database/select.php";
    ?>
</head>

<body>
    <p id="username"><?php echo "Username: $_SESSION[usernamesplr]"; ?></p>
    <h1>Customer Information</h1>
    <form action="cust_info.php" method="POST">
        <label for="customer-id">Select customer ID:</label>
        <select name="customer-id" id="customer-id">
        <option value="c001">c001</option>
        <option value="c002">c002</option>
        <option value="customer-3">Customer 3</option>
        <!-- Add more options as needed -->
        </select>
        <input type="submit" name="sale_btn" value="Yes">
    </form>
    <?php
    if(isset($_POST['sale_btn']) == 'Yes') {
        $selectedCustomerId = $_POST['customer-id'];
        $sales = getCustByID($selectedCustomerId);
        $totalQty= 0;
        echo"
        <table>
            <caption>Shipment Item</caption>
            <thead>
                <tr>
                    <th>IDCustomer</th>
                    <th>IDProduct</th>
                    <th>Quantity</th>
                    <th>TimeOrder</th>
                </tr>
            </thead>
            <tbody>";
                if($sales == "0 results") {
                    echo "<tr><td colspan=4>0 results</td></tr>";
                } else {
                    for($i=0; $i<count($sales['IDProduct']); $i++) {
                        $totalQty += $sales['Qty'][$i];
                        echo "
                        <tr>
                            <td>{$sales['IDCust'][$i]}</td>
                            <td>{$sales['IDProduct'][$i]}</td>
                            <td>{$sales['Qty'][$i]}</td>
                            <td>{$sales['TimeOrder'][$i]}</td>
                        </tr>
                        ";
                    }
                }
            echo"
            </tbody>
            <tfoot>
                <tr>
                    <td colspan=4>Total Qty: {$totalQty}</td>
                </tr>
            </tfoot>
        </table>";
    } else {
        echo "<h2>Nothing</h2>";
    }
    ?>
</body>
</html>