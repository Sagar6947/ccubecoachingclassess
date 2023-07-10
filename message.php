<?php
include 'config.php';
// $oid= $_SESSION['oid'];
$payid = $_POST['payid'];
$oid = $_POST['oid'];
$que = mysqli_query($con, "UPDATE `candidate_subscribe` SET  `status`='OLD',`payment_id`='" . $payid . "' WHERE `id`='" . $oid . "'");
?>
<!DOCTYPE html>
<html lang="en">


<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Examin - Education and LMS Template">


    <title>C cube | </title>

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
    <script src="assets/js/html5/html5shiv.min.js"></script>
    <script src="assets/js/html5/respond.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700,800" rel="stylesheet">
    <?php include_once("analyticstracking.php") ?>
</head>

<body>

    <?php include('header.php'); ?>

    <div class="login-area default-padding" style="background-image: url(assets/img/banner/16.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 row">

                    <form action="" method="post" class="white-popup-block" enctype="multipart/form-data">
                        <div class="col-md-12  ">
                            <div class="item">
                                <div class="info">
                                    <h3>Your Payment Transaction is successfull </h3>
                                    <h5>Please note your transaction ID : <b><?php echo $payid; ?></b> </h5>



                                </div>
                            </div>
                        </div>

                    </form>

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