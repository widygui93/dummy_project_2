<?php
session_start();
date_default_timezone_set("Asia/Jakarta");

require_once '../init.php';

if ( !isset($_SESSION["admin"]) ) {
    // arahkan user balik ke login admin
    header('Location: login.php');
    exit;
}

use App\Db\Report as Report;

$report = new Report();

$totalUser = 0;

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin-User Report</title>

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
</body>
	<?php
		if( isset($_POST["search-user"]) ){
			$_GET["halaman"] = 1;
			$userReports = $report->searchBy( $_POST["username"], $_POST["register-date"]);
			if( $report->getTotalUser() === 0 ){
				echo "<script>swal('Failed!', 'Record No Found', 'error');</script>";
			} else {
				$totalUser = $report->getTotalUser();
				$totalHalaman = $report->getTotalHalaman();
				$halamanAktif = $report->getHalamanAktif();
			}
		} 

		if( !isset($_POST["search-user"]) && isset($_GET["halaman"]) ){
			$userReports = $report->searchBy( $_GET["username"], $_GET["registerdate"]);
		    $totalUser = $report->getTotalUser();
		    $totalHalaman = $report->getTotalHalaman();
			$halamanAktif = $report->getHalamanAktif();
		}
	?>
	
	<!-- <div class="container-fluid"> -->
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
				<div class="slogan-cafe">
					<div class="slogan-cafe-wrapper">
						<div class="text-center">Good Food</div>
						<div class="text-center">Good Price</div>
						<div class="text-center">Good Quality</div>
					</div>
				</div>
			</aside>
			<main class="main-admin">
				<div class="mb-3">
					<h3 class="text-center">User Report</h3>
					<hr>
					<div class="path-menu-admin">
						<span class="badge badge-pill badge-secondary">Reports</span> 
						<span> > </span> 
						<span class="badge badge-pill badge-secondary">User Report</span>
					</div>
				</div>
				<!-- start content page -->
				<div class="content-page">
					<form action="" method="post">
						<div class="form-group">
							<label for="username">Username</label>
							<input type="text" name="username" id="username" class="form-control" value="<?= $report->getUsername() ?>">
						</div>
						<div class="form-group">
							<label for="date">Tanggal Daftar</label>
							<input type="date" name="register-date" id="date" class="form-control" value="<?= $report->getRegisterDate() ?>">
						</div>
						<button type="submit" name="search-user" class="btn btn-primary mb-2">Search</button>
					</form>
					<small>Leave all blanks to view all users.</small>
				</div>
				<!-- end content page -->
				<?php if($totalUser > 0): ?>
					<div class="table-responsive">
						<table class="table table-hover table-dark">
						  <thead>
						    <tr>
						      <th scope="col">No</th>
						      <th scope="col">Profile Picture</th>
						      <th scope="col">Username</th>
						      <th scope="col">Address</th>
						      <th scope="col">Email</th>
						      <th scope="col">Phone no</th>
						      <th scope="col">Register date</th>
						    </tr>
						  </thead>
						  <tbody>
						  	<?php $no = 1; ?>
						  	<?php foreach($userReports as $userReport) : ?>
							<tr>
								<th scope="row"><?= $no; ?></th>
								<td><img src="../Core/profile-picture/<?= $userReport['profile_picture']; ?>" ></td>
								<td><?= $userReport['username']; ?></td>
								<td><?= $userReport['address']; ?></td>
								<td><?= $userReport['email']; ?></td>
								<td><?= $userReport['phone_no']; ?></td>
								<td><?= $userReport['register_date']; ?></td>
							</tr>
						  	<?php $no++; ?>
						    <?php endforeach; ?>
						  </tbody>
						</table>
					</div>
					<?php if( $totalHalaman != 0 ): ?>
					    <nav aria-label="Page navigation example">
					        <ul class="pagination justify-content-center">
					            <?php if( $halamanAktif == 1 ) : ?>
					                <li class="page-item disabled">
					                    <a class="page-link" href="#" aria-label="Previous">
					                        <span aria-hidden="true">&laquo;</span>
					                        <span class="sr-only">Previous</span>
					                    </a>
					                </li>
					            <?php else: ?>
					                <li class="page-item">
					                    <a class="page-link" href="?halaman=<?= $halamanAktif - 1; ?>&username=<?= $report->getUsername() ?>&registerdate=<?= $report->getRegisterDate() ?>" aria-label="Previous">
					                        <span aria-hidden="true">&laquo;</span>
					                        <span class="sr-only">Previous</span>
					                    </a>
					                </li>
					            <?php endif; ?>

					            <?php for( $i = 1; $i <= $totalHalaman; $i++ ) : ?>
					                <?php if( $i == $halamanAktif ) : ?>
					                    <li class="page-item active">
					                        <a class="page-link" href="?halaman=<?= $i; ?>&username=<?= $report->getUsername() ?>&registerdate=<?= $report->getRegisterDate() ?>"><?= $i; ?></a>
					                    </li>
					                <?php else : ?>
					                    <li class="page-item">
					                        <a class="page-link" href="?halaman=<?= $i; ?>&username=<?= $report->getUsername() ?>&registerdate=<?= $report->getRegisterDate() ?>"><?= $i; ?></a>
					                    </li>
					                <?php endif; ?>
					            <?php endfor; ?>

					            <?php if( $halamanAktif == $totalHalaman ) :  ?>
					                <li class="page-item disabled">
					                    <a class="page-link" href="#" aria-label="Next">
					                        <span aria-hidden="true">&raquo;</span>
					                        <span class="sr-only">Next</span>
					                    </a>
					                </li>
					            <?php else : ?>
					                <li class="page-item">
					                    <a class="page-link" href="?halaman=<?= $halamanAktif + 1; ?>&username=<?= $report->getUsername() ?>&registerdate=<?= $report->getRegisterDate() ?>" aria-label="Next">
					                        <span aria-hidden="true">&raquo;</span>
					                        <span class="sr-only">Next</span>
					                    </a>
					                </li>     
					            <?php endif; ?>
					        </ul>
					    </nav>
					<?php endif; ?>
				<?php endif; ?>
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
	                                    	<span>&#10084;</span> <!-- html entity (decimal) -->
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