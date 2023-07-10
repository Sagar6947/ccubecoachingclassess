<?php
include('config.php');
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

    <!-- Meta -->
    <meta name="description" content="Responsive Bootstrap 4 Dashboard Template">
    <meta name="author" content="ThemePixels">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <link href="lib/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="lib/datatables.net-responsive-dt/css/responsive.dataTables.min.css" rel="stylesheet">
    <title> C cube | Test Result </title>

    <link href="lib/%40fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="lib/typicons.font/typicons.css" rel="stylesheet">
    <link href="lib/prismjs/themes/prism-vs.css" rel="stylesheet">
    <link href="lib/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="lib/datatables.net-responsive-dt/css/responsive.dataTables.min.css" rel="stylesheet">
    <link href="lib/select2/css/select2.min.css" rel="stylesheet">

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
                <li class="breadcrumb-item active" aria-current="page">Test Series</li>
              </ol>
            </nav>
            <h4 class="mg-b-0">Test Series</h4>
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

          <table id="example2" class="table">
            <thead>
              <tr>
                <th class="wd-20p">Test Series</th>
                <th class="wd-25p">Correct Answers</th>
                <th class="wd-20p">Incorrect Answer</th>
                <th class="wd-20p">Unattempted Answer</th>
                <th class="wd-15p">Total Marks</th>
                <th class="wd-15p">Current Rank</th>
                <th class="wd-15p">Attempt Made on</th>
                <th class="wd-15p">Preview Result</th>
              </tr>
            </thead>
            <tbody>
               <?php
                    $q=mysqli_query($con,"SELECT * FROM `candidate_test_attempts` WHERE `s_id` ='".$row['id']."'");
                    while($r=mysqli_fetch_array($q))
                    {
                        $d=mysqli_query($con,"SELECT * FROM `test_series` WHERE `id` ='".$r['t_id']."'");
                        $rd=mysqli_fetch_array($d);
                        // $sqlc = mysqli_query($con, "SELECT * FROM `main_courses`  WHERE  id=" . $rd['test_name'] . " ");
                        //     $rowc = mysqli_fetch_array($sqlc);
                        ?>
                      <tr>
                        <td><?php echo $rd['examtitle']; ?></td>
                        <td><?php echo $r['correct']; ?></td>
                        <td><?php echo $r['incorrect']; ?></td>
                        <td><?php echo $r['notattempted']; ?></td>
                        <td><?php echo $r['t_marks']; ?></td>
                        <?php
                        echo '<td>';

                        $i=1;$rank=0;
                        $fg ="SELECT `s_id`, `t_id`, `correct`, `incorrect`, avg(`t_marks`) as t_marks  FROM `candidate_test_attempts` WHERE `t_id` ='".$r['t_id']."' GROUP BY `s_id`  ORDER BY `t_marks` DESC ";
                        // echo $fg;
                        $qz=mysqli_query($con,$fg);
                        $arrlength = mysqli_num_rows($qz);
                        while($rz=mysqli_fetch_array($qz)){
                            // echo $rz['t_marks'];
                            // echo $r['s_id'] .'=='. $rz['s_id'].'<br>';
                            if($r['s_id'] == $rz['s_id']){
                                $rank=$i;
                            }

                            $i++;
                        }
                           echo '<span style="font-size:28px;"><b>'.$rank.'</b></span>/'.$arrlength;
                        //    echo '  '.$rank .' ';
                        echo'</td>';
                        ?>
                        <td>Date : <?php echo $r['date']; ?><br>Time : <?php echo $r['time']; ?></td>
                        <td><a href="view_old_answer.php?id=<?php echo $r['id']; ?>"><button type="button" class="btn btn-primary"> Solutions </button></a></td>
                      </tr>
               <?php
                    }
               ?>

            </tbody>
          </table>

        </div>
      </div>

     <?php include('footer.php'); ?><script src="lib/jquery/jquery.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="lib/feather-icons/feather.min.js"></script>
    <script src="lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="lib/prismjs/prism.js"></script>

    <script src="assets/js/dashforge.js"></script>
    <script>
      $(function(){
        'use strict'

      });
    </script>
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