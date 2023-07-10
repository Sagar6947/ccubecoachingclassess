<?php
include("config.php");
include("session.php");
if (isset($_POST['submit_post'])) {
  $postname = $_POST['name'];
  $query = mysqli_query($con, "INSERT INTO `pdf_category`(`name`) VALUES ('$postname')");
  if ($query) {
    echo '<script>window.location="home.php"</script>';
  } else {
    echo '<script>alert("server error")</script>';
  }
}
if (isset($_POST['submit_video'])) {
  $postname = $_POST['name'];
  $query = mysqli_query($con, "INSERT INTO `exam_section`(`name`) VALUES ('$postname')");
  if ($query) {
    echo '<script>window.location="home.php"</script>';
  } else {
    echo '<script>alert("server error")</script>';
  }
}


    $sql = "SELECT * from courses";
    $result = mysqli_query($con, $sql);
    
    $rowcount = mysqli_num_rows( $result );
     
     $sql1 = "SELECT * from candidate_registre";
    $result1 = mysqli_query($con, $sql1);
    
    $rowcount1 = mysqli_num_rows($result1);
    
     $sql3 = "SELECT * from candidate_registre";
    $result3 = mysqli_query($con, $sql3);
    
    $rowcount3 = mysqli_num_rows($result3);
    
     $sql4 = "SELECT * from candidate_registre";
    $result4 = mysqli_query($con, $sql4);
    
    $rowcount4 = mysqli_num_rows($result4);



?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <meta name="description" content="Responsive Bootstrap 4 Dashboard Template">
  <meta name="author" content="ThemePixels">
  <link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicon.png">

  <title>C cube | Dashboard</title>
  <link href="lib/%40fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/dashforge.css">
  <link rel="stylesheet" href="assets/css/dashforge.demo.css">

</head>

<body>
  <?php include('header.php'); ?>
  <?php include('sidemenu.php'); ?>


  <div class="content content-components">
    <div class="container">
      <ol class="breadcrumb df-breadcrumbs mg-b-10">
        <li class="breadcrumb-item"><a href="#">C cube</a></li>
        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
      </ol>


      <div class="row row-xs">

        <div class="col-sm-6 col-lg-3">
          <div class="card card-body" style="background-color: #002147;">
            <h5 STYLE="color:white;" class="tx-uppercase tx-semibold mg-b-8"> Courses Count</h5>
            <div class="d-flex d-lg-block d-xl-flex align-items-end">
              <h3 STYLE="color:white;" class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1"> <?php echo $rowcount ?> </h3>
            </div>
          </div>
        </div>

        <div class="col-sm-6 col-lg-3">
          <div class="card card-body" style="background-color: #002147;">
            <h5 STYLE="color:white;" class="tx-uppercase tx-semibold mg-b-8">Students Count</h5>
            <div class="d-flex d-lg-block d-xl-flex align-items-end">
              <h3 STYLE="color:white;" class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1"> <?php echo $rowcount1 ?> </h3>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="card card-body" style="background-color: #002147;">
            <h5 STYLE="color:white;" class="tx-uppercase tx-semibold mg-b-8">Web Query</h5>
            <div class="d-flex d-lg-block d-xl-flex align-items-end">
              <h3 STYLE="color:white;" class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1"><?php echo $rowcount3 ?> </h3>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="card card-body" style="background-color: #002147;">
            <h5 STYLE="color:white;" class="tx-uppercase tx-semibold mg-b-8">Contact us</h5>
            <div class="d-flex d-lg-block d-xl-flex align-items-end">
              <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1" STYLE="color:white;"><?php echo $rowcount4 ?> </h3>

            </div>
          </div>
        </div>
      </div>
      <div class="row row-xs d-none">
        <div class="col-sm-12 col-lg-12">
          <hr>
        </div>
        <div class="col-sm-6 col-lg-6">
          <div class="card card-body" style="background-color: #002147;">
            <h5 STYLE="color:white;" class="tx-uppercase tx-semibold mg-b-8">Add PDF Category</h5>
            <div class="d-flex d-lg-block d-xl-flex align-items-end">
              <form action="" method="post">
                <input type="text" name="name" />
                <input type="submit" name="submit_post" value="Save" />
              </form>

            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-6">
          <div class="card card-body" style="background-color: #002147;">
            <h5 STYLE="color:white;" class="tx-uppercase tx-semibold mg-b-8">Add Video Category</h5>
            <div class="d-flex d-lg-block d-xl-flex align-items-end">
              <form action="" method="post">
                <input type="text" name="name" />
                <input type="submit" name="submit_video" value="Save" />
              </form>

            </div>
          </div>
        </div>
      </div>
      <div class="row row-xs d-none">
        <div class="col-sm-12 col-lg-12">
          <hr>
        </div>
        <div class="col-sm-6 col-lg-6">
          <div class="card card-body">
            <h5 class="tx-uppercase tx-semibold mg-b-8">PDF Category List</h5>
            <div class="d-flex d-lg-block d-xl-flex align-items-end">
              <div class="df-example demo-table">
                <table id="example2" class="table">

                  <thead>
                    <tr>
                      <th class="wd-5p">Id</th>
                      <th class="wd-30p">name</th>
                      <th class="wd-15p">Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i = 1;
                    $b = mysqli_query($con, "select * from `pdf_category`  ");
                    while ($a = mysqli_fetch_array($b)) {
                      echo ' <tr>
                       <td>' .  $i  . '</td>
                        <td>' . $a['name'] . '</td>
                        <td> <a  class="btn btn-danger" href="pdfcategory-del.php?id=' . $a['id'] . '">Delete</a></td>

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
        <div class="col-sm-6 col-lg-6">
          <div class="card card-body">
            <h5 class="tx-uppercase tx-semibold mg-b-8">Video Category List</h5>
            <div class="d-flex d-lg-block d-xl-flex align-items-end">
              <div class="df-example demo-table">
                <table id="example2" class="table">

                  <thead>
                    <tr>
                      <th class="wd-5p">Id</th>
                      <th class="wd-30p">name</th>
                      <th class="wd-15p">Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $b = mysqli_query($con, "select * from `exam_section`  ");
                    $i = 1;
                    while ($a = mysqli_fetch_array($b)) {
                      echo ' <tr>
                       <td>' . $i . '</td>
                        <td>' . $a['name'] . '</td>
                        <td> <a  class="btn btn-danger" href="videocategory-del.php?id=' . $a['id'] . '">Delete</a></td>

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


      </div>
    </div>


    <?php include('footer.php'); ?>

  </div>
  </div>

  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/feather-icons/feather.min.js"></script>
  <script src="lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
  <script src="assets/js/dashforge.js"></script>
  <script>
    $(function() {
      'use strict';
      document.querySelector("#asd").requestFullscreen();
    });
  </script>

</body>

</html>