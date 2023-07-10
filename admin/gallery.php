<?php
include("config.php");
include("session.php");

if(isset($_GET['id']))
{
	$i=$_GET['id'];
	
	
	$q=mysqli_query($con,"delete from `tbl_gallery_image` where pi_id='$i'");
	
	if($q)
	
	{
	    echo '<script>window.location.href="gallery.php";</script>';
	    echo '<script>alert("Delete Successfullly)</script>';
	}
	
}

if (isset($_POST['upload'])) {
  
 
   $file=$_FILES['logo']['name'];
    $tmpfile=$_FILES['logo']['tmp_name'];
     $folder = (($file == '') ? '' : date("dmYHis") . $file);
     move_uploaded_file($tmpfile,'../images/gallery/'.$folder);
  
  
  $sal =  mysqli_query($con, "INSERT INTO `tbl_gallery_image`(`pi_name`) VALUES ('" . $folder . "')");
  if ($sal) {
    echo '<script>window.location.href="gallery.php";</script>';
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
  <title>C cube | Gallery </title>
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
      <h1 class="df-title">Add Gallery </h1>
      <div class="df-example demo-forms">
        <form method="post" enctype="multipart/form-data" action="">
          <div class="form-row">
            
            <div class="form-group col-md-6">
              <label>Image</label>
              <input class="form-control" name="logo" type="file">
            </div>
           
          </div>
          <button type="submit" name="upload" class="btn btn-primary">Submit Form</button>
        </form>
      </div>
      
       <div class="df-example demo-table">
                <table id="example2" class="table">

                    <thead>
                        <tr>
                            <th class=" ">Id</th>
                           
                            <th class="">Image</th>
                            
                            <th class=" ">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        $b = mysqli_query($con, "select * from `tbl_gallery_image`  ORDER BY `pi_id` DESC ");
                        while ($a = mysqli_fetch_array($b)) {
                            echo ' <tr>
                       <td>' . $i . '</td>
                       <td><img src="../images/gallery/' . $a['pi_name'] . '" class="d-block ui-w-30 rounded-circle" style="height: 65px;width: 65px;" alt=""></td>

					  
					    <td> <a  class="btn btn-danger" href="gallery.php?id=' . $a['pi_id'] . '">Delete</a></td>
						<td></td>
                        </tr>';
                            $i++;
                        }
                        ?>
                    </tbody>
                </table>
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

        <script src="assets/js/dashforge.js"></script>

        <script>
            $(function() {
                'use strict';

                $('#example1').DataTable({
                    language: {
                        searchPlaceholder: 'Search...',
                        sSearch: '',
                        lengthMenu: '_MENU_ items/page',
                    }
                });

                $('#example2').DataTable({
                    responsive: true,
                    language: {
                        searchPlaceholder: 'Search...',
                        sSearch: '',
                        lengthMenu: '_MENU_ items/page',
                    }
                });

                $('#example3').DataTable({
                    'ajax': 'assets/data/datatable-arrays.txt',
                    language: {
                        searchPlaceholder: 'Search...',
                        sSearch: '',
                        lengthMenu: '_MENU_ items/page',
                    }
                });

                $('#example4').DataTable({
                    'ajax': 'assets/data/datatable-objects.txt',
                    "columns": [{
                            "data": "name"
                        },
                        {
                            "data": "position"
                        },
                        {
                            "data": "office"
                        },
                        {
                            "data": "extn"
                        },
                        {
                            "data": "salary"
                        }
                    ],
                    language: {
                        searchPlaceholder: 'Search...',
                        sSearch: '',
                        lengthMenu: '_MENU_ items/page',
                    }
                });

                // Select2
                $('.dataTables_length select').select2({
                    minimumResultsForSearch: Infinity
                });

            });
        </script>
</body>

</html>