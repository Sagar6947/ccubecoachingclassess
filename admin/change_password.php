<?php
include("config.php");
include("session.php");
if (isset($_POST['upload'])) {


    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $confirm_new_password = $_POST['confirm_new_password'];

    $sql2 = mysqli_query($con, "SELECT * FROM `login` WHERE `id`='1'");
    $r = mysqli_fetch_array($sql2);
    // echo $r['password'];
    if ($r['password'] == $old_password) {

        if ($new_password == $confirm_new_password) {
            $sql1 = mysqli_query($con, "UPDATE `login` SET  `password`='$new_password' WHERE `id`='1'");
            echo "<script>alert('Password Changed Successfully')</script>";
        } else {
            echo "<script>alert('New Password and Confirm Password didnt Match')</script>";
        }
    } else{
        echo "<script>alert('Incorrect Old Password')</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Bootstrap 4 Dashboard Template">
    <meta name="author" content="ThemePixels">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <title>C cube | Change password</title>
    <link href="lib/%40fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="lib/typicons.font/typicons.css" rel="stylesheet">
    <link href="lib/prismjs/themes/prism-vs.css" rel="stylesheet">
    <link href="lib/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="lib/datatables.net-responsive-dt/css/responsive.dataTables.min.css" rel="stylesheet">
    <link href="lib/select2/css/select2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/dashforge.css">
    <link rel="stylesheet" href="assets/css/dashforge.demo.css">
    <!-- vendor css -->
    <link href="lib/%40fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="lib/typicons.font/typicons.css" rel="stylesheet">
    <link href="lib/prismjs/themes/prism-vs.css" rel="stylesheet">
    <link href="lib/quill/quill.core.css" rel="stylesheet">
    <link href="lib/quill/quill.snow.css" rel="stylesheet">
    <link href="lib/quill/quill.bubble.css" rel="stylesheet">
</head>

<body data-spy="scroll" data-target="#navSection" data-offset="120">

    <?php include('header.php'); ?>
    <?php include('sidemenu.php'); ?>

    <div class="content content-components">
        <div class="container">
            <h4 id="section3" class="mg-b-10"> Change password </h4>

            <div class="df-example demo-forms" >
                <form method="post" enctype="multipart/form-data" action="" >
                    <div class="form-row col-md-6">
                        <div class="form-group col-md-12">
                            <label>Old Password</label>
                            <input type="password" class="form-control" name="old_password" placeholder="XXXXXX">
                        </div>
                        <div class="form-group col-md-12">
                            <label>New Password</label>
                            <input type="password" class="form-control" name="new_password" placeholder="XXXXXX">
                        </div>
                        <div class="form-group col-md-12">
                            <label>Confirm New Password</label>
                            <input type="password" class="form-control" name="confirm_new_password" placeholder="XXXXXX">
                        </div>
                    </div>
                    <button type="submit" name="upload" class="btn btn-primary">Submit Form</button>
                </form>
            </div>
        </div>

        <?php include('footer.php'); ?>

    </div>
    <script src="lib/jquery/jquery.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="lib/feather-icons/feather.min.js"></script>
    <script src="lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="lib/prismjs/prism.js"></script>
    <script src="lib/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="lib/datatables.net-dt/js/dataTables.dataTables.min.js"></script>
    <script src="lib/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="lib/datatables.net-responsive-dt/js/responsive.dataTables.min.js"></script>
    <script src="lib/select2/js/select2.min.js"></script>

    <script src="lib/jquery/jquery.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="lib/feather-icons/feather.min.js"></script>
    <script src="lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="lib/prismjs/prism.js"></script>
    <script src="lib/quill/quill.min.js"></script>

    <script src="assets/js/dashforge.js"></script>

</body>

</html>