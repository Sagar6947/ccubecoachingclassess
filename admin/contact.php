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
  <title>Examison | Contact Details</title>
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

  <?php include('header.php'); ?>
  <?php include('sidemenu.php'); ?>


  <div class="content content-components">
    <div class="container">

      <h1 class="df-title">Contact Details</h1>
      <a href="contact_bunch_delete.php" class="btn btn-primary">Delete Bunch</a><br><br>

      <div class="df-example demo-table">
        <table id="example2" class="table">
          <thead>
            <tr>
              <th class="wd-20p">Id</th>
              <th class="wd-25p">Date</th>
              <th class="wd-25p">Name</th>
              <th class="wd-20p">Mail/Phone</th>
              <th class="wd-15p">Details</th>
              <th class="wd-20p">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $x = mysqli_query($con, "select * from `contact`  ORDER BY `id` DESC");
            $i=1;
            while ($y = mysqli_fetch_array($x)) {
              echo '<tr>
                    <td>' . $i . '</td>
                    <td>' . $y['date'] . '</td>
                    <td>' . $y['name'] . '</td>
                    <td>M: ' . $y['email'] . '</br>
                    P: ' . $y['phone'] . '</td>
                    <td>' . wordwrap($y['message'], 50, "<br>") . '</td>
                    <td><a  href="contact-del.php?id=' . $y['id'] . '"><i data-feather="trash-2"></i></a> </td></td>
                </tr>';
                $i++;
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
          }, 
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