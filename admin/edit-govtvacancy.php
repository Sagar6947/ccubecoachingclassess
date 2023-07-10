<?php
include("config.php");
include("session.php");

 if(isset($_GET['id']))
    {
      $id=$_GET['id'];
    }

    $sql=mysqli_query($con,"select * from govt WHERE  id='$id' ");
    $row=mysqli_fetch_array($sql);

if (isset($_POST['submit']))
  {
  $title = $_POST['title'];
  $location = $_POST['location'];
  $content = $_POST['content'];
  $post = $_POST['post'];
  $role = $_POST['role'];
  $eligiblity = $_POST['eligiblity'];
  $ldate = $_POST['ldate'];

 if(!empty($_FILES['image']['name']))
     {
        $file=$_FILES['image']['name'];
    $tmpfile=$_FILES['image']['tmp_name'];
    $folder='images/'.$file;
    move_uploaded_file($tmpfile,$folder);
     }
     else
     {
        $folder = $_POST['img'];
     }

  $sal=  mysqli_query($con, "UPDATE `govt` SET `title`='".$title."',`location`='".$location."',`role`='".$role."',`post`='".$post."',`description`='".$content."',`image`='".$folder."',`last_date`='".$ldate."',`eligiblity`='".$eligiblity."'
    WHERE  id='$id' ");
     if($sal)
  {
    echo '<script>window.location.href="govt-vacancy.php";</script>';
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
     <h4 id="section3" class="mg-b-10">Edit Govt vacancy</h4>

        <div  class="df-example demo-forms">
          <form method="post" enctype="multipart/form-data">
            <div class="form-row">
              <div class="form-group col-md-4">
                <label>Vacany In</label>
                <input type="text" name="title" class="form-control" value="<?php echo $row['title'] ;?>">

              </div>
              <div class="form-group col-md-5">
                <label>Post/Role Name</label>
                <input type="text" class="form-control"  name="role" value="<?php echo $row['role'] ;?>" >

              </div>
              <div class="form-group col-md-3">
              <label>Image</label>
               <input class="form-control" name="image" type="file" value="">
                   <input name="img" type="hidden" value="<?php echo $row['image'] ;?>">

              </div>
            </div>
              <div class="form-row">
              <div class="form-group col-md-4">
                <label>No Of Post</label>
                <input type="text" name="post" class="form-control" value="<?php echo
                   $row['post'] ;?>">

              </div>
              <div class="form-group col-md-4 ">
                <label>Eligiblity</label>
                <input type="text" class="form-control" name="eligiblity" value="<?php echo $row['eligiblity'] ;?>" >

              </div>
              <div class="form-group col-md-4">
              <label>Last Date</label>
                <input type="date" name="ldate" class="form-control"  value="<?php echo $row['last_date'] ;?>" >
              </div>
            </div>

            <div class="form-group">
              <label for="inputAddress">Address</label>
              <input type="text" class="form-control" name="location" id="inputAddress" value="<?php echo $row['location'] ;?>">
            </div>
            <div class="form-group">
              <label>Description</label>
              <textarea name="content"  style="width:100%; height: 180px; resize: none;" ><?php echo $row['description'] ;?></textarea>
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
    <script>
      $(function(){
        'use strict';

        var quill = new Quill('#editor-container', {
          modules: {
            toolbar: '#toolbar-container'
          },
          placeholder: 'Compose an epic...',
          theme: 'snow'
        });

        var quill2 = new Quill('#editor-container2', {
          modules: {
            toolbar: [
              ['bold', 'italic'],
              ['link', 'blockquote', 'code-block', 'image'],
              [{ list: 'ordered' }, { list: 'bullet' }]
            ]
          },
          placeholder: 'Compose an epic...',
          theme: 'snow'
        });

        // Inline Edit
        var quillInline = new Quill('#quillInline', {
          modules: {
            toolbar: [
              ['bold', 'italic', 'underline'],
              [{ 'header': 1 }, { 'header': 2 }, 'blockquote'],
              ['link', 'image', 'code-block'],
            ]
          },
          bounds: '#quillInline',
          scrollingContainer: '#scrolling-container',
          placeholder: 'Write something...',
          theme: 'bubble'
        });

        const ps = new PerfectScrollbar('#scrolling-container', {
          suppressScrollX: true
        });

        // Editor in Modal
        var quillModal2 = new Quill('#quillEditorModal', {
          modules: {
            toolbar: [
              ['bold', 'italic', 'underline'],
              [{ 'header': 1 }, { 'header': 2 }, 'blockquote'],
              ['link', 'image', 'code-block'],
            ]
          },
          theme: 'snow'
        });

      });
    </script>
  </body>
</html>
