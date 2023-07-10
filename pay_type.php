<?php
include 'config.php';
$msg = '';

$date = date("d-m-y");
$name = cleandata($_POST['name']);
$email = cleandata($_POST['email']);
$number = cleandata($_POST['number']);
$address = cleandata($_POST['address']);
$course = cleandata($_POST['course_id']);
$studenti = cleandata($_POST['student_id']);
$fee = cleandata($_POST['fee']);
$type_sub = cleandata($_POST['type_sub']);
 if($name != false && $email != false && $number != false  && $address != false && $course != false  && $studenti != false  && $fee != false ){
$fg =  "INSERT INTO `candidate_subscribe`(`sub_nm`, `stu_id`,`name`,`email`,`contact`,`address`, `amount`, `date`, `status`, `type_sub`) VALUES ('" . $course . "','" . $studenti . "','" . $name . "','" . $email . "','" . $number . "','" . $address . "','" . $fee . "','" . $date . "','new','" . $type_sub . "')";
$sal =  mysqli_query($con, $fg);
$_SESSION['oid'] = mysqli_insert_id($con);
 }else{
    echo "<script>alert('We didnt accept URLs !')</script>";
}
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
    <script src="assets/js/html5/html5shiv.min.js"></script>
    <script src="assets/js/html5/respond.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700,800" rel="stylesheet">
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
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
    <?php include_once("analyticstracking.php") ?>
</head>

<body>

    <?php include('header.php'); ?>

    <div class="login-area default-padding" style="background-image: url(assets/img/banner/16.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 row">

                    <div class="col-md-4 " style="margin-bottom:30px; display:none">
                        <form action="pay.php" method="post" class="white-popup-block" style='padding:10px;text-align:center'>
                            <h4>Pay ONLINE</h4>

                            <input class="form-control" type="hidden" placeholder="Your Name" name="payid" value="<?= $_SESSION['oid']; ?>" required>

                            <input class="form-control" type="hidden" placeholder="Your Name" name="name" value="<?= $name ?>" required>

                            <input class="form-control" type="hidden" placeholder="Email" name="email" value="<?= $email ?>" required>

                            <input class="form-control" type="hidden" placeholder="Number" type="text" name="number" value="<?= $number ?>" required>

                            <input class="form-control" type="hidden" placeholder="Address " name="address" value="<?= $address ?>" required>

                            <input class="form-control" type="hidden" name="course_id" value="<?= $course ?>">
                            <input class="form-control" type="hidden" name="student_id" value="<?= $studenti ?>">
                            <input class="form-control" type="hidden" name="fee" value="<?= $fee  ?>">
                            <input class="form-control btn btn-primary" type="submit" value="Pay online " required>
                            <h5>Via Wallet / Netbanking / Debit cards </h5>

                        </form>
                    </div>
                    <div class="col-md-6 " style="margin-bottom:30px;">
                        <form action="" method="post" class="white-popup-block" style='padding:10px;'>


                            <h4>Pay via UPI / NEFT</h4>
                            <p style="color:red"><b>Note</b> - <span style="color:black">Please share screenshot with </span><b><?= $emailid ?></b><span style="color:black">to update your Transaction </span></p>

                            <div class="col-md-12">
                                <div class="form-group ">
                                    <h5><b>UPI ID - </b>
                                        <p class="btn btn-primary" style="cursor: text;">8004190658@upi</p>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group ">
                                    <h5><b>GSTIN - </b>
                                        <p class="btn btn-primary" style="cursor: text;">09AOPPT6313N1Z3</p>
                                    </h5>

                                </div>
                            </div>
                            <div class="col-md-12">

                                <div class="form-group ">
                                    <h5>Bank Account Details</h5>
                                    <p><b>Account holder - <span style="color:BLUE">C cube </SPAN></b><br>
                                        <b>Account No. - <span style="color:BLUE">50200054107401 </SPAN></b><br>
                                        <b>Account Type - <span style="color:BLUE">Current account</SPAN></b> <br>
                                        <b>IFSC -<span style="color:BLUE"> HDFC0009014</SPAN></b>
                                    </p>

                                </div>
                            </div>




                        </form>
                    </div>
                    <div class="col-md-6" style="margin-bottom:30px;">
                        <form action="pay_redirect.php" method="post" class="white-popup-block" style='padding:10px;'>


                            <h4>Pay via QR-CODE </h4>
                            <p style="color:red"><b>Note</b> - <span style="color:black">Please share screenshot with </span><b><?= $emailid ?></b><span style="color:black">
                                     to update your Transaction </span></p>


                            <div class="col-md-12">
                                <div class="form-group text-right" style="text-align:center">

                                    <img src="images/photo_2021-06-27_22-36-35.jpg" style="width: 100%; height: 350px; object-fit: contain;" />
                                    <!-- <h4>Amit Kumar Tiwari</h4> -->
                                </div>
                            </div>




                        </form>
                    </div>


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