<?php
include('config.php');
if($_SESSION['exa'] == 'on')
{}
else{
    echo '<script>window.location="test-series.php"</script>';
}
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
                <li class="breadcrumb-item active" aria-current="page">General Instructions:</li>
              </ol>
            </nav>

          </div>

        </div>

        <div class="row row-xs">

          <div class="col-lg-12 mg-t-12 mg-lg-t-0">
            <div class="row row-xs">

              <div class="col-12 col-md-6 col-lg-12">
                <ol>
                <h4 class="mg-b-0 tx-spacing--1">General Instructions: For Descriptive Section</h4>
                <div class="card card-body">
                   <ol>


                    <li>There will be total	<?= ((isset($_SESSION['ds_num']))? $_SESSION['ds_num']:'1') ?>  Questions.</li>
                    <li> Duration will be of	<?= ((isset($_SESSION['ds_time']))? $_SESSION['ds_time']:'1') ?>  Minutes. </li>
                    <li>The clock will be set at the server. The countdown timer in the top right corner of screen will display the remaining time available to you for completing the examination. When the timer reaches zero, the examination will end by itself. You will not be required to end or submit your examination.

                    </li>
                    </ol>

                </div>
                <h4 class="mg-b-0 tx-spacing--1"> Read the following Instruction carefully: </h4>
                <div class="card card-body">



                      <ol >
                    <li>  This test comprises of descriptive questions</li>
                    <li> Each question will have boxes for filling your answer within the wordlimit given per questions.</li>
                    <li>You are advised not to close the browser window before submitting the test.</li>
                    <li>In case, if the test does not load completely or becomes unresponsive, click on browser's refresh button to reload</li>


                  </ol>

                   </div>
                <h4 class="mg-b-0 tx-spacing--1">Marking Scheme:  </h4>
                <div class="card card-body">

                      <ol  >

                    <li> 	<?= ((isset($_SESSION['ds_positive']))? $_SESSION['ds_positive']:'1') ?> mark(s) will be awarded for each correct answer</li>
                    <li> 	There will be no negative marking for   wrong answer.</li>
                    <li> 	No marks will be deducted/awarded for un-attempted questions</li>
                     </ol>

                     </div>
                <br>
                <a href="test-panel-descriptive-questions.php" target="_blank" class="btn btn-sm pd-x-15 btn-primary btn-uppercase mg-l-5"> Start Exam</a>
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
