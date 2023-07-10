<?php
include 'config.php';
if (isset($_GET['id'])) {
	$id = $_GET['id'];
}
$q = mysqli_query($con, "SELECT * FROM `courses` WHERE id='$id' ");
$r = mysqli_fetch_array($q);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Examin - Education and LMS Template">
	<title>All Courses || C cube </title>
	<link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
	<link href="assets/css/font-awesome.min.css" rel="stylesheet" />
	<link href="assets/css/flaticon-set.css" rel="stylesheet" />
	<link href="assets/css/magnific-popup.css" rel="stylesheet" />
	<link href="assets/css/owl.carousel.min.css" rel="stylesheet" />
	<link href="assets/css/owl.theme.default.min.css" rel="stylesheet" />
	<link href="assets/css/animate.css" rel="stylesheet" />
	<link href="assets/css/bootsnav.css" rel="stylesheet" />
	<link href="style.css" rel="stylesheet">
	<link href="assets/css/responsive.css" rel="stylesheet" />
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700,800" rel="stylesheet">
	<?php include_once("analyticstracking.php") ?>
</head>

<body>
	<?php include('header.php'); ?>
	<div class="breadcrumb-area shadow dark text-center bg-fixed text-light" style="background-image: url(assets/img/banner/44.jpg);">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1><?= $r['name']; ?></h1>
					<ul class="breadcrumb">
						<li><a href="#"><i class="fas fa-home"></i>C cube</a></li>
						<li><a href="all-courses.php">Courses</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="blog-area full-blog right-sidebar single-blog full-blog default-padding">
		<div class="container">
			<div class="row">
				<div class="blog-items">
					<div class="blog-content col-md-8">
						<div class="item-box">
							<div class="item">
								<div class="info">
									<h3>
										C cube
									</h3>
									<h4>
										<?php echo $r['name'];  ?>
									</h4>
								</div>
								<img src="admin/<?php echo $r['image'];  ?> " alt="<?php echo $r['title'];  ?>" style="width:60%; height:20%;">
								<br><br>

								<p>
									<?php echo $r['description']; ?>
								</p>
								<div class="top-bar-area ">
									<div class=" user-login">
										<a href="checkout.php?id=<?= $_GET['id'] ?>" ></i><span style="color:black;">Enroll Now for <?php echo $r['name'];  ?></span></a>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="sidebar col-md-4">
						<aside>
							<div class="sidebar-item recent-post ">
								<div class="top-bar-area ">
									<div class=" user-login">
										<a href="checkout.php?id=<?= $_GET['id'] ?>" style="width:100%;text-align:center"></i>Enroll Now for <?php echo $r['name'];  ?></a>
									</div>
								</div>
							</div>
							<div class="sidebar-item recent-post">
								<div class="title">
									<h4>All Courses</h4>
								</div>
								<?php
								$q = mysqli_query($con, "SELECT * FROM `courses` order by id desc limit 5 ");
								while ($rr = mysqli_fetch_array($q)) {
									echo '
											<div class="item">
											<a href="course-details.php?id= ' . $rr['id'] . '"  >
											<div class="content">
											<div class="thumb">

												<img src="admin/' . $rr['image'] . '" alt="' . $rr['name'] . '"  >

											</div>
' . $rr['name'] . '
											</div></a>
											</div>
											';
								}
								?>


							</div>
						</aside>
					</div>
				</div>
			</div>
		</div>
	</div>


	<?php include('footer.php'); ?>
	<script src="assets/js/jquery-1.12.4.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/equal-height.min.js"></script>
	<script src="assets/js/jquery.appear.js"></script>
	<script src="assets/js/jquery.easing.min.js"></script>
	<script src="assets/js/jquery.magnific-popup.min.js"></script>
	<script src="assets/js/modernizr.custom.13711.js"></script>
	<script src="assets/js/owl.carousel.min.js"></script>
	<script src="assets/js/wow.min.js"></script>
	<script src="assets/js/isotope.pkgd.min.js"></script>
	<script src="assets/js/imagesloaded.pkgd.min.js"></script>
	<script src="assets/js/count-to.js"></script>
	<script src="assets/js/bootsnav.js"></script>
	<script src="assets/js/main.js"></script>

</body>

</html>