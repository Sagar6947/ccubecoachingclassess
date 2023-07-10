<?php
include("config.php");
include("session.php");
if (isset($_GET['id'])) {
    $rt = "SELECT * FROM `candidate_subscribe` WHERE `stu_id`='" . $_GET['id'] . "' ORDER BY `id` DESC";
} else {
    $rt = "SELECT * FROM `candidate_subscribe` ORDER BY `id` DESC";
}
// echo $rt;
$b = mysqli_query($con, $rt);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Bootstrap 4 Dashboard Template">
    <meta name="author" content="ThemePixels">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <title>C cube | course purchased</title>
    <link href="lib/%40fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="lib/typicons.font/typicons.css" rel="stylesheet">
    <link href="lib/prismjs/themes/prism-vs.css" rel="stylesheet">
    <link href="lib/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="lib/datatables.net-responsive-dt/css/responsive.dataTables.min.css" rel="stylesheet">
    <link href="lib/select2/css/select2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/dashforge.css">
    <link rel="stylesheet" href="assets/css/dashforge.demo.css">
</head>

<body data-spy="scroll" data-target="#navSection" data-offset="120">

    <?php include('header.php'); ?>
    <?php include('sidemenu.php'); ?>

    <div class="content content-components">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <h1 class="df-title">Course purchased
                    </h1>
                </div>
                 <div class="col-sm-2">
<a href="subscribtion_bunch_delete.php<?php if (isset($_GET['id'])) {echo '?sid='.$_GET['id'];}else{} ?>" class="btn btn-primary">Delete Bunch</a>
        </div>
                <div class="col-sm-2">
                    <a href="update_student_package.php" class="btn btn-danger rounded-pill">Enroll Student</a>
                </div>
            </div>

            <div class="df-example demo-table">
                <table id="example2" class="table">
                    <thead>
                        <tr>
                            <th class="wd-5p">Id</th>
                            <th class="wd-15p">Date</th>
                            <th class="wd-15p">Student </th>
                            <th class="wd-20p">Course </th>
                            <th class="wd-15p">Amount</th>
                            <th class="wd-15p">Payment ID</th>
                            <th class="wd-15p">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        while ($a = mysqli_fetch_array($b)) {

                            $b1 = mysqli_query($con, "SELECT * FROM `candidate_registre` WHERE `id`= '" . $a['stu_id'] . "'");
                            $a1 = mysqli_fetch_array($b1);
                            if($a['sub_nm'] == '1'){
                                $b2 = mysqli_query($con, "SELECT * FROM `pdf_category` WHERE `id`= '" . $a['sub_nm'] . "'");
                                $a2 = mysqli_fetch_array($b2);
                                }else{
                                $b2 = mysqli_query($con, "SELECT * FROM `courses` WHERE `id`= '" . $a['sub_nm'] . "'");
                                $a2 = mysqli_fetch_array($b2);
                                }
                            $b3 = mysqli_query($con, "SELECT * FROM `main_courses` WHERE `id`= '" . $a2['main_course'] . "'");
                            $a3 = mysqli_fetch_array($b3);
                            $b4 = mysqli_query($con, "SELECT * FROM `course_package` WHERE `id`= '" . $a2['name'] . "'");
                            $a4 = mysqli_fetch_array($b4);

                            echo ' <tr>
                    <td>' . $i . '</td>
                    <td>' . $a['date'] . '</td>
                    <td>' . $a1['name'] . ' <br>Contact - ' . $a1['mobile'] . ' <br>Email -  ' . $a1['email'] . '</td>
                    <td>'; if($a['sub_nm'] == '1')
                    {echo $a2['name'];}else{
                    echo $a3['name'] . ' <br> ' . $a4['name'] . ' ( ' . $a4['description'] . ' )'; }
                    echo '<br>Price - Rs. ' . $a2['price'] . ' /- </td>
                    <td>Rs. ' . $a['amount'] . ' /-</td>

                     <td>' . (($a['payment_id'] == '') ? '<a href="update_payment_id.php?id=' . $a['id'] . '">Update Payment ID</a>' : $a['payment_id']) . '</td>
                      <td> <a href="course-purchase-del.php?id=' . $a['id'] . '">Delete  Record  </a> </td>





                    </tr>';
                            $i++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

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