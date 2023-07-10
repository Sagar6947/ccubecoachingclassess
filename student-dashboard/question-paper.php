<?php
include('config.php');
header('Content-Type: text/html; charset=utf-8');

$id = $_GET['id'];
$ques = mysqli_query($con, "SELECT * FROM `test_series` WHERE `id` ='" . $id . "' ");
$head = mysqli_fetch_array($ques);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="DashForge">
    <meta name="twitter:description" content="Responsive Bootstrap 4 Dashboard Template">
    <meta name="twitter:image" content="assets/img/dashforge-social.html">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/dashforge">
    <meta property="og:title" content="DashForge">
    <meta property="og:description" content="Responsive Bootstrap 4 Dashboard Template">

    <meta property="og:image" content="assets/img/dashforge-social.html">
    <meta property="og:image:secure_url" content="assets/img/dashforge-social.html">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Responsive Bootstrap 4 Dashboard Template">
    <meta name="author" content="ThemePixels">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

    <title>C cube | Exam Start</title>

    <!-- vendor css -->
    <link href="lib/%40fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">

    <!-- DashForge CSS -->
    <link rel="stylesheet" href="assets/css/dashforge.css">
    <link rel="stylesheet" href="assets/css/dashforge.dashboard.css">
    <style>
        li {
            list-style: none !important;
        }
    </style>
</head>

<body class="page-profile">

    <?php include('test-header.php'); ?>

    <div class="content content-fixed">
        <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
            <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-30">
                <div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Question Paper:</li>
                        </ol>
                    </nav>

                </div>

            </div>

            <div class="row row-xs">

                <div class="col-lg-12 mg-t-12 mg-lg-t-0">
                    <div class="row row-xs">

                        <div class="col-12 col-md-6 col-lg-12">
                            <h4 class="mg-b-0 pl-5 pb-3 tx-spacing--1"><?= $head['examtitle'] ?> Question Paper </h4>
                            <ol>

                                <?php
                                $i = 0;

                                $qs = mysqli_query($con, "SELECT * FROM `test_questions` WHERE `test_series_id`='" . $id . "' ");
                                while ($r = mysqli_fetch_array($qs)) {
                                    $i =  $i + 1;
                                ?>
                                    <div class="card card-body">

                                        <li> <span><?= $i ?></span> <?= strip_tags($r['question']) ?></li>

                                    </div>
                                <?php
                                }

                                ?>
                            </ol>
                        </div>
                    </div><!-- row -->
                </div><!-- col -->
            </div><!-- row -->
        </div><!-- container -->
    </div><!-- content -->



    <?php include('footer.php'); ?>

    <script src="lib/jquery/jquery.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="lib/feather-icons/feather.min.js"></script>
    <script src="lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>


</body>

</html>