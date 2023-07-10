<?php
include("config.php");
include("session.php");
$id = $_GET['id'];
$query = mysqli_query($con, "SELECT * FROM `test_series` WHERE `id`='$id'");
$row = mysqli_fetch_array($query);
if (isset($_POST['upload'])) {
    $date = date("j M,Y");

    $title = $_POST['title'];

    $examtitle = $_POST['examtitle'];
    $number = $_POST['num'];
    $duration = $_POST['time'];
    $positive = $_POST['positive'];
    $negative = $_POST['negative'];
    $descriptive = ((isset($_POST['descriptive'])) ? '1' : '0');
    if (!empty($_FILES['img']['name'])) {
        $file = $_FILES['img']['name'];
        $tmpfile = $_FILES['img']['tmp_name'];
        $folder = 'images/' . $file;
        move_uploaded_file($tmpfile, $folder);
    } else {
        $folder = $_POST['img_nm'];
    }

    $sal =  mysqli_query($con, "UPDATE `test_series` SET  `test_name`='" . $title . "',`test_icon`='" . $folder . "',`total_questions`='" . $number . "',`duration`='" . $duration . "',`positive`='" . $positive . "',`negative`='" . $negative . "',`examtitle`='" . $examtitle . "',`descriptive`='" . $descriptive . "',`subject_id`='" . $title . "' WHERE `id`='$id'");
    if ($sal) {
        echo '<script>window.location.href="test-series-list.php";</script>';
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
    <title>C cube | Questation Paper  </title>
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
                    <h1 class="df-title">Questation Paper  
                    </h1>
                </div>
                <div class="col-sm-2"></div>
            </div>
        </div>
        <h4 id="section3" class="mg-b-10">Edit Questation Paper  </h4>

        <div class="df-example demo-forms">
            <form method="post" enctype="multipart/form-data" action="">
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label>Subject</label>
                        <select name="title" class="form-control" required>
                            <option value="">Select Subject </option>
                            <?php
                            $b = mysqli_query($con, "select * from `pdf_category`  ");
                            while ($a = mysqli_fetch_array($b)) {
                                $b1 = mysqli_query($con, "select * from `main_courses`  WHERE `id`='" . $a['class_id'] . "' ");
                                $a1 = mysqli_fetch_array($b1);
                            ?>

                                <option value="<?= $a['id'] ?>" <?= ($a['id'] == $row['subject_id'])? 'selected':'' ?>><?= $a1['name'] ?>,<?= $a['name'] ?></option>

                            <?php
                            }
                            ?>

                        </select>
                    </div>

                    <div class="form-group col-md-3">
                        <label>No. of Questions</label>
                        <input type="number" class="form-control" name="num" placeholder="Ex:- 120" value="<?= $row['total_questions']; ?>" required>

                    </div>
                    <div class="form-group col-md-3  d-none">
                        <label>Duration (in minutes)</label>
                        <input class="form-control" name="time" type="text" placeholder="30" value="<?= $row['duration']; ?>" >

                    </div>
                    <div class="form-group col-md-3">
                        <label>Exam Title</label>
                        <input class="form-control" name="examtitle" type="text" value="<?= $row['examtitle']; ?>" required>

                    </div>
                    <div class="form-group col-md-3  d-none">
                        <label>Positive Marking</label>
                        <input class="form-control" name="positive" type="text" placeholder="1" value="<?= $row['positive']; ?>" >

                    </div>
                    <div class="form-group col-md-3  d-none">
                        <label>Negative Marking</label>
                        <input class="form-control" name="negative" type="text" placeholder="1" value="<?= $row['negative']; ?>" >

                    </div>

                    <div class="form-group col-md-3">
                        <label>Image</label>
                        <input type="file" name="img" class="form-control" placeholder="150">
                        <input type="hidden" name="img_nm" class="form-control" value="<?= $row['test_icon']; ?>">

                    </div>
                    <!-- <div class="form-group col-md-3">
                        <label><br></label><br>
                        <input type="checkbox" name="descriptive" id="dsec" value="1" <?= (($row['descriptive'] == '1') ? 'checked' : '') ?> /> Add descriptive section ?

                    </div> -->

                    <!-- <div class="form-group col-md-12 row dsec" style="display:none">
                        <div class="form-group col-md-12"><br>
                            <h4> Descriptive Section info</h4>
                        </div>
                        <div class="form-group col-md-3">
                            <label>No. of Questions</label>
                            <input type="number" class="form-control" name="ds_num" placeholder="Ex:- 120" value="<?= $row['ds_num']; ?>">

                        </div>
                        <div class="form-group col-md-3">
                            <label>Duration (in minutes)</label>
                            <input class="form-control" name="ds_time" type="text" placeholder="30" value="<?= $row['ds_time']; ?>">

                        </div>

                        <div class="form-group col-md-3">
                            <label>Positive Marking</label>
                            <input class="form-control" name="ds_positive" type="text" placeholder="1" value="<?= $row['ds_positive']; ?>">

                        </div>
                    </div> -->
                    <div class="form-group col-md-3">
                        <br>
                        <button type="submit" name="upload" class="btn btn-primary">Submit Form</button>
                    </div>
            </form>
        </div>
    </div>


    <?php include('footer.php'); ?>


    <script src="lib/jquery/jquery.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="lib/feather-icons/feather.min.js"></script>
    <script src="lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="lib/prismjs/prism.js"></script>

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
    <script>
        $(document).ready(function() {
            $('input[name="descriptive"]').click(function() {
                if ($(this).prop("checked") == true) {
                    $('.dsec').show();
                } else if ($(this).prop("checked") == false) {
                    $('.dsec').hide();
                }
            });

            if ($('input[name="descriptive"]').prop("checked") == true) {
                $('.dsec').show();
            } else if ($('input[name="descriptive"]').prop("checked") == false) {
                $('.dsec').hide();
            }

        });
    </script>
</body>

</html>