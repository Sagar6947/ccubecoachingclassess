<?php include('config.php');
 ?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Examin - Education and LMS Template">
    <title>Ambition | Login</title>
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
</head>
<body>
<?php include('header.php'); ?>
    <div class="login-area default-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
            <form action="register-code.php"   class=" white-popup-block" method="post">

    <div class="col-md-12  ">
        <h4>Register a new account</h4>
        <div class="col-md-12">
            <div class="row">
                <div class="form-group">
                    <input class="form-control" placeholder="Full Name " type="text" name="name" required>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="row">
                <div class="form-group">
                    <input class="form-control" placeholder="Email " type="email" name="email" required>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="row">
                <div class="form-group">
                    <input class="form-control" placeholder="Contact No. " type="text" name="phone" required>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="row">
                <div class="form-group">
                   By Signing up you agree to our <a href="terms-and-condition.php"  ><b> T&C </b> </a> and <a href="privacy-policy.php" ><b>Privacy Policy</b></a>.
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="row">
                <button type="submit" name="regsubmit">
                    Sign up
                </button>
            </div>
        </div>

        <p class="link-bottom">Are you a member? <a class="popup-with-form" href="#login-form">Login now</a></p>
        <div class="col-md-12"><hr style="background:red;margin-bottom:20px;margin-top:20px;"></div>
        <?php
           if($login_button == '')
           {

            //
            // echo '<div class="panel-heading">Welcome User</div><div class="panel-body">';
            // echo '<img src="'.$_SESSION["user_image"].'" class="img-responsive img-circle img-thumbnail" />';
            // echo '<h3><b>Name :</b> '.$_SESSION['user_first_name'].' '.$_SESSION['user_last_name'].'</h3>';
            // echo '<h3><b>Email :</b> '.$_SESSION['user_email_address'].'</h3>';
            // echo '<h3><a href="logout.php">Logout</h3></div>';
           }
           else
           {

            echo '<div align="center">OR<br>'.$login_reg_button . '</div>';
           }
           ?>
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