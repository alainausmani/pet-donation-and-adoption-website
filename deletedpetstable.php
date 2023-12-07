<?php
$servername = "localhost";
$username = "root";
$password="";
$dbname = "ADMINISTRATOR";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "CREATE TABLE deletedadoptpets (
    pet_id INT(6) PRIMARY KEY,
    pet_name VARCHAR(255) NOT NULL,
    color VARCHAR(255),
    breed VARCHAR(255),
    age INT,
    pet_type VARCHAR(255),
    health_condition VARCHAR(255),
    trained ENUM('yes', 'no'),
    gender VARCHAR(10),
    arrival_date DATE,
    size VARCHAR(20),
    weight FLOAT,
    pet_image MEDIUMBLOB,
    statuss VARCHAR(50)
)";

$result = mysqli_query($conn, $sql);

if ($result) {
    echo "Table deletedadoptpets created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
