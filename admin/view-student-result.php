<?php
include("config.php");
include("session.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
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
    <title>C cube | Student Result Details</title>
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
            <h1 class="df-title">Student Result</h1>

            <div class="df-example demo-table">
                <table id="example2" class="table">
                    <thead>
                        <tr>
                            <th class="wd-10p">S.No</th>
                            <th class="wd-10p">Date</th>
                            <th class="wd-25p">Test Series</th>
                            <th class="wd-20p">Total Marks</th>
                            <th class="wd-20p">Current Rank</th>
                            <th class="wd-20p">View result</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        $b = mysqli_query($con, "SELECT * FROM `candidate_test_attempts` WHERE `s_id`='$id' ORDER BY `id` DESC");
                        while ($a = mysqli_fetch_array($b)) {

                            $sql = mysqli_query($con, "select * from `test_series` WHERE  `id`=" . $a['t_id'] . " ");
                            $row = mysqli_fetch_array($sql);

                            // $sqlc = mysqli_query($con, "SELECT * FROM `testseries_subject`  WHERE  `testid`=" . $a['t_id']  . " ");
                            // while ($rowc = mysqli_fetch_array($sqlc)) {
                            //     $sqlc = mysqli_query($con, "SELECT * FROM `main_courses`  WHERE  `id`=" . $rowc['subject_id'] . " ");
                            //     while ($rowc = mysqli_fetch_array($sqlc)) {
                            //         $sd .= $sd . ', ' . $rowc['name'];
                            //     }
                            // }

                            echo '<tr>
                                    <td>' . $i . '</td>
                                    <td>' . $a['date'] . '</td>
                                    <td>' . $row['examtitle'] . '</td>
                                    <td>' . $a['t_marks'] . '</td>
                                    <td>';

                            $j = 1;
                            $rank = 0;
                            $fg = "SELECT `s_id`, `t_id`, `correct`, `incorrect`, avg(`t_marks`) as t_marks  FROM `candidate_test_attempts` WHERE `t_id` ='" . $a['t_id'] . "' GROUP BY `s_id`  ORDER BY `t_marks` DESC ";
                            // echo $fg;
                            $qz = mysqli_query($con, $fg);
                            $arrlength = mysqli_num_rows($qz);
                            while ($rz = mysqli_fetch_array($qz)) {
                                // echo $rz['t_marks'];
                                // echo $r['s_id'] .'=='. $rz['s_id'].'<br>';
                                if ($a['s_id'] == $rz['s_id']) {
                                    $rank = $j;
                                }

                                $j++;
                            }
                            echo ' ' . $rank . ' /' . $arrlength;
                            //    echo '  '.$rank .' ';
                            echo '</td>
                    <td><a href="view-student-result-questions.php?id=' . $a['id'] . '"><button type="button" class="btn btn-primary"> Solutions </button></a></td>
                    </tr>
                   ';
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