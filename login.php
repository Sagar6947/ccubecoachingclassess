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
                   <form action="login_insert.php" method="post"  class="  white-popup-block">
    
    <div class="col-md-12  ">
        <h4>login to your registered account!</h4>
        <div class="col-md-12">
            <div class="row">
                <div class="form-group">
                    <input class="form-control" placeholder="Email*" type="email" name="email">
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="row">
                <div class="form-group">
                    <input class="form-control" placeholder="Password*" type="password" name="password">
                </div>
            </div>
        </div>
        
        <div class="col-md-12">
            <div class="row">
                <button type="submit" name="logsubmit">
                    Login
                </button>
            </div>
        </div>
        <div class="col-md-12">
            <div class="row">
                <div class="form-group">
                   Continue By clicking one of the buttons above, you agree to our <a href="terms-and-condition.php"><b>T&C</b></a> & <a href="privacy-policy.php"><b>Privacy Policy</b></a> . We'll share offers with you by email. You can update your email preferences anytime

                </div>
            </div>
        </div>
        <p class="link-bottom">Not a member yet? <a class="popup-with-form" href="#register-form">Register now</a></p>
		<p class="link-bottom"><a href="#forgot" class="popup-with-form">Forgot Password</a></p>
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
            echo '<div align="center">OR<br>'.$login_button . '</div>';
            
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