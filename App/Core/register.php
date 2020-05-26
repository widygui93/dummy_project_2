<?php 
session_start();
date_default_timezone_set("Asia/Jakarta");

require_once '../init.php';


if( isset($_SESSION["login"]) ) {
	//arahkan balik ke index.php
	header('Location: ../../index.php');
	exit;
}

// use App\Db\Cart as Cart;
use App\Db\Profile as Profile;

// $cart = new Cart();
$profile = new Profile();





?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Register</title>

	<!-- CDN bootstrap 4 -->
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	
    <link rel="stylesheet" type="text/css" href="../../css/style.css">
	
	<!-- CDN sweetalert -->
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
	<?php 
		if( isset($_POST["register"]) ) {
			if( $profile->register($_POST) > 0 ) {
				
				echo "<script>swal('Success!', 'Register successfully', 'success');</script>";
			} 
		}
	?>
 	<div class="container-fluid">
 		<div class="row">
 			<div class="col-12">
 				<header class="row">
 					<div class="col-12 bg-dark py-2 d-md-block">
 						<div class="row">
 							<div class="col-auto mr-auto">
 								<ul class="top-nav">
 									<li>
 										<img src="svg/smartphone-white-18dp.svg" alt="icon phone">
 										<span>+123-456-7890</span>
 									</li>
 									<li>
 										<img src="svg/mail-white-18dp.svg" alt="icon mail">
 										<span>mail@ecom.com</span>
 									</li>
 								</ul>
 							</div>
 							<div class="col-auto">
 								<ul class="top-nav">
 									<li><a href="register.php">Register</a></li>
 									<li><a href="login.php">Log In</a></li>
 								</ul>
 							</div>
 						</div>
 					</div>
 					<div class="col-12 bg-white pt-4">
 						<div class="row">
 							<div class="col-lg-4">
 								<div class="site-logo text-center text-center-left"><a href="../../index.php">Sunny Cafe</a></div>
 							</div>
 							<div class="col-lg-4">
 								<div class="menu text-center">
 									<a href="#">Chinese</a>
 									<a href="#">Western</a>
 									<a href="#">Indonesian</a>
 									<a href="#">Japanese</a>
 								</div>
 							</div>
 							<div class="col-lg-4 header-item-holder text-center text-lg-right">
 								<?php if( isset($_SESSION["login"]) ) : ?>
	 								<ul class="navbar-nav mx-auto mt-2 mt-lg-0">
	 									<li class="nav-item dropdown">
	 										<a href="#" class="nav-link dropdown-toggle" id="user" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	 											<img src="profile-picture/<?= $profilePic; ?>" class="user-photo">
	 											<strong>user123</strong>
	 										</a>
	 										<div class="dropdown-menu" aria-labelledby="user">
	 											<a href="profile.php" class="dropdown-item">Profile</a>
	 											<a href="history.php" class="dropdown-item">History</a>
	 										</div>
	 									</li>
	 								</ul>
 								<?php endif; ?>
 								<a href="cart.php" class="header-item">
 									<img src="svg/shopping_cart-black-24dp.svg" alt="icon cart">
 									<?php if( isset($_SESSION["login"]) ) : ?>
 										<span class="badge badge-success"><?= $jlhQuantity; ?></span>
 									<?php endif; ?>
 									<span class="badge badge-success">0</span>
 								</a>
 								<a href="history.php" class="header-item">
 									<img src="svg/receipt-black-24dp.svg" alt="icon history">
 								</a>
 							</div>
 						</div>
 					</div>
 				</header>
 			</div>
 			<div class="col-12">
 				<div class="container main-content">
 					<div class="row">
 						<div class="col-12 mt-3 text-center text-uppercase">
 							<h2>Register</h2>
 						</div>
 					</div>
 					<div class="row">
 						<div class="col-lg-4 col-md-6 col-sm-8 mx-auto bg-white py-3 mb-4">
 							<div class="row">
 								<div class="col-12">
 									<form action="" method="post">
 										<div class="form-group">
 											<label for="username">Username</label>
 											<input type="text" name="username" id="username" minlength="6" maxlength="12" pattern="^[a-zA-Z0-9]*$" class="form-control" required>
 											<small>Format: Combination of letters and numbers, Length: 6 - 12</small>
 										</div>
 										<div class="form-group">
 											<label for="email">Email</label>
 											<input type="email" name="email" id="email" class="form-control" required>
 										</div>
 										<div class="form-group">
 											<label for="phone">Phone No</label>
 											<input type="tel" id="phone" name="phone" minlength="10" maxlength="12" class="form-control" required>
 										</div>
 										<div class="form-group">
 											<label for="address">Address</label>
 											<input type="text" id="address" name="address" class="form-control" required>
 										</div>
 										<div class="form-group">
 											<labe for="password">Password</label>
 											<input type="password" name="password" id="password" minlength="8" maxlength="12" class="form-control" required></input>
 										</div>
 										<div class="form-group">
 											<labe for="password-confirm">Confirm Password</label>
 											<input type="password" name="password-confirm" id="password-confirm" minlength="8" maxlength="12" class="form-control" required></input>
 										</div>
 										<div class="form-group">
 											<button type="submit" name="register" class="btn btn-outline-dark">Submit</button>
 										</div>
 									</form>
 								</div>
 							</div>
 						</div>
 					</div>
 				</div>
 			</div>
 			<div class="col-12 align-self-end">
 				<footer class="row">
 					<div class="col-12 bg-dark text-white pb-3 pt-5">
 						<div class="row">
 							<div class="col-lg-2 col-sm-4 text-center text-sm-left mb-sm-0 mb-3">
 								<div class="row">
 									<div class="col-12">
 										<div class="footer-logo">
 											<a href="../../index.php">Sunny Cafe</a>
 										</div>
 									</div>
 									<div class="col-12">
 										<address>
 											221B Baker Street<br>
                                            London, England
                                        </address>
 									</div>
 								</div>
 							</div>
 							<div class="col-lg-3 col-sm-8 text-center text-sm-left mb-sm-0 mb-3">
 								<div class="row">
 									<div class="col-12 text-uppercase">
 										<h4>Who are we?</h4>
 									</div>
 									<div class="col-12 text-justify">
 										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
 										tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
 										quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
 										consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
 										cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
 										proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
 									</div>
 								</div>
 							</div>
 							<div class="col-lg-2 col-sm-3 col-5 ml-lg-auto ml-sm-0 ml-auto mb-sm-0 mb-3">
 								<div class="row">
 									<div class="col-12 text-uppercase">
 										<h4>Quick Links</h4>
 									</div>
 									<div class="col12">
 										<ul class="footer-nav">
 											<li><a href="#">Home</a></li>
 											<li><a href="#">Contact Us</a></li>
 											<li><a href="#">About Us</a></li>
 											<li><a href="#">Privacy Policy</a></li>
 											<li><a href="#">Term & Conditions</a></li>
 										</ul>
 									</div>
 								</div>
 							</div>
 							<div class="col-lg-1 col-sm-2 col-4 mr-auto mb-sm-0 mb-3">
 								<div class="row">
 									<div class="col-12 text-uppercase text-underline">
 										<h4>Help</h4>
 									</div>
 									<div class="col-12">
 										<ul class="footer-nav">
 											<li><a href="#">FAQs</a></li>
 											<li><a href="#">Shipping</a></li>
 											<li><a href="#">Returns</a></li>
 											<li><a href="#">Track Order</a></li>
 											<li><a href="#">Report Fraud</a></li>
 										</ul>
 									</div>
 								</div>
 							</div>
 							<div class="col-lg-3 col-sm-6 text-center text-sm-left">
 								<div class="row">
 									<div class="col-12 text-uppercase">
 										<h4>Newsletter</h4>
 									</div>
 									<div class="col-12">
 										<form action="#">
 											<div class="form-group">
 												<input type="text" class="form-control" placeholder="Enter your email..." required>
 											</div>
 											<div class="form-group">
 												<button class="btn btn-outline-light text-uppercase">Subscribe</button>
 											</div>
 										</form>
 									</div>
 								</div>
 							</div>
 						</div>
 					</div>
 				</footer>
 			</div>
 		</div>
 	</div>
 	<script src="../../js/jquery-3.4.1.min.js"></script>
 	<script src="../../js/script.js"></script>
	
</body>
</html>