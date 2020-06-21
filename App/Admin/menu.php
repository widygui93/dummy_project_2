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
				'footer footer footer footer footer footer';
			grid-gap: 10px;
		}

    </style>
</head>
<body>
	
	<!-- <div class="navbar-custom topnav-navbar topnav-navbar-dark"> -->
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
				<!-- start left sidebar -->
				<div class="left-side-menu left-side-menu-detached mm-active">
					<div class="leftbar-user">
						<span>Menu Admin</span>
					</div>
					<ul class="metismenu side-nav mm-show">
						<li class="side-nav-title side-nav-item">
							<a href="../../index.php">Sunny Cafe App</a>
						</li>
						<li class="side-nav-item">
							<a href="#"><span>Products</span></a>
							<ul class="side-nav-second-level mm-collapse mm-show">
								<li class="mm-active"><a href="TipeMenu.php" class="active">Tipe Menu</a></li>
								<li><a href="menu.php">Menu</a></li>
							</ul>
						</li>
						<li class="side-nav-item">
							<a href="#"><span>Report</span></a>
							<ul class="side-nav-second-level mm-collapse mm-show">
								<li class="mm-active"><a href="#">Transaction Report</a></li>
							</ul>
						</li>
					</ul>
				</div>
				<!-- end left sidebar -->
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
					</form>
				</div>
				<!-- end content page -->
			</div>
			<div class="footer">
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
	</div>
	
	<!-- </div> -->
	
	
</body>
</html>