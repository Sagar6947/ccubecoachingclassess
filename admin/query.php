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
    <title>C cube | Query Details</title>
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
                    <h1 class="df-title">Query Details
                    </h1>
                </div>
                <div class="col-sm-2">
                    <a href="query_bunch_delete.php" class="btn btn-primary">Delete Bunch</a>
                </div>
            </div>

            <div class="df-example demo-table">

                <table id="example2" class="table">
                    <thead>
                        <tr>
                            <th class="wd-5p">Id</th>
                            <th class="wd-5p">date</th>

                            <th class="wd-5p">Name</th>
                            <th class="wd-5p">Phone/Email</th>
                            <th class="wd-5p">Message</th>

                            <th class="wd-5p">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        $x = mysqli_query($con, "select * from `web_query`  ORDER BY `id` DESC");
                        while ($y = mysqli_fetch_array($x)) {
                            echo '<tr>
                                <td>' . $i . '</td>
                                <td>' . $y['date'] . '</td>
                                <td> ' . wordwrap($y['name'],50,'<br>') . ' </td>
                                <td>
                                    P: ' . strip_tags($y['phone']) . '<br>
                                    E: ' . strip_tags($y['email']) . '</td>
                                <td>' . $y['message'] . '</td>

                                <td><a  href="query-del.php?id=' . $y['id'] . '"><i data-feather="trash-2"></i></a> </td>
                            </tr>';
                            $i++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <?php include('footer.php'); ?>
    </div>
    </div>
    </div>
</body>

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