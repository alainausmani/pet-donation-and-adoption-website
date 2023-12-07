<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "administrator";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

function isValidCreditCardFormat($card_number) {
    // Updated regular expression to match any digits and optional dashes
    $pattern = '/^\d{4}-?\d{4}-?\d{4}-?\d{4}$/';
    return preg_match($pattern, $card_number);
    
}

function isValidCVV($cvv) {
    // Updated regular expression to match any 3 or 4 digits
    $pattern = '/^\d{3,4}$/';
    return preg_match($pattern, $cvv);
    
}

function isValidExpiryDate($expiry_date) {
    // Updated regular expression to match MM/YY or MM/YYYY with optional slash
    $pattern = '/^(0[1-9]|1[0-2])\/?\d{2,4}$/';
    return preg_match($pattern, $expiry_date);
}
function isValidAmount($donation_amount, $amount_left) {
    if (!is_numeric($donation_amount) || $donation_amount <= 0) {
        return "Invalid donation amount. Please enter a positive numeric value.";
    }

    if ($donation_amount > $amount_left) {
        return "Donation amount cannot exceed the remaining amount of $amount_left";
    }

    return null; // Input is valid
} 
?>