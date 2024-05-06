<?php
include "db_conn.php";

if (isset($_POST["submit"])) {
   $name =  $_POST['name'];
   $card_number =  $_POST['card_number'];
   $expirity_date = $_POST['expirity_date'];
   $cvv = $_POST['cvv'];

   $sql = "INSERT INTO `crud1`(`id`, `name`, `card_number`, `expirity_date`, `cvv`) VALUES (NULL,'$name','$card_number','$expirity_date','$cvv')";

   $result = mysqli_query($conn, $sql);

   if ($result) {
      header("Location: index.php?msg=New record created successfully");
   } else {
      echo "Failed: " .mysqli_error($conn);
   }
}

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
								<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 ">
									<a class="nav-link dropdown-toggle"  href="index.php"  aria-haspopup="true" aria-expanded="false">Home</a>
								</li>
								<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
									<a class="nav-link" href="Features.html">Features</a>
								</li>
								<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
									<a class="nav-link" href="about.html">About Us</a>
								</li>
								<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
									<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Try</a>
									<div class="dropdown-menu">
										<a class="dropdown-item" href="#">Vr Game</a>
									</div>
								</li>
								<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
									<a class="nav-link" href="#">Communtity </a>
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

<div class="payment-form-container">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="payment-form">
        <div class="payment-option-buttons">
           
            <button type="button" id="paypal-button">PayPal</button>
            <button type="button" id="applepay-button">Apple Pay</button>
            <button type="button" id="googlepay-button">Google Pay</button>
        </div>

        <div class="or-divider">
            <span>or pay using credit card</span>
        </div>

        <div class="form-group">
            <label for="cardholder-name">Cardholder full name:</label>
            <input type="text" id="cardholder-name" name="name" placeholder="Full Name" required >
			<p id="result" ></p>
		</div>	

        <div class="form-group">
    <label for="card-number">Card Number:</label>
    <input type="text" id="cardNumber" name="card_number" pattern="\d*" minlength="16" maxlength="16" required onkeyup="checkCardType()">
</div>
<p id="result"></p>


        <div class="form-row">
            <div class="form-group">
                <label for="expiry-date">Expiry Date:</label>
                <input type="text" id="expiry-date" name="expirity_date" pattern="\d{2}/\d{2}" placeholder="MM/YY" required>
            </div>

            <div class="form-group">
                <label for="cvv">CVV:</label>
                <input type="text" id="cvv" name="cvv" pattern="\d*" minlength="3" maxlength="4" required>
            </div>
        </div>

        <div class="form-group">
       <a href="index.php"> <button type="submit" class="btn btn-success" name="submit" he>Save</button></a>
	   <a href="index.php" class="btn btn-danger">Cancel</a>
        </div>
    </form>
</div>

<script>
	function checkCardType() {
    var cardNumber = document.getElementById('cardNumber').value;
    var firstDigit = cardNumber.charAt(0);
    var resultText = '';

    if (firstDigit === '4') {
        resultText = 'This is a Visa card.';
    } else if (firstDigit === '5' || firstDigit === '2') {
        resultText = 'This is a Mastercard.';
    } else {
        resultText = 'Unknown card type or invalid number.';
    }

    document.getElementById('result').innerText = resultText;
	}
</script>




            

   <!-- Bootstrap -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
      <script src="style.js"></script>


	

<style>
@import url('https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&subset=devanagari,latin-ext');

/* #Primari
================================================== */

body{
    font-family: 'Poppins', sans-serif;
	font-size: 16px;
	line-height: 24px;
	font-weight: 400;
	color: #212112;
	background-position: center;
	background-repeat: repeat;
	background-size: 7%;
	background-color: #fff;
	overflow-x: hidden;
    transition: all 200ms linear;
}
::selection {
	color: #fff;
	background-color: #8167a9;
}
::-moz-selection {
	color: #fff;
	background-color: #8167a9;
}


/* #Navi
================================================== */

.start-header {
	opacity: 1;
	transform: translateY(0);
	padding: 20px 0;
	box-shadow: 0 10px 30px 0 rgba(138, 155, 165, 0.15);
	-webkit-transition : all 0.3s ease-out;
	transition : all 0.3s ease-out;
}
.start-header.scroll-on {
	box-shadow: 0 5px 10px 0 rgba(138, 155, 165, 0.15);
	padding: 10px 0;
	-webkit-transition : all 0.3s ease-out;
	transition : all 0.3s ease-out;
}
.start-header.scroll-on .navbar-brand img{
	height: 40px;
	-webkit-transition : all 0.3s ease-out;
	transition : all 0.3s ease-out;
}
.navigation-wrap{
	position: fixed;
	width: 100%;
	top: 0;
	left: 0;
	z-index: 1000;
	-webkit-transition : all 0.3s ease-out;
	transition : all 0.3s ease-out;
}
.navbar{
	padding: 0;
}
.navbar-brand img{
	height: 65px;
	width: auto;
	display: block;
  filter: brightness(10%);
	-webkit-transition : all 0.3s ease-out;
	transition : all 0.3s ease-out;
}
.navbar-toggler {
	float: right;
	border: none;
	padding-right: 0;
}
.navbar-toggler:active,
.navbar-toggler:focus {
	outline: none;
}
.navbar-light .navbar-toggler-icon {
	width: 24px;
	height: 17px;
	background-image: none;
	position: relative;
	border-bottom: 1px solid #000;
    transition: all 300ms linear;
}
.navbar-light .navbar-toggler-icon:after, 
.navbar-light .navbar-toggler-icon:before{
	width: 24px;
	position: absolute;
	height: 1px;
	background-color: #000;
	top: 0;
	left: 0;
	content: '';
	z-index: 2;
    transition: all 300ms linear;
}
.navbar-light .navbar-toggler-icon:after{
	top: 8px;
}
.navbar-toggler[aria-expanded="true"] .navbar-toggler-icon:after {
	transform: rotate(45deg);
}
.navbar-toggler[aria-expanded="true"] .navbar-toggler-icon:before {
	transform: translateY(8px) rotate(-45deg);
}
.navbar-toggler[aria-expanded="true"] .navbar-toggler-icon {
	border-color: transparent;
}
.nav-link{
	color: #212121 !important;
	font-weight: 500;
    transition: all 200ms linear;
}
.nav-item:hover .nav-link{
	color: #8167a9 !important;
}
.nav-item.active .nav-link{
	color: #777 !important;
}
.nav-link {
	position: relative;
	padding: 5px 0 !important;
	display: inline-block;
}
.nav-item:after{
	position: absolute;
	bottom: -5px;
	left: 0;
	width: 100%;
	height: 2px;
	content: '';
	background-color: #8167a9;
	opacity: 0;
    transition: all 200ms linear;
}
.nav-item:hover:after{
	bottom: 0;
	opacity: 1;
}
.nav-item.active:hover:after{
	opacity: 0;
}
.nav-item{
	position: relative;
    transition: all 200ms linear;
}

/* #Primary style
================================================== */

.bg-light {
	background-color: #fff !important;
    transition: all 200ms linear;
}
.section {
    position: relative;
	width: 100%;
	display: block;
}
.full-height {
    height: 100vh;
}
.over-hide {
    overflow: hidden;
}
.absolute-center {
	position: absolute;
	top: 50%;
	left: 0;
	width: 100%;
  margin-top: 40px;
	transform: translateY(-50%);
	z-index: 20;
}
h1{
	font-size: 48px;
	line-height: 1.2;
	font-weight: 700;
	color: #212112;
	text-align: center;
}
p{
	text-align: center;
	margin: 0;
	padding-top: 10px;
	opacity: 1;
	transform: translate(0);
    transition: all 300ms linear;
    transition-delay: 1700ms;
}
body.hero-anime p{
	opacity: 0;
	transform: translateY(40px);
    transition-delay: 1700ms;
}
h1 span{
	display: inline-block;
    transition: all 300ms linear;
	opacity: 1;
	transform: translate(0);
}
body.hero-anime h1 span:nth-child(1){
	opacity: 0;
	transform: translateY(-20px);
}
body.hero-anime h1 span:nth-child(2){
	opacity: 0;
	transform: translateY(-30px);
}
body.hero-anime h1 span:nth-child(3){
	opacity: 0;
	transform: translateY(-50px);
}
body.hero-anime h1 span:nth-child(4){
	opacity: 0;
	transform: translateY(-10px);
}
body.hero-anime h1 span:nth-child(5){
	opacity: 0;
	transform: translateY(-50px);
}
body.hero-anime h1 span:nth-child(6){
	opacity: 0;
	transform: translateY(-20px);
}
body.hero-anime h1 span:nth-child(7){
	opacity: 0;
	transform: translateY(-40px);
}
body.hero-anime h1 span:nth-child(8){
	opacity: 0;
	transform: translateY(-10px);
}
body.hero-anime h1 span:nth-child(9){
	opacity: 0;
	transform: translateY(-30px);
}
body.hero-anime h1 span:nth-child(10){
	opacity: 0;
	transform: translateY(-20px);
}
h1 span:nth-child(1){
    transition-delay: 1000ms;
}
h1 span:nth-child(2){
    transition-delay: 700ms;
}
h1 span:nth-child(3){
    transition-delay: 900ms;
}
h1 span:nth-child(4){
    transition-delay: 800ms;
}
h1 span:nth-child(5){
    transition-delay: 1000ms;
}
h1 span:nth-child(6){
    transition-delay: 700ms;
}
h1 span:nth-child(7){
    transition-delay: 900ms;
}
h1 span:nth-child(8){
    transition-delay: 800ms;
}
h1 span:nth-child(9){
    transition-delay: 600ms;
}
h1 span:nth-child(10){
    transition-delay: 700ms;
}
body.hero-anime h1 span:nth-child(11){
	opacity: 0;
	transform: translateY(30px);
}
body.hero-anime h1 span:nth-child(12){
	opacity: 0;
	transform: translateY(50px);
}
body.hero-anime h1 span:nth-child(13){
	opacity: 0;
	transform: translateY(20px);
}
body.hero-anime h1 span:nth-child(14){
	opacity: 0;
	transform: translateY(30px);
}
body.hero-anime h1 span:nth-child(15){
	opacity: 0;
	transform: translateY(50px);
}
h1 span:nth-child(11){
    transition-delay: 1300ms;
}
h1 span:nth-child(12){
    transition-delay: 1500ms;
}
h1 span:nth-child(13){
    transition-delay: 1400ms;
}
h1 span:nth-child(14){
    transition-delay: 1200ms;
}
h1 span:nth-child(15){
    transition-delay: 1450ms;
}
.conta
#switch,
#circle {
	cursor: pointer;
	-webkit-transition: all 300ms linear;
	transition: all 300ms linear; 
} 
#switch {
	width: 60px;
	height: 8px;
	border: 2px solid #8167a9;
	border-radius: 27px;
	background: #000;
	position: relative;
	display: block;
	margin: 0 auto;
	text-align: center;
	opacity: 1;
	transform: translate(0);
    transition: all 300ms linear;
    transition-delay: 1900ms;
}
body.hero-anime #switch{
	opacity: 0;
	transform: translateY(40px);
    transition-delay: 1900ms;
}
#circle {
	position: absolute;
	top: -11px;
	left: -13px;
	width: 26px;
	height: 26px;
	border-radius: 50%;
	background: #000;
}
.switched {
	border-color: #000 !important;
	background: #8167a9 !important;
}
.switched #circle {
	left: 43px;
	box-shadow: 0 4px 4px rgba(26,53,71,0.25), 0 0 0 1px rgba(26,53,71,0.07);
	background: #fff;
}
.nav-item .dropdown-menu {
    transform: translate3d(0, 10px, 0);
    visibility: hidden;
    opacity: 0;
	max-height: 0;
    display: block;
	padding: 0;
	margin: 0;
    transition: all 200ms linear;
}
.nav-item.show .dropdown-menu {
    opacity: 1;
    visibility: visible;
	max-height: 999px;
    transform: translate3d(0, 0px, 0);
}
.dropdown-menu {
	padding: 10px!important;
	margin: 0;
	font-size: 13px;
	letter-spacing: 1px;
	color: #212121;
	background-color: #fcfaff;
	border: none;
	border-radius: 3px;
	box-shadow: 0 5px 10px 0 rgba(138, 155, 165, 0.15);
    transition: all 200ms linear;
}
.dropdown-toggle::after {
	display: none;
}

.dropdown-item {
	padding: 3px 15px;
	color: #212121;
	border-radius: 2px;
    transition: all 200ms linear;
}
.dropdown-item:hover, 
.dropdown-item:focus {
	color: #fff;
	background-color: rgba(129,103,169,.6);
}

body.dark{
	color: #fff;
	background-color: #1f2029;
}
body.dark .navbar-brand img{
  filter: brightness(100%);
}
body.dark h1{
	color: #fff;
}
body.dark h1 span{
    transition-delay: 0ms !important;
}
body.dark p{
	color: #fff;
    transition-delay: 0ms !important;
}
body.dark .bg-light {
	background-color: #14151a !important;
}
body.dark .start-header {
	box-shadow: 0 10px 30px 0 rgba(0, 0, 0, 0.15);
}
body.dark .start-header.scroll-on {
	box-shadow: 0 5px 10px 0 rgba(0, 0, 0, 0.15);
}
body.dark .nav-link{
	color: #fff !important;
}
body.dark .nav-item.active .nav-link{
	color: #999 !important;
}
body.dark .dropdown-menu {
	color: #fff;
	background-color: #1f2029;
	box-shadow: 0 5px 10px 0 rgba(0, 0, 0, 0.25);
}
body.dark .dropdown-item {
	color: #fff;
}
body.dark .navbar-light .navbar-toggler-icon {
	border-bottom: 1px solid #fff;
}
body.dark .navbar-light .navbar-toggler-icon:after, 
body.dark .navbar-light .navbar-toggler-icon:before{
	background-color: #fff;
}
body.dark .navbar-toggler[aria-expanded="true"] .navbar-toggler-icon {
	border-color: transparent;
}



/* #Media
================================================== */

@media (max-width: 767px) { 
	h1{
		font-size: 38px;
	}
	.nav-item:after{
		display: none;
	}
	.nav-item::before {
		position: absolute;
		display: block;
		top: 15px;
		left: 0;
		width: 11px;
		height: 1px;
		content: "";
		border: none;
		background-color: #000;
		vertical-align: 0;
	}
	.dropdown-toggle::after {
		position: absolute;
		display: block;
		top: 10px;
		left: -23px;
		width: 1px;
		height: 11px;
		content: "";
		border: none;
		background-color: #000;
		vertical-align: 0;
		transition: all 200ms linear;
	}
	.dropdown-toggle[aria-expanded="true"]::after{
		transform: rotate(90deg);
		opacity: 0;
	}
	.dropdown-menu {
		padding: 0 !important;
		background-color: transparent;
		box-shadow: none;
		transition: all 200ms linear;
	}
	.dropdown-toggle[aria-expanded="true"] + .dropdown-menu {
		margin-top: 10px !important;
		margin-bottom: 20px !important;
	}
	body.dark .nav-item::before {
		background-color: #fff;
	}
	body.dark .dropdown-toggle::after {
		background-color: #fff;
	}
	body.dark .dropdown-menu {
		background-color: transparent;
		box-shadow: none;
	}
}

/* #Link to page
================================================== */

.logo {
	position: absolute;
	bottom: 30px;
	right: 30px;
	display: block;
	z-index: 100;
	transition: all 250ms linear;
}
.logo img {
	height: 26px;
	width: auto;
	display: block;
  filter: brightness(10%);
	transition: all 250ms linear;
}
body.dark .logo img {
  filter: brightness(100%);
}

.wide{
    align-items: right;
}





.payment-form-container {
    max-width: 400px;
    margin: 180px auto;
    padding: 20px;
	border: 2px solid white;
    background: transparent;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.15);
}

.payment-option-buttons button {
    display: inline-block;
    margin-right: 10px;
    padding: 10px;
    background: #f1f1f1;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.payment-option-buttons button:hover {
    background: #e1e1e1;
}

.or-divider {
    text-align: center;
    margin: 20px 0;
    position: relative;
}

.or-divider span {
    background: transparent;
    padding: 0 10px;
}

.or-divider:before {
    content: '';
    position: absolute;
    top: 50%;
    left: 0;
    right: 0;
    width: 0%;
    height: 1px;
    background: #d1d1d1;
    z-index: -1;
}

.form-group {
    margin-bottom: 20px;
}

.form-row {
    display: flex;
    justify-content: space-between;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
}

.form-group input[type="text"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

#checkout-button {
    width: 100%;
    padding: 10px;
    border: none;
    color: white;
    background-color: #333;
    border-radius: 4px;
    cursor: pointer;
}

#checkout-button:hover {
    background-color: #555;
}
</style>


</body>

</html>