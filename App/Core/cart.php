<?php 

require_once '../init.php';

use App\Db\Cart as Cart;

$cart = new Cart();

$items = $cart->getItems();

$total = 0;

foreach($items as $item){
	$total = $item["total_harga_menu"] + $total;
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
 					<li><a href="cart.php">cart</a></li>
 					<li><a href="">account</a></li>
 				</ul>
 			</div>
 			<div class="col-10">
 				<div class="container-fluid">
 					<div class="row">
 						<div class="col-sm">
 							<h2>Daftar Orderan</h2>
 						</div>
 					</div>
 					<div class="row">
 						<div class="col-sm">
 							<table border="1" cellpadding="10" cellspacing="0">
 								<tr>
 									<th>No</th>
 									<th>Menu</th>
 									<th>Harga</th>
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
 									</tr>
 									<?php $no++; ?>
                        		<?php endforeach; ?>
                        		<tr>
                        			<td colspan="3"> 
										<strong> Total : Rp <?= $total; ?></strong>
                        			</td>
                        		</tr>
 							</table>
 						</div>
 					</div>
 				</div>
 			</div>
 		</div>
 	</div>
 </body>
 </html>