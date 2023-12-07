<?php
if(isset($_POST['register']))
{
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $con = new mysqli("localhost", "root", "", "administrator");

    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    $stmt = "INSERT INTO `customer`(`customer_id`, `full_name`, `email`, `password`, `username`) 
             VALUES (NULL,'$full_name','$email','$password','$username')";

    if ($con->query($stmt) === TRUE) {
        // Registration successful
        echo "Registration successful!";
        header('location: customerlogin2.php');
        exit;
    } else {
        // Registration failed
        if (strpos($con->error, 'email') !== false) {
            // Duplicate entry error for primary key (email)
            echo "<script>alert('Email already registered');</script>";
        } else if (strpos($con->error, 'username') !== false) {
            // Duplicate entry error for username
            echo "<script>alert('Username in use, choose another');</script>";
        } else if (strpos($con->error, 'password') !== false) {
            // Duplicate entry error for password
            echo "<script>alert('Password already in use, please choose a unique password');</script>";
        } else {
            // Other errors
            echo "<script>alert('Registration failed. Please try again.');</script>";
        }
    }

    $con->close();
}
?>
