
<header id="home">

    <!-- Start Navigation -->
    <nav class="navbar navbar-default navbar-sticky bootsnav" style="height:75px;">


        <div class="container">
            <div class="attr-nav">

            </div>
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="index.php" style="padding:10px;color:#002147">
                    <img src="assets/img/logo.png" class="logo" alt="Logo" style="height:50px">
                </a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-menu">
                <ul class="nav navbar-nav navbar-right" data-in="#" data-out="#">
                    <li><a class="" href="index.php">Home </a></li>
                    <li><a href="all-courses.php">Our Classes</a></li>
                    <!-- <li><a href="free_pdf.php"> PDF</a></li> -->
                    <li><a href="test_series.php"> Test series</a></li>
                    <!--<li><a href="videos.php">Our Videos</a></li>-->
                    <li><a href="about-us.php">About Us</a></li>
                     <li><a href="our-teachers.php">Our Team</a></li> 

                    <li><a href="contact-us.php">Contact Us</a></li>
                    <!-- <li><a href="https://examison.com/contact/">Contact Us</a></li> -->
                    <?php
                    if (isset($_SESSION['stud_id'])) {
                    ?>
                        <li> <a href="student-dashboard/home.php">
                                <i class="fas fa-user"></i> Dashboard
                            </a>
                        </li>
                    <?php } else {
                    ?>
                        <li> <a class="popup-with-form" href="#register-form">
                                <i class="fas fa-edit"></i> Register
                            </a>
                        </li>
                        <li>
                            <a class="popup-with-form" href="#login-form">
                                <i class="fas fa-user"></i> Login
                            </a>
                        </li>
                    <?php }
                    ?>


                </ul>
            </div>
        </div>
    </nav>
</header>

<form action="login_insert.php" method="post" id="login-form" class="mfp-hide white-popup-block">

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
                <!-- <button class="g-recaptcha btn btn-warning"
                                                data-sitekey="6LceDMIeAAAAADuQeDyOEdwp6biC0mtwwi1K1lvI"
                                                data-callback='onSubmitbar'
                                                data-action='submit' name="logsubmit" >Login</button> -->
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
        <p class="link-bottom">Not a member yet? <a class="popup-with-form" href="#register-form"><b>Register now</b></a></p>
        <p class="link-bottom"><a href="#forgot" class="popup-with-form"><b>Forgot Password</b></a></p>
        <div class="col-md-12">
            <hr style="background:red;margin-bottom:20px;margin-top:20px;">
        </div>
        <?php
        if ($login_button == '') {

        } else {
            echo '<div align="center">OR<br>' . $login_button . '</div>';
        }
        ?>
    </div>
</form>


<form action="forgot-password.php" method="post" id="forgot" class="mfp-hide white-popup-block">
    <!-- <div class="col-md-4 login-social">
        <ul>
            <img src="images/php-login-and-authentication-the-definitive-guide.png" style="height: 200px;">
        </ul>
    </div> -->
    <div class="col-md-12 ">
        <h4>Forgot Password !</h4>
        <div class="col-md-12">
            <div class="row">
                <div class="form-group">
                    <input class="form-control" placeholder="Email*" type="email" name="email" value="">
                </div>
            </div>
        </div>
        <!--div class="col-md-12">
            <div class="row">
                <div class="form-group">
                    <input class="form-control" placeholder="Password*" type="password" name="password">
                </div>
            </div>
        </div-->

        <div class="col-md-12">
            <div class="row">
                <button type="submit" name="logsubmit">
                    Login
                </button>
            </div>
        </div>

    </div>
</form>



<form action="register-code.php" id="register-form" class="mfp-hide white-popup-block" method="POST">

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
                    By Signing up you agree to our <a href="terms-and-condition.php"><b> T&C </b> </a> and <a href="privacy-policy.php"><b>Privacy Policy</b></a>.
                </div>
            </div>
        </div>


        <div class="col-md-12">
            <div class="row">

                <!-- <button class="g-recaptcha btn btn-warning"
                                                data-sitekey="6LceDMIeAAAAADuQeDyOEdwp6biC0mtwwi1K1lvI"
                                                data-callback='onSubmitbarreg'
                                                data-action='submit' name="regsubmit" >Sign up</button> -->
                <button type="submit" name="regsubmit">
                   Sign up
                </button>
            </div>
        </div>

        <p class="link-bottom">Are you a member? <a class="popup-with-form" href="#login-form"><b>Login now</b></a></p>
        <div class="col-md-12">
            <hr style="background:red;margin-bottom:20px;margin-top:20px;">
        </div>
        <?php
        if ($login_button == '') {

            //
            // echo '<div class="panel-heading">Welcome User</div><div class="panel-body">';
            // echo '<img src="'.$_SESSION["user_image"].'" class="img-responsive img-circle img-thumbnail" />';
            // echo '<h3><b>Name :</b> '.$_SESSION['user_first_name'].' '.$_SESSION['user_last_name'].'</h3>';
            // echo '<h3><b>Email :</b> '.$_SESSION['user_email_address'].'</h3>';
            // echo '<h3><a href="logout.php">Logout</h3></div>';
        } else {

            echo '<div align="center">OR<br>' . $login_reg_button . '</div>';
        }
        ?>
    </div>
</form>
<!-- End Register Form -->