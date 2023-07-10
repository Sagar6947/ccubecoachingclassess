<?php
include("config.php");
include("session.php");

$testid = $_GET['id'];

$qu = mysqli_query($con, "SELECT * FROM `candidate_test_attempts` WHERE `id` = '$testid'  ORDER BY `id` DESC");
$test_row = mysqli_fetch_array($qu);
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$g = "SELECT `test_result`.`stu_id`,`test_result`.`id` as `rid`,`test_result`.`test_id`,`test_questions`.`id` as `qid`,`test_result`.`answer`,`test_result`.`correct_ans`,`test_result`.`marks`,`test_questions`.`question`,`test_questions`.`option_a`,`test_questions`.`option_c`,`test_questions`.`option_b`,`test_questions`.`option_d`,`test_questions`.`answer` as `canswer`,`test_questions`.`hindi_question`,`test_questions`.`hindi_option_a`,`test_questions`.`hindi_option_c`,`test_questions`.`hindi_option_b`,`test_questions`.`hindi_option_d`,`test_questions`.`hindi_answer`,`test_questions`.`explanation`,`test_questions`.`hindi_explanation` FROM `test_result` JOIN `test_questions`  WHERE `stu_id`='" . $test_row['s_id'] . "' AND `test_id`='" . $test_row['t_id'] . "' AND `test_result`.`quest_id` = `test_questions`.`id` AND `attempt_id`= '" . $testid . "' AND `quest_type`='0' ";
// echo $g;
$qcv = mysqli_query($con, $g);

if (isset($_POST['submit'])) {
    $total = 0;
    $marks = $_POST['marks'];
    $question_id = $_POST['question_id'];
    for ($i = 0; $i <= count($question_id); $i++) {
        if ($question_id[$i] != '') {
            $qu = mysqli_query($con, "UPDATE `test_result` SET `marks`='" . $marks[$i] . "'  WHERE  id='" . $question_id[$i] . "' ");
            $total += $marks[$i];
        }
    }

    while ($rcv = mysqli_fetch_array($qcv)) {
        $total += $rcv['marks'];
    }

    $qu = mysqli_query($con, "UPDATE `candidate_test_attempts` SET `t_marks`='" . $total . "'  WHERE  id='" . $testid . "' ");
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
            <div class="row row-xs">
                <div class="col-sm-6">
                    <h1 class="df-title">Student Result</h1>
                </div>
                <div class="col-sm-6">
                    <!-- <a href="marking.php?id=<?= $testid ?>" class="btn btn-primary">Markings</a> -->
                </div>
            </div>
            <div class="df-example demo-table">
                <div class="row row-xs">

                </div>
                <form action="" method="post">
                    <h4 id="section1" class="mg-b-10">Descriptive Solutions</h4>
                    <div class="row row-xs">
                        <div class="col-sm-12">
                            <?php
                            $jo = 1;
                            $g = "SELECT `test_result`.`stu_id`,`test_result`.`id` as `rid`,`test_result`.`test_id`,`test_questions`.`id` as `qid`,`test_result`.`answer`,`test_result`.`correct_ans`,`test_result`.`marks`,`test_questions`.`question`,`test_questions`.`option_a`,`test_questions`.`option_c`,`test_questions`.`option_b`,`test_questions`.`option_d`,`test_questions`.`answer` as `canswer`,`test_questions`.`hindi_question`,`test_questions`.`hindi_option_a`,`test_questions`.`hindi_option_c`,`test_questions`.`hindi_option_b`,`test_questions`.`hindi_option_d`,`test_questions`.`hindi_answer`,`test_questions`.`explanation`,`test_questions`.`hindi_explanation` FROM `test_result` JOIN `test_questions`  WHERE `stu_id`='" . $test_row['s_id'] . "' AND `test_id`='" . $test_row['t_id'] . "' AND `test_result`.`quest_id` = `test_questions`.`id` AND `test_result`.`time`  LIKE  '" . substr($test_row['time'], 0, 6) . "__" . substr($test_row['time'], 8, 2) . "'  AND `quest_type`='1' ";
                            // echo $g;
                            $q = mysqli_query($con, $g);
                            while ($r = mysqli_fetch_array($q)) {

                                echo '
                <div class="alert alert-info" role="alert">
                    <h6>Question no. ' . $jo . '</h6>
                    <p class="mg-b-0"><b>' . $r['question'] . '</b></p>
                    <p class="mg-b-0"><b>' . $r['hindi_question'] . '</b></p>
                </div>
               Your solutions -
                ';
                                echo $r['answer'] . '
                            <br><b> Marks : ' . $r['marks'] . '</b>

                <div class="row col-md-3">

                ';
                            ?>
                                <label>Give Marks here</label>
                                <input type="text" class="form-control" name="marks[]" value="<?= $r['marks']; ?>">
                                <input type="hidden" name="question_id[]" value="<?= $r['rid']; ?>">
                        </div>


                    <?php
                                echo '
               <br> <br>


                ';


                                $jo++;
                            }



                    ?>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Update marks</button>
                </form>
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