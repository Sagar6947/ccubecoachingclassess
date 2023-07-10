<?php
include('config.php');
$lb=$cor=$inc='\'0';
$sd = mysqli_query($con,"SELECT * FROM `candidate_test_attempts` WHERE `s_id`='".$row['id']."' LIMIT 10");
while($for = mysqli_fetch_array($sd))
{
    $sfd = mysqli_query($con,"SELECT * FROM `test_series` WHERE `id`='".$for['t_id']."' ");
    $forf = mysqli_fetch_array($sfd);
    $lb = $lb.'\',\''.$forf['test_name'].' | Date - '.$for['date'];
    $cor = $cor.'\',\''.$for['correct'];
    $inc = $inc.'\',\''.$for['incorrect'];

}
$lb=$lb.'\'';
$cor=$cor.'\'';
$inc=$inc.'\'';
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="DashForge">
    <meta name="twitter:description" content="Responsive Bootstrap 4 Dashboard Template">
    <meta name="twitter:image" content="assets/img/dashforge-social.html">

    <!-- Facebook -->
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

    <title>C cube | Student Dashboard | Home </title>

    <!-- vendor css -->
    <link href="lib/%40fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">

    <!-- DashForge CSS -->
    <link rel="stylesheet" href="assets/css/dashforge.css">
    <link rel="stylesheet" href="assets/css/dashforge.dashboard.css">
  </head>
  <body class="page-profile" >

    <?php include('header.php'); ?>

    <div class="content content-fixed" >
      <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
        <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-30">
          <div>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Helpdesk Management</li>
              </ol>
            </nav>
            <h4 class="mg-b-0 tx-spacing--1">Welcome to Dashboard</h4>
          </div>
          <div class="d-none d-md-block">

          </div>
        </div>

        <div class="row row-xs">
            <div class="col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header bd-b-0 pd-t-20 pd-lg-t-25 pd-l-20 pd-lg-l-25 d-flex flex-column flex-sm-row align-items-sm-start justify-content-sm-between">
                        <div>
                            <h6 class="mg-b-5">Last 10 Test Analysis</h6>
                            <p class="tx-12 tx-color-03 mg-b-0"></p>
                        </div>
                        <div class="btn-group mg-t-20 mg-sm-t-0">

                        </div><!-- btn-group -->
                    </div><!-- card-header -->
                    <div class="card-body pd-lg-25">
                        <div class="row align-items-sm-end">
                            <div class="col-lg-10 col-xl-10">
                                <div class="chart-six"><canvas id="chartBar1"></canvas></div>
                            </div>
                            <div class="col-lg-2 col-xl-2">
                                <div class="col-lg-12 col-xl-12" style="background-color:#66a4fb; color:white; ">
                                 Correct Answer
                                </div>
                                <div class="col-lg-12 col-xl-12" style="background-color:#65e0e0;color:white; ">
                                 Incorrect Answer
                                </div>
                            </div>

                        </div>
                    </div><!-- card-body -->
                </div><!-- card -->
            </div>

        </div><!-- row -->
      </div><!-- container --><br><br><br>
    </div><!-- content -->



    <?php include('footer.php'); ?>

    <script src="lib/jquery/jquery.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="lib/feather-icons/feather.min.js"></script>
    <script src="lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="lib/jquery.flot/jquery.flot.js"></script>
    <script src="lib/jquery.flot/jquery.flot.stack.js"></script>
    <script src="lib/jquery.flot/jquery.flot.resize.js"></script>
    <script src="lib/flot.curvedlines/curvedLines.js"></script>
    <script src="lib/peity/jquery.peity.min.js"></script>
    <script src="lib/chart.js/Chart.bundle.min.js"></script>

    <script src="assets/js/dashforge.js"></script>
    <script src="assets/js/dashforge.sampledata.js"></script>

    <!-- append theme customizer -->
    <script src="lib/js-cookie/js.cookie.js"></script>
    <!--<script src="assets/js/dashforge.settings.js"></script>-->

    <script>
        $(function(){
            'use strict';

            var ctx1 = document.getElementById('chartBar1').getContext('2d');
            new Chart(ctx1, {
                type: 'bar',
                data: {
                    labels: [<?php echo $lb; ?>],
                    datasets: [{
                        data: [<?php echo $cor; ?>],
                        backgroundColor: '#66a4fb'
                    },{
                        data: [<?php echo $inc; ?>],
                        backgroundColor: '#65e0e0'
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    legend: {
                        display: false,
                        labels: {
                            display: false
                        }
                    },
                    scales: {
                        xAxes: [{
                            display: false,
                            barPercentage: 0.5
                        }],
                        yAxes: [{
                            gridLines: {
                                color: '#ebeef3'
                            },
                            ticks: {
                                fontColor: '#8392a5',
                                fontSize: 10,
                                min: 1,
                                max: 120

                            }

                        }]
                    }
                }
            });

        })
    </script>
  </body>

 </html>
