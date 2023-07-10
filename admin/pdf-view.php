<?php
include("config.php");
include("session.php");

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


        <div class="df-example demo-forms">
          <form method="post" enctype="multipart/form-data" action="pdf_upload.php">
            <div class="form-row">
              <div class="form-group col-md-3">
                <label>Type</label>
                <select name="type" class="form-control" required>
                  <option value="">select type</option>
                  <?php
                  $b = mysqli_query($con, "select * from `pdf_category`  ");
                  while ($a = mysqli_fetch_array($b)) {
                  ?>

                    <option value="<?= $a['id'] ?>"><?= $a['name'] ?></option>

                  <?php
                  }
                  ?>

                </select>
              </div>
              <div class="form-group col-md-3">
                <label>Year</label>
                <input type="text" name="year" class="form-control" placeholder=" " value="<?= date('Y') ?>">
              </div>
              <div class="form-group col-md-3">
                <label>Month</label>

                <select name="month" class="form-control">
                  <option value=''>--Select Month--</option>
                  <option <?= ((date('M') == 'Jan') ? 'selected' : '') ?> value='Jan'>Jan</option>
                  <option <?= ((date('M') == 'Jan') ? 'selected' : '') ?> value='Jan'>Feb</option>
                  <option <?= ((date('M') == 'Mar') ? 'selected' : '') ?> value='Mar'>Mar</option>
                  <option <?= ((date('M') == 'Apr') ? 'selected' : '') ?> value='Apr'>Apr</option>
                  <option <?= ((date('M') == 'May') ? 'selected' : '') ?> value='May'>May</option>
                  <option <?= ((date('M') == 'Jun') ? 'selected' : '') ?> value='Jun'>Jun</option>
                  <option <?= ((date('M') == 'Jul') ? 'selected' : '') ?> value='Jul'>Jul</option>
                  <option <?= ((date('M') == 'Aug') ? 'selected' : '') ?> value='Aug'>Aug</option>
                  <option <?= ((date('M') == 'Sep') ? 'selected' : '') ?> value='Sep'>Sep</option>
                  <option <?= ((date('M') == 'Oct') ? 'selected' : '') ?> value='Oct'>Oct</option>
                  <option <?= ((date('M') == 'Nov') ? 'selected' : '') ?> value='Nov'>Nov</option>
                  <option <?= ((date('M') == 'Dec') ? 'selected' : '') ?> value='Dec'>Dec</option>
                </select>
              </div>
              <div class="form-group col-md-3">
                <label>Day</label>
                <input type="text" name="day" class="form-control" placeholder=" " value="<?= date('d') ?>">
              </div>
              <div class="form-group col-md-5">
                <label>Title</label>
                <input type="text" name="title" class="form-control" placeholder=" " required>
              </div>

              <div class="form-group col-md-5">
                <label>File</label>
                <input class="form-control" name="logo" type="file" required>

              </div>


              <div class="form-group col-md-2">
                <br>
                <input type="submit" name="upload" class="btn btn-primary" value="Add PDF">
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="df-example demo-table">
        <table id="example2" class="table">
          <thead>
            <tr>
              <th>Id</th>
              <th>Title</th>
              <th>Uploaded on</th>
              <th>Type</th>
              <th>Year </th>
              <th>Month</th>
              <th>Day</th>


              <th>File</th>

              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $b = mysqli_query($con, "select * from `free_pdf` ORDER BY `id` DESC  ");
            while ($a = mysqli_fetch_array($b)) {
              $b2 = mysqli_query($con, "select * from `pdf_category` where `id`= '" . $a['file_type'] . "'");
              $a2 = mysqli_fetch_array($b2);

              echo ' <tr>
                       <td>' . $a['id'] . '</td>
                       <td>' . $a['title'] . '</td>
                       <td>' . date_format(date_create($a['date']), "d/m/Y") . '</td>
                        <td>' . $a2['name'] . '</td>
                        <td>' . $a['year'] . '</td>
                        <td>' . $a['month'] . '</td>
                        <td>' . $a['day'] . '</td>



                        <td><a href="' . $a['file_name'] . '" > View PDF </a></td>


					    <td> <a  class="btn btn-danger" href="free-pdf-del.php?id=' . $a['id'] . '">Delete</a></td>


                        </tr>';
              //  <td> <a  class="btn btn-warning" href="free-pdf-edit.php?id=' . $a['id'] . '">Edit</a></td>
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>

    <?php // include('footer.php'); ?>

     <script src="lib/jquery/jquery.min.js"></script>
        <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!--<script src="lib/feather-icons/feather.min.js"></script>-->
        <!--<script src="lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>-->
        <!--<script src="lib/prismjs/prism.js"></script>-->
        <script src="lib/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="lib/datatables.net-dt/js/dataTables.dataTables.min.js"></script>
        <script src="lib/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="lib/datatables.net-responsive-dt/js/responsive.dataTables.min.js"></script>
        <script src="lib/select2/js/select2.min.js"></script>

        <script src="assets/js/dashforge.js"></script>
        <script>
            $(function() {
                'use strict';



                $('#example2').DataTable({
                    responsive: true,
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