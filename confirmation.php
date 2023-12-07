<?php

$donate_id = isset($_GET['donate_id']) ? $_GET['donate_id'] : null;

if ($donate_id) {
    echo "Thank you for your donation! Your Donation ID is: " . $donate_id;
    $donation_amount = 0;
    $card_number = '';
    $cvv = '';
    $expiry_date = '';
} else {
    echo "Invalid donation ID.";
}
?>
