<html>
<?php
require "connect.php";

$sql3 = "SELECT menuID,menuName FROM tbl_menu Order by menuID";
$stmt3 = $conn->prepare($sql3);
$stmt3->execute();
?>

<head>
    <title>Add New Menu</title>
</head>

<body>
    <h1>addNewMenu</h1>

    <form action="addNewMenu.php" method="POST">
        <input type="text" placeholder="foodID" name="foodID">
        <br> <br>
        <input type="text" placeholder="foodName" name="foodName">
        <br> <br>
        <input type="text" placeholder="foodDescription" name="foodDescription">
        <br> <br>
        <input type="number" placeholder="foodPrice" name="foodPrice">
        <br> <br>
        <label for="menuID">ChooseMenu:</label>
        <select name="menuID">
        <?php
        while ($cc2 = $stmt3->fetch(PDO::FETCH_ASSOC)):;
        ?>
         <option value="<?php echo $cc2['menuID']; ?>"><?php echo $cc2['menuName']; ?></option>
        <?php
        endwhile;
        ?>
  </select>
        <input type="submit">
    </form>
</body>

</html>

<?php

try {

    if (isset($_POST['foodID']) && isset($_POST['foodName']) && isset($_POST['foodDescription']) 
    && isset($_POST['foodPrice']) && isset($_POST['menuID'])) :

        require 'connect.php';
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "insert into tbl_food values(:foodID,:foodName,:foodDescription,:foodPrice,
            :menuID)";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':foodID', $_POST['foodID']);
        $stmt->bindParam(':foodName', $_POST['foodName']);
        $stmt->bindParam(':foodDescription', $_POST['foodDescription']);
        $stmt->bindParam(':foodPrice', $_POST['foodPrice']);
        $stmt->bindParam(':menuID', $_POST['menuID']);

        if ($stmt->execute()) :
            $message = 'Suscessfully add new food';
        else :
            $message = 'Fail to add new food';
        endif;
        echo $message;

        $conn = null;
    endif;
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>