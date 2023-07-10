<?php
include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>C cube Coaching Classes - Tagore Nagar Bhopal (5-12th Class) </title>

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
  <!--<script src="https://www.google.com/recaptcha/api.js"></script>-->

</head>

<body>

  <?php include('header.php'); ?>
  
  <div class="breadcrumb-area shadow dark text-center bg-fixed text-light" style="background-image: url(assets/img/banner/44.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Our Team</h1>
                   
                </div>
            </div>
        </div>
    </div>
    
    
  <div class="adviros-details-area default-padding">
    <div class="container">
        <div class="row">
            <!--<div class="col-md-5 thumb">-->
            <!--    <img src="admin/images/020523080940-my_pic-removebg-preview-removebg-preview.png" alt="Thumb">-->
            <!--    <div class="desc">-->
            <!--        <h4>Amit Raj Sona</h4>-->
            <!--        <span>Director</span>-->

            <!--    </div>-->
            <!--</div>-->
            <div class="col-md-12 info main-content">
                <div class="row">
                    
                     <?php
                    $q=mysqli_query($con,"SELECT * FROM `our_teachers` order by tid ASC ");
                    while($r=mysqli_fetch_array($q))

                    { ?>
                  
                    <div class="col-sm-4">
                        <div class="advisor-item">
                            <div class="info-box">
                                <img src="admin/<?= $r['image'] ?>" alt="Thumb" style="height:350px">
                                <div class="info-title">
                                    <h4><?= $r['name'] ?></h4>
                                    <span><?= $r['designation'] ?></span>
                                     <p style="color:white;"><?= $r['qualification'] ?></p>
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
</div>
  
  
  
  
   <?php include('footer.php'); ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
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
  <script src="assets/js/loopcounter.js"></script>
  <script src="assets/js/main.js"></script>
</body>

</html>
<script>
  function onSubmit(token) {
    document.getElementById("register").submit();
  }
</script>