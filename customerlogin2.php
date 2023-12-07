<?php
session_start();
$count = 0;

$con = new mysqli("localhost", "root", "", "administrator");

$redirect_url = isset($_GET['redirect']) ? $_GET['redirect'] : 'adoptinfoform2.php';

if (isset($_GET['login'])) {
    $login = $_GET['login'];
    if ($login == 'false') {
        //echo 'Incorrect Credentials.';
        if ($login == 'false') {
            echo '<script>document.addEventListener("DOMContentLoaded", function() {
                document.getElementById("popup").style.display = "flex";
            });</script>';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <style>
        body {
            background-image: url('file:///C:/myproject/pet_images/about.jpg'); 
            background-size: cover;
            background-position: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: rgb(214, 250, 214);
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            padding: 20px;
        }

        .form-container {
            background-color: rgba(255, 255, 255, 0.7); 
            padding: 40px;
            border-radius: 10px;
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        .form-container h1 {
            color: #333;
        }
        .popup {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    justify-content: center;
    align-items: center;
    z-index: 9999;
}

.popup-content {
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    text-align: center;
}

.popup-content .close {
    float: right;
    cursor: pointer;
    font-size: 20px;
    font-weight: bold;
}
    </style>
</head>

<body>

    <div class="container">
        <div class="form-container">
        <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <form action="customerlogincheck.php" method='post'>
                        <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                            <h1 style="color: green;">LOGIN</h1>

                        </div>
                        <div class="popup" id="popup">
        <div class="popup-content">
            <span class="close" onclick="document.getElementById('popup').style.display = 'none';">&times;</span>
            <p>Incorrect Credentials.</p>
        </div>
    </div>
                        <div class="divider d-flex align-items-center my-4">

                        </div>

                        <div class="form-outline mb-4">
                        
                            <input type="email" id="form3Example3" class="form-control form-control-lg"
                                placeholder="Enter a valid email address" name="email" />
                         
                        </div>

                        <div class="form-outline mb-3">
                            <input type="password" id="form3Example4" class="form-control form-control-lg"
                                placeholder="Enter password" name="password" />
                            
                        </div>

                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="submit" class="btn btn-primary btn-lg"
                                style="padding-left: 2.5rem; padding-right: 2.5rem;" name="login">Login</button>
                            <p class="small fw-bold mt-2 pt-1 mb-0" style="color: black;">Don't have an account? <a
                                    href="signup.php" class="link-danger">Register</a></p>
                            <p class="small fw-bold mt-2 pt-1 mb-0" style="color: black;">Forgot Password? <a
                                    href="forgotpasswordfront.php" class="link-danger">forgot password</a></p>
                        </div>

                    </form>

                    <div class="text-center text-lg-start mt-4 pt-2">
                        <p class="small fw-bold mt-2 pt-1 mb-0" style="color: black;">Login as Worker?</p>
                        <p class="small fw-bold mt-2 pt-1 mb-0" style="color: black;"><a
                                href="adminlogin.php" class="link-danger">Worker Login</a></p>
                    </div>

                </div>
            </div>
        </div>
        <div
            class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
        </div>
   
        </div>
    </div>
    <script>
        function closePopup() {
            document.getElementById('popup').style.display = 'none';
        }
    </script>
    
</body>

</html>
