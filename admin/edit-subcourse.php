<?php
include("config.php");
include("session.php");
       if(isset($_GET['id']))
		{
			$id=$_GET['id'];
		}
			if(isset($_POST['update']))
			{
				$a=$_POST['name'];
        $days = $_POST['days'];
				 $main_course = $_POST['main_course'];
				$p=$_POST['price'];
				$d=$_POST['description'];
			if(!empty($_FILES['image']['name']))
                 {
                    $file=$_FILES['image']['name'];
                $tmpfile=$_FILES['image']['tmp_name'];
                $folder='images/'.date("dmyhis").'-'.$file;
                move_uploaded_file($tmpfile,$folder);
                  }
                 else
                 {
                    $folder = $_POST['img'];
                 }

				$qu=mysqli_query($con,"update courses set  `main_course`='$main_course', name='$a', price='$p', description='$d', image='$folder', days='$days'  where id='$id' ");

				if ($qu)
				{
				 echo '<script>alert("Updated Successfully")</script>';
				 echo '<script>window.location="subcourses.php"</script>';

				}else{
				    echo '<script>alert("Server Error")<script>';
				}




		}


			$sql=mysqli_query($con,"select * from courses where id='$id' ");
		    $row=mysqli_fetch_array($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Bootstrap 4 Dashboard Template">
    <meta name="author" content="ThemePixels">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <title>Sub-Courses Edit | C cube</title>
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
     <h4 id="section3" class="mg-b-10">UPDATE COURSE</h4>

        <div  class="df-example demo-forms">
          <form method="post" enctype="multipart/form-data" action="">
            <div class="form-row">

                 <div class="form-group col-md-6">
                <label>Select Courses</label>
                 <select name="main_course" class="form-control">

                     <option value="">select Course</option>
                      <?php
                $b = mysqli_query($con, "select * from `main_courses`  ");
                while ($a = mysqli_fetch_array($b)) {
                    ?>

                     <option value="<?= $a['id'] ?>"  <?= (($a['id'] == $row['main_course']) ? 'selected' : '' ) ?>  ><?= $a['name'] ?></option>

                     <?php
                }
                ?>

                 </select>
              </div>


              <div class="form-group col-md-6">
                <label>Package</label>

                <select name="name" class="form-control" required>

                     <option value="">Select Package</option>
                      <?php
                $b = mysqli_query($con, "select * from `course_package`  ");
                while ($a = mysqli_fetch_array($b)) {
                    ?>
                      <option value="<?= $a['id'] ?>"  <?= (($a['id'] == $row['name']) ? 'selected' : '' ) ?>><?= $a['name'] ?> - <?= $a['description'] ?></option>


                     <?php
                }
                ?>

                 </select>
              </div>
              <div class="form-group col-md-6">
                <label>Price</label>
                <input type="text" class="form-control"  name="price" value="<?php echo $row['price']; ?>" placeholder="Ex:-" >

              </div>
              <div class="form-group col-md-6">
                <label> Days validity</label>
                <input type="text" class="form-control"  name="days" value="<?php echo $row['days']; ?>">

              </div>
              <div class="form-group col-md-6">
              <label>Image</label>
               <input class="form-control" name="image" type="file" value="">
              <input name="img" type="hidden" value="<?= $row['image'];?>">

              </div>

            <div class="form-group col-md-12" style="display:none">
              <label>Description</label>
              <textarea name="description" rows="4" class="form-control" placeholder="Description"><?php echo $row['description']; ?></textarea>
            </div>
            </div>
            <button type="submit" name="update" class="btn btn-primary">UPDATE</button>
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
