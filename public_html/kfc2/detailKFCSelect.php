<html>

<head>

</head>

<body>
    <?php
    if (isset($_GET["orderID"])) {
        $strorderID = $_GET["orderID"];
    } else {
        $strorderID = null;
    }

    if (isset($_GET["foodName"])) {
        $strfoodName = $_GET["foodName"];
    } else {
        $strfoodName = null;
    }

    require "connect.php";

    if ($strorderID !== null) {
        echo $strorderID;
        echo $strfoodName;
        $sql = "SELECT *
                FROM tbl_customer
                JOIN tbl_orders ON tbl_customer.customerID = tbl_orders.customerID
                JOIN tbl_orders_detail ON tbl_orders.orderID = tbl_orders_detail.OrderID
                JOIN tbl_food ON tbl_orders_detail.foodID = tbl_food.foodID
                JOIN tbl_menu ON tbl_food.MenuID = tbl_menu.menuID
                WHERE tbl_orders.orderID = ? and tbl_food.foodName = ?";
        $params = array($strorderID,$strfoodName);
        $stmt = $conn->prepare($sql);
        $stmt->execute($params);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
    ?>
            <table width="500" border="3">
                <tr>
                    <th width="325">รหัสคำสั้งซื้อ</th>
                    <td width="240"><?php echo $result["orderID"]; ?></td>
                </tr>
                <tr>
                    <th width="325">ชื่อผู้สั่ง</th>
                    <td width="240"><?php echo $result["firstName"]; ?></td>
                </tr>
                <tr>
                    <th width="325">วันที่</th>
                    <td width="240"><?php echo $result["dates"]; ?></td>
                </tr>
                <tr>
                    <th width="325">ชื่ออาหาร</th>
                    <td width="240"><?php echo $result["foodName"]; ?></td>
                </tr>
                <tr>
                    <th width="325">ชื่อเมนู</th>
                    <td width="240"><?php echo $result["menuName"]; ?></td>
                </tr>
                <tr>
                    <th width="325">จำนวน</th>
                    <td width="240"><?php echo $result["quantity"]; ?></td>
                </tr>
            </table>
    <?php
        } else {
            echo "ไม่เจอบันทึก.";
        }
    } else {
        echo "orderID ไม่ได้ตั้ง.";
    }
    ?>

</body>

</html>
