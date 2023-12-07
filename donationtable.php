<?php
$servername = "localhost";
$username = "root";
$password="";
$dbname = "ADMINISTRATOR";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "CREATE TABLE petsdonate (
    pet_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    pet_name VARCHAR(255) NOT NULL,
    breed VARCHAR(255),
    age INT,
    pet_type VARCHAR(255),
    health_condition VARCHAR(255),
    statuss VARCHAR(20) DEFAULT 'pending',
    pet_image MEDIUMBLOB, 
    total_amount INT ,
     amount_left INT 
)";

$result = mysqli_query($conn, $sql);

if ($result) {
    echo "Table petsdonate created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
mysqli_close($conn);
?>
