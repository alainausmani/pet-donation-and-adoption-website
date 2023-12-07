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

$pet_id = isset($_GET['pet_id']) ? $_GET['pet_id'] : null;
$check_request_sql = "SELECT * FROM adoptinfo WHERE pet_id = '$pet_id' AND email = '$registered_user'";
$existing_request_result = $conn->query($check_request_sql);

if ($existing_request_result->num_rows > 0) {
    // If the customer has already requested this pet, show a message or take necessary action
    echo "You have already submitted a request for this pet.";
} else{
if ($_POST) {
    $experience = $_POST['experience'];
    $years = $_POST['years'];
    $needs_aware = $_POST['needs_aware'];
    $training_familiar = $_POST['training_familiar'];
    $financial_prep = $_POST['financial_prep'];

    $sql = "INSERT INTO adoptinfo (experience, years, pet_id, email, needs_aware, training_familiar, financial_prep, statuss) 
    VALUES ('$experience', '$years', '$pet_id', '$registered_user', '$needs_aware', '$training_familiar', '$financial_prep', 'pending')";

    if ($conn->query($sql) === true) {
        echo "Request sent successfully";
    } else 
    {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body{
            background-color:  rgb(214, 250, 214);
        }
        </style>
    <meta charset="UTF-8">
    <title>Pet Adoption Request Form</title>
    <link rel="stylesheet" href="infostyle.css">
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
<div class="form-container">
    
    <?php if ($existing_request_result->num_rows === 0) { ?>
        <h2>Pet Adoption Request Form</h2>
        <form id="adoption-form" action="adoptinfoform2.php?pet_id=<?php echo isset($_GET['pet_id']) ? $_GET['pet_id'] : ''; ?>" method="post">
        <label for="pet-experience">Have you had pets before?</label>
        <input type="text" id="experience" name="experience" pattern="Yes|No|yes|no" title="Please enter 'Yes' or 'No'" required>

        <label for="pet-years">If yes, for how many years?</label>
        <input type="text" id="years" name="years" pattern="\d*" title="Please enter a number if applicable">

        <label for="pet-needs">Are you aware of the specific needs of the pet you are adopting?</label>
        <input type="text" id="needs_aware" name="needs_aware" pattern="Yes|No|yes|no" title="Please enter 'Yes' or 'No'" required>

        <label for="pet-training">Are you familiar with basic pet training and behavioral needs?</label>
        <input type="text" id="training_familiar" name="training_familiar" pattern="Yes|No|yes|no" title="Please enter 'Yes' or 'No'" required>

        <label for="financial-preparedness">Are you financially prepared to cover the costs of pet care?</label>
        <input type="text" id="financial_prep" name="financial_prep" pattern="Yes|No|yes|no|" title="Please enter 'Yes' or 'No'" required>

        <button type="submit" id="submit-button">Submit Adoption Request</button>
    </form>
    <?php } ?>
</div>

</body>
</html>
