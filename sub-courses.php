<?php
include 'config.php';
$qs = mysqli_query($con, "SELECT * FROM `main_courses` WHERE `id` = '" . $_GET['id'] . "' ");
$rs = mysqli_fetch_array($qs);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Examin - Education and LMS Template">
    <title>Courses Packages || C cube </title>
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
                    <h1>Courses Packages</h1>
                    <!--<ul class="breadcrumb">-->
                    <!--    <li><a href="#"><i class="fas fa-home"></i>C cube</a></li>-->
                    <!--    <li><a href="#">Courses Packages</a></li>-->
                    <!--</ul>-->
                </div>
            </div>
        </div>
    </div>
    <div class="popular-courses default-padding bottom-less without-carousel">
        <div class="container">
            <div class="row">
                <!-- <div class="title col-md-12">
                    <h3><b> Test Series will be available after Subscription</b></h3><br>
                </div> -->
                <div class="popular-courses-items">
                    <?php
                    $b = mysqli_query($con, "SELECT * FROM `courses`  WHERE `main_course`= '" . $_GET['id'] . "' ");
                    while ($a = mysqli_fetch_array($b)) {
                        $b1 = mysqli_query($con, "SELECT * FROM `course_package`  WHERE `id`= '" . $a['name'] . "' ORDER BY `id` ASC");
                        $a1 = mysqli_fetch_array($b1);
                        echo '
                     <div class="col-md-4 col-sm-6 equal-height">
                         <div class="item">
                             <div class="thumb ">
                                 <a href="checkout.php?id=' . $a['id'] . '">
                                 <img src="' . ((file_exists('admin/' . $a['image'])) ? 'admin/' . $a['image'] : 'assets/img/logo.png') . '"  alt="' . $a['name'] . '" />
                                 </a>
                                 <div class="price"><a href="checkout.php?id=' . $a['id'] . '">' . $rs['name'] . ' -   ' . $a1['name'] . '</a></div>
                             </div>
                             <div class="info" style="text-align:center">
                             <div style="background-color: white;padding: 5px 4px;">
                             <h4>' . $a1['description'] . '</h4><div style="padding:5px;"></div>
                              <button class="btn btn-info">₹ ' . $a['price'] . ' /-</button>
                                <a href="checkout.php?id=' . $a['id'] . '" class="btn btn-warning"></i>Enroll Now</a></div>
							 </div>
                             </div>
                         </div>
                    ';
                    }
                    ?>
                </div>
                <div class="title col-md-12 text-center">
                    <hr style="background:black"><br>
                    <h3>Course Description</h3>
                    <p>
                        <?= $rs['description']; ?>
                    </p>
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