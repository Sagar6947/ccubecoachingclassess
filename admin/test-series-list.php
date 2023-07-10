<?php
include("config.php");
include("session.php");
if (isset($_POST['upload'])) {
    $date = date("j M,Y");

    $title = $_POST['title'];

    $examtitle = $_POST['examtitle'];
    $number = $_POST['num'];
    $duration = $_POST['time'];
    $positive = $_POST['positive'];
    $negative = $_POST['negative'];
    $descriptive = ((isset($_POST['descriptive'])) ? '1' : '0');

    $file = $_FILES['img']['name'];
    $tmpfile = $_FILES['img']['tmp_name'];
    $folder = 'images/' . $file;
    move_uploaded_file($tmpfile, $folder);

    $sal =  mysqli_query($con, "INSERT INTO `test_series`(`date`, `test_name`, `test_icon`, `total_questions`, `duration`, `positive`, `negative`, `examtitle`, `descriptive`) VALUES ('" . $date . "','0','" . $folder . "','" . $number . "','" . $duration . "','" . $positive . "','" . $negative . "','" . $examtitle . "','" . $descriptive . "')");
    if ($sal) {
        $testi = mysqli_insert_id($con);
        for ($i = 0; $i <= count($title); $i++) {
            if ($title[$i] != '') {
                $sal2 =  mysqli_query($con, " INSERT INTO `testseries_subject`( `testid`, `subject_id`) VALUES ( '" . $testi . "', '" . $title[$i] . "')");
            }
        }
        echo '<script>window.location.href="test-series.php";</script>';
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
                    <h1 class="df-title">Question Paper  List
                    </h1>
                </div>
                <div class="col-sm-2">
                    <a href="test_bunch_delete.php" class="btn btn-primary">Delete Bunch</a>
                </div>
            </div>

            <div class="df-example demo-table">
                <table id="example2" class="table">

                    <thead>
                        <tr>
                            <th class="wd-5p">S.no.</th>
                            <th class="wd-5p">Date</th>
                            <th class="wd-15p">Subject </th>
                            <th class="wd-15p">Title</th>
                            <th class="wd-15p">Icon</th>
                            <th class="wd-20p">Info</th>
                            <th class="wd-15p"> Questions</th>
                            <th class="wd-15p">Edit</th>
                            <th class="wd-15p">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        $b = mysqli_query($con, "select * from `test_series` ORDER BY `id` DESC");
                        while ($a = mysqli_fetch_array($b)) {
                            $bm = mysqli_query($con, "SELECT * FROM `pdf_category` WHERE `id`  = '" . $a['subject_id'] . "'  ");
                            $as = mysqli_fetch_array($bm);

                            $b1 = mysqli_query($con, "select * from `main_courses`  WHERE `id`='" . $as['class_id'] . "' ");
                            $a1 = mysqli_fetch_array($b1);


                            $b2e = mysqli_query($con, "select * from `test_questions` WHERE `test_series_id`= '" . $a['id'] . "' ");
                            $qc = mysqli_num_rows($b2e);
                            echo
                            ' <tr>
                                <td>' . $i . '</td>
                                <td>' . $a['date'] . '</td>
                                <td>' . $a1['name'] . ' - ' . $as['name'] . '</td>
                                <td>' . $a['examtitle'] . '</td>
                                <td><img src="' . $a['test_icon'] . '" style="height:50px;"></td>
                                <td>Question - ' . $a['total_questions'] . '</td>
                                <td> <a  class="badge badge-primary" href="test-series-veiw.php?id=' . $a['id'] . '"> Add</a>&nbsp;&nbsp;
                                 <a  class="badge badge-primary" href="test-series-view_list.php?id=' . $a['id'] . '">View </a>
                                 </td>

                                 <td> <a  class="btn btn-primary" href="test-series-edit.php?id=' . $a['id'] . '">Edit</a></td>
                                 <td> <a  class="btn btn-primary" href="test-series-del.php?id=' . $a['id'] . '">Delete</a></td>

                                             </tr>';
                            $i++;
                        }
                        //  <td> <a  class="btn btn-primary" href="govtjob-del.php?id='.$a['id'].'">Delete</a></td>
                        // <td> <a  class="btn btn-primary" href="test-series-ranking.php?id=' . $a['id'] . '">View rank list</a></td>
                        // <td> <a  class="btn btn-primary" href="test-series-status.php?id=' . $a['id'] . '&status=' . (($a['status'] == 0) ? '1' : '0') . '">' . (($a['status'] == 0) ? 'Disabled' : 'Enabled') . '</a></td>
                        // <td>Question - ' . $a['total_questions'] . ' <br>Duration  - ' . $a['duration'] . ' min<br>Correct - ' . $a['positive'] . '<br>
                        // Incorrect - ' . $a['negative'] . '</td>
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