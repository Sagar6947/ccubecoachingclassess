<?php
include("config.php");
include("session.php");
$id = $_GET['id'];
$tid = $_GET['tid'];
$query = mysqli_query($con, "SELECT * FROM `test_questions` WHERE `id`='$id'");
$row = mysqli_fetch_array($query);

if (isset($_POST['submit'])) {
    $question = $_POST['questions'];
    $que = mysqli_real_escape_string($con, $question);
  
    $query = "UPDATE `test_questions` SET  `question`='" . $que . "' WHERE `id`='$id'";
    $sal = mysqli_query($con, $query);

    if ($sal) {
       
        echo '<script>window.location.href="test-series-view_list.php?id=' . $tid . '";</script>';
    } else {
        echo "Error in Insertion of your image...Please try again later!";
    }
}
$arr = $harr = array();
$rtg = "select * from `test_questions_answer` WHERE `ques_id` = " . $_GET['id'] . " ";
$bc = mysqli_query($con, $rtg);

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

    <script src="https://cdn.cksummernote.com/cksummernote5/26.0.0/classic/cksummernote.js"></script>
    <link rel="stylesheet" href="assets/css/dashforge.demo.css">
</head>

<body data-spy="scroll" data-target="#navSection" data-offset="120">

    <?php include('header.php'); ?>
    <?php include('sidemenu.php'); ?>

    <div class="content content-components">
      
        <h4 id="section3" class="mg-b-10">Edit Questions</h4>


        <form method="post" enctype="multipart/form-data" action="">
            <div class="df-example demo-forms row">

                <div class="form-group col-md-12 row">
                    
                    <div class="form-group col-md-12">
                        <label>Questions</label>
                        <textarea name="questions" class="form-control summernote" id="" placeholder="Questions"><?= $row['question']; ?></textarea>
                    </div>
                   


                  
                </div>
              
                <div class="col-md-12">
                    <button type="submit" name="submit" class="btn btn-success">Save Questions</button>
                </div>
            </div>
        </form>




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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
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



            function textadd() {
                var cols = document.querySelectorAll(".summernote");
                console.log(cols);
                [].forEach.call(cols, (e) => {
                    //  console.log(e.);


                    Classicsummernote
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