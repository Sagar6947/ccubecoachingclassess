<?php
include 'config.php';
$msg = '';
if (isset($_SESSION['stud_id'])) {
    $id = $_SESSION['stud_id'];
} else {
    $id = '';
}
if (isset($_GET['id'])) {
    $idx = $_GET['id'];
}
// if (isset($_GET['tag'])) {
//     $q = mysqli_query($con, "SELECT * FROM `courses` WHERE id='$idx' ");
//     $r = mysqli_fetch_array($q);
// } else {
$q = mysqli_query($con, "SELECT * FROM `courses` WHERE id='$idx' ");
$r = mysqli_fetch_array($q);
// }

$q1 = mysqli_query($con, "SELECT * FROM `main_courses` WHERE id='" . $r['main_course'] . "' ");
$r1 = mysqli_fetch_array($q1);

$q2 = mysqli_query($con, "SELECT * FROM `course_package` WHERE id='" . $r['name'] . "' ");
$r2 = mysqli_fetch_array($q2);

$que = mysqli_query($con, "SELECT * FROM `candidate_registre` WHERE `id`= '" . $id . "'");
$row = mysqli_fetch_array($que);

?>
<!DOCTYPE html>
<html lang="en">


<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Examin - Education and LMS Template">
    <title>C cube | Government Exam Notification</title>

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
    <script src="https://www.google.com/recaptcha/api.js?render=6LceDMIeAAAAADuQeDyOEdwp6biC0mtwwi1K1lvI"></script>
    <script src="assets/js/html5/html5shiv.min.js"></script>
    <script src="assets/js/html5/respond.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700,800" rel="stylesheet">
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>



    <?php include_once("analyticstracking.php") ?>
</head>

<body>

    <?php include('header.php'); ?>

    <div class="login-area default-padding" style="background-image: url(assets/img/banner/44.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 row">
                    <?php
                    if (empty($_SESSION['stud_id'])) {
                    ?>
                        <div class="col-md-6 ">
                            <form action="login-check.php" method="post" id="loginrashu-form" class="white-popup-block">

                                <div class="col-md-12 ">
                                    <h4>login to checkout</h4>
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
                                                <input class="form-control" placeholder="Password*" type="hidden" name="course_id" value="<?= $idx ?>">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <!-- <button class="g-recaptcha btn btn-warning" data-sitekey="6LceDMIeAAAAADuQeDyOEdwp6biC0mtwwi1K1lvI" data-callback='onSubmitlogin' data-action='submit' name="logsubmit">Login</button> -->
                                            <button type="submit">
                                                Login
                                            </button>
                                        </div>
                                    </div>
                                    <!--<p class="link-bottom">Not a member yet? <a class="popup-with-form" href="#register-form">Register now</a></p>-->
                                    <p class="link-bottom"><a href="#forgot" class="popup-with-form">Forgot Password</a></p>
                                    <div class="col-md-12">
                                        <hr style="background:red;margin-bottom:20px;margin-top:20px;">
                                    </div>
                                    <?php
                                    if ($login_button == '') {
                                    } else {

                                        echo '<div  style=" text-align:center;">OR<br>' . $login_button . '</div>';
                                    }
                                    ?>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6 ">
                            <form action="register-code.php" method="post" id="reg-formr" class="white-popup-block">

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
                                            <!-- <button class="g-recaptcha btn btn-warning" data-sitekey="6LceDMIeAAAAADuQeDyOEdwp6biC0mtwwi1K1lvI" data-callback='onSubmitCheckoutfre' data-action='submit' name="regsubmit"> Sign up</button> -->
                                            <button type="submit" name="regsubmit" class="regsubmit">
                                                Sign up
                                            </button>
                                        </div>
                                    </div>
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

                                        echo '<div  style=" text-align:center;">OR<br>' . $login_reg_button . '</div>';
                                    }
                                    ?>
                                </div>
                            </form>
                        </div>
                    <?php } ?>
                    <?php
                    if (!empty($_SESSION['stud_id'])) {
                    ?>

                        <form action="pay_type.php" target="_blank" method="post" id="checkforme" class="white-popup-block" enctype="multipart/form-data">
                            <div class="col-md-4 login-social">
                                <div class="item">
                                    <div class="info">

                                        <h4>
                                            Class package - <br><?php echo $r1['name'];  ?> <?php echo $r2['name'];  ?><br>
                                            <p>Rs. <?= $r['price'] ?> /-</p>
                                        </h4>
                                    </div>
                                    <img src="admin/<?php echo $r['image'];  ?>" alt="<?php echo $r2['name'];  ?>">


                                </div>
                            </div>
                            <div class="col-md-8 ">
                                <h4> </h4>
                                <p>
                                    Checkout to continue
                                </p>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="form-group">
                                            <input class="form-control" placeholder="Your Name" name="name" value="<?= $row['name'] ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="form-group">
                                            <input class="form-control" placeholder="Email" name="email" value="<?= $row['email'] ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="form-group">
                                            <input class="form-control" placeholder="Number" type="text" name="number" value="<?= $row['mobile'] ?>" required>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="form-group">
                                            <input class="form-control" placeholder="Address " name="address" value="<?= $row['address'] ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="form-group">
                                            <input class="form-control" type="hidden" name="course_id" value="<?= $idx ?>">
                                            <input class="form-control" type="hidden" name="student_id" value="<?= $id ?>">
                                            <input class="form-control" type="hidden" name="type_sub" value="<?= ((isset($_GET['tag'])) ? '1' : '0') ?>">
                                            <input class="form-control" type="hidden" name="fee" value="<?= $r['price']  ?>">
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <div class="row">
                                        <!--<button class="g-recaptcha btn btn-warning" data-sitekey="6LceDMIeAAAAADuQeDyOEdwp6biC0mtwwi1K1lvI" data-callback='onSubmitCheckout' data-action='submit' name="submit">Checkout</button>-->
                                        <button class="btn btn-warning" name="submit" type="submit">Checkout</button>

                                    </div>
                                </div>

                            </div>
                        </form>
                    <?php } ?>
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

    <script>
        // function onClick(e) {
        //     e.preventDefault();
        //     grecaptcha.ready(function() {
        //         grecaptcha.execute('6LceDMIeAAAAADuQeDyOEdwp6biC0mtwwi1K1lvI', {
        //             action: 'regsubmit'
        //         }).then(function(token) {
        //             // Add your logic to submit to your backend server here.
        //         });
        //     });
        // }






        function onSubmitlogin(token) {
            document.getElementById("loginrashu-form").submit();
        }

        function onSubmitCheckoutfre(token) {
            document.getElementById("reg-formr").submit();
        }

        function onSubmitCheckout(token) {
            document.getElementById("checkforme").submit();
        }

        var options = {
            "key": "rzp_test_juqB8BfnYhCbSz", // Enter the Key ID generated from the Dashboard
            "amount": "<?= $r['price']  ?>", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
            "currency": "INR",
            "name": "ccube",
            "description": "Test Transaction",
            "image": "assets/img/logo.png",
            //"order_id": "order_9A33XWu170gUtm", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
            "handler": function(response) {
                console.log(response);
                // alert(response.razorpay_payment_id);
                // alert(response.razorpay_order_id);
                // alert(response.razorpay_signature)
            },
            "prefill": {
                "name": "<?= $row['name'] ?>",
                "email": "<?= $row['email'] ?>",
                "contact": "<?= $row['mobile'] ?>"
            },
            "notes": {
                "address": "Razorpay Corporate Office"
            },
            "theme": {
                "color": "#3399cc"
            }
        };
        var rzp1 = new Razorpay(options);
        rzp1.on('payment.failed', function(response) {
            alert(response.error.code);
            alert(response.error.description);
            alert(response.error.source);
            alert(response.error.step);
            alert(response.error.reason);
            alert(response.error.metadata.order_id);
            alert(response.error.metadata.payment_id);
        });
        document.getElementById('rzp-button1').onclick = function(e) {
            rzp1.open();
            e.preventDefault();
        }
    </script>
    <?php

    if (isset($_POST['submit'])) {
        $date = date("d-m-y");
        $name = $_POST['name'];
        $email = $_POST['email'];
        $number = $_POST['number'];
        $address = $_POST['address'];
        $course = $_POST['course'];
        $student = $_POST['student'];
        $fee = $_POST['fee'];

        $fg =  "INSERT INTO `candidate_subscribe`(`sub_nm`, `stu_id`,`name`,`email`,`contact`,`address`, `amount`, `date`, `status`) VALUES ('" . $course . "','" . $student . "','" . $name . "','" . $email . "','" . $number . "','" . $address . "','" . $fee . "','" . $date . "','new')";
        echo $fg;
        $sal =  mysqli_query($con, $fg);
        if ($sal) {
            echo "<script> $('#rzp-button1').click(); </script>";
        } else {
            echo "<script>alert('Server error')</script>";
        }
    }
    ?>



</body>


</html>