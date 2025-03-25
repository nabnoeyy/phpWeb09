<?php
require "connect.php";

$sql = "SELECT foodID, foodName FROM tbl_food";
$stmt = $conn->prepare($sql);
$stmt->execute();
$foodData = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<html>
<body>


<form action="action_page.php" method="post">
  <label for="foods">เลื่อกอาหาร:</label>
  <select name="foods" id="foods">
    <?php foreach ($foodData as $food): ?>
      <option value="<?php echo $food['foodID']; ?>"><?php echo $food['foodName']; ?></option>
      <a href="detailKFC.php?foodID=<?php echo $food['foodID']; ?>">
    </a>
    <?php endforeach; ?>
  </select>
  <br><br>
  <input type="submit" value="Submit">
</form>


</body>
</html>
