<?php 
session_start();

require_once '../init.php';
use App\Db\Cart as Cart;
use App\Db\Profile as Profile;
use App\Db\Menu as Menu;



$cart = new Cart();
$profile = new Profile();
$menu = new Menu();

$types = $menu->getTipeMenu();

if( $menu->isUrlInvalid($_GET) ){
    //arahkan balik ke index.php
    header('Location: ../../index.php');
    exit;
}

$idTipeMenu = $_GET["id"];
$tipeMenu = $_GET["tipe"];


if( isset($_SESSION["login"]) ) {
	$user = $_SESSION["username"];
	$profilePic = $profile->getProfilePic($user);
}





 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 	<title>Sunny Cafe</title>

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
 	<!-- The Modal -->
	  <div class="modal fade" id="quantityModal" role="dialog">
	    <div class="modal-dialog modal-sm" role="document">
	      <div class="modal-content">
	      
	        <!-- Modal Header -->
	        <div class="modal-header">
	          <h4 class="modal-title">Select Quantity</h4>
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	        </div>
	        
	        <!-- Modal body -->
	        <div class="modal-body">
	        	<input type="text" style="display: none;" id="nama" value="">
				<input type="text" style="display: none;" id="harga" value="">
				<input type="text" style="display: none;" id="idMenu" value="">
				<input type="text" style="display: none;" id="tipe" value="">
				<input type="text" style="display: none;" id="quantity" value="">
                <input type="text" style="display: none;" id="direktori" value="Order.php">
	          	<div class="quantity-container">
					<label>Quantity:</label>
					<button type="button" class="btn btn-outline-primary btn-sm plus">+</button>
					<span class="badge badge-success"></span>
					<button type="button" class="btn btn-outline-primary btn-sm minus">-</button>
				</div>
	        </div>
	        
	        <!-- Modal footer -->
	        <div class="modal-footer">
	          <button type="button" class="btn btn-success" data-dismiss="modal" id="submit-order">Submit</button>
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
                                	<?php if(isset($_SESSION["login"])): ?>
                                		<li>
                                			<a href="logout.php">Log Out</a>
                                		</li>
	                                <?php else: ?>
	                                	<li><a href="register.php">Register</a></li>
	                                	<li><a href="login.php">Log In</a></li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Header -->
                    <div class="col-12 bg-white pt-4">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="site-logo text-center text-lg-left">
                                    <a href="../../index.php">Sunny Cafe</a>
                                </div>
                            </div>
                            <div class="col-lg-4">
                            	<div class="menu text-center">
                            		<?php foreach($types as $type) : ?>
		                            	<a href="menu.php?id=<?= $type['id_tipe_menu']; ?>&tipe=<?= $type['tipe_menu']; ?>"><?= $type["tipe_menu"]; ?></a>
	                            	<?php endforeach; ?>
                            	</div>
                            </div>
                            <div class="col-lg-4 header-item-holder text-center text-lg-right">
                            	<?php if( isset($_SESSION["login"]) ) : ?>
	                            	<ul class="navbar-nav mx-auto mt-2 mt-lg-0">
	                                    <li class="nav-item dropdown">
	                                        <a class="nav-link dropdown-toggle" href="profile.php" id="user">
	                                        	<!-- <span class="user-photo"></span> -->
	                                        	<img src="profile-picture/<?= $profilePic; ?>" class="user-photo">
	                                        	<strong><?= $user; ?></strong>
	                                        </a>
	                                        <!-- <div class="dropdown-menu" aria-labelledby="user">
	                                            <a class="dropdown-item" href="App/Core/profile.php">Profile</a>
										    	<a class="dropdown-item" href="App/Core/history.php">History</a>
	                                        </div> -->
	                                    </li>
	                                </ul>
                                <?php endif; ?>
                                <a href="cart.php" class="header-item" data-toggle="tooltip" data-placement="top" title="Cart">
                                    <img src="svg/shopping_cart-black-24dp.svg" alt="icon cart">
                                    <?php if( isset($_SESSION["login"]) ) : ?>
                                    	<span class="badge badge-success"><?= $cart->getJumlahQuantity($user); ?></span>
                                    <?php else: ?>
                                    	<span class="badge badge-success">0</span>
                                    <?php endif; ?>
                                </a>
                                <a href="history.php" class="header-item" data-toggle="tooltip" data-placement="top" title="History">
 									<img src="svg/receipt-black-24dp.svg" alt="icon history">
 								</a>
                                <!-- <a href="#" class="header-item"> -->
                                <!-- <span id="header-price">Rp.4,000,000</span> -->
                                <!-- </a> -->
                            </div>
                        </div>
                    </div>
                    <!-- Header -->
 				</header>
 			</div>
 			<div class="col-12">
 				<main class="row">
 					<div class="col-12 carousel slide w-100">
 						<div class="row">
 							<div class="col-12 py-3">
 								<div class="row">
 									<div class="col-12 text-center text-uppercase">
                                        <h2><?= $tipeMenu; ?></h2>
                                    </div>
 								</div>
 								<?php $Menus = $menu->getMenuByIdTipeMenu($idTipeMenu); ?>
 								<div class="row">
 									<?php foreach($Menus as $Menu) : ?>
 									<div class="col-lg-4 col-sm-6 my-3">
 										<div class="col-12 text-center h-100 product-item">
 											<div class="row h-100">
 												<div class="card">
												  <img class="card-img-top" src="../Menu/Images/kwetiau.jpg" alt="Card image cap">
												  <div class="card-body">
												    <h5 class="card-title"><?= $Menu["nama_menu"]; ?></h5>
												    <h3><span class="badge badge-primary">Rp <?= $Menu["harga_menu_2"]; ?></span></h3>
												    <?php if( isset($_SESSION["login"]) ) : ?>
														<button type="button" class="btn btn-success order" data-toggle="modal" data-target="#quantityModal">Order Now</button>
														<input style="display: none;" type="text" name="nama" value="<?= $Menu['nama_menu']; ?>">
														<input style="display: none;" type="text" name="harga" value=<?= $Menu['harga_menu']; ?>>
														<input style="display: none;" type="text" name="idMenu" value=<?= $Menu['id_menu']; ?>>
														<input style="display: none;" type="text" name="tipe" value="<?= $Menu['tipe_menu']; ?>">
														<input style="display: none;" type="text" name="quantity" value=<?= $cart->getJumlahQuantityByIdMenu($Menu['id_menu'],$user);?>>
													<?php endif; ?>
												  </div>
												</div>
 											</div>
 										</div>
 									</div>
 									<?php endforeach; ?>	
 								</div>
 							</div>
 						</div>
 					</div>
 					<div class="col-12">
 						<hr>
 					</div>
 				</main>
 			</div>
 			<div class="col-12 align-self-end">
 				<footer class="row">
 					<div class="col-12 bg-dark text-white pb-3 pt-5">
 						<div class="row">
 							<div class="col-lg-2 col-sm-4 text-center text-sm-left mb-sm-0 mb-3">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="footer-logo">
                                            <a href="../../index.php">E-Commerce</a>
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
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam imperdiet vel ligula vel sodales. Aenean vel ullamcorper purus, ac pharetra arcu. Nam enim velit, ultricies eu orci nec, aliquam efficitur sem. Quisque in sapien a sem vestibulum volutpat at eu nibh. Suspendisse eget est metus. Maecenas mollis quis nisl ac malesuada. Donec gravida tortor massa, vitae semper leo sagittis a. Donec augue turpis, rutrum vitae augue ut, venenatis auctor nulla. Sed posuere at erat in consequat. Nunc congue justo ut ante sodales, bibendum blandit augue finibus.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-3 col-5 ml-lg-auto ml-sm-0 ml-auto mb-sm-0 mb-3">
                                <div class="row">
                                    <div class="col-12 text-uppercase">
                                        <h4>Quick Links</h4>
                                    </div>
                                    <div class="col-12">
                                        <ul class="footer-nav">
                                            <li>
                                                <a href="#">Home</a>
                                            </li>
                                            <li>
                                                <a href="#">Contact Us</a>
                                            </li>
                                            <li>
                                                <a href="#">About Us</a>
                                            </li>
                                            <li>
                                                <a href="#">Privacy Policy</a>
                                            </li>
                                            <li>
                                                <a href="#">Terms & Conditions</a>
                                            </li>
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
                                            <li>
                                                <a href="#">FAQs</a>
                                            </li>
                                            <li>
                                                <a href="#">Shipping</a>
                                            </li>
                                            <li>
                                                <a href="#">Returns</a>
                                            </li>
                                            <li>
                                                <a href="#">Track Order</a>
                                            </li>
                                            <li>
                                                <a href="#">Report Fraud</a>
                                            </li>
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