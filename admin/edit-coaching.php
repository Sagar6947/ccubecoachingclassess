<?php
include("config.php");
include("session.php");

 if(isset($_GET['id']))
    {
      $id=$_GET['id'];
    }

    $sql=mysqli_query($con,"SELECT * FROM `add_coaching` WHERE  id='$id' ");
    $row=mysqli_fetch_array($sql);

if (isset($_POST['submit']))
  {
  $name = $_POST['name'];
  $location = $_POST['location'];
  $content = $_POST['content'];
  $email = $_POST['email'];
  $contact = $_POST['contact'];
  $state = $_POST['state'];
  $city = $_POST['city'];
  $pin = $_POST['pin'];

 if(!empty($_FILES['image']['name']))
     {
        $file=$_FILES['image']['name'];
    $tmpfile=$_FILES['image']['tmp_name'];
    $folder='../images/'.$file;
    move_uploaded_file($tmpfile,$folder);
     }
     else
     {
        $folder = $_POST['img'];
     }

  $sal=  mysqli_query($con, "UPDATE `add_coaching` SET `coaching_name`='".$name."',`phone_no`='".$contact."',`email`='".$email."',`address`='".$location."',`city`='".$city."',`state`='".$state."',`pincode`='".$pin."',`about_coaching`='".$content."',`image`='".$folder."' WHERE  id='$id' ");
     if($sal)
  {
    echo '<script>window.location.href="coaching.php";</script>';
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
    <title>C cube | Govt vacancy</title>
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
     <h4 id="section3" class="mg-b-10">Edit Nursing Coaching</h4>

        <div  class="df-example demo-forms">
          <form method="post" enctype="multipart/form-data">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Coaching Name:</label>
                <input type="text" name="name" class="form-control" value="<?php echo $row['coaching_name'] ;?>">

              </div>
              <div class="form-group col-md-3">
                <label>Phone:</label>
                <input type="text" class="form-control"  name="contact" value="<?php echo $row['phone_no'] ;?>">

              </div>
              <div class="form-group col-md-3">
              <label>Image:</label>
               <input class="form-control" name="image" type="file" value="">
                   <input name="img" type="hidden" value="<?php echo $row['image'] ;?>">

              </div>
            </div>
              <div class="form-row">
              <div class="form-group col-md-4">
                <label>State</label>
                <input type="text" name="state" class="form-control" value="<?php echo $row['state'] ;?>" >

              </div>
              <div class="form-group col-md-4 ">
                <label>City</label>
                <input type="text" class="form-control" name="city" value="<?php echo $row['city'] ;?>">

              </div>
               <div class="form-group col-md-4 ">
                <label>Pin Code:</label>
                <input type="text" class="form-control" name="pin" value="<?php echo $row['pincode'] ;?>">
               </div>
             </div>
             <div class="row">
            <div class="form-group col-md-6 ">
              <label for="inputAddress">Email</label>
              <input type="text" class="form-control" name="email" id="inputAddress" value="<?php echo $row['email'] ;?>">
            </div>

              <div class="form-group col-md-6">
              <label for="inputAddress">Address</label>
              <input type="text" class="form-control" name="location" id="inputAddress" value="<?php echo $row['address'] ;?>">
            </div>
              </div>
            <div class="form-group">
              <label>Description</label>
              <textarea name="content"  style="width:100%; height: 180px; resize: none;" ><?php echo $row['about_coaching'] ;?></textarea>
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Submit Form</button>
          </form>
        </div>
             </div>
          </div>

       <?php include('footer.php'); ?>


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
