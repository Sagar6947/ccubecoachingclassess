<?php
include 'config.php';
$ana = explode('|', $_SESSION['ana']);
$er = $_SESSION['arra'];
// echo '<pre>';
// print_r($_SESSION);
// exit();
$id = $_SESSION['h'];
$qxx = mysqli_query($con, "SELECT * FROM `test_series` WHERE `id`='" . $id . "'");
$rxx = mysqli_fetch_array($qxx);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->

    <meta name="twitter:image" content="img/dashforge-social.html">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/dashforge">
    <meta property="og:title" content="DashForge">
    <meta property="og:description" content="Responsive Bootstrap 4 Dashboard Template">

    <meta property="og:image" content="img/dashforge-social.html">
    <meta property="og:image:secure_url" content="img/dashforge-social.html">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Responsive Bootstrap 4 Dashboard Template">
    <meta name="author" content="ThemePixels">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

    <title> C cube | Test Result </title>

    <!-- vendor css -->
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

    <div class="content " style="margin-top:50px;">
        <div class="container">
            <ol class="breadcrumb df-breadcrumbs mg-b-10">
                <li class="breadcrumb-item"><a href="#">C cube</a></li>
                <li class="breadcrumb-item"><a href="#">Test Series</a></li>
                <li class="breadcrumb-item active" aria-current="page"> Result </li>
            </ol>

            <h4 id="section1" class="mg-b-10">Results</h4>

            <div class="row row-xs">
                <div class="col-sm-6 col-lg-3">
                    <div class="card card-body">
                        <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Correct Answers </h6>
                        <div class="d-flex d-lg-block d-xl-flex align-items-end">
                            <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1"><?php echo $ana[0]; ?></h3>
                        </div>
                    </div>
                </div><!-- col -->
                <div class="col-sm-6 col-lg-3 mg-t-10 mg-sm-t-0">
                    <div class="card card-body">
                        <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Incorrect Answer </h6>
                        <div class="d-flex d-lg-block d-xl-flex align-items-end">
                            <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1"><?php echo $ana[1]; ?></h3>
                        </div>
                    </div>
                </div><!-- col -->
                <div class="col-sm-6 col-lg-3 mg-t-10 mg-sm-t-0">
                    <div class="card card-body">
                        <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Unattempted Answer </h6>
                        <div class="d-flex d-lg-block d-xl-flex align-items-end">
                            <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1"><?php echo $ana[2]; ?></h3>
                        </div>
                    </div>
                </div><!-- col -->
                <div class="col-sm-6 col-lg-3 mg-t-10 mg-lg-t-0">
                    <div class="card card-body">
                        <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Total Marks</h6>
                        <div class="d-flex d-lg-block d-xl-flex align-items-end">
                            <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1"><?php echo $ana[3]; ?></h3>
                        </div>
                    </div>
                </div><!-- col -->
                <div class="col-sm-6 col-lg-3 mg-t-10 mg-lg-t-0">
                    <div class="card card-body">
                        <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Accuracy </h6>
                        <div class="d-flex d-lg-block d-xl-flex align-items-end">
                            <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1"><?php echo (int)(($ana[0] / ($ana[0] + $ana[1])) * 100); ?> %</h3>
                        </div>
                    </div>
                </div>
                <div class="col-sm-9 col-lg-9 mg-t-10 mg-lg-t-0">
                    <div class="card card-body">

                        <div class="d-flex d-lg-block " style="text-align:center">
                            <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">
                                <?php
                                $id = $_SESSION['h'];
                                $i = 1;
                                $rank = 0;
                                $fg = "SELECT `s_id`, `t_id`, `correct`, `incorrect`, avg(`t_marks`) as t_marks  FROM `candidate_test_attempts` WHERE `t_id` ='" . $id . "' GROUP BY `s_id`  ORDER BY `t_marks` DESC ";
                                // echo $fg;
                                $qz = mysqli_query($con, $fg);
                                $arrlength = mysqli_num_rows($qz);
                                while ($rz = mysqli_fetch_array($qz)) {
                                    // echo $rz['t_marks'];
                                    // echo $r['s_id'] .'=='. $rz['s_id'].'<br>';
                                    if ($rz['s_id'] == $row['id']) {
                                        $rank = $i;
                                    }

                                    $i++;
                                }
                                echo 'Your Rank in india level is <span style="font-size:28px;"><b>' . $rank . '</b></span>/' . $arrlength;
                                // echo $rank.'/'.$arrlength;
                                // echo '<h2 class=" ">Your Rank in india level is '.$rank .'</h2>';

                                ?> </h3>
                        </div>
                    </div>
                </div><!-- col -->

            </div><!-- row -->
            <br>

            <div class="row  ">
                <div class="col-sm-4">
                    <h4 id="section1" class="mg-b-10">Student Rank list</h4>
                    <table class="table w-100">
                        <thead>
                            <tr>
                                <th>Rank</th>
                                <th>Student name</th>
                                <th>Marks </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $j = 1;
                            $rt = "select * from `candidate_test_attempts` JOIN `candidate_registre` ON `candidate_test_attempts`.`s_id`=`candidate_registre`.`id` WHERE `t_id` ='" . $id . "' ORDER BY `t_marks` DESC";
                            // echo $rt;
                            $b1 = mysqli_query($con, $rt);
                            while ($a1 = mysqli_fetch_array($b1)) {
                                //  print_r($a1);
                                // $s = substr($a1['timeremain'], 0, 2);
                                // $ss = substr($a1['timeremain'], 2, 2);
                                echo
                                '<tr ' . (($j == 1) ? 'style="color:red;font-weight:800;"' : (($j == 2) ? 'style="color:orange;font-weight:800;"' : (($j == 3) ? 'style="color:Green;font-weight:800;"' : ''))) . '>
                                    <td><span ' . (($j == 1) ? 'style="color:red;font-weight:800;"' : (($j == 2) ? 'style="color:orange;font-weight:800;"' : (($j == 3) ? 'style="color:Green;font-weight:800;"' : ''))) . '>' . $j . '</span></td>
                                    <td>' . $a1['name'] . ' </td>
                                    <td>' . $a1['t_marks'] . ' </td>


                                    </tr>';
                                $j++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-sm-8">
                    <h4 id="section1" class="mg-b-10">Solutions</h4>
                    <?php
                    $jo = 1;
                    foreach ($er as $a) {
                        // echo $a['ans'];
                        $ans = explode(' | ', $a['ans']);

                        $q = mysqli_query($con, "SELECT * FROM `test_questions` WHERE `id`='" . $a['queid'] . "'");
                        while ($r = mysqli_fetch_array($q)) {
                            $my_array = [];
                            // $my_array[] = array($r['answer'], $r['hindi_answer']);

                            $rtg = "select * from `test_questions_answer` WHERE `ques_id` = " . $r['id'] . " ";
                            $bc = mysqli_query($con, $rtg);
                            while ($ac = mysqli_fetch_array($bc)) {
                                $my_array[] =  array($ac['eng_option'], $ac['hindi_option']);
                            }

                            // shuffle($my_array);
                            echo '
                                <div class="alert alert-info" role="alert">
                                    <h6>Question no. ' . $jo . '</h6>
                                    <p class="mg-b-0"><b>' . $r['question'] . '</b></p>
                                    <p class="mg-b-0"><b>' . $r['hindi_question'] . '</b></p>
                                </div>';
                            $ip = 0;
                            foreach ($my_array as $arr) {
                                if ($arr != '') {
                    ?>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" <?php if ($arr[0] == $ans[0]) echo 'checked'; ?>>
                                        <?= $arr[0] ?> / <?= $arr[1] ?>
                                    </div>

                    <?php
                                    $ip++;
                                }
                            }
                            echo '

                <div class="custom-control custom-radio">
                    <input type="radio"';
                            if ($ans[0] == $r['answer']) echo 'checked';
                            echo '> ' . $r['answer'] . ' / ' . $r['hindi_answer'] . '
                </div>

                <div class="custom-control custom-radio">
                <b>Solution : </b>
                    ';
                            if ($ans[0] == $r['answer']) {

                                echo '<p style="color:green"><b>Your answer is correct <span class="badge badge-success"> Marks +' . $rxx['positive'] . ' </span><b></p><p><b>Explanation : </b><br>' . $r['explanation'] . '<br>' . $r['hindi_explanation'] . ' </p>';
                            } else {
                                if ($ans[0] == '') {
                                    echo '<p style="color:red"><b>Your answer is wrong. Correct answer is <b>  ' . $r['answer'] . ' / ' . $r['hindi_answer'] . ' </b> <span class="badge badge-danger"> Marks - 0 </span><b></p><p><b>Explanation : </b><br>' . $r['explanation'] . ' </p>
                        <br><p>' . $r['hindi_explanation'] . ' </p>
                        ';
                                } else {
                                    echo '<p style="color:red"><b>Your answer is wrong. Correct answer is <b>  ' . $r['answer'] . ' / ' . $r['hindi_answer'] . ' </b> <span class="badge badge-danger"> Marks -' . $rxx['negative'] . ' </span><b></p><p><b>Explanation : </b><br>' . $r['explanation'] . ' </p>';
                                }
                            }
                            echo '<br><br>
                </div>


                ';
                            $jo++;
                        }
                    }

                    ?>
                </div>


            </div>
        </div>
    </div>
    <?php include('footer.php'); ?>
    </div><!-- container -->
    </div><!-- content -->
    <?php unset($_SESSION['exa']); ?>
    <script src="lib/jquery/jquery.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="lib/feather-icons/feather.min.js"></script>
    <script src="lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="lib/prismjs/prism.js"></script>

    <script src="assets/js/dashforge.js"></script>
    <script>
        $(function() {
            'use strict'

        });
    </script>
</body>

</html>