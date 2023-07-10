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
			$description = $_POST['description'];
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

				$qu=mysqli_query($con,"UPDATE `main_courses` SET `name`='$a',`image`='$folder',`description`='$description'  WHERE  id='$id' ");

				if ($qu)
				{
				 echo '<script>alert("Updated Successfully")</script>';
				 echo '<script>window.location="courses.php"</script>';

				}else{
				    echo '<script>alert("Server Error")<script>';
				}




		}


			$sql=mysqli_query($con,"select * from `main_courses` where id='$id' ");
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
    <title>Courses Edit | C cube</title>
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

    <?php include ('header.php'); ?>
    <?php include ('sidemenu.php'); ?>

    <div class="content content-components">
    <div class="container">
    <h1 class="df-title">UPDATE COURSE</h1>

        <div  class="df-example demo-forms">
          <form method="post" enctype="multipart/form-data" action="">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="<?php echo $row['name']; ?>" placeholder="Ex:-AIIMS Staff Nurse " >

              </div>


              <div class="form-group col-md-6">
              <label>Image</label>
               <input class="form-control" name="image" type="file" value="">
              <input name="img" type="hidden" value="<?= $row['image'];?>">

              </div>
                <div class="form-group col-md-12">
                <label>Description</label>

               <textarea class="form-control" name="description" placeholder="Enter description" id="editor"><?= $row['description'];?></textarea>
              </div>

            </div>
            <button type="submit" name="update" class="btn btn-primary">UPDATE</button>
          </form>
        </div>
    </div>



       <?php include('footer.php'); ?>

    </div>
    <script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
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
