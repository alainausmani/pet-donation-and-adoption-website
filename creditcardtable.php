<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "administrator";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql_credit_cards_table = "CREATE TABLE IF NOT EXISTS credit_cards (
    card_number VARCHAR(16) PRIMARY KEY,
    cvv VARCHAR(4) NOT NULL,
    expiry_date VARCHAR(10) NOT NULL,
    email varchar(255),
    donate_id INT,
    FOREIGN KEY (email) REFERENCES customer(email),
    FOREIGN KEY (donate_id) REFERENCES donateinfo(donate_id)
)";

if ($conn->query($sql_credit_cards_table) === TRUE) {
    echo "Table 'credit_cards' created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();

?>
