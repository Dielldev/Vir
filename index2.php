<?php 
require_once('connection.php');

$sql = 'SELECT * FROM product';
$all_product = $conn->query($sql);



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="index2.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vr</title>
    <script src="https://unpkg.com/scrollreveal"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>
<body class="hero-anime">	

	<div class="navigation-wrap bg-light start-header start-style">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<nav class="navbar navbar-expand-md navbar-light">
					
						<a class="navbar-brand" href="index.php"><img src="img/logo.png"></a>	
						
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
						
						<div class="collapse navbar-collapse" id="navbarSupportedContent">
							<ul class="navbar-nav ml-auto py-4 py-md-0">
								<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 active">
									<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="index.php" role="button" aria-haspopup="true" aria-expanded="false">Home</a>
								</li>
								<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
									<a class="nav-link" href="Features.html">Features</a>
								</li>
								<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
									<a class="nav-link" href="about.html">About Us</a>
								</li>
								<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
									<a class="nav-link dropdown-toggle"  href="game.html" >Try</a>
									
								</li>
								<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
									<a class="nav-link dropdown-toggle"  href="ChatApp/index.php">Chat</a>
									
								</li>
								<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
									<a class="nav-link dropdown-toggle"  href="index.php">Logout</a>
									
								</li>
							
							</ul>
						</div>
                        <div class="wide">

                        <div class="container">
                             <div class="row">

                                <div class="col-12">
                                    <div class="buttoni">
                                    <div id="switch">
                                        <div id="circle"></div>
                                    </div>
                                    </div>
                                </div>	
                            </div>		 
                           
                        </div>	
						</div>
					</nav>		
				</div>
			</div>
		</div>
	</div>
	<div class="section full-height">
        <img src="img/vr-1.webp" class="img1 ">
		<div class="absolute-center">
			<div class="section">
				<div class="container">
					<div class="row">
						<div class="fix1">

                            <h1>THe future of Virtual reality</h1>
                            <p>There is something you have never seen before</p>	
                            </div>		 
					</div>		
				</div>		
			</div>
			<div class="section mt-5">
			</div>
		</div>
	</div>
	<div class="my-5 py-5">
	</div>

    <!-- sekshion -->
    <!-------Seksioni About------->
    <section id="about">
        <h1 class="h1">Try a new <br> way of reality</h1>
        <p class="p">Our newes models is different from others, other people can see what you see something out of the ordinary</p>
       </section>

       <!-- app -->
	   <section id="apps">
        <div class="text-form">
            <div class="border1">
            <P class="para">500+</P><br>
            <p class="para1">immersive experiences</p><br><br>
            <p class="para2">Try Vr through differnt experiences and have fun while you exlore it!</p><br><br>
            <button class="learn-more">
                <span class="circle" aria-hidden="true">
                <span class="icon arrow"></span>
                </span>
              <a href="Features.html"><span class="button-text">Learn More</span></a>
              </button>
        </div>
    </div> 
    </section>
	

    <section id="quote">
        <div class="text-wrapper">
            <h2>Experience Our Newest Vr set</h2>
            <h1>Go Now</h1>
        </div>
    </section>

	<hr>

<!----latest product---->



<!-- shoop -->


<section class="section-products">
		<div class="container">
				<div class="row justify-content-center text-center">
						<div class="col-md-8 col-lg-6">
								<div class="header">
										<h3>Featured Product</h3>
										<h2>Popular Products</h2>
								</div>
						</div>
				</div>

                <div class="container">
                <?php
  
  while ($row = mysqli_fetch_assoc($all_product)){

?>
        <div class="card-1 card-div">
            <div class="like-icon-div">
                <label for="card-1-like" class="like-icon-div-child">
                    <input type="checkbox" id="card-1-like">
                    <i class="far fa-heart heart-empty"></i>
                    <i class="fas fa-heart heart-fill"></i>
                </label>
            </div>
            
            <div class="gow-img-div img-div">
                <img src="<?php echo $row["product_image"]; ?>" alt="future1">
            </div>
            <div class="text-container">
                <h2 class="item-name"><?php echo $row["product_name"]; ?></h2>
                <p class="date"><?php echo $row["product_desc"]; ?> </p>
                <div class="pricing-and-cart">
                    <div class="pricing">
                        <p class="previous-price">$999</p>
                        <p class="current-price">$<?php echo $row["price"]; ?></p>
                    </div>
                  <a href="payment.php"><i class="fas fa-shopping-cart"></i></a>
                </div>
            </div>
        </div>
<?php } ?>
        
    </div>
</section>



  <footer class="footer-section">
        <div class="container">
            <div class="footer-cta pt-5 pb-5">
                <div class="row">
                    <div class="col-xl-4 col-md-4 mb-30">
                        <div class="single-cta">
                            <i class="fas fa-map-marker-alt"></i>
                            <div class="cta-text">
                                <h4>Find us</h4>
                                <span>1010 Avenue, sw 54321, chandigarh</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-4 mb-30">
                        <div class="single-cta">
                            <i class="fas fa-phone"></i>
                            <div class="cta-text">
                                <h4>Call us</h4>
                                <span>9876543210 0</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-4 mb-30">
                        <div class="single-cta">
                            <i class="far fa-envelope-open"></i>
                            <div class="cta-text">
                                <h4>Mail us</h4>
                                <span>mail@info.com</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-content pt-5 pb-5">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 mb-50">
                        <div class="footer-widget">
                            <div class="footer-logo">
                                <a href="#"><img src="img/logo.png" class="img-fluid" alt="logo"></a>
                            </div>
                            <div class="footer-text">
                                <p></p>
                            </div>
                            <div class="footer-social-icon">
                                <span>Follow us</span>
                                <a href="#"><i class="fab fa-facebook-f facebook-bg"></i></a>
                                <a href="#"><i class="fab fa-twitter twitter-bg"></i></a>
                                <a href="#"><i class="fab fa-google-plus-g google-bg"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
                        <div class="footer-widget">
                            <div class="footer-widget-heading">
                                <h3>Useful Links</h3>
                            </div>
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li><a href="#">about</a></li>
                                <li><a href="#">services</a></li>
                                <li><a href="#">portfolio</a></li>
                                <li><a href="#">Contact</a></li>
                                <li><a href="#">About us</a></li>
                                <li><a href="#">Our Services</a></li>
                                <li><a href="#">Expert Team</a></li>
                                <li><a href="#">Contact us</a></li>
                                <li><a href="#">Latest News</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 mb-50">
                        <div class="footer-widget">
                            <div class="footer-widget-heading">
                                <h3>Subscribe</h3>
                            </div>
                            <div class="footer-text mb-25">
                                <p>Don’t miss to subscribe to our new feeds, kindly fill the form below.</p>
                            </div>
                            <div class="subscribe-form">
                                <form action="#">
                                    <input type="text" placeholder="Email Address">
                                    <button><i class="fab fa-telegram-plane"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 text-center text-lg-left">
                        <div class="copyright-text">
                            <p>Copyright &copy; 2024, All Right Reserved <a href="#">VRfinity</a></p>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 d-none d-lg-block text-right">
                        <div class="footer-menu">
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li><a href="#">Terms</a></li>
                                <li><a href="#">Privacy</a></li>
                                <li><a href="#">Policy</a></li>
                                <li><a href="#">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>





       <script>
           ScrollReveal({
       reset: true,
       distance: '60px',
       duration: 2400,
       delay: 400
   
   });
   
   
   ScrollReveal().reveal('.h1', {delay: 400, duration: 1500, origin:'left' });
   ScrollReveal().reveal('.p', {delay: 400, duration: 1500, origin:'left' });
       </script>

  
<!-- Link to page
 ================================================== -->

	

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="index2.js"></script>

</body>
</html> 