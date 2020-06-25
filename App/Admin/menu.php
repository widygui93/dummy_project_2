<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin-Menu</title>

	<!-- CDN bootstrap 4 -->
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="../../css/style.css">

    <!-- CDN sweetalert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <style type="text/css">
    	.header { grid-area: header; }
    	.menu { grid-area: menu; }
    	.main { grid-area: main; }
    	.footer { grid-area: footer; }

		.grid-container {
			display: grid;
			grid-template-areas: 
				'header header header header header header'
				'menu main main main main main'
				'menu footer footer footer footer footer';
			grid-gap: 10px;
		}

		@media screen and (max-width: 900px) {
			.grid-container {
				grid-template-areas:
					'header header header header header header'
					'menu menu menu menu menu menu'
					'main main main main main main'
					'footer footer footer footer footer footer'
				;
			}
		}

    </style>
</head>
<body>
	
	<div class="container-fluid">
		<div class="grid-container">
			<div class="header">
				<!-- Topbar Start -->
				<div class="row min-vh-100">
					<div class="col-12">
						<div class="row">
		                     <div class="col-12 bg-dark py-2 d-md-block">
		                        <div class="row">
		                            <div class="col-auto mr-auto">
		                                <ul class="top-nav">
		                                    <li>
		                                        <img src="../Core/svg/smartphone-white-18dp.svg" alt="icon phone">
		                                        <span>+123-456-7890</span>
		                                    </li>
		                                    <li>
		                                    	<img src="../Core/svg/mail-white-18dp.svg" alt="icon mail">
		                                        <span>mail@ecom.com</span>
		                                    </li>
		                                </ul>
		                            </div>
		                            <div class="col-auto">
		                                <ul class="top-nav">
		                            		<li>
		                            			<a href="logout.php">Log Out</a>
		                            		</li>
		                                </ul>
		                            </div>
		                        </div>
		                    </div>
						</div>
					</div>
				</div>
				<!-- end Topbar -->
			</div>
			<div class="menu">
				<!-- <div class="row"> -->
				    <nav class="navbar navbar-expand-lg navbar-light bg-light col-12">
				        <button class="navbar-toggler d-lg-none border-0" type="button" data-toggle="collapse" data-target="#mainNav">
				            <span class="navbar-toggler-icon"></span>
				        </button>
				        <div class="collapse navbar-collapse" id="mainNav">
				            <ul class="nav flex-column navbar-nav mx-auto mt-2 mt-lg-0">
				            	<li class="nav-item">
				                    <strong>Menu Admin</strong>
				                </li>
				                <li class="nav-item">
				                    <a class="nav-link" href="../../index.php">Sunny Cafe <span class="sr-only">(current)</span></a>
				                </li>
				                <li class="nav-item dropdown">
				                    <a class="nav-link dropdown-toggle" href="#" id="products" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Products</a>
				                    <div class="dropdown-menu" aria-labelledby="products">
				                        <a class="dropdown-item" href="TipeMenu.php">Tipe Menu</a>
				                        <a class="dropdown-item" href="menu.php">Menu</a>
				                    </div>
				                </li>
				                <li class="nav-item dropdown">
				                    <a class="nav-link dropdown-toggle" href="#" id="reports" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Report</a>
				                    <div class="dropdown-menu" aria-labelledby="reports">
				                        <a class="dropdown-item" href="#">Transaction Report</a>
				                    </div>
				                </li>
				            </ul>
				        </div>
				    </nav>
				<!-- </div> -->
			</div>
			<div class="main">
				<!-- start content page -->
				<div class="content-page">
					<form action="" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label for="tipe-menu">Tipe Menu</label>
							<select id="tipe-menu" name="tipe-menu">
								<option value="Chinese">Chinese</option>
								<option value="Western">Western</option>
								<option value="Japanese">Japanese</option>
								<option value="Indonesian">Indonesian</option>
							</select>
						</div>
						<div class="form-group">
							<label for="nama-menu">Nama Menu</label>
							<input type="text" name="nama-menu" id="nama-menu" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="harga-menu">Harga</label>
							<input type="text" name="harga-menu" id="harga-menu" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="gambar-menu">Gambar</label>
							<input type="file" name="gambar-menu" id="gambar-menu" class="form-control" required>
						</div>
						<button type="submit" name="submit" class="btn btn-primary">Add</button>
					</form>
					<div class="table-responsive">
						<table class="table table-hover table-dark">
						  <thead>
						    <tr>
						      <th scope="col">No</th>
						      <th scope="col">Tipe Menu</th>
						      <th scope="col">Nama Menu</th>
						      <th scope="col">Harga</th>
						      <th scope="col">Gambar</th>
						    </tr>
						  </thead>
						  <tbody>
						    <tr>
						      <th scope="row">1</th>
						      <td>Chinese</td>
						      <td>Bihun Goreng</td>
						      <td>Rp.35.0000</td>
						      <td><img src="#"></td>
						    </tr>
						    <tr>
						      <th scope="row">2</th>
						      <td>Japanese</td>
						      <td>Sushi Roll</td>
						      <td>Rp.50.000</td>
						      <td><img src="#"></td>
						    </tr>
						    <tr>
						      <th scope="row">3</th>
						      <td>Indonesian</td>
						      <td>Nasi Goreng</td>
						      <td>Rp.45.000</td>
						      <td><img src="#"></td>
						    </tr>
						  </tbody>
						</table>
					</div>
				</div>
				<!-- end content page -->
			</div>
			<div class="footer">
				<div class="col-12 align-self-end">
	 				<footer class="row">
	 					<div class="col-12 bg-dark text-white pb-3 pt-3 mb-3">
	 						<div class="row">
	 							<div class="col-lg-6 col-sm-6 text-center text-sm-left">
	                                <div class="row">
	                                    <div class="col-12">
	                                        <div class="footer-logo">
	                                            <img src="../Core/svg/wb_sunny-white-18dp.svg" alt="sunny">
	                                            <strong>Sunny Cafe</strong>
	                                            <img src="../Core/svg/wb_sunny-white-18dp.svg" alt="sunny">
	                                        </div>
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="col-lg-6 col-sm-6 text-center text-sm-right">
	                                <div class="row">
	                                    <div class="col-12">
	                                        <a href="https://github.com/widygui93"><img src="../Core/svg/github-white.svg" alt="github"></a>
	                                        <a href="https://www.facebook.com"><img src="../Core/svg/facebook-white.svg" alt="facebook"></a>
	                                        <a href="https://www.instagram.com/widygui/"><img src="../Core/svg/instagram-white.svg" alt="instagram"></a>
	                                        <img src="../Core/svg/code-white.svg" alt="code" data-toggle="tooltip" data-placement="bottom" title="created by midymidy">
	                                    </div>
	                                </div>
	                            </div>
	 						</div>
	 					</div>
	 				</footer>
 				</div>
			</div>
		</div>
	</div>
	
	
</body>
</html>