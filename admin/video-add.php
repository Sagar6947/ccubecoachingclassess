<?php
include("config.php");
include("session.php");
if (isset($_POST['upload'])) {
  $date = date("j M,Y");

  $n = $_POST['name'];
  $u = $_POST['url'];
  $c = $_POST['course_id'];
  $section_id = $_POST['section_id'];
  $s = $_POST['sub_course'];
  $un = $_POST['unit'];
  $description = $_POST['description'];

  $file = $_FILES['pdf']['name'];
  $tmpfile = $_FILES['pdf']['tmp_name'];
  $folder = 'pdf/' . $file;
  move_uploaded_file($tmpfile, $folder);


  $que =  "INSERT INTO `video`(`name`, `url` , `course_id`, `sub_course`,`section_id`, `unit` , `pdf`, `description`)
	VALUES ('" . $n . "','" . $u . "','" . $c . "','" . $s . "','" . $section_id . "','" . $un . "','" . $folder . "','" . $description . "')";
  // 	echo $que;
  $sal =  mysqli_query($con, $que);
  if ($sal) {
    echo '<script>alert("Added successfully"); window.location.href="video.php";</script>';
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
  <title>C cube | Subject content</title>
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
      <h4 id="section3" class="mg-b-10">Add Subject content</h4>

      <div class="df-example demo-forms">
        <form method="post" enctype="multipart/form-data" action="">
          <div class="form-row">

            <div class="form-group col-md-3">
              <label>Select subject</label>
              <select name="course_id" class="form-control" required>
                <option value="">Select Subject</option>
                <?php
                $b = mysqli_query($con, "select * from `pdf_category`");
                while ($a = mysqli_fetch_array($b)) {
                  $b1 = mysqli_query($con, "select * from `main_courses`  WHERE `id`='" . $a['class_id'] . "' ");
                  $a1 = mysqli_fetch_array($b1);
                ?>

                  <option value="<?= $a['id'] ?>"><?= $a1['name'] ?>,<?= $a['name'] ?></option>

                <?php
                }
                ?>

              </select>
            </div>
            <div class="form-group col-md-6 d-none">
              <label>Section</label>
              <select class="custom-select" name="section_id">
                <option value="Select Your Section">Select Your Section .</option>
                <?php
                $sql = mysqli_query($con, "SELECT * FROM `exam_section`");
                while ($row = mysqli_fetch_array($sql)) {
                  echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                }
                ?>
              </select>

            </div>
            <div class="form-group col-md-5" style="display:none;">
              <label>Sub Package</label>
              <select class="custom-select" name="sub_course">
                <option value="">Select Your Package .</option>

              </select>
            </div>
            <div class="form-group col-md-5">
              <label>Title</label>
              <input type="text" name="name" class="form-control" placeholder="Enter Title ">

            </div>
            <div class="form-group col-md-4">
              <label>Unit</label>
              <input type="text" name="unit" class="form-control" placeholder="Enter Unit ">

            </div>
            <div class="form-group col-md-6">
              <label>PDF</label>
              <input type="file" class="form-control" name="pdf" placeholder="Upload PDF file" accept=".pdf">

            </div>
            <div class="form-group col-md-6">
              <label>Subject content Link</label>
              <input type="text" class="form-control" name="url" placeholder="Ex:- https://www.youtube.com/watch?v=KzARx0EuDgc">
            </div>

            <div class="form-group col-md-12">
              <label>Description</label>

              <textarea class="form-control" name="description" placeholder="Enter description" id="editor"></textarea>
            </div>
          </div>
          <button type="submit" name="upload" class="btn btn-primary">Submit</button>
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