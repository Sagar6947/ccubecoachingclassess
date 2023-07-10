<?php
include("config.php");
include("session.php");
mysqli_set_charset($con,'utf8');
if (isset($_POST['submit'])) {
    $question = $_POST['questions'];
    if (!empty($question)) {
        $series = $_POST['series'];
        for ($i = 0; $i < count($question); $i++) {
            if (!empty($question[$i])) {
                $que = mysqli_real_escape_string($con, nl2br($question[$i]));
                $ans = mysqli_real_escape_string($con,$_POST['answer'][$i]);
                $ansa = mysqli_real_escape_string($con,$_POST['option-a'][$i]);
                $ansb = mysqli_real_escape_string($con,$_POST['option-b'][$i]);
                $ansc = mysqli_real_escape_string($con,$_POST['option-c'][$i]);
                $ansd = mysqli_real_escape_string($con,$_POST['option-d'][$i]);
                $explanation =  mysqli_real_escape_string($con,nl2br($_POST['explanation'][$i]));

                $hindi_que =  mysqli_real_escape_string($con,nl2br($_POST['hindi_questions'][$i]));
                $hindi_ans = mysqli_real_escape_string($con,$_POST['hindi_answer'][$i]);
                $hindi_ansa = mysqli_real_escape_string($con,$_POST['hindi_option-a'][$i]);
                $hindi_ansb = mysqli_real_escape_string($con,$_POST['hindi_option-b'][$i]);
                $hindi_ansc = mysqli_real_escape_string($con,$_POST['hindi_option-c'][$i]);
                $hindi_ansd =mysqli_real_escape_string($con, $_POST['hindi_option-d'][$i]);
                $hindi_explanation = mysqli_real_escape_string($con,nl2br($_POST['hindi_explanation'][$i]));
$query =  "INSERT INTO `test_questions`(`test_series_id`, `question`, `answer`, `option_a`, `option_b`, `option_c`, `option_d`,`explanation`, `hindi_question`, `hindi_answer`, `hindi_option_a`, `hindi_option_b`, `hindi_option_c`, `hindi_option_d`,`hindi_explanation`) VALUES ('" . $series . "','" . $que . "','" . $ans . "','" . $ansa . "','" . $ansb . "','" . $ansc . "','" . $ansd . "','" . $explanation . "','" . $hindi_que . "','" . $hindi_ans . "','" . $hindi_ansa . "','" . $hindi_ansb . "','" . $hindi_ansc . "','" . $hindi_ansd . "','" . $hindi_explanation . "')";
echo $query;
                $sal = mysqli_query($con,$query);
            }
        }
    }
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
    <link rel="stylesheet" href="assets/css/dashforge.demo.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script src="https://cdn.ckeditor.com/ckeditor5/26.0.0/classic/ckeditor.js"></script>
    <script type="application/javascript">
        $(document).ready(function(){
            //group add limit
            var maxGroup = 200;

            //add more fields group
            $(".addMore").click(function(){
                if($('body').find('.fieldGroup').length < maxGroup){
                    var fieldHTML = '<div class="form-group fieldGroup">'+$(".fieldGroupCopy").html()+'</div>';
                    $('body').find('.fieldGroup:last').after(fieldHTML);

                }else{
                    alert('Maximum '+maxGroup+' groups are allowed.');
                }
                textadd();

            });

            //remove fields group
            $("body").on("click",".remove",function(){
                $(this).parents(".fieldGroup").remove();
            });
        });
    </script>
</head>
<body data-spy="scroll" data-target="#navSection" data-offset="120">

<?php include ('header.php'); ?>
<?php include ('sidemenu.php'); ?>

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
    <div  class="df-example demo-forms">
        <form method="post" enctype="multipart/form-data" action="">
            <div class="form-group col-md-4">
                <label>Select Test Series</label>
                <select class="form-control" name="series" required>
                    <option value="">Select Test Series</option>
                    <?php
                    $sq=mysqli_query($con,"select * from test_series");
                    while ($row = mysqli_fetch_array($sq))
                    {
                         $b = mysqli_query($con, "select * from `main_courses` where `id`='".$row['test_name']."' ");
                        $a = mysqli_fetch_array($b);

                        echo "<option value='".$row['id']."'>".$a['name']." - ".$row['examtitle']."</option>";
                    }
                    ?>

                </select>
            </div>
            <div class="fieldGroup form-row">
            <div class="form-group col-md-12" ><hr><b>In English</b></div>
                <div class="form-group col-md-6">
                    <label>Questions</label>
                    <textarea   name="questions[]" class="form-control editor" id="" placeholder="Questions" ></textarea>
                </div>
                <div class="form-group col-md-2">
                    <label>Correct Answer</label>
                    <input type="text" class="form-control " name="answer[]" placeholder="Answer" >

                </div>
                <div class="form-group col-md-1">
                    <label>Option A</label>
                    <input type="text" class="form-control" name="option-a[]" placeholder="Option A" >

                </div>
                <div class="form-group col-md-1">
                    <label>Option B</label>
                    <input type="text" class="form-control" name="option-b[]" placeholder="Option B" >

                </div>
                <div class="form-group col-md-1">
                    <label>Option C</label>
                    <input type="text" class="form-control" name="option-c[]" placeholder="Option C" >

                </div>
                <div class="form-group col-md-1">
                    <label>Option D</label>
                    <input type="text" class="form-control" name="option-d[]" placeholder="Option D" >

                </div>
                <div class="form-group col-md-11" >
                    <label>Explanation</label>
                    <textarea  class="form-control  editor" name="explanation[]" placeholder="Explanation" ></textarea>

                </div>
                <div class="form-group col-md-12" ><hr><b>In Hindi</b></div>
                <div class="form-group col-md-6">
                    <label>Questions</label>
                    <textarea   name="hindi_questions[]" class="form-control editor" placeholder="Questions" ></textarea>
                </div>
                <div class="form-group col-md-2">
                    <label>Correct Answer</label>
                    <input type="text" class="form-control" name="hindi_answer[]" placeholder="Answer" >

                </div>
                <div class="form-group col-md-1">
                    <label>Option A</label>
                    <input type="text" class="form-control" name="hindi_option-a[]" placeholder="Option A" >

                </div>
                <div class="form-group col-md-1">
                    <label>Option B</label>
                    <input type="text" class="form-control" name="hindi_option-b[]" placeholder="Option B" >

                </div>
                <div class="form-group col-md-1">
                    <label>Option C</label>
                    <input type="text" class="form-control" name="hindi_option-c[]" placeholder="Option C" >

                </div>
                <div class="form-group col-md-1">
                    <label>Option D</label>
                    <input type="text" class="form-control" name="hindi_option-d[]" placeholder="Option D" >

                </div>
                <div class="form-group col-md-11" >
                    <label>Explanation</label>

<textarea  class="form-control  editor" name="hindi_explanation[]" placeholder="Hindi Explanation" ></textarea>
                </div>

                <div class="col-md-1">
                    <label> ADD</label>

                </div>
            </div>
            <div class="fieldGroupCopy " style="display: none;">
            <div class="form-row">
            <div class="form-group col-md-12" ><hr style="background:black;"><b>In English</b></div>
                <div class="form-group col-md-6">
                    <label>Questions</label>

                   <textarea   name="questions[]" class="form-control editor" placeholder="Questions" ></textarea>
                </div>
                <div class="form-group col-md-2">
                    <label>Correct Answer</label>
                    <input type="text" class="form-control" name="answer[]" placeholder="Answer" >

                </div>
                <div class="form-group col-md-1">
                    <label>Option A</label>
                    <input type="text" class="form-control" name="option-a[]" placeholder="Option A" >

                </div>
                <div class="form-group col-md-1">
                    <label>Option B</label>
                    <input type="text" class="form-control" name="option-b[]" placeholder="Option B" >

                </div>
                <div class="form-group col-md-1">
                    <label>Option C</label>
                    <input type="text" class="form-control" name="option-c[]" placeholder="Option C" >

                </div>
                <div class="form-group col-md-1">
                    <label>Option D</label>
                    <input type="text" class="form-control" name="option-d[]" placeholder="Option D" >

                </div>
                <div class="form-group col-md-11" >
                    <label>Explanation</label>
                    <!--<input type="text" class="form-control" name="explanation[]" placeholder="Explanation" >-->
                    <textarea  class="form-control  editor" name="explanation[]" placeholder="  Explanation" ></textarea>

                </div>
                <div class="form-group col-md-12" ><hr><b>In Hindi</b></div>
                <div class="form-group col-md-6">
                    <label>Questions</label>
                    <!--<input type="text" name="hindi_questions[]" class="form-control" placeholder="Questions" >-->
                    <textarea   name="hindi_questions[]" class="form-control editor" placeholder="Questions" ></textarea>
                </div>
                <div class="form-group col-md-2">
                    <label>Correct Answer</label>
                    <input type="text" class="form-control" name="hindi_answer[]" placeholder="Answer" >

                </div>
                <div class="form-group col-md-1">
                    <label>Option A</label>
                    <input type="text" class="form-control" name="hindi_option-a[]" placeholder="Option A" >

                </div>
                <div class="form-group col-md-1">
                    <label>Option B</label>
                    <input type="text" class="form-control" name="hindi_option-b[]" placeholder="Option B" >

                </div>
                <div class="form-group col-md-1">
                    <label>Option C</label>
                    <input type="text" class="form-control" name="hindi_option-c[]" placeholder="Option C" >

                </div>
                <div class="form-group col-md-1">
                    <label>Option D</label>
                    <input type="text" class="form-control" name="hindi_option-d[]" placeholder="Option D" >

                </div>
                <div class="form-group col-md-11" >
                    <label>Explanation</label>
                    <!--<input type="text" class="form-control" name="hindi_explanation[]" placeholder="Explanation" >-->
                    <textarea  class="form-control  editor" name="hindi_explanation[]" placeholder="Hindi Explanation" ></textarea>

                </div>
                <div class="col-md-1">
                    <label> </label>
                    <a href="javascript:void(0)" class="form-control btn btn-danger remove" style="background-color:red;color:white;font-size:14px;"> REMOVE </a>
                </div>
            </div>

            </div>
            <div class="col-md-12" style="text-align:center">
                <a href="javascript:void(0)" class="form-control btn btn-success addMore " style="background-color:green;color:white;font-size:16px;width:300px;"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"> + ADD NEW QUESTIONS </span>  </a>
            </div>
            <div class="col-md-12">
                <button type="submit" name="submit" class="btn btn-success">Save ALL Questions</button>
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
<script>
function textadd(){
// var cols = document.querySelectorAll(".editor");
// console.log(cols);
// [].forEach.call(cols, (e)=>{
//  console.log(e.);
// //  CKEDITOR.replace(e);


//   ClassicEditor
//         .create( e )
//         .catch( error => {
//             console.error( error );
//         } );



// });
}
textadd();





</script>
<script>
    $(function(){
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
            "columns": [
                { "data": "name" },
                { "data": "position" },
                { "data": "office" },
                { "data": "extn" },
                { "data": "salary" }
            ],
            language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
                lengthMenu: '_MENU_ items/page',
            }
        });

        // Select2
        $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

    });
</script>
</body>
</html>
