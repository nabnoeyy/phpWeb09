<html>

<head>

</head>

<body>
    <?php
    if (isset($_GET["foodID"])) {
        $strfoodID = $_GET["foodID"];
    } else {
        $strfoodID = null;
    }

    require "connect.php";

    if ($strfoodID !== null) {
        echo $strfoodID;
        $sql = "SELECT * FROM tbl_food INNER JOIN tbl_menu ON tbl_food.menuID = tbl_menu.menuID WHERE tbl_food.foodID = ?";
        $params = array($strfoodID);
        $stmt = $conn->prepare($sql);
        $stmt->execute($params);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
    ?>
            <table width="500" border="3">
                <tr>
                    <th width="325">รหัสไก่</th>
                    <td width="240"><?php echo $result["foodID"]; ?></td>
                </tr>
                <tr>
                    <th width="325">ชื่อ</th>
                    <td width="240"><?php echo $result["foodName"]; ?></td>
                </tr>
                <tr>
                    <th width="325">คำอธิบาย</th>
                    <td width="240"><?php echo $result["foodDescription"]; ?></td>
                </tr>
                <tr>
                    <th width="325">ราคา</th>
                    <td width="240"><?php echo $result["foodPrice"]; ?></td>
                </tr>
                <tr>
                    <th width="325">ประเภท</th>
                    <td width="240"><?php echo $result["menuName"]; ?></td>
                </tr>
            </table>
    <?php
        } else {
            echo "หาบันทึกไม่เจอ.";
        }
    } else {
        echo "orderID ไม่ได้ตั้ง.";
    }
    ?>

</body>

</html>
