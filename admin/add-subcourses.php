<?php
include("config.php");
include("session.php");
if (isset($_POST['upload'])) {
  $date = date("j M,Y");

  $title = $_POST['title'];
  $price = $_POST['price'];

  $main_course = $_POST['main_course'];
  $days = $_POST['days'];

  $content = $_POST['content'];
  $video = $_POST['video'];
  $pdf = $_POST['pdf'];
  $test = $_POST['content'];
  $file = $_FILES['logo']['name'];
  $tmpfile = $_FILES['logo']['tmp_name'];
  $folder = 'images/' . date("dmyhis") . '-' . $file;
  move_uploaded_file($tmpfile, $folder);

  $sql1 = mysqli_query($con, "select * from `courses` where `main_course`='$main_course' and `name`='$title'");
  if (mysqli_num_rows($sql1) == 0) {
    $sal =  mysqli_query($con, "INSERT INTO `courses`( `main_course`,`name`, `price`, `image`, `description`,`days`,`video`,`test`,`pdf`) VALUES
    ('" . $main_course . "','" . $title . "','" . $price . "','" . $folder . "','" . $content . "','" . $days . "','" . $video . "','" . $test . "','" . $pdf . "')");
    if ($sal) {
      echo '<script>window.location.href="subcourses.php";</script>';
    } else {
      echo "<script>alert('Error in Insertion of your image...Please try again later')</script>";
    }
  } else {
    echo "<script>alert('You have already set that package.')</script>";
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
  <title>C cube | Package</title>
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
      <h4 id="section3" class="mg-b-10">Add Package </h4>

      <div class="df-example demo-forms">
        <form method="post" enctype="multipart/form-data" action="">
          <div class="form-row">

            <div class="form-group col-md-6">
              <label>Select Class</label>
              <select name="main_course" class="form-control" required>

                <option value="">select Class</option>
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
              <label>Package</label>

              <select name="title" class="form-control" required>

                <option value="">Select Package</option>
                <?php
                $b = mysqli_query($con, "select * from `course_package`  ");
                while ($a = mysqli_fetch_array($b)) {
                ?>

                  <option value="<?= $a['id'] ?>"><?= $a['name'] ?> - <?= $a['description'] ?></option>

                <?php
                }
                ?>

              </select>
            </div>

            <div class="form-group col-md-6">
              <label>Price</label>
              <input type="text" class="form-control" name="price" placeholder="Ex:- 200">

            </div>
            <div class="form-group col-md-6">
              <label> Days validity</label>
              <input type="text" class="form-control" name="days" value="365">

            </div>

            <div class="form-group col-md-6">
              <label>Image</label>
              <input class="form-control" name="logo" type="file">

            </div>
            <div class="form-group col-md-12">
            </div>
            <div class="form-group col-md-4 d-none">
              <label>Add Videos</label><br>
              <input name="video" type="radio" value="no"> NO
              <input name="video" type="radio" value="yes" checked> YES

            </div>
            <div class="form-group col-md-4 d-none">
              <label>Add PDF</label><br>
              <input name="pdf" type="radio" value="no"> NO
              <input name="pdf" type="radio" value="yes" checked> YES

            </div>
            <div class="form-group col-md-4 d-none">
              <label>Add Test series</label><br>
              <input name="test" type="radio" value="no"> NO
              <input name="test" type="radio" value="yes" checked> YES

            </div>

            <div class="form-group col-md-12" style="display:none">
              <label>Description</label>
              <textarea name="content" rows="4" class="form-control" placeholder="Description"></textarea>
            </div>
          </div>
          <button type="submit" name="upload" class="btn btn-primary">Submit Form</button>
        </form>
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