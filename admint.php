<?php
$servername = "localhost";
$username = "root";
$password="";
$dbname = "ADMINISTRATOR";

$conn=mysqli_connect($servername, $username, $password,$dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "CREATE TABLE admininfo (
    name VARCHAR(50),
    email VARCHAR(50) PRIMARY KEY,
    password VARCHAR(255) UNIQUE
)";
$result=mysqli_query($conn, $sql);

if ($result) {
    echo "Table 'administrator' created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
mysqli_close($conn);
 ?>