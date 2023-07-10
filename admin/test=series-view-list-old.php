<?php
include("config.php");
include("session.php");
$sqs = mysqli_query($con, "select * from test_series WHERE id='" . $_GET['id'] . "' ");
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
    <link rel="stylesheet" href="assets/css/dashforge.demo.css">
</head>

<body data-spy="scroll" data-target="#navSection" data-offset="120">

    <?php include('header.php'); ?>
    <?php include('sidemenu.php'); ?>

    <div class="content content-components">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <p><b><?= $rows['examtitle'] ?> </b><br>Question list
                    </p>
                </div>
                <div class="col-sm-2">
                    <!-- <a href="discriptive_section.php?id=<?= $_GET['id'] ?>" class="btn btn-secondary">Add Desc. Ques.</a> -->
                </div>
                <div class="col-sm-2">
                    <!-- <a href="discriptive_section_list.php?id=<?= $_GET['id'] ?>" class="btn btn-secondary">View Desc. Ques.</a> -->
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
            <table id="example2" class="table">
                <thead>
                    <tr>
                        <th>S.no.</th>
                        <th>Question</th>

                        <th>View</th>
                        <th>Edit</th>
                        <!--<th>Remove Ques. IMG</th>-->
                        <!--<th>Remove Exp. IMG</th>-->
                        <th>Delete</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    $fg = "select * from `test_questions` WHERE `test_series_id` = " . $_GET['id'] . " AND `quest_type`='0'  ORDER BY `id` DESC";
                    // echo $fg;
                    $b = mysqli_query($con, $fg);
                    while ($a = mysqli_fetch_array($b)) {
                        echo
                        ' <tr>
                    <td>' . $i . '</td>
                    <td>' . substr(strip_tags($a['question']), '0', '60') . '</td>

                      <td> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal' . $i . '">
                     View Details
                    </button> </td>
                      <td> <a  class="btn btn-primary" href="testquest-edit.php?id=' . $a['id'] . '&tid=' . $_GET['id'] . '">Edit</a></td>
                     
                     
                      
                      <td> <a  class="btn btn-danger" href="testquest-del.php?id=' . $a['id'] . '&tid=' . $_GET['id'] . '">Delete</a></td>
                    </tr>';
                        $i++;
                    }
                    // <td>A - ' . $a['option_a'] . '/ <p>' . $a['hindi_option_a'] . ' </p><br> B - ' . $a['option_b'] . ' /' . $a['hindi_option_b'] . ' <br> C - ' . $a['option_c'] . '/' . $a['hindi_option_c'] . ' <br> D -' . $a['option_d'] . '/' . $a['hindi_option_d'] . ' <br>Correct -' . $a['answer'] . '/ ' . $a['hindi_answer'] . '</td>
                    ?>
                </tbody>
            </table>
        </div>
        <?php
        $i = 1;
        $fg = "select * from `test_questions` WHERE `test_series_id` = " . $_GET['id'] . " ";
        // echo $fg;
        $b = mysqli_query($con, $fg);
        while ($a = mysqli_fetch_array($b)) {
            $arr = $harr = array();
            $rtg = "select * from `test_questions_answer` WHERE `ques_id` = " . $a['id'] . " ";

            $bc = mysqli_query($con, $rtg);
            while ($ac = mysqli_fetch_array($bc)) {
                $arr[] = $ac['eng_option'];
                $harr[] = $ac['hindi_option'];
            }

            echo
            '  <div class="modal bd-example-modal-lg fade" id="exampleModal' . $i . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog  modal-lg" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel"><span style="color:red">Question In English </span><br>' . $a['question'] . '<hr><span style="color:red">Question In Hindi </span>' . $a['hindi_question'] . '</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">

                            <div class="row">
                            <div class="col-md-6"><span style="color:red">Options In English</span> <br>
                            Correct -' . $a['answer'] . '<br>';

            if ($arr != '') {
                $ib = 1;
                foreach ($arr as $afv) {
                    echo $ib . ' - ' . $afv . '<br>';
                    $ib++;
                }
            }
            echo ' </div>
                            <div class="col-md-6"><span style="color:red">Options In Hindi </span><br>
                            Correct -' . $a['hindi_answer'] . '<br>';
            if ($harr != '') {
                $ib = 1;
                foreach ($harr as $afv) {
                    echo $ib . ' - ' . $afv . '<br>';
                    $ib++;
                }
            }
            echo ' </div>
                          </div>
                          <hr>

                            <span style="color:red">Explanation In English </span><br>
                            ' . $a['explanation'] . '
                            <hr>



                            <span style="color:red">Explanation In Hindi </span><br>
                            ' . $a['hindi_explanation'] . '

                            <hr>


                            </div>


                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                            </div>
                          </div>
                        </div>
                      </div>';
            $i++;
        }

        ?>
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
