<?php
include("config.php");
include("session.php");

if (isset($_POST['submit'])) {

    $sub_nm = $_POST['sub_nm'];
    $stu_id = $_POST['stu_id'];
    $queryax = mysqli_query($con, "SELECT * FROM `courses` WHERE `id`='$sub_nm'");
    $rowax = mysqli_fetch_array($queryax);

    $amount = $rowax['price'];
    $date = date('d-m-Y');

    $payment_id = $_POST['payment_id'];

    $querya = mysqli_query($con, "SELECT * FROM `candidate_registre` WHERE `id`='$stu_id'");
    $rowa = mysqli_fetch_array($querya);

    $name = $rowa['name'];
    $email = $rowa['email'];
    $contact = $rowa['mobile'];
    $address = $rowa['address'];




    $query = 'INSERT INTO `candidate_subscribe`(`sub_nm`, `stu_id`, `amount`, `date`, `status`, `payment_id`, `name`, `email`, `contact`, `address`) VALUES ( "' . $sub_nm . '","' . $stu_id . '","' . $amount . '","' . $date . '","OLD","' . $payment_id . '","' . $name . '","' . $email . '","' . $contact . '","' . $address . '")';
    $sal = mysqli_query($con, $query);
    if ($sal) {
        echo '<script>window.location.href="course-purchase.php";</script>';
    } else {
        echo "Error in Insertion of your image...Please try again later!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="C cube">
    <meta name="author" content="C cube">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <title>C cube | Admin Panel</title>
    <link href="lib/%40fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="lib/typicons.font/typicons.css" rel="stylesheet">
    <link href="lib/prismjs/themes/prism-vs.css" rel="stylesheet">
    <link href="lib/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="lib/datatables.net-responsive-dt/css/responsive.dataTables.min.css" rel="stylesheet">
    <link href="lib/select2/css/select2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/dashforge.css">

    <script src="https://cdn.ckeditor.com/ckeditor5/26.0.0/classic/ckeditor.js"></script>
    <link rel="stylesheet" href="assets/css/dashforge.demo.css">
</head>

<body data-spy="scroll" data-target="#navSection" data-offset="120">

    <?php include('header.php'); ?>
    <?php include('sidemenu.php'); ?>

    <div class="content content-components">
        <div class="container">
            <div class="row">
                <div class="col-sm-10">
                    <h1 class="df-title">Enroll Student
                    </h1>
                </div>
                <div class="col-sm-2"></div>
            </div>
        </div>



        <form method="post" enctype="multipart/form-data" action="">
            <div class="df-example demo-forms row">


                <div class="form-group col-md-6 row">

                    <div class="form-group col-md-12">
                        <label>Courses</label>
                        <select name="sub_nm" class="form-control ">
                            <option value="">Select Course </option>
                            <?php

                            $b = mysqli_query($con, "select * from `courses`  ");
                            while ($a = mysqli_fetch_array($b)) {
                                $bm = mysqli_query($con, "SELECT * FROM `main_courses` WHERE `id`  = '" . $a['main_course'] . "'  ");
                                $as = mysqli_fetch_array($bm);

                                $b1 = mysqli_query($con, "SELECT * FROM `course_package`  WHERE `id`= '" . $a['name'] . "' ");
                                $a1 = mysqli_fetch_array($b1);
                                echo '<option value="' . $a['id'] . '">' . $as['name'] . ' - ' . $a1['name'] . ' - ' . $a1['description'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group col-md-12">
                        <label>Student Name</label>
                        <select name="stu_id" class="form-control ">
                            <option value="">Select Student</option>
                            <?php

                            $b = mysqli_query($con, "select * from `candidate_registre` ORDER BY `name` asc ");
                            while ($a = mysqli_fetch_array($b)) {
                                echo '<option value="' . $a['id'] . '">' . $a['name'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Payment ID</label>
                        <input type="text" class="form-control " name="payment_id" placeholder="" value="">

                    </div>

                </div>



                <div class="col-md-12">
                    <button type="submit" name="submit" class="btn btn-success">Save </button>
                </div>
            </div>
        </form>




        <?php include('footer.php'); ?>


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

        <script src="assets/js/dashforge.js"></script>
        <script>
            function textadd() {
                var cols = document.querySelectorAll(".editor");
                console.log(cols);
                [].forEach.call(cols, (e) => {
                    //  console.log(e.);


                    ClassicEditor
                        .create(e)
                        .catch(error => {
                            console.error(error);
                        });



                });
            }
            textadd();
            $(function() {
                'use strict';

                $('#example1').DataTable({
                    language: {
                        searchPlaceholder: 'Search...',
                        sSearch: '',
                        lengthMenu: '_MENU_ items/page',
                    }
                });

                $('#example2').DataTable({
                    responsive: true,
                    language: {
                        searchPlaceholder: 'Search...',
                        sSearch: '',
                        lengthMenu: '_MENU_ items/page',
                    }
                });

                $('#example3').DataTable({
                    'ajax': 'assets/data/datatable-arrays.txt',
                    language: {
                        searchPlaceholder: 'Search...',
                        sSearch: '',
                        lengthMenu: '_MENU_ items/page',
                    }
                });

                $('#example4').DataTable({
                    'ajax': 'assets/data/datatable-objects.txt',
                    "columns": [{
                            "data": "name"
                        },
                        {
                            "data": "position"
                        },
                        {
                            "data": "office"
                        },
                        {
                            "data": "extn"
                        },
                        {
                            "data": "salary"
                        }
                    ],
                    language: {
                        searchPlaceholder: 'Search...',
                        sSearch: '',
                        lengthMenu: '_MENU_ items/page',
                    }
                });

                // Select2
                $('.dataTables_length select').select2({
                    minimumResultsForSearch: Infinity
                });

            });
        </script>
</body>

</html>