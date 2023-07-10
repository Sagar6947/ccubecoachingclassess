<?php
include 'config.php';
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
                    <h1>PDF</h1>
                    <!--<ul class="breadcrumb">-->
                    <!--    <li><a href="#"><i class="fas fa-home"></i>C cube</a></li>-->
                    <!--    <li><a href="#">Courses</a></li>-->

                    <!--</ul>-->
                </div>
            </div>
        </div>
    </div>
    <div class="popular-courses default-padding bottom-less without-carousel">
        <div class="container">

            <div class="row ">
                <div class="popular-courses-items" style="text-align:center;">
                    <?php
                    $b = mysqli_query($con, "select * from `pdf_category`  ");
                    while ($a = mysqli_fetch_array($b)) {
                    ?>
                        <div class="col-md-4 col-sm-4 equal-height">
                            <div class="item">
                                <div class="thumb ">
                                    <div class="price"><a href="#"><br>
                                            <h3><?= $a['name'] ?></h3><br>
                                            <h3>Rs. <?= $a['price'] ?> </h3>
                                        </a></div>
                                </div>

                                <div class="info" style="text-align:center">
                                    <div style="background-color: white;padding: 5px 4px;">


                                        <!--<a href="daily_free_pdf.php?id=<?= $a['id'] ?>&year=2021" class="btn btn-warning mt-1"></i>View all Daily PDF [2021]</a>-->
                                        <a <?= ((isset($_SESSION['stud_id'])) ? 'href="checkout.php?id=' . $a['id'] . '&tag=pdf"  class="btn btn-warning mt-1"' : 'class="btn btn-warning popup-with-form" href="#login-form"') ?> class="btn btn-warning mt-1"></i>View all Daily PDF </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <div class="popular-courses default-padding bottom-less without-carousel" style="display:none">
        <div class="container">
            <div class="row">
                <div class="popular-courses-items">
                    <?php
                    $q = mysqli_query($con, "SELECT * FROM `free_pdf` order by id desc limit 3 ");
                    while ($r = mysqli_fetch_array($q)) {
                        echo '
                     <div class="col-md-3 col-sm-6 equal-height">
                         <div class="item">
                             <div class="thumb ">
                                 <a href="#">
                                     <img src="images/pdf.png" alt="' . $r['title'] . '" >
                                 </a>
                                 <div class="price"><a href="#">' . $r['title'] . '</a></div>
                             </div>

                             <div class="info" style="text-align:center">
                             <div style="background-color: white;padding: 5px 4px;">
                             <p>Uploaded on ' . date_format(date_create($r['date']), 'd/m/Y') . '</p>
                                <a href="admin/' . $r['file_name'] . '" class="btn btn-warning"></i>Download Now</a></div>
							 </div>

                             </div>
                         </div>

                    ';
                    }
                    ?>
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