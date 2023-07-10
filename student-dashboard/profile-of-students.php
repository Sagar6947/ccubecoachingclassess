<?php
include('config.php');

if (isset($_POST['picsubmit']))
{
    $img = $_FILES['image']['name'];
    $imgtemp = $_FILES['image']['tmp_name'];
    move_uploaded_file($imgtemp,'user-pic/'.$img);
    $qgh = "UPDATE `candidate_registre` SET `img`= '".$img."' WHERE `id`='".$id."'";
    $sal =  mysqli_query($con, $qgh);
    if($sal)
    {
        echo '<script>window.location="profile-of-students.php"</script>';
    }
    else
    {
        echo "<script>alert('Image Size too Big. Please Try next Time')</script>";
    }
}
if (isset($_POST['aboutsubmit']))
{
    $about = $_POST['about'];
    $qgh = "UPDATE `candidate_registre` SET `about`= '".$about."' WHERE `id`='".$id."'";
    $sal =  mysqli_query($con, $qgh);
    if($sal)
    {
        echo '<script>window.location="profile-of-students.php"</script>';
    }
    else
    {
        echo "<script>alert('Image Size too Big. Please Try next Time')</script>";
    }
}
if (isset($_POST['prosubmit']))
{
    $name = $_POST['name'];
    $regdt = $_POST['regdt'];
    $address = $_POST['address'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $qgh = "UPDATE `candidate_registre` SET `name`='".$name."',`email`='".$email."',`mobile`='".$mobile."',`dob`='".$dob."',`date`='".$regdt."',`address`='".$address."',`city`='".$city."',`state`='".$state."' WHERE `id`='".$id."'";
    $sal =  mysqli_query($con, $qgh);
    if($sal)
    {
        echo '<script>window.location="profile-of-students.php"</script>';
    }
    else
    {
        echo "<script>alert('Image Size too Big. Please Try next Time')</script>";
    }
}
if (isset($_POST['edusubmit']))
{
    $class = $_POST['class'];
    $i=0;
    for($i=0;$i<count($class);$i++)
    {
        if(!empty($class[$i]))
        {
            $clas = $class[$i];
            $institute = $_POST['institute'][$i];
            $year = $_POST['year'][$i];
            $percen = $_POST['percen'][$i];
            $quer = "INSERT INTO `candidate_education`(`r_id`, `class`, `institute`, `year`, `percentage`) VALUES ('".$id."','".$clas."','".$institute."','".$year."','".$percen."')";
            $sal =  mysqli_query($con, $quer);
            // echo $quer;
        }
    }

//    if($sal)
//    {
        echo '<script>window.location="profile-of-students.php"</script>';
//    }
//    else
//    {
//        echo "<script>alert('Image Size too Big. Please Try next Time')</script>";
//    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="twitter:site" content="@themepixels">
	<meta name="twitter:creator" content="@themepixels">
	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:title" content="DashForge">
	<meta name="twitter:description" content="Responsive Bootstrap 4 Dashboard Template">
	<meta name="twitter:image" content="assets/img/dashforge-social.html">
	<meta property="og:url" content="http://themepixels.me/dashforge">
	<meta property="og:title" content="DashForge">
	<meta property="og:description" content="Responsive Bootstrap 4 Dashboard Template">
	<meta property="og:image" content="assets/img/dashforge-social.html">
	<meta property="og:image:secure_url" content="assets/img/dashforge-social.html">
	<meta property="og:image:type" content="image/png">
	<meta property="og:image:width" content="1200">
	<meta property="og:image:height" content="600">
	<meta name="description" content="Responsive Bootstrap 4 Dashboard Template">
	<meta name="author" content="ThemePixels">

	<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
	<title>C cube | Student Dashboard | Profile </title>
	<link href="lib/%40fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
	<link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/dashforge.css">
	<link rel="stylesheet" href="assets/css/dashforge.profile.css">
  </head>
  <body class="page-profile">

	<?php include('header.php'); ?>

	<div class="content content-fixed content-profile">
	  <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
		<div class="media d-block d-lg-flex">
		  <div class="profile-sidebar pd-lg-r-25">
			<div class="row">
			  <div class="col-sm-3 col-md-2 col-lg">
				<div class="avatar avatar-xxl avatar-online"><img src="user-pic/<?php echo $row['img']; ?>" class="rounded-circle" alt=""></div>
			  </div><!-- col -->
			  <div class="col-sm-8 col-md-7 col-lg mg-t-20 mg-sm-t-0 mg-lg-t-25">
				<h5 class="mg-b-2 tx-spacing--1"><?php echo $name; ?></h5>
				  <p>DOB - <?php echo $row['dob']; ?><br>Reg. Dt. - <?php echo $row['date']; ?></p>
                    <div class="d-flex mg-b-25">
                        <a href="#modalupdpic" class="btn btn-xs btn-white flex-fill" data-toggle="modal">Update Pic</a>
                        <a href="#modalupdpro" class="btn btn-xs btn-primary flex-fill mg-l-10" data-toggle="modal">Update Profile</a>
                    </div>
				<div class="d-flex">

				</div>
			  </div>

			  <div class="col-sm-6 col-md-5 col-lg mg-t-40">
				<label class="tx-sans tx-10 tx-semibold tx-uppercase tx-color-01 tx-spacing-1 mg-b-15">Contact Information</label>
				<ul class="list-unstyled profile-info-list">
				  <li><i data-feather="home"></i> <span class="tx-color-03">
						  <?php echo $row['address']; ?></span></li>
				  <li><i data-feather="smartphone"></i> <a href="#">
						  <?php echo $row['city']; ?> , <?php echo $row['state']; ?></a></li>
				  <li><i data-feather="phone"></i> <a href="#">
						  <?php echo $row['mobile']; ?></a></li>
				  <li><i data-feather="mail"></i><a href="#"><?php echo $row['email']; ?></a></li>
				</ul>
			  </div>
			</div>

		  </div>
		  <div class="media-body mg-t-40 mg-lg-t-0 pd-lg-x-10">
			  <div class="card mg-b-20 mg-lg-b-25">
				  <div class="card-header pd-y-15 pd-x-20 d-flex align-items-center justify-content-between">
					  <h6 class="tx-uppercase tx-semibold mg-b-0">About</h6>
					  <nav class="nav nav-icon-only">
                          <a href="#modalabout" class="nav-link" data-toggle="modal">Update About</a>
					  </nav>
				  </div>
				  <div class="card-body pd-20 pd-lg-25">
						  <div class="bd bg-gray-50 pd-y-15 pd-x-15 pd-sm-x-20">
							  <p class="mg-b-0 tx-14"> <?php echo $row['about']; ?></p>
						  </div>
				  </div>
			  </div>
              <div class="card mg-b-20 mg-lg-b-25">
				  <div class="card-header pd-y-15 pd-x-20 d-flex align-items-center justify-content-between">
					  <h6 class="tx-uppercase tx-semibold mg-b-0">Education</h6>
					  <nav class="nav nav-icon-only">
                          <a href="#modaladdmore" class="btn btn-xs btn-primary flex-fill mg-l-10" data-toggle="modal">Add More + </a>
					  </nav>
				  </div>
				  <div class="card-body pd-20 pd-lg-25">
					  <?php
					  $qq=mysqli_query($con,"SELECT * FROM `candidate_education` WHERE `r_id` = '".$row['id']."'");
					  while($rq=mysqli_fetch_array($qq))
					  {
						  ?>
						  <div class="bd bg-gray-50 pd-y-15 pd-x-15 pd-sm-x-20">
							  <h6 class="tx-15 mg-b-3">Institute :  <?php echo $rq['institute']; ?></h6>
							  <p class="mg-b-0 tx-14">Class :  <?php echo $rq['class']; ?> | Year :  <?php echo $rq['year']; ?></p>
							  <span class="tx-13 tx-color-03">Percentage :  <?php echo $rq['percentage']; ?></span>
						  </div>
						  <?php
					  }
					  ?>
				  </div>
			  </div>
		  </div>
		  <div class="profile-sidebar mg-t-40 mg-lg-t-0 pd-lg-l-25">
			<div class="row">
			  <div class="col-sm-6 col-md-5 col-lg">
				<div class="d-flex align-items-center justify-content-between mg-b-20">
				  <h6 class="tx-13 tx-spacng-1 tx-uppercase tx-semibold mg-b-0">Test Series</h6>
				  <a href="test-series.php" class="link-03">View All</a>
				</div>
				<ul class="list-unstyled media-list mg-b-15">
                    <?php
                    $qf=mysqli_query($con,"SELECT * FROM `main_courses` LIMIT 10");
                    while($rq=mysqli_fetch_array($qf))
                    {
                    ?>
                    <li class="media align-items-center">
					<a href="#"><div class="avatar"><span class="avatar-initial rounded-circle bg-dark"><i class="fas fa-edit"></i></span></div></a>
					<div class="media-body pd-l-15">
					  <p class="tx-medium mg-b-0">
                          <a href="../sub-courses.php?id=<?= $rq['id'] ?>" target="_blank" class="link-01">
                              <?php echo $rq['name']; ?>
                          </a>
                      </p>
					  <span class="tx-12 tx-color-03"></span>
					</div>
				    </li>
                    <?php
                    }
                    ?>

				</ul>

			  </div>
			</div>
		  </div>
		</div>
	  </div>
	</div>
    <div class="modal fade" id="modalupdpic" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel4" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content tx-14">
				<div class="modal-header">
					<h6 class="modal-title" id="exampleModalLabel4">Upload pic</h6>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
                <form action="" method="post" enctype="multipart/form-data">
				<div class="modal-body">
					<p class="mg-b-0">
                    <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" id="imgInp" >
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                    <img id="blah" src="#" class="rounded-circle" alt="your image" style="height: 150px;width:150px;"/>

                    </p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary tx-13" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary tx-13" name="picsubmit">Save changes</button>
				</div>
                </form>
			</div>
		</div>
	</div>
    <div class="modal fade" id="modalupdpro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel4" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content tx-14">
				<div class="modal-header">
					<h6 class="modal-title" id="exampleModalLabel4">Update profile</h6>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div data-label="Example" class="df-example demo-forms">
                            <div class="row row-sm">
                                <div class="col-sm-6">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Name" value=" <?php echo $row['name']; ?>">
                                </div>
                                <div class="col-sm-6 mg-t-10 ">
                                    <label>Dob</label>
                                    <input type="date" name="dob" class="form-control" placeholder="DOB" value="<?php echo date("Y-m-d", strtotime($row['dob'])); ?>">
                                </div>
                                <div class="col-sm-6 mg-t-10 ">
                                    <label>Mobile</label>
                                    <input type="text" class="form-control" placeholder="Contact No." name="mobile" value=" <?php echo $row['mobile']; ?>">
                                </div>
                                <div class="col-sm-6 mg-t-10 ">
                                    <label>Address</label>
                                    <input type="text" class="form-control" placeholder="address" name="address" value=" <?php echo $row['address']; ?>">
                                </div>
                                <div class="col-sm-6 mg-t-10 ">
                                    <label>State</label>
                                    <input type="text" class="form-control" name="state" placeholder="state" value=" <?php echo $row['state']; ?>">
                                </div>
                                <div class="col-sm-6 mg-t-10 ">
                                    <label>City</label>
                                    <input type="text" class="form-control" name="city" placeholder="City" value=" <?php echo $row['city']; ?>">
                                </div>
                                <div class="col-sm-6 mg-t-10 ">
                                    <label>Email</label>
                                    <input type="text" class="form-control" readonly name="email" placeholder="Email" value=" <?php echo $row['email']; ?>">
                                </div>
                                <div class="col-sm-6 mg-t-10 ">
                                    <label>Reg. Date</label>
                                    <input type="text" class="form-control" readonly name="regdt" placeholder="Registration date" value=" <?php echo $row['date']; ?>">
                                </div>
                            </div><!-- row -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary tx-13" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary tx-13" name="prosubmit">Save changes</button>
                    </div>
                </form>
			</div>
		</div>
	</div>
    <div class="modal fade" id="modalabout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel4" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content tx-14">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div data-label="Example" class="df-example demo-forms">
                            <div class="row row-sm">

                                <div class="col-sm-12 mg-t-10 ">
                                    <textarea name="about" class="form-control" placeholder=""><?php echo $row['about']; ?></textarea>
                                </div>
                            </div><!-- row -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary tx-13" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary tx-13" name="aboutsubmit">Save changes</button>
                    </div>
                </form>
			</div>
		</div>
	</div>
    <div class="modal fade" id="modaladdmore" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel4" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<form class="modal-content tx-14" action="" method="post">
				<div class="modal-header">
					<h6 class="modal-title" id="exampleModalLabel4">Educational info</h6>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
                    <div data-label="Example" class="df-example demo-forms">
                        <?php
                        $qd=mysqli_query($con,"SELECT * FROM `candidate_education` WHERE `r_id` = '".$row['id']."'");
                        while($rq=mysqli_fetch_array($qd))
                        {
                        ?>
                        <div class="row row-sm">
                            <div class="col-sm-3 mg-t-10 ">
                                <label>Class</label>
                                <input type="text" class="form-control" placeholder="10th / 12th / UG / PG" value=" <?php echo $rq['class']; ?>" readonly>
                            </div>
                            <div class="col-sm-3 mg-t-10 ">
                                <label>Institute</label>
                                <input type="text" class="form-control" placeholder="Institute name" value=" <?php echo $rq['institute']; ?>" readonly>
                            </div>
                            <div class="col-sm-3 mg-t-10 ">
                                <label>Passing Year</label>
                                <input type="text" class="form-control" placeholder="Passing Year" value=" <?php echo $rq['year']; ?>" readonly>
                            </div>
                            <div class="col-sm-2 mg-t-10 ">
                                <label>%</label>
                                <input type="text" class="form-control" placeholder="address" value=" <?php echo $rq['percentage']; ?>" readonly>
                            </div>
                            <div class="col-sm-1 mg-t-10 ">
                                <label> <br></label>
                                <button class="form-control" onclick="deletePost(<?php echo $rq['id']; ?>)"><i class="fas fa-trash-alt"></i></button>
                            </div>

                        </div>
                        <?php
                        }
                        ?>
                        <div class="row row-sm">
                            <div class="col-sm-3 mg-t-10 ">
                                <label>Class</label>
                                <input type="text" name="class[]" class="form-control" placeholder="10th / 12th / UG / PG" value="">
                            </div>
                            <div class="col-sm-3 mg-t-10 ">
                                <label>Institute</label>
                                <input type="text" name="institute[]" class="form-control" placeholder="Institute name" value="">
                            </div>
                            <div class="col-sm-3 mg-t-10 ">
                                <label>Passing Year</label>
                                <input type="text" class="form-control" placeholder="Paassing Year" name="year[]" value="">
                            </div>
                            <div class="col-sm-3 mg-t-10 ">
                                <label>%</label>
                                <input type="text" class="form-control" placeholder="address" name="percen[]" value="">
                            </div>

                        </div>
                        <div class="row row-sm">
                            <div class="col-sm-3 mg-t-10 ">
                                <label>Class</label>
                                <input type="text" name="class[]" class="form-control" placeholder="10th / 12th / UG / PG" value="">
                            </div>
                            <div class="col-sm-3 mg-t-10 ">
                                <label>Institute</label>
                                <input type="text" name="institute[]" class="form-control" placeholder="Institute name" value="">
                            </div>
                            <div class="col-sm-3 mg-t-10 ">
                                <label>Passing Year</label>
                                <input type="text" class="form-control" placeholder="Paassing Year" name="year[]" value="">
                            </div>
                            <div class="col-sm-3 mg-t-10 ">
                                <label>%</label>
                                <input type="text" class="form-control" placeholder="address" name="percen[]" value="">
                            </div>

                        </div>
                        <div class="row row-sm">
                            <div class="col-sm-3 mg-t-10 ">
                                <label>Class</label>
                                <input type="text" name="class[]" class="form-control" placeholder="10th / 12th / UG / PG" value="">
                            </div>
                            <div class="col-sm-3 mg-t-10 ">
                                <label>Institute</label>
                                <input type="text" name="institute[]" class="form-control" placeholder="Institute name" value="">
                            </div>
                            <div class="col-sm-3 mg-t-10 ">
                                <label>Passing Year</label>
                                <input type="text" class="form-control" placeholder="Paassing Year" name="year[]" value="">
                            </div>
                            <div class="col-sm-3 mg-t-10 ">
                                <label>%</label>
                                <input type="text" class="form-control" placeholder="address" name="percen[]" value="">
                            </div>

                        </div>
                    </div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary tx-13" data-dismiss="modal">Close</button>
					<button type="submit" name="edusubmit" class="btn btn-primary tx-13">Save changes</button>
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

	<script src="assets/js/dashforge.js"></script>

	<!-- append theme customizer -->
	<script src="lib/js-cookie/js.cookie.js"></script>
	<!--<script src="assets/js/dashforge.settings.js"></script>-->

	<script>
	  $(function(){
		'use strict';

		$('[data-toggle="tooltip"]').tooltip()
	  });
      function readURL(input) {
          if (input.files && input.files[0]) {
              var reader = new FileReader();

              reader.onload = function(e) {
                  $('#blah').attr('src', e.target.result);
              };

              reader.readAsDataURL(input.files[0]);
          }
      }

      $("#imgInp").change(function() {
          readURL(this);
      });
      function deletePost(sdf) {
          var ask = window.confirm("Are you sure you want to delete this ?");
          if (ask) {
              window.location.href = "delete-education.php?id="+sdf;

          }
      }
	</script>
  </body>

</html>
