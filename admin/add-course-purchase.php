<?php
include("config.php");
include("session.php");
if (isset($_POST['upload']))
  {
  $date=date("j M,Y");

  $s = $_POST['std_id'];
  $c = $_POST['course_id'];
  $amt = $_POST['amt'];
  $py = $_POST['pymt_res'];



    $sal=  mysqli_query($con, "INSERT INTO `purchase`( `std_id`, `course_id`, `amt`, `pymt_res`) VALUES ('".$s."','".$c."','".$amt."','".$py."')");
     if($sal)
  {
    echo '<script>window.location.href="course-purchase.php";</script>';
  }
  else
  {
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
    <title>C cube | courses vacancy</title>
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

    <?php include ('header.php'); ?>
    <?php include ('sidemenu.php'); ?>

    <div class="content content-components">
    <div class="container">
     <h4 id="section3" class="mg-b-10">Add courses vacancy</h4>

        <div  class="df-example demo-forms">
          <form method="post" enctype="multipart/form-data" action="">
            <div class="form-row">
              <div class="form-group col-md-4">
                <label>Student ID</label>
                <select class="custom-select"  name="std_id">
                                                <option value="Select Your Main Course">Select Your Categaries .</option>
                                                                 <?php
														$sql=mysqli_query($con,"select * from candidate_registre");
                                               while ($row = mysqli_fetch_array($sql))
                                              {
                                                  echo "<option value='".$row['id']."'>".$row['id']."</option>";
                                              }
                                              ?>
                                            </select>
              </div>
              <div class="form-group col-md-4">
                <label>Course ID</label>
                <select class="custom-select"  name="course_id">
                                                <option value="Select Your Main Course">Select Your Categaries .</option>
                                                                 <?php
														$sql=mysqli_query($con,"select * from courses");
                                               while ($row = mysqli_fetch_array($sql))
                                              {
                                                  echo "<option value='".$row['id']."'>".$row['id']."</option>";
                                              }
                                              ?>
                                            </select>
              </div>

             <div class="form-group col-md-4">
                <label>Amount</label>
                <input type="text" class="form-control"  name="amt" placeholder="Ex:-Relationship Manager" >

              </div>

			    <div class="form-group col-md-4">
                <label>Payment</label>
                <input type="text" class="form-control"  name="pymt_res" placeholder="Ex:-Relationship Manager" >

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
