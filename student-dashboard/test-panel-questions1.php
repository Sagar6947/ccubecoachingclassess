<?php  include 'config.php'; $id = $_SESSION['h']; $que = array();
if(isset($_POST['submit'])) { print_r($que); }

?>
<script>
  var arr = [];
</script>
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

    <title>C cube | Test Panel</title>

    <link href="lib/%40fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="lib/typicons.font/typicons.css" rel="stylesheet">
    <link href="lib/prismjs/themes/prism-vs.css" rel="stylesheet">

    <!-- DashForge CSS -->
    <link rel="stylesheet" href="assets/css/dashforge.css">
    <link rel="stylesheet" href="assets/css/dashforge.demo.css">

  </head>
  <body class="pos-relative" data-spy="scroll" data-target="#navSection" data-offset="120">

    <?php include('header.php'); ?>
    <div id="sidebarMenu" class="sidebar sidebar-fixed sidebar-components" style="padding:10px;">
      <div class="sidebar-header">
        <a href="#" id="mainMenuOpen"><i data-feather="menu"></i></a>
        <h5>Components</h5>
        <a href="#" id="sidebarMenuClose"><i data-feather="x"></i></a>
      </div><!-- sidebar-header -->
      <div class="sidebar-body" style="padding:10px;">
        <ul class="nav nav-line" id="myTab5" role="tablist" style="border-bottom: 0">
            <?php
                    $i=1;
                    $q=mysqli_query($con,"SELECT * FROM `test_questions` WHERE `test_series_id`='".$id."'");
                    while($r=mysqli_fetch_array($q))
                    {
                       array_push($que,$r['id']);
                       echo '<script>arr.push(\''.$r['id'].'\');</script>';
                      echo '
                      <li>
                        <button type="button" class="avatar" onclick="get_question('.$r['id'].');"';
                        echo' style="border-radius:50%;width:35px;height:35px"><span class="avatar-initial rounded-circle">'.$i.'</span></button>
                        </li>
                       ';
                      if($i == 1)
                       { $f = $r['id'];}
                       $i++;
                    }
                    $_SESSION['arr'] = $que;


            ?>

          </ul>
      </div><!-- sidebar-body -->
    </div><!-- sidebar -->

    <div class="content content-components" style="margin-right: 0px;">
      <div class="container" style="max-width: 100%">

        <form action="view_answer.php" method="post">
        <div data-label="Questions" class="df-example">

          <div class="tab-content mg-t-20" id="myTabContent5">

            <div id="city">
              <?php

            $qs=mysqli_query($con,"SELECT * FROM `test_questions` WHERE `id`='".$f."'");
            $r=mysqli_fetch_array($qs);

           echo '
            <div class="tab-pane ">
              <h6>Question no. '.$r['id'].'</h6>
              <div class="alert alert-info" role="alert">
              <p class="mg-b-0"><b>'.$r['question'].'</b></p>
              </div>
              <div class="custom-control custom-radio">
                <input type="radio" id="customRadio1'.$r['id'].'" name="customRadio'.$r['id'].'" class="custom-control-input"  value="'.$r['option_a'].'" required>
                <label class="custom-control-label" for="customRadio1'.$r['id'].'">'.$r['option_a'].'</label>
              </div>

              <div class="custom-control custom-radio">
                <input type="radio" id="customRadio2'.$r['id'].'" name="customRadio'.$r['id'].'" class="custom-control-input" value="'.$r['option_b'].'" required>
                <label class="custom-control-label" for="customRadio2'.$r['id'].'">'.$r['option_b'].'</label>
              </div>

              <div class="custom-control custom-radio">
                <input type="radio" id="customRadio3'.$r['id'].'" name="customRadio'.$r['id'].'" class="custom-control-input" value="'.$r['option_c'].'" required>
                <label class="custom-control-label" for="customRadio3'.$r['id'].'">'.$r['option_c'].'</label>
              </div>

              <div class="custom-control custom-radio">
                <input type="radio" id="customRadio4'.$r['id'].'" name="customRadio'.$r['id'].'" class="custom-control-input" value="'.$r['option_d'].'" required>
                <label class="custom-control-label" for="customRadio4'.$r['id'].'">'.$r['option_d'].'</label>
              </div>
              <div class="custom-control custom-radio">
                <input type="text" name="idhold" value="'.$r['id'].'">

              </div>

              <div data-label="" class="df-example" style="border:0px">
                <div class="demo-btn-group">';
                $pre=mysqli_query($con,"select * from test_questions where id = (select max(id) from test_questions where `id`<'".$f."' and test_series_id = '".$r['test_series_id']."')");
        if($prev = mysqli_fetch_array($pre))
        {$previo = $prev['id'];
                  echo '<button type="button" class="btn btn-primary" onclick="get_question('.$previo.');">Previous : '.$previo.'</button>';
              }

                $ne=mysqli_query($con,"select * from test_questions where id = (select min(id) from test_questions where `id`>'".$f."' and test_series_id = '".$r['test_series_id']."')");
        if($nex = mysqli_fetch_array($ne))
        {$next = $nex['id'];
                 echo '<button type="button" class="btn btn-primary" onclick="get_question('.$next.');">Next : '.$next.'</button> ';
                 }


              echo'
                </div>
              </div>
            </div>';

?>

            </div>
          </div>
        </div>

        <div data-label="" class="df-example">
          <div class="demo-btn-group">
            <button type="button" class="btn btn-dark">View all Questions</button>

             <input type="submit" name="submit" value="End Exam" class="btn btn-info">
          </div><!-- demo-btn-group -->
        </div><!-- df-example -->
        <div id="result"></div>
      </form>


      </div><!-- container -->
    </div><!-- content -->
        <?php //include('footer.php'); ?>



    <script src="lib/jquery/jquery.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="lib/feather-icons/feather.min.js"></script>
    <script src="lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="lib/prismjs/prism.js"></script>

    <script src="assets/js/dashforge.js"></script>

    <script>
      $(function(){
        'use strict'
      });

      function get_question(state)
      {
        var xmlhttp=new XMLHttpRequest();
        var radioval = '';
        var d ='';
        d =   $('input[name="idhold"]').val();
        radioval = $('input[name="customRadio'+d+'"]').val();


            $.ajax({
              url: "save.php",
              type: "POST",
              data: {
                radioval: radioval,
                ques:d
              },
              cache: false,
              success: function(dataResult){
                var dataResult = JSON.parse(dataResult);
                if(dataResult.statusCode==200){
                 alert("customRadio"+d);
                }
                else if(dataResult.statusCode==201){
                   alert("Error occured !");
                }

              }
            });

        xmlhttp.send(null);
        xmlhttp.open("GET","question_get.php?state="+state,false);
        document.getElementById("city").innerHTML=xmlhttp.responseText;

      }

    </script>

  </body>

</html>
