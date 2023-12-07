<?php
$servername = "localhost";
$username = "root";
$password="";
$dbname = "ADMINISTRATOR";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "CREATE TABLE petsadopt (
    pet_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
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
)";

$result = mysqli_query($conn, $sql);

if ($result) {
    echo "Table petsadopt created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
$sql = "ALTER TABLE petsadopt ADD pet_image MEDIUMBLOB";

if ($conn->query($sql) === true) {
    echo "Column 'pet_image' added successfully to 'petsadopt' table";
} else {
    echo "Error adding column: " . $conn->error;
}

mysqli_close($conn);
?>
