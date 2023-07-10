<?php
include("config.php");
include("session.php");
if (isset($_POST['upload'])) {
  $date = date("d M,Y");
  $title = $_POST['title'];
  
  $file = $_FILES['logo']['name'];
  $tmpfile = $_FILES['logo']['tmp_name'];
  $folder = 'images/ranker/' . date("dmyhis") . '-' . $file;
  move_uploaded_file($tmpfile, $folder);
  $class = $_POST['class'];
  $result = $_POST['result'];
  
  
 $insert = "INSERT INTO `ranker`(`name`, `image`, `date`, `class_id`, `result`) VALUES ('" . $title . "','" . $folder . "','" . $date . "' ,'" . $class . "', '" . $result . "')";
 
//  print_r( $insert);
//  exit();
  
    $sal =  mysqli_query($con,$insert);
  
  
  if ($sal) {
    echo '<script>window.location.href="ranker-list.php";</script>';
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
  <meta name="description" content="Responsive Bootstrap 4 Dashboard Template">
  <meta name="author" content="ThemePixels">
  <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
  <title>C cube | Ranker </title>
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
  <script src="https://cdn.ckeditor.com/ckeditor5/26.0.0/classic/ckeditor.js"></script>
</head>
<body data-spy="scroll" data-target="#navSection" data-offset="120">
  <?php include('header.php'); ?>
  <?php include('sidemenu.php'); ?>
  <div class="content content-components">
    <div class="container">
      <h1 class="df-title">Top Ranker </h1>
      <div class="df-example demo-forms">
        <form method="post" enctype="multipart/form-data" action="">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label>Name</label>
              <input type="text" name="title" class="form-control" placeholder="Ex:-Muskan jain ">
            </div>
            <div class="form-group col-md-6">
              <label>Image</label>
              <input class="form-control" name="logo" type="file">
            </div>
           <div class="form-group col-md-6">
              <label>Select Class</label>
              <select name="class" class="form-control" required>

                <option value="">select Class</option>
                <?php
                $b = mysqli_query($con, "select * from `main_courses`  ");
                while ($a = mysqli_fetch_array($b)) {
                ?>

                  <option value="<?= $a['name'] ?>"><?= $a['name'] ?></option>

                <?php
                }
                ?>

              </select>
            </div>
           
            <div class="form-group col-md-6">
              <label>Rank</label>
              <input type="text" name="result" class="form-control" placeholder="Ex:- 9.5 cgpa ">
            </div>
           
          </div>
          <button type="submit" name="upload" class="btn btn-primary">Submit Form</button>
        </form>
      </div>
    </div>
    <?php include('footer.php'); ?>
  </div>
  <script>
    ClassicEditor
      .create(document.querySelector('#editor'))
      .catch(error => {
        console.error(error);
      });
  </script>
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