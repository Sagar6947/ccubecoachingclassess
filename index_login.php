<?php
include 'config.php';
$msg = '';
if (isset($_POST['submit'])) {
    $name = cleandata($_POST['name']);
    $email = cleandata($_POST['email']);
    $number = cleandata($_POST['phone']);
    $message = cleandata($_POST['message']);
     if($name != false && $email != false && $number != false  && $message != false ){
    $date = date("d-m-y");

    $query = mysqli_query($con, "INSERT INTO `web_query` (`date`,  `name`, `email`, `message`, `phone`) VALUES ('" . $date . "',  '" . $name . "' , '" . $email . "', '" . $message . "','" . $number . "')");
    if ($query) {
        $msg = 'Your query is submitted successfully';
    } else {
        $msg = 'Server error. Please try again later';
    }
     }else{
            echo "<script>alert('We didnt accept URLs !')</script>";
        }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Examin - Education and LMS Template">

    <title>C cube | Login </title>

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
    <!-- <script src="https://www.google.com/recaptcha/api.js" async defer></script>
      <script src="https://www.google.com/recaptcha/api.js?render=6Ld1vbIeAAAAAMzdlRbT3nRyZqeASayD360pKsQC"></script> -->
</head>

<body>

    <?php include('header.php'); ?>
    <div class="login-area default-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6 ">
                    <form action="login_insert.php" method="post" id="login-form" class="white-popup-block">

                        <div class="col-md-12 ">
                            <h4>login to your registered account!</h4>
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
                            <p class="link-bottom"><a href="#forgot" class="popup-with-form">Forgot Password</a></p>
                            <p class="link-bottom">Not a member yet? <a href="#">Register now</a></p>
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
                <div class="col-md-6 ">
                    <form action="register-code.php" method="post" id="login-form" class="white-popup-block">

                        <div class="col-md-12 ">

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
                                    <button type="submit" name="regsubmit">
                                        Sign up
                                    </button>
                                </div>
                            </div>
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



    <?php
    include('footer.php');
    ?>

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
 <script>
    //   function onClick(e) {
    //     e.preventDefault();
    //     grecaptcha.ready(function() {
    //       grecaptcha.execute('6Ld1vbIeAAAAAMzdlRbT3nRyZqeASayD360pKsQC', {action: 'regsubmit'}).then(function(token) {
    //           // Add your logic to submit to your backend server here.
    //       });
    //     });
    //   }
  </script>
