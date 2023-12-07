<?php
$servername = "localhost";
$username = "root";
$password="";
$dbname = "ADMINISTRATOR";

$conn=mysqli_connect($servername, $username, $password,$dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "CREATE TABLE customer (
    customer_id INT(4) AUTO_INCREMENT UNIQUE ,
    full_name VARCHAR(255) NOT NULL,
    email VARCHAR(255) PRIMARY KEY,
    password VARCHAR(10) UNIQUE,
    username VARCHAR(10) UNIQUE
)";
$result=mysqli_query($conn, $sql);

if ($result) {
    echo "Table customer created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
mysqli_close($conn);
 ?>