<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "ADMINISTRATOR";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Sorry, failed to connect: " . mysqli_connect_error());
} 
$sql = "CREATE TABLE donateinfo (
    donate_id INT AUTO_INCREMENT PRIMARY KEY,
    pet_id INT(6) UNSIGNED,
    email VARCHAR(255),
    donation_amount INT NOT NULL,
    dstatus VARCHAR(20) DEFAULT 'pending',
    FOREIGN KEY (pet_id) REFERENCES petsdonate(pet_id) ON DELETE CASCADE,
    FOREIGN KEY (email) REFERENCES customer(email) ON DELETE CASCADE
)"; 

$result = mysqli_query($conn, $sql);

if ($result) {
    echo "Table donateinfo created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
mysqli_close($conn);
?>
