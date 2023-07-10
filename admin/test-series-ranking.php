<?php
include("config.php");
include("session.php");
if (isset($_GET['id'])) {
    $i = $_GET['id'];
}
$query = mysqli_query($con,"SELECT * FROM `test_series` WHERE `id`='$i'  ORDER BY `id` DESC");
$row = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Bootstrap 4 Dashboard Template">
    <meta name="author" content="ThemePixels">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <title>C cube | Question Paper  </title>
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
                <div class="col-sm-10">
                    <h4  ><?= $row['examtitle'] ?> <span>Question Paper   Ranking<span>
                    </h4>
                </div>
                <div class="col-sm-2"></div>
            </div>

            <div class="df-example demo-table">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Rank</th>
                            <th>Student name</th>
                            <th>Marks </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $j = 1;
                        $rt = "select * from `candidate_test_attempts` JOIN `candidate_registre` ON `candidate_test_attempts`.`s_id`=`candidate_registre`.`id` WHERE `t_id` ='" . $i . "' ORDER BY `t_marks` DESC";
                        // echo $rt;
                        $b1 = mysqli_query($con, $rt);
                        while ($a1 = mysqli_fetch_array($b1)) {
                            //  print_r($a1);
                            // $s = substr($a1['timeremain'], 0, 2);
                            // $ss = substr($a1['timeremain'], 2, 2);
                            echo
                            '<tr ' . (($j == 1) ? 'style="color:red;font-weight:800;"' : (($j == 2) ? 'style="color:orange;font-weight:800;"' : (($j == 3) ? 'style="color:Green;font-weight:800;"' : ''))) . '>
                                    <td><span ' . (($j == 1) ? 'style="color:red;font-weight:800;"' : (($j == 2) ? 'style="color:orange;font-weight:800;"' : (($j == 3) ? 'style="color:Green;font-weight:800;"' : ''))) . '>' . $j . '</span></td>
                                    <td>' . $a1['name'] . ' </td>
                                    <td>' . $a1['t_marks'] . ' </td>


                                    </tr>';
                            $j++;
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