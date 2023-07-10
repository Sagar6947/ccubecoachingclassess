<?php
include("config.php");
include("session.php");
$sqs = mysqli_query($con, "select * from test_series WHERE id='" . $_GET['id'] . "'  ORDER BY `id` DESC");
$rows = mysqli_fetch_array($sqs);
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
                <div class="col-sm-4">
                <p><b><?= $rows['examtitle'] ?> </b><br>Descriptive Question list
</p>
                </div>
                <div class="col-sm-2">
                    <a href="discriptive_section.php?id=<?= $_GET['id'] ?>" class="btn btn-secondary">Add Desc. Ques.</a>
                </div>
                <div class="col-sm-2">
                    <a href="discriptive_section_list.php?id=<?= $_GET['id'] ?>" class="btn btn-secondary">View Desc. Ques.</a>
                </div>
                <div class="col-sm-2">
                    <a href="test-series-veiw.php?id=<?= $_GET['id'] ?>" class="btn btn-secondary">Add Ques.</a>
                </div>
                <div class="col-sm-2">
                    <a href="test-series-view_list.php?id=<?= $_GET['id'] ?>" class="btn btn-secondary">Ques. List</a>
                </div>
            </div>
        </div><br><br>

        <div data-label=" " class="df-example demo-table">
            <table id="example1" class="table">
                <thead>
                    <tr>
                        <th class="wd-10p">S.no.</th>
                        <th class="wd-40p">Question</th>
                        <th class="wd-10p">Word limit</th>
                        <th class="wd-10p">Edit</th>
                        <th class="wd-10p">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    $fg = "select * from `test_questions` WHERE `test_series_id` = " . $_GET['id'] . " AND `quest_type`='1'  ORDER BY `id` DESC";
                    // echo $fg;
                    $b = mysqli_query($con, $fg);
                    while ($a = mysqli_fetch_array($b)) {
                        echo
                        ' <tr>
                    <td>' . $i . '</td>
                    <td>' . wordwrap(strip_tags($a['question']), '60', '<br>') . '</td>
                     <td>' . $a['wordlimit'] . '</td>


                      <td> <a  class="btn btn-primary" href="testquest-desc-edit.php?id=' . $a['id'] . '&tid=' . $_GET['id'] . '&type=1">Edit</a></td>
                      <td> <a  class="btn btn-danger" href="testquest-del.php?id=' . $a['id'] . '&tid=' . $_GET['id'] . '&type=1">Delete</a></td>
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