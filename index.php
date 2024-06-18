<?php
session_start();
include_once('connection.php');



$sql = 'SELECT * FROM product';
$all_product = $conn->query($sql);
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vr</title>
    <script src="https://unpkg.com/scrollreveal"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">


<style>




.section-products a,
a:hover {
    text-decoration: none;
    color: inherit;
}

.section-products {
    padding: 80px 0 54px;
}

.section-products .header {
    margin-bottom: 50px;
}

.section-products .header h3 {
    font-size: 1rem;
    color: #fe302f;
    font-weight: 500;
}

.section-products .header h2 {
    font-size: 2.2rem;
    font-weight: 400;
    color: #444444; 
}

:root{
    font-size: 16px;
    font-family: "Raleway";
    --heading-color: hsl(0, 0%, 7%);
    --date-text-color: hsl(0, 0%, 51%);
    --previous-price-text-color: hsl(0, 98%, 44%);
    --current-price-text-color: hsla(0, 0%, 0%, 0.822);
    --liked-heart-icon-color: hsl(0, 98%, 44%);
    --heart-icon-color: whitesmoke;
    --pricing-font-weight: 800;
    --title-font-weight: 800;
    --date-font-weight: 550;

    /* Cards colors */
    --card-main-color : whitesmoke;
    --card-1-secondary-color: rgb(26, 13, 13);
    --card-2-secondary-color: rgb(67,53,27);
    --card-3-secondary-color: rgb(178,180,179);
    --card-4-secondary-color: rgb(96,109,117);
}


.section-products .container input{
    display: none;
}

.section-products .container{
    max-width: 100em;
    /* background-color: lightgreen; */
    display: flex;
    flex-wrap: wrap;
    flex-direction: row;
    justify-content: center;
    align-content: flex-start;
    margin: auto;
    min-height: 30em;
    padding: 3em 1em 1em 1em;
    box-sizing: border-box;
}

/* Card Styling */
.card-div{
    width: 20em;
    min-height: 20em;
    display: flex;
    flex-direction: column;
    justify-items: center;
    align-items: center;
    background-color: var(--card-main-color);
    margin: 0.6em;
    box-sizing: border-box;
    border-radius: 10px;
    box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
    transition: transform 0.2s ease-in-out;
}

/* ======== General styling of all cards and heart divs ========== */
.img-div{
    width: 100%;
    height: 8em;
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
    padding-top: 1rem;
    z-index: 1;
    border-radius: 0 0 10px 10px;
}

.img-div img{
    transform-origin: bottom;
    transform: translateY(7.5%);
    transition: transform 0.3s ease-in-out
}

/* === Styling the like Icon ==== */
.like-icon-div{
    padding: 1em 1em 0 1em;
    width: 100%;
    box-sizing: border-box;
    text-align: right;
    font-size: 1.5em;
    color: var(--heart-icon-color);
    border-radius:10px 10px 0 0;
    display: flex;
    justify-content: flex-end;
}

.like-icon-div-child{
    /* background-color: yellow; */
    width: 1em;
    height: 1em;
    position: relative;
    z-index: 3;
    cursor: pointer;
}

.heart-empty{
    position: absolute;
    left: 0;
    opacity: 1;
}

.heart-fill{
    position: absolute;
    left: 0;
    opacity: 0;
    transform: scale(0);
    transition: transform 0.25s ease-in-out, opacity 0.2s ease-in-out;
}


/* God of war image and heart-background*/
.gow-img-div{
    background-color: var(--card-1-secondary-color);
}

.gow-img-div img{
    width: 65%;
    transform: translateY(7.5%);
    /* background-color: whitesmoke; */
}

.card-1 .like-icon-div{
    background-color: var(--card-1-secondary-color);
}


/* Sekiro image and heart-background */
.sekiro-img-div{
    background-color: var(--card-2-secondary-color);
}

.sekiro-img-div img{
    width: 45%;
    transform: translateY(7.5%);
}

.card-2 .like-icon-div{
    background-color: var(--card-2-secondary-color);
}


/* Dazai image and heart-background */
.dazai-img-div{
    background-color: var(--card-3-secondary-color);
}

.dazai-img-div img{
    width: 80%;
    transform: translateY(7.5%);
}

.card-3 .like-icon-div{
    background-color: var(--card-3-secondary-color);
    
}

/* U4 image and heart-background*/
.u4-img-div{
    background-color: var(--card-4-secondary-color);
}

.u4-img-div img{
    width: 50%;
    transform: translateY(7.5%);
}

.card-4 .like-icon-div{
    background-color: var(--card-4-secondary-color);
}

/* ======== text Container Styling general ======== */

.text-container{
    width: 100%;
    display: flex;
    flex-direction: column;
    /* background-color: yellow; */
    padding: 0 1.5em;
    padding-top: 7em;
    padding-bottom: 1em;
    box-sizing: border-box;
}

.text-container .item-name,
.text-container .date{
    margin: 0.25em 0;
    text-align: center;
}

.text-container .item-name{
    font-size: 1.2em;
    font-weight: var(--title-font-weight);
    color: var(--heading-color);
}

.text-container .date{
    font-size: 0.9em;
    font-weight: var(--date-font-weight);
    color: var(--date-text-color);
}

/* === Pricing and cart div  ===== */
.pricing-and-cart{
    /* background-color: wheat; */
    width: 100%;
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    margin: 0.25em 0 1em 0;
}

.pricing{
    display: flex;
    flex-direction: column;
    text-align: left;
}

.previous-price{
    font-size: 0.8rem;
    font-weight: var(--pricing-font-weight);
    color: var(--previous-price-text-color);
    text-decoration: line-through;
    /* background-color: whitesmoke; */
    text-align: left;
}

.current-price{
    color: var(--current-price-text-color);
    font-size: 1.3rem;
    font-weight: var(--pricing-font-weight);
    /* background-color: yellow; */
    margin: 0;
}

.pricing-and-cart{
    width: 100%;
}

.fa-shopping-cart{
    font-size: 1.3rem;
    top: 0;
    transform: translateY(50%);
}


/* ====== Hover effects ======= */
.card-div:hover .img-div img{
    transform: translateY(7.5%) scale(1.2);
}

.card-div:hover{
    transform: translate(0, -10px);
}

.like-icon-div-child:hover .heart-fill{
    opacity: 1;
    transform: scale(1);
}

.like-icon-div-child:hover .heart-empty{
    transition-delay: 0.25s;
    opacity: 0;
}

#card-1-like:checked ~ .heart-empty,
#card-2-like:checked ~ .heart-empty,
#card-3-like:checked ~ .heart-empty,
#card-4-like:checked ~ .heart-empty{ 
        opacity: 0;
}

#card-1-like:checked ~ .heart-fill,
#card-2-like:checked ~ .heart-fill,
#card-3-like:checked ~ .heart-fill,
#card-4-like:checked ~ .heart-fill{
    animation: like-animation 0.25s ease-in-out forwards;
}

#card-1-like:not(:checked) ~ .heart-fill,
#card-2-like:not(:checked) ~ .heart-fill,
#card-3-like:not(:checked) ~ .heart-fill,
#card-4-like:not(:checked) ~ .heart-fill{
    animation: unlike-animation 0.25s ease-in-out ;
}


@keyframes like-animation{
    0%{
        opacity: 1;
        transform: scale(1)
    }
    
    50%{
        opacity: 1;
        color: var(--liked-heart-icon-color);
        transform: scale(0.5);
    }

    100%{
        opacity: 1;
        color: var(--liked-heart-icon-color);
        transform: scale(1.0);
    }
}

@keyframes unlike-animation{
    0%{
        opacity: 1;
        transform: scale(1)
    }
    
    50%{
        opacity: 1;
        transform: scale(0.5);
    }

    100%{
        opacity: 1;
        color: var(--heart-icon-color);
        transform: scale(1.0);
    }
}




    </style>


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
									<a class="nav-link" href="login1.php">Login</a>
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
                            <p>There is something you </p>	
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
        <p class="p">Our newes models is different from others, other people can see what you see </p>
       </section>

       <!-- app -->
	   <section id="apps">
        <div class="text-form">
            <div class="border1">
            <P class="para">500+</P><br>
            <p class="para1">immersive experiences</p><br><br>
            <p class="para2">Try Vr through differnt experiences and have fun while you explore it!</p><br><br>
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
    <head>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<div class="col-lg-10 offset-lg-1 pt-5 pb-5 text-dark">
  <div id="client-testimonial-carousel" class="carousel slide" data-ride="carousel" style="height:200px;">
    <div class="carousel-inner" role="listbox">
      <div class="carousel-item active text-center p-4">
        <blockquote class="blockquote text-center">
          <p class="mb-0"><i class="fa fa-quote-left"></i> "Virtual reality is the first step in a grand adventure into the landscape of the imagination." 
          </p>
          <footer class="blockquote-footer">Franko Biocca <cite title="Source Title">genius</cite></footer>
          <!-- Client review stars -->
          <!-- "fas fa-star" for a full star, "far fa-star" for an empty star, "far fa-star-half-alt" for a half star. -->
          <p class="client-review-stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
            <i class="far fa-star"></i>
          </p>
        </blockquote>
      </div>
      <div class="carousel-item text-center p-4">
        <blockquote class="blockquote text-center">
          <p class="mb-0"><i class="fa fa-quote-left"></i> "Virtual reality will transport you to worlds you've only dreamed of." 
          </p>
          <footer class="blockquote-footer">Palmer Luckey <cite title="Source Title">genius</cite></footer>
          <!-- Client review stars -->
          <!-- "fas fa-star" for a full star, "far fa-star" for an empty star, "far fa-star-half-alt" for a half star. -->
          <p class="client-review-stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </p>
        </blockquote>
      </div>
      <div class="carousel-item text-center p-4">
        <blockquote class="blockquote text-center">
          <p class="mb-0"><i class="fa fa-quote-left"></i> "Virtual reality is the ultimate empathy machine."
          </p>
          <footer class="blockquote-footer">Chris Milk <cite title="Source Title">genius</cite></footer>
          <!-- Client review stars -->
          <!-- "fas fa-star" for a full star, "far fa-star" for an empty star, "far fa-star-half-alt" for a half star. -->
          <p class="client-review-stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </p>
        </blockquote>
      </div>
    </div>
    <ol class="carousel-indicators">
      <li data-target="#client-testimonial-carousel" data-slide-to="0" class="active"></li>
      <li data-target="#client-testimonial-carousel" data-slide-to="1"></li>
      <li data-target="#client-testimonial-carousel" data-slide-to="2"></li>
    </ol>
  </div>
</div>
    </section>

	<hr>

<!----latest product---->


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




<!-- shoop -->



<footer class="footer-section">
        <div class="container">
            <div class="footer-cta pt-5 pb-5">
                <div class="row">
                    <div class="col-xl-4 col-md-4 mb-30">
                        <div class="single-cta">
                            <i class="fas fa-map-marker-alt"></i>
                            <div class="cta-text">
                                <h4>Find us</h4>
                                <span>70000 Ferizaj</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-4 mb-30">
                        <div class="single-cta">
                            <i class="fas fa-phone"></i>
                            <div class="cta-text">
                                <h4>Call us</h4>
                                <span>+383 000 000 000</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-4 mb-30">
                        <div class="single-cta">
                            <i class="far fa-envelope-open"></i>
                            <div class="cta-text">
                                <h4>Mail us</h4>
                                <span>vrfinity@info.com</span>
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
                                <li><a href="index.php">Home</a></li>
                                <li><a href="features.html">Services</a></li>
                                <li><a href="#">Contact</a></li>
                                <li><a href="about.html">About us</a></li>
                                <li><a href="#">Our Services</a></li>
                                <li><a href="#">Expert Team</a></li>
                                <li><a href="#">Contact us</a></li>
                                
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 mb-50">
                        <div class="footer-widget">
                            <div class="footer-widget-heading">
                                <h3>Contact</h3>
                            </div>
                            <div class="footer-text mb-25">
                                <p>Don’t forget to contact us for more information</p>
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
                                <li><a href="index.php">Home</a></li>
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
    <script src="style.js"></script>

</body>
</html> 