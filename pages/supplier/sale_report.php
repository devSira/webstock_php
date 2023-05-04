<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../../css/style.css">
    <link rel="stylesheet" type="text/css" href="../../css/selectorder.css">
    <title>Sale Report</title>
    <?php
    session_start();
    include "../../components/navbar.html";
    include "../../components/sidebar.html";
    include "../../database/select.php";
    ?>
</head>

<body>
    <p id="username"><?php echo "Username: $_SESSION[usernamesplr]"; ?></p>
    <h1>Sale Report</h1>
    <form action="sale_report.php" method="POST">
        <label for="start_date">Start Date:</label>
        <input type="date" id="start_date" name="start_date">

        <label for="end_date">End Date:</label>
        <input type="date" id="end_date" name="end_date">
        <input type="submit" name="sale_btn" value="Yes">
    </form>
    <?php
    if(isset($_POST['sale_btn']) == 'Yes') {
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];
        $start_date = date('Y-m-d', strtotime($start_date));
        $end_date = date('Y-m-d', strtotime($end_date));
        $sales = getSaleByDate($start_date, $end_date);
        $totalQty= 0;
        echo"
        <table>
            <caption>Shipment Item</caption>
            <thead>
                <tr>
                    <th>IDCustomer</th>
                    <th>IDProduct</th>
                    <th>Quantity</th>
                    <th>TimeSale</th>
                </tr>
            </thead>
            <tbody>";
                if($sales == "0 results") {
                    echo "<tr><td colspan=3>0 results</td></tr>";
                } else {
                    for($i=0; $i<count($sales['IDProduct']); $i++) {
                        $totalQty += $sales['Qty'][$i];
                        echo "
                        <tr>
                            <td>{$sales['IDCust'][$i]}</td>
                            <td>{$sales['IDProduct'][$i]}</td>
                            <td>{$sales['Qty'][$i]}</td>
                            <td>{$sales['TimeSale'][$i]}</td>
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