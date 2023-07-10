<?php
include("config.php");
include("session.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Bootstrap 4 Dashboard Template">
    <meta name="author" content="ThemePixels">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <title>C cube |  Subject content List</title>
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
                    <h1 class="df-title"> Subject content List
                    </h1>
                </div>
                 <div class="col-sm-2">
<a href="video_bunch_delete.php<?php if (isset($_GET['id'])) {echo '?sid='.$_GET['id'];}else{} ?>" class="btn btn-primary">Delete Bunch</a>
        </div>
                <div class="col-sm-2">
                <a href="video-add.php" class="btn btn-danger rounded-pill">Add   Subject content  </a>
                </div>
            </div>

            <div class="df-example demo-table">
                <table id="example2" class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Date</th>
                            <th>Title</th>
                            <th>Subject  </th>
                            <th>Unit</th>
                            <th>PDF</th>
                            <th>Video URL</th>
                            <th>Edit</th>
                            <th>Delete</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        $b = mysqli_query($con, "select * from `video`  ORDER BY `id` DESC ");
                        while ($a = mysqli_fetch_array($b)) {
                            $b1 = mysqli_query($con, "select * from `pdf_category` where  `id`= '" . $a['course_id'] . "'");
                            $a1 = mysqli_fetch_array($b1);

                            $b2 = mysqli_query($con, "select * from `main_courses` where  `id`= '" . $a1['class_id'] . "'");
                            $a2 = mysqli_fetch_array($b2);

                            echo ' <tr>
                                <td>' . $i . '</td>
                                <td>' . $a['date'] . '</td>
                                <td>' . wordwrap($a['name'], 50, '<br>') . '</td>

                                <td>' . $a2['name'] . ' - ' . $a1['name'] . '</td>

                                <td>' . $a['unit'] . '</td>
                                <td><a href="' . $a['pdf'] . '" target="_blank" ' . (($a['pdf'] == 'pdf/') ? 'style="display:none;"' : '') . '>Download</a></td>
                                <td><a href="' . $a['url'] . '" target="_blank"  ' . (($a['url'] == '') ? 'style="display:none;"' : '') . '>View</a></td>


                                    <td><a class="btn btn-warning" href="video-edit.php?id=' . $a['id'] . '">Edit</a> </td>


                                <td><a class="btn btn-danger" href="video-del.php?id=' . $a['id'] . '">Delete</a> </td>



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


                $('#example2').DataTable({
                    responsive: true,
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