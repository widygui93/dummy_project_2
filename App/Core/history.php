<?php 
session_start();

if ( !isset($_SESSION["login"]) ) {
    // arahkan user balik ke login
    header('Location: login.php');
    exit;
}

$user = $_SESSION["username"];

date_default_timezone_set("Asia/Jakarta");

require_once '../init.php';

use App\Db\Cart as Cart;
use App\Db\History as History;
use App\Db\Profile as Profile;
use App\Db\Menu as Menu;

$cart = new Cart();
$history = new History();
$profile = new Profile();
$menu = new Menu();

$types = $menu->getTipeMenu();

if( isset($_POST["detail"]) ){
 	$details = $history->getDetailHistory($_POST["id_transfer"]);

	echo '
		<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
		<script>
			$(window).load(function() {
			    $("#modalDetailTransaction").modal("show");
			});
		</script>
	';

}


$jlhQuantity = $cart->getJumlahQuantity($user);
$items = $history->getHistory($user);
$profilePic = $profile->getProfilePic($user);









 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>History</title>

    
</head>
<body>
	<div class="modal fade" id="modalDetailTransaction" tabindex="-1" role="dialog" aria-labelledby="detailTransaction" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="detailTransaction">Detail Transaction</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					
					<div class="table-responsive">
						<table border="1" cellpadding="10" cellspacing="0" class="table table-dark table-hover">
							<tr>
								<th>No</th>
								<th>Menu</th>
								<th>Type Menu</th>
								<th>Price</th>
								<th>Quantity</th>
								<th>Total Price</th>
							</tr>
							<?php $no=1; ?>
							<?php foreach($details as $detail) : ?>
								<tr>
									<td><?= $no; ?></td>
									<td><?= $detail["nama_menu"] ?></td>
									<td><?= $detail["tipe_menu"] ?></td>
									<td><?= number_format($detail["harga_menu"]) ?></td>
									<td><?= $detail["quantity"] ?></td>
									<td><?= number_format($detail["quantity"] * $detail["harga_menu"]) ?></td>
								</tr>
								<?php $no++; ?>
							<?php endforeach; ?>
						</table>
					</div>

				</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-dismiss="modal">OK</button>
				</div>
			</div>
		</div>
	</div>
 	<div class="container-fluid">
 		<div class="row min-vh-100">
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
 									<?php foreach($types as $type) : ?>
		                            	<a href="menu.php?id=<?= $type['id_tipe_menu']; ?>&tipe=<?= $type['tipe_menu']; ?>"><?= $type["tipe_menu"]; ?></a>
	                            	<?php endforeach; ?>
 								</div>
 							</div>
 							<div class="col-lg-4 header-item-holder text-center text-lg-right">
 								<ul class="navbar-nav mx-auto mt-2 mt-lg-0">
 									<li class="nav-item dropdown">
 										<a href="profile.php" class="nav-link dropdown-toggle" id="user">
 											<!-- <span class="user-photo"></span> -->
 											<img src="profile-picture/<?= $profilePic; ?>" class="user-photo">
 											<strong><?= $user; ?></strong>
 										</a>
 										<!-- <div class="dropdown-menu" aria-labelledby="user">
 											<a href="profile.php" class="dropdown-item">Profile</a>
 											<a href="history.php" class="dropdown-item">History</a>
 										</div> -->
 									</li>
 								</ul>
 								<a href="cart.php" class="header-item" data-toggle="tooltip" data-placement="top" title="Cart">
 									<img src="svg/shopping_cart-black-24dp.svg" alt="icon cart">
 									<span class="badge badge-success"><?= $jlhQuantity; ?></span>
 								</a>
 								<a href="history.php" class="header-item" data-toggle="tooltip" data-placement="top" title="History">
 									<img src="svg/receipt-black-24dp.svg" alt="icon history">
 								</a>
 							</div>
 						</div>
 					</div>
 				</header>
 			</div>
 			<div class="col-12">
 				<div class="container-fluid main-content">
 					<div class="row">
 						<div class="col-sm">
 							<h2>History Transaction</h2>
 						</div>
 					</div>
 					<div class="row">
 						<div class="col-sm">
 							<?php if(!empty($items)): ?>
	 							<div class="table-responsive">
		 							<table border="1" cellpadding="10" cellspacing="0" class="table table-dark table-hover">
		 								<tr>
		 									<th>No</th>
		 									<th>Payment Date</th>
		 									<th>Destination Account Number</th>
		 									<th>Total Transaction</th>
		 									<th>Delivery Address</th>
		 									<th>Detail</th>
		 								</tr>
		 								<?php $no=1; ?>
		 								<?php foreach($items as $item) : ?>
			 								<tr>
			 									<td><?= $no; ?></td>
			 									<td><?= $item["tgl_transfer"] ?></td>
			 									<td><?= $item["no_rek_tujuan"] ?></td>
			 									<td><?= $item["total_transfer"] ?></td>
			 									<td><?= $item["alamat_order"] ?></td>
			 									<td>
			 										<form action="" method="post">
			 											<input type="text" style="display: none;" name="id_transfer" value=<?= $item["id_transfer"]; ?> >
			 											<button type="submit" name="detail" class="btn btn-success">View Detail</button>
			 										</form>
			 									</td>
			 								</tr>
			 								<?php $no++; ?>
		 								<?php endforeach; ?>
		 							</table>
	 							</div>
 							<?php else: ?>
 								<div class="alert alert-primary" role="alert"><h3>You don't have any history yet. Please go to menu to order.</h3></div>
 							<?php endif; ?>
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
 	<!-- CDN bootstrap 4 -->
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../../css/style.css">
</body>
</html>