<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ADMINISTRATOR";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql_insert = "INSERT INTO admininfo (name, email, password) VALUES ('alaina', 'alaina@hotmail.com', 'alaina')";

if ($conn->query($sql_insert) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql_insert . "<br>" . $conn->error;
}

$conn->close();
?>
