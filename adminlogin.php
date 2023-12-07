<?php
session_start();
session_destroy();
$count=0;
$con= new mysqli("localhost","root","","administrator");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <title>Registration Form </title>
    
    <meta charset="utf-8">
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            
            background-color: rgb(214, 250, 214);
        }
        .img-fluid {
            width: 100%;
            height: 100%;
        }
    </style>
</head>
<body>
    
<section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-4 col-xl-5">
        <img src="images\gallery-6.jpg" class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
      <form action="adminlogincheck.php" method='post' onsubmit="return validateForm()">
          <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
            <h1 style="color: darkgreen;">Sign up</h1>
            
          </div>

          <div class="divider d-flex align-items-center my-4">
            
          </div>

          <div class="form-outline mb-4">
            <input type="text" id="form3Example3" class="form-control form-control-lg"
              placeholder="Enter a valid ID" name="email"/>
            <label class="form-label" for="form3Example3" style="color: white;"></label>
          </div>

          <div class="form-outline mb-3">
            <input type="password" id="form3Example4" class="form-control form-control-lg"
              placeholder="Enter password" name="password"/>
            <label class="form-label" for="form3Example4" style="color: white;"></label>
          </div>

          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;" name="login">Login</button>
          </div>

        </form>
      </div>
    </div>
  </div>
 
</section>
<script>
    function validateForm() {
        const email = document.getElementById('form3Example3').value.trim();
        const password = document.getElementById('form3Example4').value.trim();

        if (email === '' || password === '') {
            alert('Please fill in all fields');
            return false; 
        }
        return true; 
    }
</script>
</body>
</html>