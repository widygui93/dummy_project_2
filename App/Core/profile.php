<?php 
date_default_timezone_set("Asia/Jakarta");

require_once '../init.php';

use App\Db\Cart as Cart;
use App\Db\Profile as Profile;

$cart = new Cart();
$profile = new Profile();

$jlhQuantity = $cart->getJumlahQuantity();

$userName = $profile->getUserName();
$registerDate = $profile->getRegisterDate();












 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Profile</title>

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
		if( isset($_POST["submitEditProfileData"]) ) {

			if( $profile->editProfileData($_POST, $userName) > 0 ) {
				
				echo "<script>swal('Success!', 'Edit data successfully', 'success');</script>";
			} 

		}

		if( isset($_POST["submitEditProfilePic"]) ){
			

			if( $profile->editProfilePic($userName) > 0 ){
				echo "<script>swal('Success!', 'Edit profile picture successfully', 'success');</script>";
			} else {
				echo "<script>swal('Failed!', 'Edit profile picture failed', 'error');</script>";
			}
			
		}

		$address = $profile->getAddress();
		$phoneNo = $profile->getPhoneNo();
		$email = $profile->getEmail();
		$profilePic = $profile->getProfilePic();
	?>
	<!-- MODAL SECTION -->
	<!-- MODAL EDIT PROFILE PIC -->
	<div class="modal fade" id="modalEditProfilePic" tabindex="-1" role="dialog" aria-labelledby="editProfilePicture" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="editProfilePicture">Profile Picture</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="" method="post" enctype="multipart/form-data">
					  <div class="form-group">
					    <label for="profilePicture">Edit your profile picture</label>
					  </div>
					  <div class="form-group">
					  	<input type="file" id="profilePicture" name="gambar">
					    <button type="submit" name="submitEditProfilePic" class="btn btn-primary">Submit</button>
					  </div>
					</form>
				</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-dismiss="modal">OK</button>
				</div>
			</div>
		</div>
	</div>
	<!--END MODAL EDIT PROFILE PIC -->
	<!-- MODAL EDIT PROFILE DATA -->
	<div class="modal fade" id="modalEditProfileData" tabindex="-1" role="dialog" aria-labelledby="editProfileData" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="editProfileData">Profile Data</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="" method="post">
					  <div class="form-group">
					  	<label for="InputAddress">Address</label>
    					<input type="text" name="address" class="form-control" id="InputAddress" aria-describedby="addressHelp" placeholder="Enter address" value="<?= $address; ?>" required>
					  </div>
					  <div class="form-group">
					  	<label for="InputPhoneNo">Phone No</label>
    					<input type="text" name="phoneno" class="form-control" id="InputPhoneNo" aria-describedby="phoneHelp" placeholder="Enter phone no" value="<?= $phoneNo; ?>" required>
					  </div>
					  <div class="form-group">
					    <label for="exampleInputEmail1">Email address</label>
					    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="<?= $email; ?>" required>
					    <small id="emailHelp" class="form-text text-muted">We'll never share your data with anyone else.</small>
					  </div>
					  <div class="form-group">
					    <button type="submit" name="submitEditProfileData" class="btn btn-primary">Submit</button>
					  </div>
					</form>
				</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-dismiss="modal">OK</button>
				</div>
			</div>
		</div>
	</div>
	<!--END MODAL EDIT PROFILE DATA -->
	<!-- MODAL EDIT PASSWORD -->
	<div class="modal fade" id="modalEditPassword" tabindex="-1" role="dialog" aria-labelledby="editPassword" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="editPassword">Change Password</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="" method="post">
					  <div class="form-group">
					    <label for="oldPassword">Current Password</label>
					    <input type="password" class="form-control" id="oldPassword" placeholder="Current Password">
					  </div>
					  <div class="form-group">
					    <label for="newPassword">New Password</label>
					    <input type="password" class="form-control" id="newPassword" placeholder="New Password">
					  </div>
					  <div class="form-group">
					    <label for="confirmNewPassword">Confirm New Password</label>
					    <input type="password" class="form-control" id="confirmNewPassword" placeholder="Confirm New Password">
					  </div>
					  <div class="form-group">
					    <button type="submit" name="submitEditPassword" class="btn btn-primary">Change</button>
					  </div>
					</form>
				</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-dismiss="modal">OK</button>
				</div>
			</div>
		</div>
	</div>
	<!--END MODAL EDIT PASSWORD -->
	<!-- END MODAL SECTION -->
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
 									<li><a href="logout.php">Log Out</a></li>
 								</ul>
 							</div>
 						</div>
 					</div>
 					<div class="col-12 bg-white pt-4">
 						<div class="row">
 							<div class="col-lg-4">
 								<div class="site-logo text-center text-lg-left"><a href="../../index.php">Sunny Cafe</a></div>
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
 								<ul class="navbar-nav mx-auto mt-2 mt-lg-0">
 									<li class="nav-item dropdown">
 										<a href="#" class="nav-link dropdown-toggle" id="user" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
 											<!-- <span class="user-photo"></span> -->
 											<img src="profile-picture/user-photo.png" class="user-photo">
 											<strong>user123</strong>
 										</a>
 										<div class="dropdown-menu" aria-labelledby="user">
 											<a href="profile.php" class="dropdown-item">Profile</a>
 											<a href="history.php" class="dropdown-item">History</a>
 										</div>
 									</li>
 								</ul>
 								<a href="cart.php" class="header-item"><img src="svg/shopping_cart-black-24dp.svg" alt="icon cart"><span class="badge badge-success"><?= $jlhQuantity; ?></span></a>
 							</div>
 						</div>
 					</div>
 				</header>
 			</div>
 			<div class="col-12">
 				<div class="container main-content">
 					<div class="row">
 						<div class="col-sm">
 							<div class="profile-wrapper">
 								<div class="container">
 									<div class="row profile-header">
 										<div class="col">
											<img src="profile-picture/<?= $profilePic; ?>" class="profile-pic">
 										</div>
 										<div class="col profile-pic-blurrer">
 											<span><button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modalEditProfilePic">edit</button></span>
 										</div>
 									</div>
 									<div class="row profile-body">
 										<div class="col">
 											<ul class="list-group">
 											  <li class="list-group-item list-group-item-primary"><h3><?= $userName; ?></h3></li>
 											  <li class="list-group-item">
 											  	<img src="svg/today-black-18dp.svg" alt="icon date">
 											  	<span>Register on <?= $registerDate; ?></span>
 											  </li>
 											  <li class="list-group-item">
 											  	<img src="svg/home-black-18dp.svg" alt="icon address">
 											  	<span><?= $address; ?></span>
 											  </li>
 											  <li class="list-group-item">
 											  	<img src="svg/phone-black-18dp.svg" alt="icon phone">
 											  	<span>+<?= $phoneNo; ?></span>
 											  </li>
 											  <li class="list-group-item">
 											  	<img src="svg/mail-black-18dp.svg" alt="icon mail">
 											  	<span><?= $email; ?></span>
 											  </li>
 											</ul>
 											<a href="#" class="badge badge-primary" data-toggle="modal" data-target="#modalEditProfileData">edit profile</a>
 											<a href="#" class="badge badge-warning" data-toggle="modal" data-target="#modalEditPassword">Change password</a>
 											
 										</div>
 									</div>
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