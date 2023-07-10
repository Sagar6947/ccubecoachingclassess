<?php
include('config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="DashForge">
    <meta name="twitter:description" content="Responsive Bootstrap 4 Dashboard Template">
    <meta name="twitter:image" content="assets/img/dashforge-social.html">

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

    <title> C cube | Our Courses </title>

    <!-- vendor css -->
    <link href="lib/%40fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="lib/typicons.font/typicons.css" rel="stylesheet">
    <link href="lib/prismjs/themes/prism-vs.css" rel="stylesheet">

    <!-- DashForge CSS -->
    <link rel="stylesheet" href="assets/css/dashforge.css">
		<link rel="stylesheet" href="assets/css/dashforge.demo.css">

  </head>
  <body class="pos-relative" data-spy="scroll" data-target="#navSection" data-offset="120">

    <?php include('header.php'); ?>
    <div class="content content-fixed bd-b">
      <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
        <div class="d-sm-flex align-items-center justify-content-between">
          <div>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                <li class="breadcrumb-item"><a href="#">C cube</a></li>
                <li class="breadcrumb-item"><a href="#">Student Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Our  Courses</li>
              </ol>
            </nav>
            <h4 class="mg-b-0">Our  Courses</h4>
          </div>
          <!--div class="search-form mg-t-20 mg-sm-t-0">
            <input type="search" class="form-control" placeholder="Search events">
            <button class="btn" type="button"><i data-feather="search"></i></button>
          </div-->
        </div>
      </div>
    </div>


    <div class="content">
      <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
          <div class="row">
                   <?php


                    $qa=mysqli_query($con,"SELECT * FROM `main_courses`   ");
                    while($r=mysqli_fetch_array($qa))
                    {
                     echo '
                     <div class="col-md-3" style="margin-bottom:10px;">
                        <div class="card card-event"  >
                          <img src="../admin/'.$r['image'].'" class="card-img-top" alt="" style="border:1px grey solid;margin:0px;">
                          <div class="card-body tx-13">
                            <h5><a href="../sub-courses.php?id='.$r['id'].'" target="_blank">'.$r['name'].'</a></h5>

                          </div>
                          <div class="card-footer tx-13">

                            <a href="../sub-courses.php?id='.$r['id'].'" class="btn btn-xs btn-secondary" target="_blank"> View Info</a>
                          </div>
                        </div>
                      </div>
                       ';
                    }

                    ?>

          </div>
        </div>
      </div>

     <?php include('footer.php'); ?>

    <script src="lib/jquery/jquery.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="lib/feather-icons/feather.min.js"></script>
    <script src="lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="lib/prismjs/prism.js"></script>

    <script src="assets/js/dashforge.js"></script>
    <script>
      $(function(){
        'use strict'

      });
    </script>
  </body>

</html>