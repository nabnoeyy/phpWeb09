<html>

<head>
    <title>Select to See Detail 651</title>
</head>

<body>
    <?php
    require "connect.php";
    $sql = "SELECT *
            FROM tbl_customer
            JOIN tbl_orders ON tbl_customer.customerID = tbl_orders.customerID
            JOIN tbl_orders_detail ON tbl_orders.orderID = tbl_orders_detail.OrderID
            JOIN tbl_food ON tbl_orders_detail.foodID = tbl_food.foodID
            JOIN tbl_menu ON tbl_food.MenuID = tbl_menu.menuID";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    ?>

    <table width="800" border="3">
        <tr>
            <th width="90">
                <div align="center">รหัสคำสั้งซื้อ</div>
            </th>
            <th width="90">
                <div align="center">ชื่อผู้สั่ง </div>
            </th>
            <th width="90">
                <div align="center">วันที่</div>
            </th>
            <th width="90">
                <div align="center">ชื่ออาหาร</div>
            </th>
            <th width="50">
                <div align="center">ชื่อเมนู</div>
            </th>
            <th width="50">
                <div align="center">จำนวน</div>
            </th>
        </tr>

        <?php
        while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        ?>
            <tr>
                <td>
                <a href="detailKFCSelect.php?orderID=<?php echo $result["orderID"];  
                ?>&foodName=<?php echo $result["foodName"];?>">
                   <?php echo $result["orderID"]; ?>
                </a>
                </td>
                <td>
                    <?php echo $result["firstName"]; ?>
                </td>
                <td>
                    <?php echo $result["dates"]; ?>
                </td>
                <td>
                     <?php echo $result["foodName"]; ?>
                </td>
                <td>
                    <?php echo $result["menuName"]; ?>
                </td>
                <td>
                    <?php echo $result["quantity"]; ?>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>
