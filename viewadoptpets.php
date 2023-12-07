<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Adoption Pets</title>
 <link rel="stylesheet" href="cusdisplay2.css">
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
    <style>
      .adopt-button {
    display: inline-block;
    padding: 10px 20px;
    background-color: green;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
  }
  .product {
      display: flex;
      justify-content: space-between;
      margin-bottom: 20px;
    }
    .product-info {
      flex: 1;
    }
    .product-image {
      width: 200px;
      height: auto;
    }
    .product-image img {
      max-width: 100%;
      height: auto;
      display: block;
      margin-left: auto; 
    }
  
  </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	    	<a class="navbar-brand" href="index.html"><span class="flaticon-pawprint-1 mr-2"></span>Pet sitting</a>
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
<div class="product-container">

<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "administrator"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM petsadopt WHERE statuss != 'accept'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<h1 class="pet-heading">Pets Available for Donation</h1>';
    echo '<div class="pet-details">';

    while ($row = $result->fetch_assoc()) {
      $imagePath = "pet_images/{$row['pet_name']}_{$row['pet_id']}.jpg";
      
      echo '<div class="pet-frame">';
      echo "<img src=\"{$imagePath}\" alt=\"{$row['pet_name']}\" width=\"250\" height=\"150\">";
      
      echo '<div class="product">';
      echo '<div class="product-info">';
      echo '<p><strong>Pet Name:</strong> ' . $row['pet_name'] . '</p>';
      echo '<p><strong>Breed:</strong> ' . $row['breed'] . '</p>';
      echo '<p><strong>Age:</strong> ' . $row['age'] . '</p>';
      echo '<p><strong>Pet Type:</strong> ' . $row['pet_type'] . '</p>';
      echo '<p>' . 'Health Condition : '.$row["health_condition"] . '</p>';
    echo '<p>' . 'Trained : ' . $row["trained"] . '</p>';
    echo '<p>' . 'Gender : '.$row["gender"] . '</p>';
    echo '<p>' . 'Arrival Date : ' . $row["arrival_date"] . '</p>';
    echo '<p>' . 'Size : '.$row["size"] . '</p>';
    echo '<p>' . 'Weight : ' . $row["weight"] . '</p>';
      echo '<a href="adoptinfoform2.php?pet_id='.$row["pet_id"].'" class="adopt-button">Adopt Now</a>';echo '</div>';
  
      echo '</div>';
      echo '</div>';
  }
  
  echo '</div>';
} else {
    echo 'No pet donations available.';
}
?>

</div>

</body>
</html>