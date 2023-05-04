<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../../css/style.css">
    <title>Report</title>
    <?php
    session_start();
    // Get data from pages/customer/confirmorder.php
    include "../../components/navbar.html";
    $idproduct = $_POST['idproduct'];
    $productName = $_POST['productName'];
    $pricePerUunit = $_POST['pricePerUunit'];
    $quantity = $_POST['amounts'];
    $stockQty = $_POST['stockQty'];
    $priceSum = $_POST['priceSum'];
    $totalPrice = $_POST['totalPrice'];
    ?>
</head>
<body>
    <h1>Report</h1>
    <form action="../../process/manage_order.php" method="POST">

    <table width="50%" align=center style="border-collapse: collapse; border: 2px solid black; margin-bottom:10px; margin-top:10px;">
        <tr>
            <td>
                <table width="100%" border style="border-collapse: collapse;">
                    <!-- Date -->
                    <tr>
                        <td colspan=2>
                            <table width="100%" style="border-collapse: collapse;">
                                <tr align=left>
                                    <td>
                                        <img src="https://png.pngtree.com/template/20191125/ourmid/pngtree-book-store-logo-template-sale-learning-logo-designs-vector-image_335046.jpg" alt="logo" width=100px height=100px>
                                    </td>
                                    <td>
                                        <p>499/6 ทุ่งพญาไท ราชเทวี กรุงเทพมหานคร 10400 หมายเลขโทรศัพท์: 0221777999</p>
                                        <?php //echo date("Y-m-d")."<br>";?>
                                        <?php //echo date("H:i:s")."<br>";?>
                                        <?php //echo "พนักงานรับซื้อ: ". $_SESSION['firstName']." ". $_SESSION['surname'];?>
                                    </td>
                                    <td width="10%"></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <!-- Detail -->
                    <tr>
                        <td>
                            <table width="100%" border style="border-collapse: collapse;">
                            <caption>Purchase Order</caption>
                                <tr>
                                    <td>
                                        <table border width="100%"  style="border-collapse: collapse;">
                                            <tr>
                                                <td colspan=2>Shipment Information</td>
                                            </tr>
                                            <tr align=left>
                                                <td width=25%><label for="memberID">Name</label></td>
                                                <td><?php echo ": ".$_SESSION['custname']; ?></td>
                                            </tr>
                                            <tr align=left>
                                                <td><label for="cherryName">Address</label></td>
                                                <td><?php echo ": ".$_SESSION['address']; ?></td>
                                            </tr>
                                            <tr align=left>
                                                <td><label for="purchaseCount">Phone No.</label></td>
                                                <td><?php echo ": ".$_SESSION['tel']; ?></td>
                                            </tr>
                                            <tr align=left>
                                                <td><label for="purchaseCount">Email</label></td>
                                                <td><?php echo ": ".$_SESSION['email']; ?></td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td>
                                        <table border width="100%"  style="border-collapse: collapse;">
                                            <tr>
                                                <td colspan=2>Detail Order</td>
                                            </tr>
                                            <tr align=left>
                                                <td width=25%>Issue Date</td>
                                                <td><?php echo ": ".date("Y-m-d")." ".date("H:i:s");?></td>
                                            </tr>
                                            <tr align=left>
                                                <td>Order No.</td>
                                                <td>: h423klh3l2k4</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <!-- List Table -->
                    <tr>
                        <td colspan=2>
                            <table border="1" width="100%" height=200px align=center style="border-collapse: collapse;">
                            <tr>
                                <th>No.</th>
                                <th>Description</th>
                                <th>Quantity</th>
                                <th>Unit Price</th>
                                <th>Discount</th>
                                <th>Amount(THB)</th>
                            </tr>
                            <?php
                            // generate items here!
                            for($i=0; $i<count($idproduct); $i++) {
                                $num = $i + 1;
                                echo "
                                <tr>
                                    <th>$num</th>
                                    <th>$productName[$i]</th>
                                    <th>$quantity[$i]</th>
                                    <th>$pricePerUunit[$i]</th>
                                    <th>-</th>
                                    <th>$priceSum[$i]</th>
                                </tr>
                                ";
                            }
                            ?>
                            </table>
                        </td>
                    </tr>
                    <!-- Total Price -->
                    <tr>
                        <td colspan=2>
                            <table border width="100%" align=center style="border-collapse: collapse;">
                                
                                <tr align=left>
                                    <td width=25% style="padding-top:10px"><label for="name">Subtotal</label></td>
                                    <td style="padding-top:10px"><?php echo ": ".$totalPrice; ?></td>
                                </tr>
                                <tr align=left>
                                    <td><label for="surname">Special Discount</label></td>
                                    <td>: -</td>
                                </tr>
                                <tr align=left>
                                    <td><label for="gender">After Discount</label></td>
                                    <td><?php echo ": ".$totalPrice; ?></td>
                                </tr>
                                <tr align=left>
                                    <td><label for="gender">Value Added Tax 7%</label></td>
                                    <td>: -</td>
                                </tr>
                                <tr align=left>
                                    <td style="padding-bottom:10px"><label for="birthdate">Total</label></td>
                                    <td style="padding-bottom:10px"><?php echo ": ".$totalPrice; ?></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <input type="hidden" name="">
    <input type="submit" value="Pay">
    <a href="selectorder.php"><button type="button">Cancle</button></a>
    </form>
</body>
</html>