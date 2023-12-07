<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "ADMINISTRATOR"; 

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Sorry, failed to connect: " . mysqli_connect_error());
} else {
    echo "Connection successful";
}
?>
