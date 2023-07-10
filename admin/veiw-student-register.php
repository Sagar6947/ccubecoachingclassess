<?php
include("config.php");
include("session.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

$sql = mysqli_query($con, "select * from candidate_registre WHERE  id='$id'  ORDER BY `id` DESC ");
$row = mysqli_fetch_array($sql);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Bootstrap 4 Dashboard Template">
    <meta name="author" content="ThemePixels">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <title>C cube | student registeration</title>
    <link href="lib/%40fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="lib/typicons.font/typicons.css" rel="stylesheet">
    <link href="lib/prismjs/themes/prism-vs.css" rel="stylesheet">
    <link href="lib/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="lib/datatables.net-responsive-dt/css/responsive.dataTables.min.css" rel="stylesheet">
    <link href="lib/select2/css/select2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/dashforge.css">
    <link rel="stylesheet" href="assets/css/dashforge.demo.css">
    <!-- vendor css -->
    <link href="lib/%40fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="lib/typicons.font/typicons.css" rel="stylesheet">
    <link href="lib/prismjs/themes/prism-vs.css" rel="stylesheet">
    <link href="lib/quill/quill.core.css" rel="stylesheet">
    <link href="lib/quill/quill.snow.css" rel="stylesheet">
    <link href="lib/quill/quill.bubble.css" rel="stylesheet">
</head>

<body data-spy="scroll" data-target="#navSection" data-offset="120">

    <?php include('header.php'); ?>
    <?php include('sidemenu.php'); ?>

    <div class="content content-components">
        <div class="container">
            <h4 id="section3" class="mg-b-10">Student Register - info</h4>

            <div class="df-example demo-forms">

                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label> </label>
                        <img src="../student-dashboard/user-pic/<?php echo $row['img']; ?>" style="height:150px;">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Name</label>
                        <input class="form-control" readonly value="<?php echo $row['name']; ?>">

                    </div>
                    <div class="form-group col-md-4">
                        <label>Email</label>
                        <input class="form-control" readonly value="<?php echo $row['email']; ?>">

                    </div>
                    <div class="form-group col-md-4">
                        <label>Mobile</label>
                        <input class="form-control" readonly value="<?php echo $row['mobile']; ?>">

                    </div>
                    <div class="form-group col-md-4">
                        <label>Dob</label>
                        <input class="form-control" readonly value="<?php echo $row['dob']; ?>">

                    </div>
                    <div class="form-group col-md-4">
                        <label>Registration Date</label>
                        <input class="form-control" readonly value="<?php echo $row['date']; ?>">

                    </div>
                    <div class="form-group col-md-4">
                        <label>Address</label>
                        <input class="form-control" readonly value="<?php echo $row['address']; ?>">

                    </div>
                    <div class="form-group col-md-4">
                        <label>State</label>
                        <input class="form-control" readonly value="<?php echo $row['state']; ?>">

                    </div>
                    <div class="form-group col-md-4">
                        <label>City</label>
                        <input class="form-control" readonly value="<?php echo $row['city']; ?>">

                    </div>
                    <div class="form-group col-md-4">
                        <label>Status</label>
                        <input class="form-control" readonly value="<?php echo $row['status']; ?>">

                    </div>

                </div>


            </div>
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

    <script src="lib/jquery/jquery.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="lib/feather-icons/feather.min.js"></script>
    <script src="lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="lib/prismjs/prism.js"></script>
    <script src="lib/quill/quill.min.js"></script>

    <script src="assets/js/dashforge.js"></script>
    <script>
        $(function() {
            'use strict';

            var quill = new Quill('#editor-container', {
                modules: {
                    toolbar: '#toolbar-container'
                },
                placeholder: 'Compose an epic...',
                theme: 'snow'
            });

            var quill2 = new Quill('#editor-container2', {
                modules: {
                    toolbar: [
                        ['bold', 'italic'],
                        ['link', 'blockquote', 'code-block', 'image'],
                        [{
                            list: 'ordered'
                        }, {
                            list: 'bullet'
                        }]
                    ]
                },
                placeholder: 'Compose an epic...',
                theme: 'snow'
            });

            // Inline Edit
            var quillInline = new Quill('#quillInline', {
                modules: {
                    toolbar: [
                        ['bold', 'italic', 'underline'],
                        [{
                            'header': 1
                        }, {
                            'header': 2
                        }, 'blockquote'],
                        ['link', 'image', 'code-block'],
                    ]
                },
                bounds: '#quillInline',
                scrollingContainer: '#scrolling-container',
                placeholder: 'Write something...',
                theme: 'bubble'
            });

            const ps = new PerfectScrollbar('#scrolling-container', {
                suppressScrollX: true
            });

            // Editor in Modal
            var quillModal2 = new Quill('#quillEditorModal', {
                modules: {
                    toolbar: [
                        ['bold', 'italic', 'underline'],
                        [{
                            'header': 1
                        }, {
                            'header': 2
                        }, 'blockquote'],
                        ['link', 'image', 'code-block'],
                    ]
                },
                theme: 'snow'
            });

        });
    </script>
</body>

</html>