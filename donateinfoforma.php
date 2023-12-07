<?php
include("session.php");
//echo $registered_user;

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ADMINISTRATOR";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
include 'creditcardvalidationa.php';
include 'donationfunctiona.php';

$pet_id = isset($_GET['pet_id']) ? $_GET['pet_id'] : null;

$amount_left = '';
if ($_SERVER["REQUEST_METHOD"] != "POST") {
   $sql = "SELECT amount_left FROM petsdonate WHERE pet_id = ?";
   $stmt = $conn->prepare($sql);

   if ($stmt) {

       $stmt->bind_param("i", $pet_id);
       $stmt->execute();
       $stmt->bind_result($amount_left);

       if (!$stmt->fetch())
          {
           die("Error fetching remaining amount: " . $stmt->error);
       }

       $stmt->close();
   } else {
       die("Error in SQL query preparation: " . $conn->error);
   }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assume these values are obtained from the form
    $donation_amount = $_POST["donation_amount"];
    $card_number = $_POST['card_number'];
    $cvv = $_POST['cvv'];
    $expiry_date = $_POST['expiry_date'];

    if (isValidCreditCardFormat($card_number) && isValidCVV($cvv) && isValidExpiryDate($expiry_date) && isValidAmount($donation_amount,$amount_left)) 
    {
       
            $dstatus = 'Pending';
            $donate_id = saveDonationInfo($registered_user, $pet_id, $donation_amount,  $dstatus);
            
            if ($donate_id !== null) {
                saveCreditCardInfo($donate_id, $card_number, $cvv, $expiry_date, $registered_user);
                
                updateAmountLeft($pet_id, $donation_amount);
                moveDonationToCompleted($pet_id);
                header("Location: confirmation.php?donate_id=" . $donate_id);
                 exit;
              
            } else {
                echo "Error saving donation information.";
                
            }
        } 
 else {
        echo "Invalid credit card information. Please check the format.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
  <title>Donation form</title>
  <link rel="stylesheet" href="cusdisplay.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700,800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">


    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Donations</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
    <meta charset="UTF-8">

    <title>Credit Card Form</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	    	<a class="navbar-brand" href="mainpage2.php"><span class="flaticon-pawprint-1 mr-2"></span>Pet sitting</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="fa fa-bars"></span> Menu
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
			<li class="nav-item active"><a href="mainpage2.php" class="nav-link">Home</a></li>
	        	<li class="nav-item"><a href="donateview2.php" class="nav-link">Donation</a></li>
	        	<li class="nav-item"><a href="adoptview1.php" class="nav-link">Adoption</a></li>
	          <li class="nav-item"><a href="customerlogin2.php" class="nav-link">Login</a></li>
	          <li class="nav-item"><a href="signup.php" class="nav-link">Signup</a></li>
	          <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
			  <?php
                if(isset($_SESSION['login_status']) && $_SESSION['login_status'] == '1') {
                    echo '<li class="nav-item"><a href="myprofile2.php" class="nav-link">My Profile</a></li>';
                    echo '<li class="nav-item"><a href="logout.php" class="nav-link">Click To Logout</a></li>';
                }
                ?>
	        </ul>
	      </div>
	    </div>
	  </nav>
      <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_2.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Pet Donations <i class="ion-ios-arrow-forward"></i></span></p>
                <h1 class="mb-0 bread">Available Pet For Donations</h1>
            </div>
        </div>
    </div>
</section>
    <h1>Enter Credit Card Details</h1>

    <form method="post" action="donateinfoforma.php?pet_id=<?php echo $pet_id; ?>"> 
   

        <input type="hidden" name="pet_id" value="<?php echo htmlspecialchars($pet_id); ?>">

        <label for="donation_amount">Donation Amount (up to $<?php echo $amount_left; ?>):</label>
        <input type="number" name="donation_amount" min="0" max="<?php echo $amount_left; ?>" value="<?php echo $donation_amount; ?>" required><br>

        <label for="card_number">Credit Card Number:</label>
        <input type="text" name="card_number" required autocomplete="off">><br>

        <label for="cvv">CVV:</label>
        <input type="text" name="cvv" required autocomplete="off">><br>

        <label for="expiry_date">Expiry Date (MM/YYYY):</label>
        <input type="text" name="expiry_date" required autocomplete="off">><br>

        <input type="submit" value="Submit">
    </form>

</body>
</html>
