<?php
include('config.php');
header('Content-Type: text/html; charset=utf-8');
if ($_SESSION['exa'] == 'on') {
} else {
    echo '<script>window.location="test-series.php"</script>';
}
$j = 1;
$id = $_SESSION['h'];
$now = $_SESSION['exam'];
$qu = mysqli_query($con, "SELECT * FROM `test_series` WHERE `id`= '" . $id . "'");
$ro = mysqli_fetch_array($qu);
$qusd = mysqli_query($con, "SELECT * FROM `main_courses` WHERE `id`= '" . $ro['test_name'] . "'");
$rosd = mysqli_fetch_array($qusd);
// print_r($ro);
$que = array();
if (isset($_POST['submit'])) {
    print_r($que);
}
?>
<script>
    var arr = [];
</script>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Meta -->
    <meta name="author" content="ThemePixels">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

    <title>C cube | Exam Start</title>

    <!-- vendor css -->
    <link href="lib/%40fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="lib/typicons.font/typicons.css" rel="stylesheet">
    <link href="lib/prismjs/themes/prism-vs.css" rel="stylesheet">

    <!-- DashForge CSS -->
    <link rel="stylesheet" href="assets/css/dashforge.css">
    <link rel="stylesheet" href="assets/css/dashforge.demo.css">

<style>

       @media only screen and (max-width: 1200px)
{
    .section-nav {
      display: block;
       background-color:#ccf1f6;
      position:initial;
      width:100%;
      }
}@media only screen and (max-width: 992px)
{
    .demo-btn-group{
        display:ruby;

    }

    .sidebar{
        width:100%;
        display:contents;
        background-color:#ccf1f6;

    }

}
</style>
</head>

<body class="pos-relative" data-spy="scroll" data-target="#navSection" data-offset="120">

    <?php include('test-header.php'); ?>
<div id="top"></div>
    <div id="sidebarMenu" class="sidebar sidebar-fixed sidebar-components" style="background-color: #ccf1f6">
        <br>
        <h4 id="section1" class="mg-l-10 mg-t-10"> Questions</h4>

        <div data-label="" style="padding: 10px;overflow:scroll;">
            <div class="demo-btn-group">
                <?php
                $i = 1;
                $q = mysqli_query($con, "SELECT * FROM `test_questions` WHERE `test_series_id`='" . $id . "' AND `quest_type`='0'");
                while ($r = mysqli_fetch_array($q)) {
                    array_push($que, $r['id']);
                    echo '<script>arr.push(\'' . $r['id'] . '\');</script>'; { ?>
                        <button style="border: none; background:none;margin:2px;" class="avatar"><span class="avatar-initial rounded-circle" id="queback<?php echo $r['id']; ?>" style="background:dodgerblue" onclick="get_question(<?php echo $r['id']; ?>);"><?php echo $i; ?></span></button>
                <?php }
                    if ($i == 1) {
                        $f = $r['id'];
                    }
                    $i++;
                }
                $_SESSION['arr'] = $que;
                ?>
            </div><!-- demo-btn-group -->
        </div><!-- df-example -->
    </div><!-- sidebar -->

    <div class="section-nav" id="translate-this" style="background-color: #ccf1f6">
    <div class="row">

        <div class=" "  style="width:100%;text-align:center">
            <img src="user-pic/<?php echo $row['img']; ?>" class="rounded-circle" alt="" style="margin:auto;padding:auto;width:100px;">
            </div>

    </div>
    <br>
    <h5 class="mg-b-2 tx-spacing--1"><?php echo $name; ?></h5>
        <br>
        <p><b>Reg. Dt. </b><br><?php echo $row['date']; ?><br>
            <b>Email </b><br><?php echo $row['email']; ?>
        </p>
        <hr>
        <h5 class="mg-b-2 tx-spacing--1">Test Series</h5>
        <p><b>Test Name </b><br><?php echo $rosd['name'] . ' <br>' . $ro['examtitle']; ?><br>
            <b>Total Que. </b><br><?php echo $ro['total_questions']; ?>
        </p>
        <hr>
        <p><b>Durations </b> : <span id="min"></span> : <span id="sec"></span> Min <input type="hidden" id="testmin" value="<?php echo ($ro['duration']-1); ?>" /> </p>
    </div>

    <div class="content content-components">
        <form action="view_answer.php" method="post">
            <div class="container">
                <h1 class="df-title">C cube | <?php echo $rosd['name'] . ' <br> ' . $ro['examtitle']; ?></h1>

                <?php

                $qs = mysqli_query($con, "SELECT * FROM `test_questions` WHERE `test_series_id`='" . $id . "'");
                while ($r = mysqli_fetch_array($qs)) {
                    $my_array = array(array($r['answer'], $r['hindi_answer']), array($r['option_a'], $r['hindi_option_a']), array($r['option_b'], $r['hindi_option_b']), array($r['option_c'], $r['hindi_option_c']), array($r['option_d'], $r['hindi_option_d']));
                    shuffle($my_array);
                    echo '
                        <div class="tab-pane " id="tab' . $r['id'] . '" ';
                    if ($f == $r['id']) {
                    } else {
                        echo 'style="display:none;"';
                    }
                    echo '><div class="row">
                        <div class="col-md-4"><h6>Question no. ' . $j . ' </h6></div><div class="col-md-4"></div><div class="col-md-4" style="text-align:right;"><a href="#" class="translate  btn-warning" style="padding:5px;" data-id="' . $r['id'] . '" >English / Hindi</a></div></div><br>
                        <div class="alert alert-info" role="alert">

                        <span class="english' . $r['id'] . '">' . $r['question'] . '</span>
                        <span class="hindi' . $r['id'] . '" style="display:none;">' . $r['hindi_question'] . '</span>


                         <span class="english' . $r['id'] . '"> ' . (($r['image_eng'] == '') ? '' : '<img src="../admin/questions/' . $r['image_eng'] . '" style="width:500px;"/>') . '</span>
                        <span class="hindi' . $r['id'] . '" style="display:none;"> ' . (($r['image_hindi'] == '') ? '' : '<img src="../admin/questions/' . $r['image_hindi'] . '" style="width:500px;"/>') . '</span>
                        </b></p>
                        </div>
                        <div class="custom-control custom-radio">
                        <input type="radio" data-id="' . $r['id'] . '" id="customRadio1' . $r['id'] . '" name="customRadio' . $r['id'] . '" class="custom-control-input"  value="' . $my_array[0][0] . ' | ' . $my_array[0][1] . '">
                        <label class="custom-control-label" for="customRadio1' . $r['id'] . '"><span class="english' . $r['id'] . '">' . $my_array[0][0] . '</span>
                        <span class="hindi' . $r['id'] . '" style="display:none;">' . $my_array[0][1] . '</span></label>
                        </div>

                        <div class="custom-control custom-radio">
                        <input type="radio" data-id="' . $r['id'] . '" id="customRadio2' . $r['id'] . '" name="customRadio' . $r['id'] . '" class="custom-control-input" value="' . $my_array[1][0] . ' | ' . $my_array[1][1] . '">
                        <label class="custom-control-label" for="customRadio2' . $r['id'] . '"><span class="english' . $r['id'] . '">' . $my_array[1][0] . '</span>
                        <span class="hindi' . $r['id'] . '" style="display:none;">' . $my_array[1][1] . '</span></label>
                        </div>

                        <div class="custom-control custom-radio">
                        <input type="radio" data-id="' . $r['id'] . '" id="customRadio3' . $r['id'] . '" name="customRadio' . $r['id'] . '" class="custom-control-input" value="' . $my_array[2][0] . ' | ' . $my_array[2][1] . '">
                        <label class="custom-control-label" for="customRadio3' . $r['id'] . '"><span class="english' . $r['id'] . '">' . $my_array[2][0] . '</span>
                        <span class="hindi' . $r['id'] . '" style="display:none;">' . $my_array[2][1] . '</span></label>
                        </div>

                        <div class="custom-control custom-radio">
                        <input type="radio" data-id="' . $r['id'] . '" id="customRadio4' . $r['id'] . '" name="customRadio' . $r['id'] . '" class="custom-control-input" value="' . $my_array[3][0] . ' | ' . $my_array[3][1] . '">
                        <label class="custom-control-label" for="customRadio4' . $r['id'] . '"><span class="english' . $r['id'] . '">' . $my_array[3][0] . '</span>
                        <span class="hindi' . $r['id'] . '" style="display:none;">' . $my_array[3][1] . '</span></label>
                        </div>

                        <div class="custom-control custom-radio">
                        <input type="radio" data-id="' . $r['id'] . '" id="customRadio5' . $r['id'] . '" name="customRadio' . $r['id'] . '" class="custom-control-input" value="' . $my_array[4][0] . ' | ' . $my_array[4][1] . '">
                        <label class="custom-control-label" for="customRadio5' . $r['id'] . '"><span class="english' . $r['id'] . '">' . $my_array[4][0] . '</span>
                        <span class="hindi' . $r['id'] . '" style="display:none;">' . $my_array[4][1] . '</span></label>
                        </div>

                        <div data-label="" class="df-example" style="border:0px">
                        <div class="demo-btn-group" style="float:right">';
                    $pre = mysqli_query($con, "select * from test_questions where id = (select max(id) from test_questions where `id`<'" . $r['id'] . "' and test_series_id = '" . $r['test_series_id'] . "')");
                    if ($prev = mysqli_fetch_array($pre)) {
                        $previo = $prev['id'];
                        echo '<button type="button" class="btn btn-primary" onclick="get_question(' . $previo . ');">Previous </button>';
                    } else {
                        echo '<button type="button" class="btn btn-light" >Previous </button>';
                    }

                    $ne = mysqli_query($con, "select * from test_questions where id = (select min(id) from test_questions where `id`>'" . $r['id'] . "' and test_series_id = '" . $r['test_series_id'] . "')");
                    if ($nex = mysqli_fetch_array($ne)) {
                        $next = $nex['id'];
                        echo '<button type="button" class="btn btn-primary" onclick="get_question(' . $next . ');">Save & Next</button> ';
                    } else {
                        echo '<button type="button" class="btn btn-light" >Save & Next </button>';
                    }


                    echo '
                </div>
                </div>
                </div>';
                    $j++;
                }

                ?>

                <hr class="mg-y-40">

                <div data-label="" class="df-example">
                    <div class="demo-btn-group">
                        <a href="#modal4" class="btn btn-dark" data-toggle="modal">View all Questions</a>

                        <input type="submit" name="submit" value="Submit Exam" id="endexam" class="btn btn-danger">
                    </div><!-- demo-btn-group -->
                </div>
        </form>
        <div class="modal fade" id="modal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel4" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content tx-14">
                    <div class="modal-header">
                        <h6 class="modal-title" id="exampleModalLabel4"> Questions </h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="height: 500px;overflow-y: scroll;">
                        <?php
                        $jo = 1;
                        $qs = mysqli_query($con, "SELECT * FROM `test_questions` WHERE `test_series_id`='" . $id . "'");
                        while ($r = mysqli_fetch_array($qs)) {

                            $my_arrayq =  array($r['answer'],   $r['option_a'], $r['option_b'],   $r['option_c'], $r['option_d']);

                            shuffle($my_arrayq);

                            echo '

                        <div class="alert alert-info" role="alert">
                        <h6>Question no. ' . $jo . '</h6>
                        <p class="mg-b-0"><b>' . $r['question'] . '</b></p>
                        </div>
                        <div class="custom-control custom-radio">
                        A - ' . $my_arrayq[0] . '
                        </div>
                        <div class="custom-control custom-radio">
                        B - ' . $my_arrayq[2] . '
                        </div>

                        <div class="custom-control custom-radio">
                        C - ' . $my_arrayq[3] . '
                        </div>

                        <div class="custom-control custom-radio">
                        D - ' . $my_arrayq[4] . '
                        </div>
                        <div class="custom-control custom-radio">
                        E - ' . $my_arrayq[1] . '
                        </div>
                        <hr>';
                            $jo++;
                        }

                        ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary tx-13" data-dismiss="modal">Close</button>
                        <!--                        <button type="button" class="btn btn-primary tx-13">Save changes</button>-->
                    </div>
                </div>
            </div>
        </div>

<div id="bottom"></div>


        <?php //include('footer.php');
        ?>


    </div><!-- container -->

    </div><!-- content -->


    <script src="lib/jquery/jquery.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="lib/feather-icons/feather.min.js"></script>
    <script src="lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="lib/prismjs/prism.js"></script>
    <script src="assets/js/dashforge.js"></script>


    <script>
    $(document).ready(function() {


   if ($(window).width() < 1200) {
   $("#translate-this").appendTo("#bottom");
}
else {
   $("#translate-this").appendTo("#top");
}

   $(window).on('resize',function(){
   if ($(window).width() < 1200) {
   $("#translate-this").appendTo("#bottom");
}
else {
   $("#translate-this").appendTo("#top");
}
  });
});
        var sec = 60;
        var min = $('#testmin').val();
        var time = min * 60000;
        var interval = setInterval("seconds()", 1000);

        function seconds() {
            if (sec > 0) {
                sec--;
            } else {
                sec = 59;
                min--;
            }
            $('#sec').text(sec);
            $('#min').text(min);
            if (min == -1) {
                //   console.log('complete');
                clearInterval(interval);
                $('#endexam').click();

            }
        }

        $('.translate').click(function() {
            var id = $(this).data('id');
            if ($('.english' + id).is(":visible")) {

                $('.english' + id).hide();
                $('.hindi' + id).show();
            } else {
                $('.english' + id).show();
                $('.hindi' + id).hide();
            }

        });
        $('.custom-control-input').click(function() {
            var id = $(this).data('id');
            if ($('input[name="customRadio' + id + '"]:checked').val()) {
                $('#queback' + id).css("background-color", "#10b759");
            } else {
                $('#queback' + id).css("background-color", "#10b759");
            }


        });
        // $(':radio').mousedown(function(e) {
        //     var self = $(this);
        //     if (self.is(':checked')) {
        //          self.removeAttr('checked');
        //     }else{
        //         self.addAttr('checked');
        //     }
        // });

        function get_question(state) {
            $('.tab-pane').hide();
            $('#tab' + state).show();

        }
    </script>
</body>

</html>