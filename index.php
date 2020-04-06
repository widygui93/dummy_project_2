<?php 

require_once 'App/init.php';
use App\Db\Cart as Cart;

$cart = new Cart();

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Portal</title>

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
 		<div class="row">
 			<div class="col">
 				<h1>Your Brand</h1>
 			</div>
 		</div>
 		<div class="row">
 			<div class="col-2">
 				<strong>dashboard</strong>
 				<ul>
 					<li><a href="index.php">menu</a></li>
 					<li>
 						<a href="App/Core/cart.php">cart</a>
						<span class="badge badge-success"><?= $cart->getJumlahQuantity(); ?></span>
 					</li>
 					<li>
 						<a href="#">account</a>
 						<ul>
 							<li><a href="#">profile</a></li>
 							<li><a href="App/Core/history.php">history</a></li>
 						</ul>
 					</li>
 				</ul>
 			</div>
 			<div class="col-10">
 				<div class="container-fluid">
	 				<div class="row">
	 					<div class="col-sm">
	 						<h2>Chinese Main Course</h2>
	 					</div>
	 				</div>
	 				<div class="row">
	 					<div class="col-sm">
	 						<div class="card" style="width: 18rem;">
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
	 					<div class="col-sm">
	 						<div class="card" style="width: 18rem;">
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
	 					<div class="col-sm">
	 						<div class="card" style="width: 18rem;">
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
	 				<div class="row">
	 					<div class="col-sm">
	 						<h2>Western Main Course</h2>
	 					</div>
	 				</div>
	 				<div class="row">
	 					<div class="col-sm">
	 						<div class="card" style="width: 18rem;">
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
	 					<div class="col-sm">
	 						<div class="card" style="width: 18rem;">
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
	 					<div class="col-sm">
	 						<div class="card" style="width: 18rem;">
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
 	<script src="js/jquery-3.4.1.min.js"></script>
 	<script src="js/script.js"></script>
 </body>
 </html>