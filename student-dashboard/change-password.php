<?php
include("config.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
if (isset($_POST['update'])) {
    $a = $_POST['email'];

    $p = $_POST['password'];



    $qu = mysqli_query($con, "update candidate_registre set  email='$a', password='$p'  where id='$id' ");

    if ($qu) {
        echo '<script>alert("Updated Successfully")</script>';
        echo '<script>window.location="home.php"</script>';
    } else {
        echo '<script>alert("Server Error")<script>';
    }
}


$sql = mysqli_query($con, "select * from candidate_registre where id='$id' ");
$row = mysqli_fetch_array($sql);
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

    <title>C cube | Student Dashboard | Home </title>

    <!-- vendor css -->
    <link href="lib/%40fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">

    <!-- DashForge CSS -->
    <link rel="stylesheet" href="assets/css/dashforge.css">
    <link rel="stylesheet" href="assets/css/dashforge.dashboard.css">
</head>

<body class="page-profile">

    <?php include('header.php'); ?>

    <div class="content content-fixed content-auth">
        <div class="container">
            <div class="media align-items-stretch justify-content-center ht-100p">
                <div class="sign-wrapper mg-lg-r-50 mg-xl-r-60">
                    <div class="pd-t-20 wd-100p">
                        <h4 class="tx-color-01 mg-b-5">Change Login Credentials</h4>
                        <p class="tx-color-03 tx-16 mg-b-40">It's free to change your password a few minute.</p>
                        <form method="post" enctype="multipart/form-data" action="">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" name="email" value="<?php echo $row['email']; ?> " readonly placeholder="Enter your firstname">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="text" class="form-control" name="password" value="<?php echo $row['password']; ?>" placeholder="Enter your lastname">
                            </div>


                            <button type="submit" name="update" class="btn btn-brand-02 btn-block">Update Credentials</button>
                        </form>
                    </div>
                </div><!-- sign-wrapper -->

            </div><!-- media -->
        </div><!-- container -->
    </div><!-- content -->

    <br><br>

    <?php include('footer.php'); ?>

    <script src="lib/jquery/jquery.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="lib/feather-icons/feather.min.js"></script>


    <script src="assets/js/dashforge.js"></script>
    <script src="assets/js/dashforge.sampledata.js"></script>

    <!-- append theme customizer -->
    <script src="lib/js-cookie/js.cookie.js"></script>
    <!--<script src="assets/js/dashforge.settings.js"></script>-->


</body>

<!-- Mirrored from themepixels.me/dashforge/template/classic/dashboard-four.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 Jan 2020 05:55:10 GMT -->

</html>