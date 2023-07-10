<?php
include("config.php");
include("session.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Bootstrap 4 Dashboard Template">
    <meta name="author" content="ThemePixels">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <title>C cube | Coaching Details</title>
    <link href="lib/%40fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="lib/typicons.font/typicons.css" rel="stylesheet">
    <link href="lib/prismjs/themes/prism-vs.css" rel="stylesheet">
    <link href="lib/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="lib/datatables.net-responsive-dt/css/responsive.dataTables.min.css" rel="stylesheet">
    <link href="lib/select2/css/select2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/dashforge.css">
    <link rel="stylesheet" href="assets/css/dashforge.demo.css">
</head>
  <body data-spy="scroll" data-target="#navSection" data-offset="120">

    <?php include ('header.php'); ?>
    <?php include ('sidemenu.php'); ?>

    <div class="content content-components">
    <div class="container">
    <h1 class="df-title">Coaching Details</h1>

         <div  class="df-example demo-table">
          <table id="example2" class="table">
            <thead>
                <tr>
                    <th class="wd-10p">Id</th>
                    <th class="wd-25p">Coaching</th>
                    <th class="wd-25p">Phone/Email/Address</th>
                    <th class="wd-20p">city/state/pincode</th>
                    <th class="wd-15p">Status</th>
                    <th class="wd-10p">Edit</th>
                    <th class="wd-10p">Delete</th>
                </tr>
            </thead>
            <tbody>
              <?php
              $b=mysqli_query($con,"select * from  add_coaching ");
              while($a=mysqli_fetch_array($b))
              {
                echo '<tr>
                    <td>'.$a['id'].'</td>
                    <td>'.$a['coaching_name'].'</td>
                    <td>P:-'.$a['phone_no'].'</br>E:-'.$a['email'].'</br>A:-'.substr($a['address'],20,50 ).'</td>
                    <td>C:-'.$a['city'].'</br>S:-'.$a['state'].'</br>
                         P:-'.$a['pincode'].'<br>
                  '
                   ?>
                    <td>
                   <?php
                   if($a['status'] == 'YES')
                   {

                 echo'  <a class="btn btn-outline-primary" href="coaching_show.php?id='.$a['id'].'">'.$a['status'].'</a>';
                 }
                 else
                 {

                   echo'<a class="btn btn-outline-danger" href="coaching_show.php?id='.
                   $a['id'].'">'.$a['status'].'</a>';
                 }
                 ?>
                   </td>
                   <?php
                   echo
                   '
                  <td><a class="btn btn-primary" href="edit-coaching.php?id='.$a['id'].'">Edit</a></td>
                   <td><a class="btn btn-primary" href="coaching-del.php?id='.$a['id'].'">Delete</a></td>
                   </tr>
                   '
                   ;
                 }
                ?>
                </tbody>
              </table>
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

    <script src="assets/js/dashforge.js"></script>
    <script>
      $(function(){
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
          "columns": [
            { "data": "name" },
            { "data": "position" },
            { "data": "office" },
            { "data": "extn" },
            { "data": "salary" }
          ],
          language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
          }
        });

        // Select2
        $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

      });
    </script>
  </body>
</html>
