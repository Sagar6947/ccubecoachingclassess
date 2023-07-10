<?php
include("config.php");
include("session.php");
if (isset($_POST['upload'])) {
    $date = date("j M,Y");

    $n = $_POST['name'];
    $u = $_POST['url'];
    // $c = $_POST['course_id'];
    // $section_id = $_POST['section_id'];
    // $s = $_POST['sub_course'];
    // $un = $_POST['unit'];

    // $file = $_FILES['pdf']['name'];
    // $tmpfile = $_FILES['pdf']['tmp_name'];
    // $folder = 'pdf/' . $file;
    // move_uploaded_file($tmpfile, $folder);


    $que =  "INSERT INTO `free_video`(`name`, `url`, `pdf`) VALUES ('" . $n . "','" . $u . "','')";
    // 	echo $que;
    $sal =  mysqli_query($con, $que);
    if ($sal) {
        echo '<script>alert("Added successfully"); window.location.href="free-video-add.php";</script>';
    } else {
        echo '<script>alert("Server error"); </script>';
        //   echo "Error in Insertion of your image...Please try again later!";
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
    <title>C cube | Youtube Video upload</title>
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
                    <h1 class="df-title"> Youtube Video upload
                    </h1>
                </div>
                <div class="col-sm-2">

                </div>
            </div>
            <div class="container">

                <div class="df-example demo-forms">
                    <form method="post" enctype="multipart/form-data" action="">
                        <div class="form-row">



                            <div class="form-group col-md-6">
                                <label>Title</label>
                                <input type="text" name="name" class="form-control" placeholder="enter video name ">

                            </div>

                            <!-- <div class="form-group col-md-6">
                                <label>PDF</label>
                                <input type="file" class="form-control" name="pdf" placeholder="Upload PDF file">

                            </div> -->
                            <div class="form-group col-md-6">
                                <label>Video Link</label>
                                <input type="text" class="form-control" name="url" placeholder="Ex:- https://www.youtube.com/watch?v=KzARx0EuDgc">

                            </div>


                        </div>
                        <button type="submit" name="upload" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-10"><br>
                    <h1 class="df-title"> Youtube Video List
                    </h1>
                </div>
                <div class="col-sm-2">

                </div>
            </div>
            <div class="df-example demo-table">
                <table id="example2" class="table">

                    <thead>
                        <tr>
                            <th class=" ">S.no.</th>
                            <th class=" ">Title</th>
                            <th class=" ">URL</th>

                            <th class=" ">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        $b = mysqli_query($con, "select * from `free_video`  ");
                        while ($a = mysqli_fetch_array($b)) {


                            echo ' <tr>
                       <td>' . $i . '</td>



                        <td>' . $a['name'] . '</td>


                        <td><a href="' . $a['url'] . '"  target="_blank"> View Youtube Video </a></td>


					    <td> <a  class="btn btn-danger" href="free-video-del.php?id=' . $a['id'] . '">Delete</a></td>

						<td></td>
                        </tr>';
                            $i++;
                            //  <td> <a  class="btn btn-warning" href="free-pdf-edit.php?id=' . $a['id'] . '">Edit</a></td>
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