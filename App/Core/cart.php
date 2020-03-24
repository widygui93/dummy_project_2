<?php 
date_default_timezone_set("Asia/Jakarta");

require_once '../init.php';

use App\Db\Cart as Cart;

$cart = new Cart();

if( isset($_POST["delete"]) ){
	if( $cart->removeItem($_POST) < 0 ){
		echo "
	        <script>
	            alert('data gagal dihapus');
	        </script>
	    ";
	}
}

$items = $cart->getItems();
$total = $cart->getTotalHargaItems();
$jlhItems = $cart->getJumlahItems();

$showResult = false;

// cek apakah tombol pay sudah ditekan atau belum
if( isset($_POST["submit"]) ) {
	
	// cek apakah data berhasil di tambahkan atau tidak
	if( $cart->doPayment($_POST) > 0 ) {

		$showResult = true;
		$isPaySuccess = true;

		$items = [];
		$total = 0;
		$jlhItems = 0;

	} else {

		$showResult = true;
		$isPaySuccess = false;
	}
}





 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Cart</title>
 	<!-- CDN bootstrap 4 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	
	<link rel="stylesheet" type="text/css" href="../../css/style.css">
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
 					<li><a href="../../index.php">menu</a></li>
 					<li>
 						<a href="cart.php">cart</a>
 						<span class="badge badge-success"><?= $jlhItems; ?></span>
 					</li>
 					<li>
						<a href="#">account</a>
 						<ul>
 							<li><a href="#">profile</a></li>
 							<li><a href="history.php">history</a></li>
 						</ul>
 					</li>
 				</ul>
 			</div>
 			<div class="col-10">
 				<div class="container-fluid">
 					<div class="row">
 						<div class="col-sm">
 							<h2>Order List</h2>
 						</div>
 					</div>
 					<div class="row">
 						<div class="col-sm">
 							<?php if($total != 0): ?>
	 							<table border="1" cellpadding="10" cellspacing="0">
	 								<tr>
	 									<th>No</th>
	 									<th>Menu</th>
	 									<th>Price</th>
	 									<th>Action</th>
	 								</tr>
	 								<?php $no = 1; ?>
	 								<?php foreach( $items as $item ) : ?>
	 									<tr>
	 										<td><?= $no; ?></td>
	 										<td>
												<?php
	 												if($item["harga_item_tambahan"] == 0){
	 													echo $item["nama_menu"];
	 												} else {
	 													echo $item["nama_menu"] . " extra " . $item["item_tambahan"] . " (+ Rp" . $item["harga_item_tambahan"] . ")";
	 												}
	 											?>
	 										</td>
	 										<td><?= $item["total_harga_menu"]; ?></td>
	 										<td>
	 											<form action="" method="post">
	 												<input style="display: none;" type="text" name="order_id" value=<?= $item["order_id"]; ?> >
		 											<button type="submit" name="delete" class="btn btn-warning" onclick="return confirm('are you sure?');">Delete</button>
	 											</form>
	 										</td>
	 									</tr>
	 									<?php $no++; ?>
	                        		<?php endforeach; ?>
	                        		<tr>
	                        			<td colspan="4"> 
											<strong> Total : Rp <?= $total; ?></strong>
	                        			</td>
	                        		</tr>
	 							</table>
	 							<form action="" method="post" enctype="multipart/form-data">
								  <div class="form-group">
								    <label for="norek">Please attach Transfer receipt below to account number <strong>12345678 (XXX)</strong>  Bank ABC </label>
								  </div>
								  <div class="form-group">
								    <label>
								    	<p>For delivery order to <strong>address street xxx no 12.</strong></p>
								    </label>
								  </div>
								  <div class="form-group">
								    <input type="file" name="gambar">
								    <button type="submit" name="submit" class="btn btn-primary">Pay</button>
								  </div>
								</form>
							<?php endif; ?>

							<?php if($showResult): ?>
								<?php if($isPaySuccess): ?>
									<div class="alert alert-success" role="alert"><h3>Payment success!</h3></div>
								<?php else: ?>
									<div class="alert alert-danger" role="alert"><h3>Payment failed!</h3></div>
								<?php endif; ?>
							<?php elseif($showResult == false && $total == 0): ?>
								<div class="alert alert-primary" role="alert"><h3>You don't have any order yet. Please go to menu to order.</h3></div>
							<?php endif; ?>
							
 						</div>
 					</div>
 				</div>
 			</div>
 		</div>
 	</div>
 	<script src="../../js/jquery-3.4.1.min.js"></script>
 	<script src="../../js/script.js"></script>
 </body>
 </html>