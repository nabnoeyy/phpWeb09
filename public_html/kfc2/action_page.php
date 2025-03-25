<?php
require "connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["foods"])) {
        $selectedFoodID = $_POST["foods"];

        // Redirect to detailKFC.php with the selected foodID
        header("Location: detailKFC.php?foodID=$selectedFoodID");
        exit();
    }
}
?>

<html>
<head>
    <!-- Add any head elements if needed -->
</head>
<body>
    <!-- You can add a message or any content here if needed -->
</body>
</html>
