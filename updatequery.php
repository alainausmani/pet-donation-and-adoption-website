<?php
$servername = "localhost";
$username = "root";
$password="";
$dbname = "ADMINISTRATOR";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql="ALTER TABLE petsadopt
ADD COLUMN statuss VARCHAR(50)";
$result = mysqli_query($conn, $sql);

if ($result) {
    echo "Table petsadopt created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
