<?php
include("config.php");
include("session.php");
$pdfid=$_GET['id'];
$b = mysqli_query($con, "select * from `free_pdf` WHERE `id` = $pdfid ");
$a = mysqli_fetch_array($b);
if (isset($_POST['upload'])) {
    $title = $_POST['title'];
    $year = $_POST['year'];
    $month = $_POST['month'];
    $day = $_POST['day'];
    $type = $_POST['type'];
    $type = $_POST['type'];
    $type = $_POST['type'];
    if(!empty($_FILES['logo']['name']))
    {
        $file = $_FILES['logo']['name'];
        $tmpfile = $_FILES['logo']['tmp_name'];
        $folder = 'free_pdf/' . date("dmyhis") . '-' . $file;
        move_uploaded_file($tmpfile, $folder);
    }
    else
    {
        $folder = $_POST['img_logo'];
    }

    $fg = "UPDATE `free_pdf` SET  `file_type`='" . $type . "',`year`='" . $year . "',`month`='" . $month . "',`day`='" . $day . "',`title`='" . $title . "',`file_name`='" . $folder . "' WHERE `id`='$pdfid' ";
    // echo $fg;
    $sal =  mysqli_query($con, $fg);
    if ($sal) {
        echo '<script>window.location.href="pdf-add.php";</script>';
    } else {
        echo "Error in Insertion of your file...Please try again later!";
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
    <title>C cube | PDF upload</title>
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
                    <h1 class="df-title"> PDF upload
                    </h1>
                </div>
                <div class="col-sm-2">

                </div>
            </div>
            <div class="container">
                <h4 id="section3"  > PDF upload </h4>

                <div class="df-example demo-forms">
                    <form method="post" enctype="multipart/form-data" action="">
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label>Type</label>
                                <select name="type" class="form-control" required>
                                    <option value="">select type</option>
                                    <?php
                                    $b1 = mysqli_query($con, "select * from `pdf_category`  ");
                                    while ($a1 = mysqli_fetch_array($b1)) {
                                    ?>

                                        <option value="<?= $a1['id'] ?>" <?= (($a1['id'] == $a['id'])? 'selected' :'' )?>><?= $a1['name'] ?></option>

                                    <?php
                                    }
                                    ?>

                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Year</label>
                                <input type="text" name="year" class="form-control" placeholder=" " value="<?= $a['year']  ?>">
                            </div>
                            <div class="form-group col-md-3">
                                <label>Month</label>
                                <!--<input type="text"  placeholder=" " value="<?= date('M') ?>">-->
                                <select name="month" class="form-control">
                                    <option value=''>--Select Month--</option>
                                    <option <?= (($a['month'] == 'Jan') ? 'selected' : '') ?> value='Jan'>Jan</option>
                                    <option <?= (($a['month'] == 'Jan') ? 'selected' : '') ?> value='Jan'>Feb</option>
                                    <option <?= (($a['month'] == 'Mar') ? 'selected' : '') ?> value='Mar'>Mar</option>
                                    <option <?= (($a['month'] == 'Apr') ? 'selected' : '') ?> value='Apr'>Apr</option>
                                    <option <?= (($a['month'] == 'May') ? 'selected' : '') ?> value='May'>May</option>
                                    <option <?= (($a['month'] == 'Jun') ? 'selected' : '') ?> value='Jun'>Jun</option>
                                    <option <?= (($a['month'] == 'Jul') ? 'selected' : '') ?> value='Jul'>Jul</option>
                                    <option <?= (($a['month'] == 'Aug') ? 'selected' : '') ?> value='Aug'>Aug</option>
                                    <option <?= (($a['month'] == 'Sep') ? 'selected' : '') ?> value='Sep'>Sep</option>
                                    <option <?= (($a['month'] == 'Oct') ? 'selected' : '') ?> value='Oct'>Oct</option>
                                    <option <?= (($a['month'] == 'Nov') ? 'selected' : '') ?> value='Nov'>Nov</option>
                                    <option <?= (($a['month'] == 'Dec') ? 'selected' : '') ?> value='Dec'>Dec</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Day</label>
                                <input type="text" name="day" class="form-control" placeholder=" " value="<?= $a['day']  ?>">
                            </div>
                            <div class="form-group col-md-5">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control" placeholder=" " required value="<?= $a['title']  ?>">
                            </div>

                            <div class="form-group col-md-5">
                                <label>File</label>
                                <input class="form-control" name="logo" type="file"  >
                                <input name="img_logo" type="hidden" value="<?= $row['file_name'];?>">
                            </div>


                            <div class="form-group col-md-2">
                                <br>
                                <button type="submit" name="upload" class="btn btn-primary">Add PDF</button>
                            </div>
                        </div>
                    </form>
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