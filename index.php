<?php 


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

 </head>
 <body>
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
 					<li><a href="#">menu</a></li>
 					<li><a href="#">cart</a></li>
 					<li><a href="#">account</a></li>
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
 						<form action="App/Core/Order.php" method="post">
	 						<div class="card" style="width: 18rem;">
							  <img class="card-img-top" src="App/Menu/Images/kwetiau.jpg" alt="Card image cap">
							  <div class="card-body">
							    <h5 class="card-title">Kwetiau Goreng</h5>
							    <h3><span class="badge badge-primary">Rp.35.000</span></h3>
							    <div class="form-check">
								  <input class="form-check-input" type="checkbox" value="">
								  <label class="form-check-label" for="defaultCheck1">Extra Seafood (+ Rp.10.000)</label>
								</div>
								<input type="submit" value="Order Now" class="btn btn-success">
								<input style="display: none;" type="text" name="nama" value="Kwetiau Goreng">
								<input style="display: none;" type="text" name="harga" value=35000>
								<input style="display: none;" type="text" name="isExtraSeafood" value="y">
								<input style="display: none;" type="text" name="tipe" value="chinese">
							    <!-- <a href="App/Core/Order.php?q=chinese" class="btn btn-success">Order Now</a> -->
							  </div>
							</div>
						</form>
 					</div>
 					<div class="col-sm">
 						<form action="App/Core/Order.php" method="post">
	 						<div class="card" style="width: 18rem;">
							  <img class="card-img-top" src="App/Menu/Images/kwetiau.jpg" alt="Card image cap">
							  <div class="card-body">
							    <h5 class="card-title">Kwetiau Goreng</h5>
							    <h3><span class="badge badge-primary">Rp.35.000</span></h3>
							    <div class="form-check">
								  <input class="form-check-input" type="checkbox" value="">
								  <label class="form-check-label" for="defaultCheck1">Extra Seafood (+ Rp.10.000)</label>
								</div>
								<input type="submit" value="Order Now" class="btn btn-success">
								<input style="display: none;" type="text" name="nama" value="Kwetiau Goreng">
								<input style="display: none;" type="text" name="harga" value=35000>
								<input style="display: none;" type="text" name="isExtraSeafood" value="n">
								<input style="display: none;" type="text" name="tipe" value="chinese">
							    <!-- <a href="App/Core/Order.php?q=chinese" class="btn btn-success">Order Now</a> -->
							  </div>
							</div>
						</form>
 					</div>
 					<div class="col-sm">
 						<form action="App/Core/Order.php" method="post">
	 						<div class="card" style="width: 18rem;">
							  <img class="card-img-top" src="App/Menu/Images/kwetiau.jpg" alt="Card image cap">
							  <div class="card-body">
							    <h5 class="card-title">Kwetiau Goreng</h5>
							    <h3><span class="badge badge-primary">Rp.35.000</span></h3>
							    <div class="form-check">
								  <input class="form-check-input" type="checkbox" value="">
								  <label class="form-check-label" for="defaultCheck1">Extra Seafood (+ Rp.10.000)</label>
								</div>
								<input type="submit" value="Order Now" class="btn btn-success">
								<input style="display: none;" type="text" name="nama" value="Kwetiau Goreng">
								<input style="display: none;" type="text" name="harga" value=35000>
								<input style="display: none;" type="text" name="isExtraSeafood" value="n">
								<input style="display: none;" type="text" name="tipe" value="chinese">
							    <!-- <a href="App/Core/Order.php?q=chinese" class="btn btn-success">Order Now</a> -->
							  </div>
							</div>
						</form>
 					</div>
 				</div>
 				<div class="row">
 					<div class="col-sm">
 						<h2>Western Main Course</h2>
 					</div>
 				</div>
 				<div class="row">
 					<div class="col-sm">
 						<form action="App/Core/Order.php" method="post">
	 						<div class="card" style="width: 18rem;">
							  <img class="card-img-top" src="App/Menu/Images/kwetiau.jpg" alt="Card image cap">
							  <div class="card-body">
							    <h5 class="card-title">Hamburger Deluxe</h5>
							    <h3><span class="badge badge-primary">Rp.35.000</span></h3>
							    <div class="form-check">
								  <input class="form-check-input" type="checkbox" value="">
								  <label class="form-check-label" for="defaultCheck1">Extra Ham (+ Rp.10.000)</label>
								</div>
								<input type="submit" value="Order Now" class="btn btn-success">
								<input style="display: none;" type="text" name="nama" value="Hamburger Deluxe">
								<input style="display: none;" type="text" name="harga" value=35000>
								<input style="display: none;" type="text" name="isExtraHam" value="n">
								<input style="display: none;" type="text" name="tipe" value="western">
							    <!-- <a href="App/Core/Order.php?q=western" class="btn btn-success">Order Now</a> -->
							  </div>
							</div>
						</form>
 					</div>
 					<div class="col-sm">
 						<form action="App/Core/Order.php" method="post">
	 						<div class="card" style="width: 18rem;">
							  <img class="card-img-top" src="App/Menu/Images/kwetiau.jpg" alt="Card image cap">
							  <div class="card-body">
							    <h5 class="card-title">Hamburger Deluxe</h5>
							    <h3><span class="badge badge-primary">Rp.35.000</span></h3>
							    <div class="form-check">
								  <input class="form-check-input" type="checkbox" value="">
								  <label class="form-check-label" for="defaultCheck1">Extra Ham (+ Rp.10.000)</label>
								</div>
								<input type="submit" value="Order Now" class="btn btn-success">
								<input style="display: none;" type="text" name="nama" value="Hamburger Deluxe">
								<input style="display: none;" type="text" name="harga" value=35000>
								<input style="display: none;" type="text" name="isExtraHam" value="n">
								<input style="display: none;" type="text" name="tipe" value="western">
							    <!-- <a href="App/Core/Order.php?q=western" class="btn btn-success">Order Now</a> -->
							  </div>
							</div>
						</form>
 					</div>
 					<div class="col-sm">
 						<form action="App/Core/Order.php" method="post">
	 						<div class="card" style="width: 18rem;">
							  <img class="card-img-top" src="App/Menu/Images/kwetiau.jpg" alt="Card image cap">
							  <div class="card-body">
							    <h5 class="card-title">Hamburger Deluxe</h5>
							    <h3><span class="badge badge-primary">Rp.35.000</span></h3>
							    <div class="form-check">
								  <input class="form-check-input" type="checkbox" value="">
								  <label class="form-check-label" for="defaultCheck1">Extra Ham (+ Rp.10.000)</label>
								</div>
								<input type="submit" value="Order Now" class="btn btn-success">
								<input style="display: none;" type="text" name="nama" value="Hamburger Deluxe">
								<input style="display: none;" type="text" name="harga" value=35000>
								<input style="display: none;" type="text" name="isExtraHam" value="n">
								<input style="display: none;" type="text" name="tipe" value="western">
							    <!-- <a href="App/Core/Order.php?q=western" class="btn btn-success">Order Now</a> -->
							  </div>
							</div>
						</form>
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