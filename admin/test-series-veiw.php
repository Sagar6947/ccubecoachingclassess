<?php
include("config.php");
include("session.php");
if (isset($_POST['submit'])) {
    $question = $_POST['questions'];
    $series = $_POST['series'];
    $que = mysqli_real_escape_string($con, $question);



    $query =  "INSERT INTO `test_questions`(`test_series_id`, `question`) VALUES
        ('" . $series . "','" . $que . "')";

    $sal = mysqli_query($con, $query);
    $ques_id =  mysqli_insert_id($con);
    if ($sal) {

        echo '<script>window.location.href="test-series-veiw.php?id=' . $series . '";</script>';
    } else {
        echo "Error in Insertion of your image...Please try again later!";
    }
}




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

        <form method="post" enctype="multipart/form-data" action="">
            <div class="df-example demo-forms row">
                <div class="form-group col-md-12">
                    <label>Select Question Paper  </label>
                    <select class="form-control" name="series" required>
                        <option value="">Select Question Paper  </option>
                        <?php
                        $sq = mysqli_query($con, "select * from test_series");
                        while ($row = mysqli_fetch_array($sq)) {
                            echo "<option value='" . $row['id'] . "'  " . (($row['id'] == $_GET['id']) ? 'selected' : '') . " >  " . $row['examtitle'] . "</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group col-md-12 row">

                    <div class="form-group col-md-12">
                        <label>Questions</label>
                        <textarea name="questions" class="form-control summernote" id="" placeholder="Questions"></textarea>
                    </div>


                </div>

                <div class="col-md-12">
                    <button type="submit" name="submit" class="btn btn-success">Save Questions</button>
                </div>
            </div>
        </form>

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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>
    <script>
        $('textarea.summernote').summernote({
            placeholder: '',
            tabsize: 2,
            height: 100,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
                ['fontname', ['fontname']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'hr']],
                //['view', ['fullscreen', 'codeview']],
                ['help', ['help']]
            ],
        });

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
    <script type="application/javascript">
        $(document).ready(function() {
            //group add limit
            var maxGroup = 200;
            var count = 0;
            //add more fields group
            $(".addMore").click(function() {
                if ($('body').find('.fieldGroup').length < maxGroup) {
                    var fieldHTML = '<div class="form-group fieldGroup"><div class="form-group col-md-12 grp' + count + '"><label>Option </label><input type="text" class="form-control" name="option[]" placeholder="Option "><a href="javascript:void(0)" class="badge badge-danger remove" data-id="' + count + '"><i class="fa fa-minus-circle" aria-hidden="true" style="font-size:14px;"></i></a></div></div>';
                    $('body').find('.fieldGroup:last').after(fieldHTML);
                } else {
                    alert('Maximum ' + maxGroup + ' groups are allowed.');
                }

                if ($('body').find('.fieldGrouphindi').length < maxGroup) {
                    var fieldHTML = '<div class="form-group fieldGrouphindi"><div class="form-group col-md-12 grp' + count + '"><label>Option </label><input type="text" class="form-control" name="hindi_option[]" placeholder="Option "><a href="javascript:void(0)" class="badge badge-danger remove" data-id="' + count + '"><i class="fa fa-minus-circle" aria-hidden="true" style="font-size:14px;"></i></a></div></div>';
                    $('body').find('.fieldGrouphindi:last').after(fieldHTML);
                } else {
                    alert('Maximum ' + maxGroup + ' groups are allowed.');
                }
                count++;
            });

            //remove fields group
            $("body").on("click", ".remove", function() {
                var id = $(this).data("id");
                $(".grp" + id).remove();
            });
        });
    </script>
</body>

</html>