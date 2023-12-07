<?php
//include("session.php");
//echo $registered_user;
$servername = "localhost";
$username = "root";
$password = "";
$database = "administrator";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$pet_id = isset($_GET['pet_id']) ? $_GET['pet_id'] : 0;


// Function to save credit card information in the credit card table
//function saveCreditCardInfo($donate_id, $card_number, $cvv, $expiry_date,$registered_user) {
  //  global $conn;

    // Check if the donation_id exists in the donations table
    //if (isValidDonationId($donate_id)) {
      //  $sql = "INSERT INTO credit_cards(donate_id, card_number, cvv, expiry_date,email) 
        //        VALUES (?, ?, ?, ?, ?)";
        
       // $stmt = $conn->prepare($sql);
        //$stmt->bind_param("sssss", $donate_id, $card_number, $cvv, $expiry_date, $registered_user);

        //if ($stmt->execute()) {
          //  echo "Credit card information saved successfully.<br>";
        //} else {
          //  echo "Error saving credit card information: " . $stmt->error . "<br>";
        //}

        //$stmt->close();
    //} else {
      //  echo "Invalid donation_id. Please provide a valid donation_id.<br>";
    //}
//}
// Function to save credit card information in the credit card table
function saveCreditCardInfo($donate_id, $card_number, $cvv, $expiry_date, $registered_user) {
    global $conn;
   
    if(isValidCVV($cvv) && isValidCreditCardFormat($card_number) && isValidExpiryDate($expiry_date))
    {
    if (isValidDonationId($donate_id)) {
        $sql = "INSERT INTO credit_cards(donate_id, card_number, cvv, expiry_date, email) 
                VALUES (?, ?, ?, ?, ?)";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $donate_id, $card_number, $cvv, $expiry_date, $registered_user);

        if ($stmt->execute()) {
            echo "Credit card information saved successfully.<br>";
        } else {
            echo "Error saving credit card information: " . $stmt->error . "<br>";
        }

        $stmt->close();
    } else {
        echo "Invalid donation_id. Please provide a valid donation_id.<br>";
    }
}
else
{
    echo "Invalid credit card info";
}
}

// Function to check if a donation_id exists in the donations table
function isValidDonationId($donate_id) {
    global $conn;
    $sql = "SELECT COUNT(*) FROM donateinfo WHERE donate_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $donate_id);

    // Execute the query
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    // Return true if count is greater than 0, indicating the donate_id exists
    return $count > 0;
}


// Function to save donation information in the donation table
function saveDonationInfo($registered_user,  $pet_id, $donation_amount, $dstatus) {
    global $conn;
    $sql = "INSERT INTO donateinfo (email,pet_id, donation_amount, dstatus) 
    VALUES ( ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sdds", $registered_user, $pet_id, $donation_amount, $dstatus);

    //$sql = "INSERT INTO donateinfo (email, donate_id, pet_id, donation_amount, dstatus) 
      //      VALUES (?, ?, ?, ?, ?, ?)";
    
   // $stmt = $conn->prepare($sql);
    //$stmt->bind_param("dssdss", $registered_user, $donate_id, $pet_id, $donation_amount, $dstatus);
    
    if ($stmt->execute()) {
        echo "Donation information saved successfully.<br>";
        //echo"id: $donationId";
        // Return the donation ID
        $donate_id = $conn->insert_id;
        return $donate_id;
    } else {
        echo "Error saving donation information: " . $stmt->error . "<br>";
    }

    $stmt->close();

    // Return null if there is an error
    return null;
}


// Function to update amount_left in donate_pet_info
function updateAmountLeft($pet_id, $donation_amount) {
    global $conn;

    $sql = "UPDATE petsdonate SET amount_left = amount_left - ? WHERE pet_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("di", $donation_amount, $pet_id);

    if ($stmt->execute()) {
        echo "Amount left updated successfully.<br>";
    } else {
        echo "Error updating amount left: " . $stmt->error . "<br>";
    }

    $stmt->close();
}
// Function to move donation information to donation_completed
function moveDonationToCompleted($pet_id) {
    global $conn;

   
        // Check if the amount_left is zero
        if (getAmountLeft($pet_id) == 0) {

                // Update pet_availability to 'no' in donations
                $sqlUpdate = "UPDATE donateinfo SET dstatus = 'Collected' WHERE pet_id = ?";
                $stmtUpdate = $conn->prepare($sqlUpdate);
                $stmtUpdate->bind_param("i", $pet_id);

                if ($stmtUpdate->execute()) {
                    echo "Pet availability updated to collected in donations.<br>";
                } else {
                    echo "Error updating pet availability: " . $stmtUpdate->error . "<br>";
                }
                $sqlUpdate = "UPDATE petsdonate SET statuss = 'Collected' WHERE pet_id = ?";
                $stmtUpdate = $conn->prepare($sqlUpdate);
                $stmtUpdate->bind_param("i", $pet_id);

                if ($stmtUpdate->execute()) {
                    echo "Pet availability updated to collected in donations.<br>";
                } else {
                    echo "Error updating pet availability: " . $stmtUpdate->error . "<br>";
                }
                $stmtUpdate->close();
            } 
            else {
                echo "Amount left is not zero. Donation information not moved to donation_completed.<br>";
            }
    } 

 
// Function to get amount_left for a given pet_id
function getAmountLeft($pet_id) {
    global $conn;

    $sql = "SELECT amount_left FROM petsdonate WHERE pet_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $pet_id);
    $stmt->execute();
    $stmt->bind_result($amount_left);
    $stmt->fetch();
    $stmt->close();

    return $amount_left;
}
// ...

?>