<html>

<head>
    <title>Select to See Detail 651</title>
</head>

<body>
    <?php
    require "connect.php";
    $sql = "SELECT * FROM tbl_food INNER JOIN tbl_menu ON tbl_food.menuID = tbl_menu.menuID";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    ?>

    <table width=800" border="3">
        <tr>
            <th width="90">
                <div align="center">รหัสไก่</div>
            </th>
            <th width="90">
                <div align="center">ชื่อ </div>
            </th>
            <th width="90">
                <div align="center">ราคา</div>
            </th>
            <th width="90">
                <div align="center">คำอธิบาย</div>
            </th>
            <th width="50">
                <div align="center">ประเภท</div>
            </th>
        </tr>

        <?php
        while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        ?>

            <tr>
                <td>
                    <a href="detailKFC.php?foodID=<?php echo $result
                    ["foodID"]; ?>">
                    <?php echo $result["foodID"]; ?>
                    </a>
                </td>
                <td>
                    <?php echo $result["foodName"]; ?>
                </td>
                <td>
                    <?php echo $result["foodDescription"]; ?>
                </td> 
                <td>
                    <?php echo $result["foodPrice"]; ?>
                </td>

                <td>
                    <?php echo $result["menuName"]; ?>
                </td>
            </tr>

        <?php
        }
        ?>

</body>

</html>
