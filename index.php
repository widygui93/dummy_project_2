<?php 

require_once 'App/init.php';
use App\Db\Cart as Cart;

$cart = new Cart();

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Sunny Cafe</title>

 	<!-- CDN bootstrap 4 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	
	<link rel="stylesheet" type="text/css" href="css/style.css">
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
                                        <span>+123-456-7890</span>
                                    </li>
                                    <li>
                                        <span>mail@ecom.com</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-auto">
                                <ul class="top-nav">
                                    <!-- <li>
                                        <a href="register.html">Register</a>
                                    </li>
                                    <li>
                                        <a href="login.html">Login</a>
                                    </li> -->
                                    <li>
                                    	<a href="logout.php">Log Out</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Header -->
                    <div class="col-12 bg-white pt-4">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="site-logo text-center text-lg-left">
                                    <a href="index.php">Sunny Cafe</a>
                                </div>
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
                                        <a class="nav-link dropdown-toggle" href="#" id="user" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        	<span class="user-photo"></span>
                                        	<strong>user123</strong>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="user">
                                            <a class="dropdown-item" href="#">Profile</a>
									    	<a class="dropdown-item" href="App/Core/history.php">History</a>
                                        </div>
                                    </li>
                                </ul>
                                <a href="App/Core/cart.php" class="header-item">
                                    Cart <span class="badge badge-success"><?= $cart->getJumlahQuantity(); ?></span>
                                </a>
                                <!-- <a href="#" class="header-item"> -->
                                <span id="header-price">Rp.4,000,000</span>
                                <!-- </a> -->
                            </div>
                        </div>

                        <!-- Nav -->
                        <!-- <div class="row">
                            <nav class="navbar navbar-expand-lg navbar-light bg-white col-12">
                                <button class="navbar-toggler d-lg-none border-0" type="button" data-toggle="collapse" data-target="#mainNav">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="mainNav">
                                    <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="index.php" id="menu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Menu</a>
                                            <div class="dropdown-menu" aria-labelledby="menu">
                                                <a class="dropdown-item" href="#">Chinese</a>
                                                <a class="dropdown-item" href="#">Western</a>
                                            </div>
                                            <a href="#">Chinese</a>
                                            <a href="#">Western</a>
                                            <a href="#">Japanese</a>
                                            <a href="#">Indonesian</a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div> -->
                        <!-- Nav -->
                    </div>
                    <!-- Header -->
 				</header>
 			</div>
 			<div class="col-12">
 				<main class="row">
 					<div class="col-12 px-0">
                        <div id="slider" class="carousel slide w-100" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#slider" data-slide-to="0" class="active"></li>
                                <li data-target="#slider" data-slide-to="1"></li>
                                <li data-target="#slider" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner" role="listbox">
                                <div class="carousel-item active">
                                    <img src="App/Menu/Images/slider-1.jpg" class="slider-img">
                                </div>
                                <div class="carousel-item">
                                    <img src="App/Menu/Images/slider-2.jpg" class="slider-img">
                                </div>
                                <div class="carousel-item">
                                    <img src="App/Menu/Images/slider-3.jpg" class="slider-img">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#slider" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#slider" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
 					</div>
 					<div class="col-12">
 						<div class="row">
 							<div class="col-12 py-3">
 								<div class="row">
 									<div class="col-12 text-center text-uppercase">
                                        <h2>Chinese Main Course</h2>
                                    </div>
 								</div>
 								<div class="row">
 									<div class="col-lg-4 col-sm-6 my-3">
 										<div class="col-12 text-center h-100 product-item">
 											<div class="row h-100">
 												<div class="card">
												  <img class="card-img-top" src="App/Menu/Images/kwetiau.jpg" alt="Card image cap">
												  <div class="card-body">
												    <h5 class="card-title">Kwetiau Goreng Extra Seafood</h5>
												    <h3><span class="badge badge-primary">Rp 45.000</span></h3>
													<button type="button" class="btn btn-success order" data-toggle="modal" data-target="#quantityModal">Order Now</button>
													<input style="display: none;" type="text" name="nama" value="Kwetiau Goreng Extra Seafood">
													<input style="display: none;" type="text" name="harga" value=45000>
													<input style="display: none;" type="text" name="idMenu" value=1>
													<input style="display: none;" type="text" name="tipe" value="chinese">
													<input style="display: none;" type="text" name="quantity" value=<?= $cart->getJumlahQuantityByIdMenu(1);?>>
												  </div>
												</div>
 											</div>
 										</div>
 									</div>
 									<div class="col-lg-4 col-sm-6 my-3">
 										<div class="col-12 text-center h-100 product-item">
 											<div class="row h-100">
						 						<div class="card">
												  <img class="card-img-top" src="App/Menu/Images/kwetiau.jpg" alt="Card image cap">
												  <div class="card-body">
												    <h5 class="card-title">Kwetiau Goreng</h5>
												    <h3><span class="badge badge-primary">Rp.35.000</span></h3>
													<button type="button" class="btn btn-success order" data-toggle="modal" data-target="#quantityModal">Order Now</button>
													<input style="display: none;" type="text" name="nama" value="Kwetiau Goreng">
													<input style="display: none;" type="text" name="harga" value=35000>
													<input style="display: none;" type="text" name="idMenu" value=2>
													<input style="display: none;" type="text" name="tipe" value="chinese">
													<input style="display: none;" type="text" name="quantity" value=<?= $cart->getJumlahQuantityByIdMenu(2);?>>
												  </div>
												</div>
 											</div>
 										</div>
 									</div>
 									<div class="col-lg-4 col-sm-6 my-3">
 										<div class="col-12 text-center h-100 product-item">
 											<div class="row h-100">
 												<div class="card">
												  <img class="card-img-top" src="App/Menu/Images/kwetiau.jpg" alt="Card image cap">
												  <div class="card-body">
												    <h5 class="card-title">Bihun Goreng Extra Seafood</h5>
												    <h3><span class="badge badge-primary">Rp.45.000</span></h3>
													<button type="button" class="btn btn-success order" data-toggle="modal" data-target="#quantityModal">Order Now</button>
													<input style="display: none;" type="text" name="nama" value="Bihun Goreng Extra Seafood">
													<input style="display: none;" type="text" name="harga" value=45000>
													<input style="display: none;" type="text" name="idMenu" value=3>
													<input style="display: none;" type="text" name="tipe" value="chinese">
													<input style="display: none;" type="text" name="quantity" value=<?= $cart->getJumlahQuantityByIdMenu(3);?>>
												  </div>
												</div>
 											</div>
 										</div>
 									</div>
 								</div>
 							</div>
 						</div>
 					</div>
 					<div class="col-12">
 						<hr>
 					</div>
 					<div class="col-12">
 						<div class="row">
 							<div class="col-12 py-3">
 								<div class="row">
 									<div class="col-12 text-center text-uppercase">
                                        <h2>Western Main Course</h2>
                                    </div>
 								</div>
 								<div class="row">
 									<div class="col-lg-4 col-sm-6 my-3">
 										<div class="col-12 text-center h-100 product-item">
 											<div class="row h-100">
 												<div class="card">
												  <img class="card-img-top" src="App/Menu/Images/kwetiau.jpg" alt="Card image cap">
												  <div class="card-body">
												    <h5 class="card-title">Hamburger Deluxe Extra Ham</h5>
												    <h3><span class="badge badge-primary">Rp.45.000</span></h3>
													<button type="button" class="btn btn-success order" data-toggle="modal" data-target="#quantityModal">Order Now</button>
													<input style="display: none;" type="text" name="nama" value="Hamburger Deluxe Extra Ham">
													<input style="display: none;" type="text" name="harga" value=45000>
													<input style="display: none;" type="text" name="idMenu" value=4>
													<input style="display: none;" type="text" name="tipe" value="western">
													<input style="display: none;" type="text" name="quantity" value=<?= $cart->getJumlahQuantityByIdMenu(4);?>>
												  </div>
												</div>
 											</div>
 										</div>
 									</div>
 									<div class="col-lg-4 col-sm-6 my-3">
 										<div class="col-12 text-center h-100 product-item">
 											<div class="row h-100">
 												<div class="card">
												  <img class="card-img-top" src="App/Menu/Images/kwetiau.jpg" alt="Card image cap">
												  <div class="card-body">
												    <h5 class="card-title">Hamburger Deluxe</h5>
												    <h3><span class="badge badge-primary">Rp.35.000</span></h3>
													<button type="button" class="btn btn-success order" data-toggle="modal" data-target="#quantityModal">Order Now</button>
													<input style="display: none;" type="text" name="nama" value="Hamburger Deluxe">
													<input style="display: none;" type="text" name="harga" value=35000>
													<input style="display: none;" type="text" name="idMenu" value=5>
													<input style="display: none;" type="text" name="tipe" value="western">
													<input style="display: none;" type="text" name="quantity" value=<?= $cart->getJumlahQuantityByIdMenu(5);?>>
												  </div>
												</div>
 											</div>
 										</div>
 									</div>
 									<div class="col-lg-4 col-sm-6 my-3">
 										<div class="col-12 text-center h-100 product-item">
 											<div class="row h-100">
 												<div class="card">
												  <img class="card-img-top" src="App/Menu/Images/kwetiau.jpg" alt="Card image cap">
												  <div class="card-body">
												    <h5 class="card-title">Hotdog Deluxe Extra Cheese</h5>
												    <h3><span class="badge badge-primary">Rp.45.000</span></h3>
													<button type="button" class="btn btn-success order" data-toggle="modal" data-target="#quantityModal">Order Now</button>
													<input style="display: none;" type="text" name="nama" value="Hotdog Deluxe Extra Cheese">
													<input style="display: none;" type="text" name="harga" value=45000>
													<input style="display: none;" type="text" name="idMenu" value=6>
													<input style="display: none;" type="text" name="tipe" value="western">
													<input style="display: none;" type="text" name="quantity" value=<?= $cart->getJumlahQuantityByIdMenu(6);?>>
												  </div>
												</div>
 											</div>
 										</div>
 									</div>
 								</div>
 							</div>
 						</div>
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
                                            <a href="index.php">E-Commerce</a>
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
 	<script src="js/jquery-3.4.1.min.js"></script>
 	<script src="js/script.js"></script>
 </body>
 </html>