<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>
    
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
        </style>
</head>
<body>
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-4 col-xl-5">
                    <img src="pet_images\gallery-3.jpg" class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <h2>Forgot Password</h2>
                    <form action="forgotpasswordback.php" method="post">
                        <div class="form-outline mb-4">
            <input type="email" id="form3Example3" class="form-control form-control-lg"
              placeholder="Enter a valid email " name="email"/>
            <label class="form-label" for="form3Example3" style="color: white;"></label>
          </div>
          <div class="form-outline mb-4">
            <input type="password" id="form3Example3" class="form-control form-control-lg"
              placeholder="Enter a valid password " name="new_password"/>
            <label class="form-label" for="form3Example3" style="color: white;"></label>
          </div>
          <div class="form-outline mb-4">
            <input type="password" id="form3Example3" class="form-control form-control-lg"
              placeholder="confirm password " name="confirm_password"/>
            <label class="form-label" for="form3Example3" style="color: white;"></label>
          </div>
                        
                        <div class="text-center text-lg-start mt-4 pt-2">
                            <input type="submit" value="Reset Password" class="btn btn-primary btn-lg"
                                   style="padding-left: 2.5rem; padding-right: 2.5rem;">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
