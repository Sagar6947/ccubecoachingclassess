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

  <title> C cube | Question Paper </title>

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
              <li class="breadcrumb-item active" aria-current="page">Question Paper</li>
            </ol>
          </nav>
          <h4 class="mg-b-0">Question Paper</h4>
        </div>
    
      </div>
    </div>
  </div>


  <div class="content">
    <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
      <div class="row">
        <?php
        $bb = mysqli_query($con, "SELECT * FROM `candidate_subscribe` WHERE `stu_id`='" . $id . "' AND `status` != 'new' ORDER BY `id` DESC");
        while ($ac = mysqli_fetch_array($bb)) {

          $bb1 = mysqli_query($con, "SELECT * FROM `courses` WHERE `id`='" . $ac['sub_nm'] . "'");
          $ac1 = mysqli_fetch_array($bb1);
          if ($ac1['name'] == '2' || $ac1['name'] == '3') {

            $qxhm = mysqli_query($con, " SELECT * FROM `pdf_category` WHERE `class_id`='" . $ac1['main_course'] . "' ORDER BY `id` DESC");
            while ($rhm = mysqli_fetch_array($qxhm)) {
              //   print_r($rhm);
              $rtg = "SELECT * FROM `test_series` WHERE `subject_id` = '" . $rhm['id'] . "' AND `status`='1' ORDER BY `id` DESC";
              //   echo $rtg;
              $qx = mysqli_query($con, $rtg);
              while ($r = mysqli_fetch_array($qx)) {

                $bm = mysqli_query($con, "SELECT * FROM `main_courses` WHERE `id`  = '" . $r['test_name'] . "'  ");
                $as = mysqli_fetch_array($bm);
                echo '
                     <div class="col-md-3">
                        <div class="card card-event">
                          <img src="../admin/' . $r['test_icon'] . '" class="card-img-top" alt="" style="margin:0px;">
                          <div class="card-body tx-13">
                            <h5><a href="#">' . $r['examtitle'] . '</h5>
                            <span class="tx-12 tx-color-03">Total Question : ' . $r['total_questions'] . '</span>
                          </div>
                          <div class="card-footer tx-13">
                           <a href="question-paper.php?id=' . $r['id'] . '" class="btn btn-xs btn-secondary"> Test Now </a>
                          </div>
                        </div>
                      </div>
                       ';
              }
            }
          }
        }
        // <span class="tx-color-03">Duration :' . $r['duration'] . ' min</span>
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