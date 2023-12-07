<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ADMINISTRATOR";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    $check_email_query = "SELECT * FROM customer WHERE email = ?";
    $stmt_check_email = $conn->prepare($check_email_query);
    $stmt_check_email->bind_param("s", $email);
    $stmt_check_email->execute();
    $result = $stmt_check_email->get_result();

    if ($result->num_rows === 0) {
        echo "Email not valid. Please enter a valid email.";
    } else {
        if ($new_password === $confirm_password) {
            $plain_text_password = $new_password;
            $sql_update = "UPDATE customer SET password = ? WHERE email = ?";
            
            $stmt = $conn->prepare($sql_update);
            $stmt->bind_param("ss", $plain_text_password, $email);
            
            if ($stmt->execute()) {
                echo "Your password has been updated successfully.";
            } else {
                echo "Error updating password, choose unique password " ;
            }
            $stmt->close();
        } else {
            echo "Passwords do not match. Please try again.";
        }
    }
    $stmt_check_email->close();
}

$conn->close();
?>

