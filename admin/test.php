<?php
include("config.php");
include("session.php");
if (isset($_POST['upload'])) {
    $date = date("j M,Y");

    $title = $_POST['title'];
    $number = $_POST['num'];
    $duration = $_POST['time'];

    $file = $_FILES['img']['name'];
    $tmpfile = $_FILES['img']['tmp_name'];
    $folder = 'images/' . $file;
    move_uploaded_file($tmpfile, $folder);

    $sal =  mysqli_query($con, "INSERT INTO `test_series`(`date`, `test_name`, `test_icon`, `total_questions`, `duration`) VALUES ('" . $date . "','" . $title . "','" . $folder . "','" . $number . "','" . $duration . "')");
    if ($sal) {
        echo '<script>window.location.href="test-series.php";</script>';
    } else {
        echo "Error in Insertion of your image...Please try again later!";
    }
}
if (isset($_POST['submit'])) {
$question = $_POST['questions'];
$series = $_POST['series'];
$que = mysqli_real_escape_string($con, $question);
$ans = mysqli_real_escape_string($con,$_POST['answer']);
$ansa = mysqli_real_escape_string($con,$_POST['option-a']);
$ansb = mysqli_real_escape_string($con,$_POST['option-b']);
$ansc = mysqli_real_escape_string($con,$_POST['option-c']);
$ansd = mysqli_real_escape_string($con,$_POST['option-d']);
$explanation =  mysqli_real_escape_string($con,$_POST['explanation']);
$hindi_que =  mysqli_real_escape_string($con,$_POST['hindi_questions']);
$hindi_ans = mysqli_real_escape_string($con,$_POST['hindi_answer']);
$hindi_ansa = mysqli_real_escape_string($con,$_POST['hindi_option-a']);
$hindi_ansb = mysqli_real_escape_string($con,$_POST['hindi_option-b']);
$hindi_ansc = mysqli_real_escape_string($con,$_POST['hindi_option-c']);
$hindi_ansd =mysqli_real_escape_string($con, $_POST['hindi_option-d']);
$hindi_explanation = mysqli_real_escape_string($con,$_POST['hindi_explanation']);
$query =  "INSERT INTO `test_questions`(`test_series_id`, `question`, `answer`, `option_a`, `option_b`, `option_c`, `option_d`,`explanation`, `hindi_question`, `hindi_answer`, `hindi_option_a`, `hindi_option_b`, `hindi_option_c`, `hindi_option_d`,`hindi_explanation`) VALUES ('" . $series . "','" . $que . "','" . $ans . "','" . $ansa . "','" . $ansb . "','" . $ansc . "','" . $ansd . "','" . $explanation . "','" . $hindi_que . "','" . $hindi_ans . "','" . $hindi_ansa . "','" . $hindi_ansb . "','" . $hindi_ansc . "','" . $hindi_ansd . "','" . $hindi_explanation . "')";
echo $query;
                $sal = mysqli_query($con,$query);


    if ($sal) {
        // echo '<script>window.location.href="test-series-veiw.php?id='.$series.'";</script>';
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
                <div class="col-sm-10">
                    <h1 class="df-title">Test Series Questions
                    </h1>
                </div>
                <div class="col-sm-2"></div>
            </div>
        </div>
<h4 id="section3" class="mg-b-10">Add Questions</h4>


            <form method="post" enctype="multipart/form-data" action="">
                 <div class="df-example demo-forms row">
                <div class="form-group col-md-12">
                    <label>Select Test Series</label>
                    <select class="form-control" name="series" required>
                        <option value="">Select Test Series</option>
                        <?php
                        $sq = mysqli_query($con, "select * from test_series");
                        while ($row = mysqli_fetch_array($sq)) {
                            $b = mysqli_query($con, "select * from `main_courses` where `id`='" . $row['test_name'] . "' ");
                            $a = mysqli_fetch_array($b);

                            echo "<option value='" . $row['id'] . "'  " . (($row['id'] == $_GET['id']) ? 'selected' : '') . " >" . $a['name'] . " - " . $row['examtitle'] . "</option>";
                        }
                        ?>

                    </select>
                </div>

                <div class="form-group col-md-6 row">
                    <div class="form-group col-md-12">
                        <hr><b>In English</b>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Questions</label>
                        <textarea name="questions" class="form-control editor" id="" placeholder="Questions"></textarea>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Correct Answer</label>
                        <input type="text" class="form-control " name="answer" placeholder="Answer">

                    </div>
                    <div class="form-group col-md-6">
                        <label>Option A</label>
                        <input type="text" class="form-control" name="option-a" placeholder="Option A">

                    </div>
                    <div class="form-group col-md-6">
                        <label>Option B</label>
                        <input type="text" class="form-control" name="option-b" placeholder="Option B">

                    </div>
                    <div class="form-group col-md-6">
                        <label>Option C</label>
                        <input type="text" class="form-control" name="option-c" placeholder="Option C">

                    </div>
                    <div class="form-group col-md-6">
                        <label>Option D</label>
                        <input type="text" class="form-control" name="option-d" placeholder="Option D">

                    </div>
                    <div class="form-group col-md-12">
                        <label>Explanation</label>
                        <textarea class="form-control  editor" name="explanation" placeholder="Explanation"></textarea>

                    </div>
                </div>
                <div class="form-group row col-md-6">
                    <div class="form-group col-md-12">
                        <hr><b>In Hindi</b>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Questions</label>
                        <textarea name="hindi_questions" class="form-control editor" placeholder="Questions"></textarea>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Correct Answer</label>
                        <input type="text" class="form-control" name="hindi_answer" placeholder="Answer">

                    </div>
                    <div class="form-group col-md-6">
                        <label>Option A</label>
                        <input type="text" class="form-control" name="hindi_option-a" placeholder="Option A">

                    </div>
                    <div class="form-group col-md-6">
                        <label>Option B</label>
                        <input type="text" class="form-control" name="hindi_option-b" placeholder="Option B">

                    </div>
                    <div class="form-group col-md-6">
                        <label>Option C</label>
                        <input type="text" class="form-control" name="hindi_option-c" placeholder="Option C">

                    </div>
                    <div class="form-group col-md-6">
                        <label>Option D</label>
                        <input type="text" class="form-control" name="hindi_option-d" placeholder="Option D">

                    </div>
                    <div class="form-group col-md-12">
                        <label>Explanation</label>

                        <textarea class="form-control  editor" name="hindi_explanation" placeholder="Hindi Explanation"></textarea>
                    </div>

                </div>
                <div class="col-md-12">
                    <button type="submit" name="submit" class="btn btn-success">Save   Questions</button>
                </div>
                </div>
            </form>


        <div class="df-example demo-table">
            <table id="example2" class="table">
                <thead>
                    <tr>
                        <th class="wd-5p">S.no.</th>
                        <th class="wd-15p">Question</th>
                        <th class="wd-15p">Options</th>
                        <th class="wd-15p">Explanation</th>

<th class="wd-15p">Delete</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    $fg = "select * from `test_questions` WHERE `test_series_id` = " . $_GET['id'] . "   ORDER BY `id` DESC";
                    // echo $fg;
                    $b = mysqli_query($con, $fg);
                    while ($a = mysqli_fetch_array($b)) {
                        echo
                        ' <tr>
                    <td>' . $i . '</td>
                    <td>' .wordwrap($a['question'],'50','<br>') . '</td>

                    <td>A - ' . $a['option_a'] . ' <br> B - ' . $a['option_b'] . '  <br> C - ' . $a['option_c'] . ' <br> D -' . $a['option_d'] . ' <br>Correct -' . $a['answer'] . ' </td>
                     <td>' . wordwrap($a['explanation'],'150','<br>') . ' </td>
                      <td> <a  class="btn btn-danger" href="testquest-del.php?id=' . $a['id'] . '&tid='.$_GET['id'].'">Delete</a></td>
                    </tr>';
                        $i++;
                    }
                    // <td>A - ' . $a['option_a'] . '/ <p>' . $a['hindi_option_a'] . ' </p><br> B - ' . $a['option_b'] . ' /' . $a['hindi_option_b'] . ' <br> C - ' . $a['option_c'] . '/' . $a['hindi_option_c'] . ' <br> D -' . $a['option_d'] . '/' . $a['hindi_option_d'] . ' <br>Correct -' . $a['answer'] . '/ ' . $a['hindi_answer'] . '</td>
                    ?>
                </tbody>
            </table>
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
    function textadd(){
var cols = document.querySelectorAll(".editor");
console.log(cols);
[].forEach.call(cols, (e)=>{
//  console.log(e.);


  ClassicEditor
        .create( e )
        .catch( error => {
            console.error( error );
        } );



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