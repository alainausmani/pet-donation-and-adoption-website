<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ADMINISTRATOR";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Decision Page</title>
</head>
<body>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    if (isset($_POST['submit-button'])) {
        echo "<p>Thank you for your submission. You will be emailed about our decision within 2 to 3 working days.</p>";
      
    }
} else {
    
    header("Location: adoptinfoform2.php");
    exit();
}
?>

</body>
</html>
