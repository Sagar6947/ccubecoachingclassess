<?php
include('config.php');
$rf1 = "SELECT * FROM `candidate_subscribe` WHERE `stu_id`='" . $id . "' AND `status` = 'OLD' ORDER BY `id` DESC";
//   echo $rf;
$b1 = mysqli_query($con, $rf1);
while ($a1 = mysqli_fetch_array($b1)) {
  $exp =  date("d-m-Y", strtotime(date("Y-m-d", strtotime($a1['create_date'])) . " + 365 day"));

  $date1 = date("d-m-Y");

//   echo $date1 . ' = ' . $exp;
  if ($date1 == $exp) {
    // echo 'Dates are equal.';
    $query_exp = "UPDATE `candidate_subscribe` SET  `status`= 'expired' WHERE `id`=" . $a1['id'];
    $query_exp1 = mysqli_query($con, $query_exp);
  }
}
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
              <li class="breadcrumb-item active" aria-current="page">Our Purchased Courses</li>
            </ol>
          </nav>
          <h4 class="mg-b-0">Our Purchased Courses</h4>
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
        $rf = "SELECT * FROM `candidate_subscribe` WHERE `stu_id`='" . $id . "' AND `status` = 'OLD' ORDER BY `id` DESC";
        //   echo $rf;
        $b = mysqli_query($con, $rf);
        while ($a = mysqli_fetch_array($b)) {
          $exp =  date("d-m-Y", strtotime(date("Y-m-d", strtotime($a['create_date'])) . " + 365 day"));
          $fg = "SELECT * FROM `courses`  WHERE `id` ='" . $a['sub_nm'] . "' ";
          //   echo $fg;
          $q = mysqli_query($con, $fg);
          while ($r = mysqli_fetch_array($q)) {
            $bm = mysqli_query($con, "SELECT * FROM `main_courses` WHERE `id`  = '" . $r['main_course'] . "'  ");
            $as = mysqli_fetch_array($bm);

            $bm1 = mysqli_query($con, "SELECT * FROM `pdf_category` WHERE `class_id`  = '" . $as['id'] . "'  ");
            while ($r1 = mysqli_fetch_array($bm1)) {
            echo '
                     <div class="col-md-4">
                        <div class="card card-event">
                          <img src="../admin/' . $r['image'] . '" class="card-img-top" alt="" style="border:1px grey solid;margin:0px;height:100%">
                          <div class="card-body tx-13">
                            <h5><a href="courses-study-material.php?id=' . $r1['id'] . '" target="_blank">' . $as['name'] . ' - Package ' . $r['name'] . '</a></h5>
                            <br> <p style="color:#0168fa"><b> Expiry Date - ' . $exp . '</b></p>
                          </div>
                          <div class="card-footer tx-13">

                            <a href="' . (($r['name'] != '2') ? 'courses-study-material.php?id=' . $r1['id'] : 'test-series.php') . '" class="btn btn-xs btn-secondary" target="_blank"> Study Now</a>
                          </div>
                        </div>
                      </div>
                       ';
          }
        }
        }
        ?>

      </div>

      <div class="row">
        <?php
        $rf = "SELECT * FROM `candidate_subscribe` WHERE `stu_id`='" . $id . "' AND `status` = 'expired' ORDER BY `id` DESC";
        //   echo $rf;
        $b = mysqli_query($con, $rf);
        while ($a = mysqli_fetch_array($b)) {
          $exp =  date("d-m-Y", strtotime(date("Y-m-d", strtotime($a['create_date'])) . " + 365 day"));
          $fg = "SELECT * FROM `courses`  WHERE `id` ='" . $a['sub_nm'] . "' ";
          //   echo $fg;
          $q = mysqli_query($con, $fg);
          while ($r = mysqli_fetch_array($q)) {
            $bm = mysqli_query($con, "SELECT * FROM `main_courses` WHERE `id`  = '" . $r['main_course'] . "'  ");
            $as = mysqli_fetch_array($bm);
            echo '
                     <div class="col-md-4">
                        <div class="card card-event">
                          <img src="../admin/' . $r['image'] . '" class="card-img-top" alt="" style="border:1px grey solid;margin:0px;height:100%">
                          <div class="card-body tx-13">
                            <h5><a href="courses-study-material.php?id=' . $r['id'] . '" target="_blank">' . $as['name'] . ' - Package ' . $r['name'] . '</a></h5>

                          </div>
                          <div class="card-footer tx-13">

                            <a href="#" class="btn btn-xs btn-secondary" target="_blank"> Expired</a>
                          </div>
                        </div>
                      </div>
                       ';
          }
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
    $(function() {
      'use strict'

    });
  </script>
</body>

</html>