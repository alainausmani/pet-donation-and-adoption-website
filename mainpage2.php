<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>PET CARE</title>
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
  </head>
  <body>

    <div class="wrap">
			<div class="container">
				<div class="row">
					<div class="col-md-6 d-flex align-items-center">
						<p class="mb-0 phone pl-md-2">
							<a href="#" class="mr-2"><span class="fa fa-phone mr-1"></span> +00 1234 567</a> 
							<a href="#"><span class="fa fa-paper-plane mr-1"></span> k213155@nu.edu.pk</a>
						</p>
					</div>
					<div class="col-md-6 d-flex justify-content-md-end">
						<div class="social-media">
			    		<p class="mb-0 d-flex">
			    			<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-facebook"><i class="sr-only">Facebook</i></span></a>
			    			<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-twitter"><i class="sr-only">Twitter</i></span></a>
			    			<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-instagram"><i class="sr-only">Instagram</i></span></a>
			    			<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-dribbble"><i class="sr-only">Dribbble</i></span></a>
						</p>
		        </div>
					</div>
				</div>
			</div>
		</div>
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
    <!-- END nav -->
    <div class="hero-wrap js-fullheight" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
      <div class="col-md-11 ftco-animate text-center">
        <h1 class="mb-4">FOR THE LOVE OF PETS</h1>
        <p><a href="#" class="btn btn-primary mr-md-4 py-3 px-4">Learn more <span class="ion-ios-arrow-forward"></span></a></p>
      </div>
    </div>
  </div>
</div>

<section class="ftco-section bg-light ftco-no-pt ftco-intro">
  <div class="container">
    <div class="row">
      <div class="col-md-4 d-flex align-self-stretch px-4 ftco-animate">
        <div class="d-block services active text-center">
          <div class="icon d-flex align-items-center justify-content-center">
            <span class="flaticon-blind"></span>
          </div>
          <div class="media-body">
            <h3 class="heading">Support Pet Adoption</h3>
            <p>Your donation helps pets find loving homes, providing care and support they need.</p>
            <a href="customerview1.php" class="btn-custom d-flex align-items-center justify-content-center"><span class="fa fa-chevron-right"></span><i class="sr-only">Read more</i></a>
          </div>
        </div>      
      </div>
      <div class="col-md-4 d-flex align-self-stretch px-4 ftco-animate">
        <div class="d-block services text-center">
          <div class="icon d-flex align-items-center justify-content-center">
            <span class="flaticon-dog-eating"></span>
          </div>
          <div class="media-body">
            <h3 class="heading">Donate for Pet Care</h3>
            <p>Your contributions help provide essential care, food, and medical treatment for pets in need.</p>
            <a href="donateview.php" class="btn-custom d-flex align-items-center justify-content-center"><span class="fa fa-chevron-right"></span><i class="sr-only">Read more</i></a>
          </div>
        </div>    
      </div>
      <div class="col-md-4 d-flex align-self-stretch px-4 ftco-animate">
        <div class="d-block services text-center">
          <div class="icon d-flex align-items-center justify-content-center">
            <span class="flaticon-grooming"></span>
          </div>
          <div class="media-body">
            <h3 class="heading">Support Pet Shelters</h3>
            <p>Your help assists shelters in providing a safe haven for pets awaiting adoption.</p>
            <a href="#" class="btn-custom d-flex align-items-center justify-content-center"><span class="fa fa-chevron-right"></span><i class="sr-only">Read more</i></a>
          </div>
        </div>      
      </div>
    </div>
  </div>
</section>

<section class="ftco-section ftco-no-pt ftco-no-pb">
  <div class="container">
    <div class="row d-flex no-gutters">
      <div class="col-md-5 d-flex">
        <div class="img img-video d-flex align-self-stretch align-items-center justify-content-center justify-content-md-center mb-4 mb-sm-0" style="background-image:url(images/about-1.jpg);">
        </div>
      </div>
      <div class="col-md-7 pl-md-5 py-md-5">
        <div class="heading-section pt-md-5">
          <h2 class="mb-4">Why Support Pet Adoption?</h2>
        </div>
        <div class="row">
          <div class="col-md-6 services-2 w-100 d-flex">
            <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-stethoscope"></span></div>
            <div class="text pl-3">
              <h4>Care for Rescued Pets</h4>
              <p>Your donations provide care and medical assistance for rescued pets awaiting adoption.</p>
            </div>
          </div>
          <div class="col-md-6 services-2 w-100 d-flex">
            <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-customer-service"></span></div>
            <div class="text pl-3">
              <h4>Support Pet Shelters</h4>
              <p>Donations help shelters maintain a safe and nurturing environment for pets in need.</p>
            </div>
          </div>
          <div class="col-md-6 services-2 w-100 d-flex">
            <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-emergency-call"></span></div>
            <div class="text pl-3">
              <h4>Emergency Care Fund</h4>
              <p>Your contributions create emergency care funds for pets requiring immediate assistance.</p>
            </div>
          </div>
          <div class="col-md-6 services-2 w-100 d-flex">
            <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-veterinarian"></span></div>
            <div class="text pl-3">
              <h4>Veterinary Services</h4>
              <p>Financial support helps cover veterinary expenses for pets in shelters.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>




<section class="ftco-section bg-light ftco-faqs">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 order-md-last">
        <div class="img img-video d-flex align-self-stretch align-items-center justify-content-center justify-content-md-center mb-4 mb-sm-0" style="background-image:url(images/about.jpg);">
          <a href="https://vimeo.com/45830194" class="icon-video popup-vimeo d-flex justify-content-center align-items-center">
            <span class="fa fa-play"></span>
          </a>
        </div>
        <div class="d-flex mt-3">
          <div class="img img-2 mr-md-2" style="background-image:url(images/about-2.jpg);"></div>
          <div class="img img-2 ml-md-2" style="background-image:url(images/about-3.jpg);"></div>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="heading-section mb-5 mt-5 mt-lg-0">
          <h2 class="mb-3">Frequently Asked Questions about Pet Adoption</h2>
          <p>Discover essential information about adopting pets and supporting their welfare.</p>
        </div>
        <div id="accordion" class="myaccordion w-100" aria-multiselectable="true">
          <div class="card">
            <div class="card-header p-0" id="headingOne">
              <h2 class="mb-0">
                <button href="#collapseOne" class="d-flex py-3 px-4 align-items-center justify-content-between btn btn-link" data-parent="#accordion" data-toggle="collapse" aria-expanded="true" aria-controls="collapseOne">
                  <p class="mb-0">How can I support pet adoption?</p>
                  <i class="fa" aria-hidden="true"></i>
                </button>
              </h2>
            </div>
            <div class="collapse show" id="collapseOne" role="tabpanel" aria-labelledby="headingOne">
              <div class="card-body py-3 px-0">
                <ol>
                  <li>Explore local shelters and rescue organizations.</li>
                  <li>Consider fostering a pet in need.</li>
                  <li>Spread awareness about pet adoption.</li>
                  <li>Donate to support shelters and their initiatives.</li>
                </ol>
              </div>
            </div>
          </div>

          <div class="card">
            <div class="card-header p-0" id="headingTwo" role="tab">
              <h2 class="mb-0">
                <button href="#collapseTwo" class="d-flex py-3 px-4 align-items-center justify-content-between btn btn-link" data-parent="#accordion" data-toggle="collapse" aria-expanded="false" aria-controls="collapseTwo">
                  <p class="mb-0">How can I contribute financially to pet welfare?</p>
                  <i class="fa" aria-hidden="true"></i>
                </button>
              </h2>
            </div>
            <div class="collapse" id="collapseTwo" role="tabpanel" aria-labelledby="headingTwo">
              <div class="card-body py-3 px-0">
                <ol>
                  <li>Donate to local shelters or rescue organizations.</li>
                  <li>Sponsor medical treatments for pets in need.</li>
                  <li>Support initiatives that provide food and shelter for pets.</li>
                  <li>Contribute to emergency care funds for pets.</li>
                </ol>
              </div>
            </div>
          </div>

          <div class="card">
            <div class="card-header p-0" id="headingThree" role="tab">
              <h2 class="mb-0">
                <button href="#collapseThree" class="d-flex py-3 px-4 align-items-center justify-content-between btn btn-link" data-parent="#accordion" data-toggle="collapse" aria-expanded="false" aria-controls="collapseThree">
                  <p class="mb-0">What steps are involved in adopting a pet?</p>
                  <i class="fa" aria-hidden="true"></i>
                </button>
              </h2>
            </div>
            <div class="collapse" id="collapseThree" role="tabpanel" aria-labelledby="headingTwo">
              <div class="card-body py-3 px-0">
                <ol>
                  <li>Visit shelters to meet potential pets.</li>
                  <li>Complete adoption applications and paperwork.</li>
                  <li>Undergo interviews or home visits.</li>
                  <li>Pay adoption fees to support shelter operations.</li>
                </ol>
              </div>
            </div>
          </div>

          <div class="card">
            <div class="card-header p-0" id="headingFour" role="tab">
              <h2 class="mb-0">
                <button href="#collapseFour" class="d-flex py-3 px-4 align-items-center justify-content-between btn btn-link" data-parent="#accordion" data-toggle="collapse" aria-expanded="false" aria-controls="collapseFour">
                  <p class="mb-0">What are the benefits of adopting a pet?</p>
                  <i class="fa" aria-hidden="true"></i>
                </button>
              </h2>
            </div>
            <div class="collapse" id="collapseFour" role="tabpanel" aria-labelledby="headingTwo">
              <div class="card-body py-3 px-0">
                <p>Adopting a pet provides companionship and love while saving a life. It also helps reduce shelter populations and supports ethical pet practices.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


    

<section class="ftco-section bg-light">
    	<div class="container">
    		<div class="row justify-content-center pb-5 mb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h2>Affordable Packages</h2>
          </div>
        </div>
    		<div class="row">
    			<div class="col-md-4 ftco-animate">
	          <div class="block-7">
	          	<div class="img" style="background-image: url(images/pricing-1.jpg);"></div>
	            <div class="text-center p-4">
	            	<span class="excerpt d-block">Donate</span>
	            	<span class="price"><sup>RS.</sup> <span class="number">5000</span> <sub></sub></span>
	            
		            <ul class="pricing-text mb-5">
					<li><span class="fa fa-check mr-2"></span>Help feed 5 shelter pets</li>
              <li><span class="fa fa-check mr-2"></span>Contribute to 3 vet visits</li>
              <li><span class="fa fa-check mr-2"></span>Support 3 pet grooming sessions</li>
              <li><span class="fa fa-check mr-2"></span>Free support for pet initiatives</li>
           
		            </ul>

	            	<a href="donateview.php" class="btn btn-primary d-block px-2 py-3">Get Started</a>
	            </div>
	          </div>
	        </div>
	        <div class="col-md-4 ftco-animate">
	          <div class="block-7">
	          	<div class="img" style="background-image: url(images/pricing-2.jpg);"></div>
	            <div class="text-center p-4">
	            	<span class="excerpt d-block">Donate</span>
		            <span class="price"><sup>RS.</sup> <span class="number">7000</span> <sub></sub></span>
		            
		            <ul class="pricing-text mb-5">
					<li><span class="fa fa-check mr-2"></span>Help feed 10 shelter pets</li>
          <li><span class="fa fa-check mr-2"></span>Contribute to 5 vet visits</li>
          <li><span class="fa fa-check mr-2"></span>Support 5 pet grooming sessions</li>
          <li><span class="fa fa-check mr-2"></span>Free support for pet initiatives</li>
       
		            </ul>

		            <a href="donateview.php" class="btn btn-primary d-block px-2 py-3">Get Started</a>
	            </div>
	          </div>
	        </div>
	        <div class="col-md-4 ftco-animate">
	          <div class="block-7">
	          	<div class="img" style="background-image: url(images/pricing-3.jpg);"></div>
	            <div class="text-center p-4">
	            	<span class="excerpt d-block">Donate</span>
		            <span class="price"><sup>RS.</sup> <span class="number">10,000</span> <sub></sub></span>
		            
		            <ul class="pricing-text mb-5">
					<li><span class="fa fa-check mr-2"></span>Help feed 15 shelter pets</li>
          <li><span class="fa fa-check mr-2"></span>Contribute to 7 vet visits</li>
          <li><span class="fa fa-check mr-2"></span>Support 7 pet grooming sessions</li>
          <li><span class="fa fa-check mr-2"></span>Free support for pet initiatives</li>
        </ul>

		            <a href="donateview.php" class="btn btn-primary d-block px-2 py-3">Get Started</a>
	            </div>
	          </div>
	        </div>
	      </div>
    	</div>
    </section>

<section class="ftco-section">
			<div class="container">
				<div class="row justify-content-center pb-5 mb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h2>Pets Gallery</h2>
          </div>
        </div>
				<div class="row">
          <div class="col-md-4 ftco-animate">
            <div class="work mb-4 img d-flex align-items-end" style="background-image: url(images/gallery-1.jpg);">
            	<a href="images/gallery-1.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
	    					<span class="fa fa-expand"></span>
	    				</a>
            	<div class="desc w-100 px-4">
	              <div class="text w-100 mb-3">
	              	<span>Cat</span>
	              	<h2><a href="work-single.html">Persian Cat</a></h2>
	              </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 ftco-animate">
            <div class="work mb-4 img d-flex align-items-end" style="background-image: url(images/gallery-2.jpg);">
            	<a href="images/gallery-2.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
	    					<span class="fa fa-expand"></span>
	    				</a>
            	<div class="desc w-100 px-4">
	              <div class="text w-100 mb-3">
	              	<span>Dog</span>
	              	<h2><a href="work-single.html">Pomeranian</a></h2>
	              </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 ftco-animate">
            <div class="work mb-4 img d-flex align-items-end" style="background-image: url(images/gallery-3.jpg);">
            	<a href="images/gallery-3.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
	    					<span class="fa fa-expand"></span>
	    				</a>
            	<div class="desc w-100 px-4">
	              <div class="text w-100 mb-3">
	              	<span>Cat</span>
	              	<h2><a href="work-single.html">Sphynx Cat</a></h2>
	              </div>
              </div>
            </div>
          </div>

          <div class="col-md-4 ftco-animate">
            <div class="work mb-4 img d-flex align-items-end" style="background-image: url(images/gallery-4.jpg);">
            	<a href="images/gallery-4.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
	    					<span class="fa fa-expand"></span>
	    				</a>
            	<div class="desc w-100 px-4">
	              <div class="text w-100 mb-3">
	              	<span>Cat</span>
	              	<h2><a href="work-single.html">British Shorthair</a></h2>
	              </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 ftco-animate">
            <div class="work mb-4 img d-flex align-items-end" style="background-image: url(images/gallery-5.jpg);">
            	<a href="images/gallery-5.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
	    					<span class="fa fa-expand"></span>
	    				</a>
            	<div class="desc w-100 px-4">
	              <div class="text w-100 mb-3">
	              	<span>Dog</span>
	              	<h2><a href="work-single.html">Beagle</a></h2>
	              </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 ftco-animate">
            <div class="work mb-4 img d-flex align-items-end" style="background-image: url(images/gallery-6.jpg);">
            	<a href="images/gallery-6.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
	    					<span class="fa fa-expand"></span>
	    				</a>
            	<div class="desc w-100 px-4">
	              <div class="text w-100 mb-3">
	              	<span>Dog</span>
	              	<h2><a href="work-single.html">Pug</a></h2>
	              </div>
              </div>
            </div>
          </div>
        </div>
			</div>
		</section>




   

    <footer class="footer">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-lg-3 mb-4 mb-md-0">
						<h2 class="footer-heading">Petsitting</h2>
						<ul class="ftco-footer-social p-0">
              <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><span class="fa fa-twitter"></span></a></li>
              <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><span class="fa fa-facebook"></span></a></li>
              <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><span class="fa fa-instagram"></span></a></li>
            </ul>
					</div>
					
           
					<div class="col-md-6 col-lg-3 pl-lg-5 mb-4 mb-md-0">
						<h2 class="footer-heading">Quick Links</h2>
						<li class="nav-item active"><a href="mainpage2.php" class="nav-link">Home</a></li>
	        	<li class="nav-item"><a href="donateview.php" class="nav-link">Donation</a></li>
	        	<li class="nav-item"><a href="customerview1.php" class="nav-link">Adoption</a></li>
	          <li class="nav-item"><a href="customerlogin2.php" class="nav-link">Login</a></li>
	          <li class="nav-item"><a href="signup.php" class="nav-link">Signup</a></li>
	          <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
						<ul class="list-unstyled">
            </ul>
					</div>
					<div class="col-md-6 col-lg-3 mb-4 mb-md-0">
						<h2 class="footer-heading">Have a Questions?</h2>
						<div class="block-23 mb-3">
              <ul>
                <li><span class="icon fa fa-map"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
                <li><a href="#"><span class="icon fa fa-phone"></span><span class="text">+2 392 3929 210</span></a></li>
                <li><a href="#"><span class="icon fa fa-paper-plane"></span><span class="text">info@yourdomain.com</span></a></li>
              </ul>
            </div>
					</div>
				</div>
			
		</footer>

    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>


    
  </body>
</html>