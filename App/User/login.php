<?php 
session_start();
date_default_timezone_set("Asia/Jakarta");

require_once '../init.php';

if( isset($_SESSION["admin"]) ) {
	//arahkan balik ke admin.php
	header('Location: admin.php');
	exit;
}

// use App\Db\Profile as Profile;

// $profile = new Profile();

// if( isset($_POST["login"]) ) {

// 	if( $profile->login($_POST)){

// 			$_SESSION["login"] = true;
// 			$_SESSION["username"] = $_POST["username"];

// 			header('Location: ../../index.php');
// 			exit;
// 		}

// 	$error = true;

    

// }



?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>

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
		if( isset($error) ){
			echo "
				<script>
					swal({
					  icon: 'error',
					  title: 'Oops...',
					  text: 'Username/password is incorrect',
					  type: 'error'
					})
				</script>
			";
		}
	?>
 	<div class="container-fluid">
 		<div class="row">
 			<div class="col-12">
 				<div class="container main-content">
 					<div class="row">
 						<div class="col-12 mt-3 text-center text-uppercase">
 							<h2>Login</h2>
 						</div>
 					</div>
 					<div class="row">
 						<div class="col-lg-4 col-md-6 col-sm-8 mx-auto bg-white py-3 mb-4">
 							<div class="row">
 								<div class="col-12">
 									<form action="" method="post">
 										<div class="form-group">
 											<label for="username">Username</label>
 											<input type="text" name="username" id="username" class="form-control" required>
 										</div>
 										<div class="form-group">
 											<labe for="password">Password</label>
 											<input type="password" name="password" id="password" class="form-control" required></input>
 										</div>
 										<div class="form-group">
 											<button type="submit" name="login" class="btn btn-outline-dark">Login</button>
 										</div>
 									</form>
 								</div>
 							</div>
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