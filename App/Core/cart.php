<?php 
date_default_timezone_set("Asia/Jakarta");

require_once '../init.php';

use App\Db\Cart as Cart;

$cart = new Cart();

$items = $cart->getItems();

$total = $cart->getTotalHargaItems();

// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {
	
	// cek apakah data berhasil di tambahkan atau tidak
	if( tambah($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil ditambahkan!');
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal ditambahkan!');
			</script>
		";
	}


}



function tambah($data) {
	$conn = mysqli_connect("localhost", "root", "", "dummy_project_2");
	global $total, $items;

	$tglTransfer = date("d-M-Y");
	$daftar_order_id = '';

	foreach ($items as $item) {
		$daftar_order_id = $daftar_order_id . $item["order_id"] . ",";
	}

	// upload gambar
	$gambar = upload();
	if( !$gambar ) {
		return false;
	}

	$query = "INSERT INTO transfer
				VALUES
			  ('', '$gambar', 'user123', '20100460461', '$total', '$tglTransfer', '$daftar_order_id', 'address street xxx no 12')
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}


function upload() {

	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];

	// cek apakah tidak ada gambar yang diupload
	if( $error === 4 ) {
		echo "<script>
				alert('pilih gambar terlebih dahulu!');
			  </script>";
		return false;
	}

	// cek apakah yang diupload adalah gambar
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
		echo "<script>
				alert('yang anda upload bukan gambar!');
			  </script>";
		return false;
	}

	// cek jika ukurannya terlalu besar
	if( $ukuranFile > 1000000 ) {
		echo "<script>
				alert('ukuran gambar terlalu besar!');
			  </script>";
		return false;
	}

	// lolos pengecekan, gambar siap diupload
	// generate nama gambar baru
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	move_uploaded_file($tmpName, 'img-transfer/' . $namaFileBaru);

	return $namaFileBaru;
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
 						<span class="badge badge-success"><?= $cart->getJumlahItems(); ?></span>
 					</li>
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
 							<form action="" method="post" enctype="multipart/form-data">
							  <div class="form-group">
							    <label for="norek">Please attach Transfer receipt below to account number <strong>12345678 (XXX)</strong>  Bank ABC for delivery order to <strong>address street xxx no 12.</strong> </label>
							  </div>
							  <div class="form-group">
							    <input type="file" name="gambar">
							    <button type="submit" name="submit" class="btn btn-primary">Pay</button>
							  </div>
							</form>
 						</div>
 					</div>
 				</div>
 			</div>
 		</div>
 	</div>
 </body>
 </html>