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
</head>
<body>
	
	<!-- <div class="container-fluid" style=""> -->
		<div class="grid-container">
			<header class="header-admin">
				<!-- Topbar Start -->
				<div class="row min-vh-100">
					<div class="col-12">
						<div class="row">
		                     <div class="col-12 bg-dark py-2 d-md-block">
		                        <div class="row">
		                            <div class="col-auto mr-auto">
		                                <ul class="top-nav">
		                                	<li>
		                                		<div class="menu-btn">
		                                		    <div class="menu-btn__burger"></div>
		                                		 </div>
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
			</header>
			<aside class="menu-admin">
				<nav>
					<ul>
						<li class="mt-2">
							<span class="site-logo">Sunny Cafe</span>
							<hr>
						</li>
						<li>
							<strong>Menu Admin</strong>
						</li>
						<li>
							<a 
								href="../../index.php" 
								class="nav-link dropdown-toggle"
							>
								<img src="../Core/svg/home-black-18dp.svg" alt="sunny cafe">
								Sunny Cafe
							</a>
						</li>
						<li>
							<a 
								class="nav-link dropdown-toggle" 
								href="#collapseProducts" 
								data-toggle="collapse"
								aria-controls="collapseProducts"
							>
								<img src="../Core/svg/menu_book-black-18dp.svg" alt="menu book">
								Menu Book
							</a>
							<div class="collapse" id="collapseProducts">
								<a href="TipeMenu.php" class="dropdown-item">Tipe Menu</a>
								<a href="menu.php" class="dropdown-item">Menu</a>
							</div>
						</li>
						<li>
							<a 
								class="nav-link dropdown-toggle" 
								href="#collapseReports" 
								data-toggle="collapse"
								aria-controls="collapseReports"
							>
								<img src="../Core/svg/content_paste-black-18dp.svg" alt="reports">
								Reports
							</a>
							<div class="collapse" id="collapseReports">
								<a href="UserReport.php" class="dropdown-item">User Report</a>
								<a href="TransReport.php" class="dropdown-item">Transaction Report</a>
							</div>
						</li>
					</ul>
				</nav>
			</aside>
			<main class="main-admin">
				<div class="mb-3">
					<h3 class="text-center">Menu</h3>
					<hr>
					<div class="path-menu-admin">
						<span class="badge badge-pill badge-secondary">Menu Book</span> 
						<span> > </span> 
						<span class="badge badge-pill badge-secondary">Menu</span>
					</div>
				</div>
				<!-- start content page -->
				<div class="content-page">
					<form action="" method="post" enctype="multipart/form-data">
						<div class="form-group input-group">
							<div class="input-group-prepend">
								<label class="input-group-text" for="tipe-menu">Tipe Menu</label>
							</div>
							<select class="custom-select" id="tipe-menu" name="tipe-menu">
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
						<button type="submit" name="submit" class="btn btn-primary mb-2">Add</button>
					</form>
				</div>
				<!-- end content page -->
				<div class="table-responsive">
					<table class="table table-hover table-dark">
					  <thead>
					    <tr>
					      <th scope="col">No</th>
					      <th scope="col">Tipe Menu</th>
					      <th scope="col">Nama Menu</th>
					      <th scope="col">Harga</th>
					      <th scope="col">Gambar</th>
					      <th scope="col">Aksi</th>
					    </tr>
					  </thead>
					  <tbody>
					    <tr>
					      <th scope="row">1</th>
					      <td>Chinese</td>
					      <td>Bihun Goreng</td>
					      <td>Rp.35.0000</td>
					      <td><img src="#"></td>
					      <td>
					      	<a href="#">Edit</a>
					      	<a href="#">Delete</a>
					      </td>
					    </tr>
					    <tr>
					      <th scope="row">2</th>
					      <td>Japanese</td>
					      <td>Sushi Roll</td>
					      <td>Rp.50.000</td>
					      <td><img src="#"></td>
					      <td>
					      	<a href="#">Edit</a>
					      	<a href="#">Delete</a>
					      </td>
					    </tr>
					    <tr>
					      <th scope="row">3</th>
					      <td>Indonesian</td>
					      <td>Nasi Goreng</td>
					      <td>Rp.45.000</td>
					      <td><img src="#"></td>
					      <td>
					      	<a href="#">Edit</a>
					      	<a href="#">Delete</a>
					      </td>
					    </tr>
					    <tr>
					      <th scope="row">3</th>
					      <td>Indonesian</td>
					      <td>Nasi Goreng</td>
					      <td>Rp.45.000</td>
					      <td><img src="#"></td>
					      <td>
					      	<a href="#">Edit</a>
					      	<a href="#">Delete</a>
					      </td>
					    </tr>
					  </tbody>
					</table>
				</div>
			</main>
			<footer class="footer-admin">
				<div class="col-12 align-self-end">
	 				<div class="row">
	 					<div class="col-12 bg-dark text-white pb-3 pt-3 mb-3">
	 						<div class="row wrapper-footer-admin">
	 							<div class="col-lg-6 col-sm-6 text-center text-sm-left">
	                                <div class="row">
	                                    <div class="col-12">
	                                        <div class="footer-logo">
	                                            <strong>Tinker Studio</strong>
	                                            <p><small>Enhancing Your Business</small></p>
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
	 				</div>
 				</div>
			</footer>
		</div>
	<!-- </div> -->
	<script src="../../js/jquery-3.4.1.min.js"></script>
 	<script src="../../js/script.js"></script>
	
</body>
</html>