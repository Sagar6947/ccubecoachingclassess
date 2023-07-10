<?php
include("config.php");
include("session.php");
if (isset($_POST['upload'])) {
  $name = $_POST['name'];
  $main_course = $_POST['main_course'];

  // $days = $_POST['days'];
  // $file = $_FILES['logo']['name'];
  // $tmpfile = $_FILES['logo']['tmp_name'];
  // $folder = 'images/' . date("dmyhis") . '-' . $file;
  // move_uploaded_file($tmpfile, $folder);
  // $sal =  mysqli_query($con, "INSERT INTO `pdf_category`( `name`, `price`, `image`,`days`) VALUES ('" . $name . "','" . $price . "','" . $folder . "','" . $days . "')");
  $sal =  mysqli_query($con, "INSERT INTO `pdf_category`( `class_id`,`name` ) VALUES
    ('" . $main_course . "','" . $name . "')");
  if ($sal) {
    echo '<script>window.location.href="pdf-category.php";</script>';
  } else {
    echo "<script>alert('Error in Insertion of your image...Please try again later')</script>";
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
  <title>C cube | Subject</title>
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
      <h4 id="section3" class="mg-b-10">Add Subject </h4>
      <div class="df-example demo-forms">
        <form method="post" enctype="multipart/form-data" action="">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label>Select Class</label>
              <select name="main_course" class="form-control" required>

                <option value="">select class</option>
                <?php
                $b = mysqli_query($con, "select * from `main_courses`  ");
                while ($a = mysqli_fetch_array($b)) {
                ?>

                  <option value="<?= $a['id'] ?>"><?= $a['name'] ?></option>

                <?php
                }
                ?>

              </select>
            </div>
            <div class="form-group col-md-6">
              <label>Subject</label>
              <input type="text" name="name" class="form-control" />
            </div>


          </div>
          <button type="submit" name="upload" class="btn btn-primary">Submit Form</button>
        </form>
      </div>
      <div class="card card-body">
        <h5 class="tx-uppercase tx-semibold mg-b-8">Subject List</h5>
        <div class="col-md-12">
          <div class="df-example demo-table">
            <table id="example2" class="table w-100">

              <thead>
                <tr>
                  <th class="wd-5p">Id</th>
                  <th class="wd-30p">Class</th>
                  <th class="wd-30p">Subject</th>
                  <th class="wd-15p">Delete</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 1;
                $b = mysqli_query($con, "select * from `pdf_category`  ");
                while ($a = mysqli_fetch_array($b)) {
                  $b1 = mysqli_query($con, "select * from `main_courses`  WHERE `id`='" . $a['class_id'] . "' ");
                  $a1 = mysqli_fetch_array($b1);
                  echo ' <tr>
                       <td>' .  $i  . '</td>
                        <td>' . $a1['name'] . '</td>
                        <td>' . $a['name'] . '</td>
                        <td>  <a  class="btn btn-danger" href="pdfcategory-del.php?id=' . $a['id'] . '">Delete</a> </td>

                        </tr>';
                  $i++;
                }
                ?>
              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>



    <?php include('footer.php'); ?>

  </div>
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

</body>

</html>