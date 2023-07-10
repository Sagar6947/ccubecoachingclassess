<?php
// include 'config.php';
// if (isset($_POST['submit_stu_query'])) {
//     $date = date("d-m-y");
//     $name = $_POST['name'];
//     $email = $_POST['email'];
//     $phone = $_POST['phone'];
//     $message = $_POST['message'];
//     $sal =  mysqli_query($con, "INSERT INTO `contact`(`name`, `email` , `phone` , `message`, `date`) VALUES ('" . $name . "','" . $email . "','" . $phone . "','" . $message . "','" . $date . "')");
//     if ($sal) {
//         echo "<script>alert('Thank You For Contact Us!')</script>";
//     } else {
//         echo "<script>alert('Error in Insertion of your Message...Please try again later!')</script>";
//     }
// }
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

    <title>C cube | Student Dashboard | Query Us </title>

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
                          <li class="breadcrumb-item active" aria-current="page"> Query Us</li>
                      </ol>
                  </nav>
                  <h4 class="mg-b-0">Query Us</h4>
              </div>
          </div>
      </div>
  </div>
  <div class="content">
      <div class="container">
        <div data-label="Any Query ??" class="df-example demo-forms">
          <form action="" method="post">
            <div class="form-group">
              <label class="d-block">Subject</label>
              <input type="text" name="subject" class="form-control" placeholder="Enter your Subject">
            </div>
            <div class="form-group">
              <label class="d-block">Description</label>
              <textarea class="form-control" rows="7" placeholder="Enter your Description"></textarea>
            </div>
            <button class="btn btn-primary" type="submit" name="submit_stu_query">Submit</button>
            <button class="btn btn-secondary" type="reset">Cancel</button>
          </form>
        </div><!-- df-example -->
          <?php include('footer.php'); ?>


      </div><!-- container -->
    </div><!-- content -->

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
