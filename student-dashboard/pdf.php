<?php
include('config.php');
$rf1 = "SELECT * FROM `candidate_subscribe` WHERE `stu_id`='" . $id . "' AND `status` = 'OLD' AND `type_sub` = '1' ORDER BY `id` DESC";
//   echo $rf;
$b1 = mysqli_query($con, $rf1);
while ($a1 = mysqli_fetch_array($b1)) {
  $exp =  date("d-m-Y", strtotime(date("Y-m-d", strtotime($a1['create_date'])) . " + 365 day"));

  $date1 = date("d-m-Y");

//   echo $date1 . ' = ' . $exp;
  if ($date1 == $exp) {
    // echo 'Dates are equal.';
    $query_exp = "UPDATE `candidate_subscribe` SET  `status`= 'expired' WHERE `id`=" . $a1['id'];
    $query_exp1 = mysqli_query($con, $query_exp);
  }elseif(strtotime($date1) > strtotime($exp)){
    //   echo 'Date expired';
    $query_exp = "UPDATE `candidate_subscribe` SET  `status`= 'expired' WHERE `id`=" . $a1['id'];
    $query_exp1 = mysqli_query($con, $query_exp);
    echo '<script>alert("Your plan is expired.Please purchase to continue.");window.location="pdf.php"</script>';
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>


  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

  <title> C cube | Our PDF </title>

  <!-- vendor css -->
  <link href="lib/%40fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/typicons.font/typicons.css" rel="stylesheet">
  <link href="lib/prismjs/themes/prism-vs.css" rel="stylesheet">

  <!-- DashForge CSS -->
  <link rel="stylesheet" href="assets/css/dashforge.css">
  <link rel="stylesheet" href="assets/css/dashforge.demo.css">

</head>

<body class="pos-relative" data-spy="scroll" data-target="#navSection" data-offset="120">

  <?php include('header.php'); ?>
  <div class="content content-fixed bd-b">
    <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
      <div class="d-sm-flex align-items-center justify-content-between">
        <div>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style1 mg-b-10">
              <li class="breadcrumb-item"><a href="#">C cube</a></li>
              <li class="breadcrumb-item"><a href="#">Student Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Our PDF</li>
            </ol>
          </nav>
          <h4 class="mg-b-0">Our PDF</h4>
        </div>
        <!--div class="search-form mg-t-20 mg-sm-t-0">
            <input type="search" class="form-control" placeholder="Search events">
            <button class="btn" type="button"><i data-feather="search"></i></button>
          </div-->
      </div>
    </div>
  </div>


  <div class="content">
    <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
      <div class="row">
        <?php
                if (isset($_SESSION['stud_id'])) {

                    $bb = mysqli_query($con, "SELECT * FROM `candidate_subscribe` WHERE `stu_id`='" . $_SESSION['stud_id'] . "' AND `status` != 'new' AND `type_sub` = '1' ORDER BY `id` DESC");
                    if(mysqli_num_rows($bb)>0){
                        while ($ac = mysqli_fetch_array($bb)) {

                        // $bb1 = mysqli_query($con, "SELECT * FROM `courses` WHERE `id`='" . $ac['sub_nm'] . "'");
                        // $ac1 = mysqli_fetch_array($bb1);
                        // if ($ac1['name'] != '2') {
                               if($ac['sub_nm'] == 1){
                                    $b = mysqli_query($con, "select * from `pdf_category` WHERE `id` != '1'   ");
                  while ($a = mysqli_fetch_array($b)) {
                  ?>
                        <div class="col-md-4 col-sm-4 equal-height ">
                            <div class="item shadow m-3 text-center">
                             <div class="thumb ">
                             <div class="price"><a href="#"><br><h3><?= $a['name'] ?></h3></a></div>
                             </div>

                             <div class="info" style="text-align:center">
                             <div style="background-color: white;padding: 5px 4px;">
                                <span class="badge badge-<?php if($ac['status'] == 'OLD'){ echo 'info'; }else{ echo 'danger'; } ?> "><?php if($ac['status'] == 'OLD'){ echo 'Status - Active'; }else{ echo 'Status - Expired'; } ?></span><br>
                                <?php if($ac['status'] == 'OLD'){ ?><a  href="daily_pdf.php?id=<?= $a['id'] ?>&year=2022&type=universal"  class="btn btn-warning mt-1"  class="btn btn-warning mt-1"></i>View all Daily PDF </a>
                                <?php }else{ echo '<br><br>'; } ?></div>
							 </div>

                             </div>
                         </div>
                           <?php
                  }
                               } else{


                  $b = mysqli_query($con, "select * from `pdf_category`  WHERE `id`='" . $ac['sub_nm'] . "' ");
                  while ($a = mysqli_fetch_array($b)) {
                  ?>
                        <div class="col-md-4 col-sm-4 equal-height ">
                            <div class="item shadow m-3 text-center">
                             <div class="thumb ">
                             <div class="price"><a href="#"><br><h3><?= $a['name'] ?></h3></a></div>
                             </div>

                             <div class="info" style="text-align:center">
                             <div style="background-color: white;padding: 5px 4px;">
                                <span class="badge badge-<?php if($ac['status'] == 'OLD'){ echo 'info'; }else{ echo 'danger'; } ?> "><?php if($ac['status'] == 'OLD'){ echo 'Status - Active'; }else{ echo 'Status - Expired'; } ?></span><br>
                                <?php if($ac['status'] == 'OLD'){ ?><a  href="daily_pdf.php?id=<?= $a['id'] ?>&year=2022"  class="btn btn-warning mt-1"  class="btn btn-warning mt-1"></i>View all Daily PDF </a>
                                <?php }else{ echo '<br><br>'; } ?></div>
							 </div>

                             </div>
                         </div>
                           <?php
                  }
                               }
                            // }
                        // }
                    }
                    }else{
                        echo 'No PDF purchased, <a href="../free_pdf.php">click here to buy PDF</a>.';
                    }
                }
                ?>

      </div>
    </div>
  </div>

  <?php include('footer.php'); ?>

  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/feather-icons/feather.min.js"></script>
  <script src="lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
  <script src="lib/prismjs/prism.js"></script>

  <script src="assets/js/dashforge.js"></script>
  <script>
    $(function() {
      'use strict'

    });
  </script>
</body>

</html>