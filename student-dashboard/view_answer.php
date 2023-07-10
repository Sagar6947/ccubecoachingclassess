<?php
include 'config.php';

if (isset($_SESSION['exa']) == 'on') {
} else {
    echo '<script>window.location="test-series.php"</script>';
}

$id = $_SESSION['h'];
if ($_SESSION['descriptive'] == '0') {
    $_SESSION['exam'] = 'OFF';
}
$time = date("h:i:sa");
$er = $_SESSION['arr'];
// print_r($er);
$date = date("d/m/Y");
$arr = array();
$correct = 0;
$duration = 0;
$incorrect = 0;
$notattempted = 0;
$tm = 0.0;
$qxx = mysqli_query($con, "SELECT * FROM `test_series` WHERE `id`='" . $id . "'");
$rxx = mysqli_fetch_array($qxx);
$total_ques = $_SESSION['questio'];
// $total_ques = 10;
$jo = 1;
foreach ($er as $a) {
    $q = mysqli_query($con, "SELECT * FROM `test_questions` WHERE `id`='" . $a . "' and `quest_type`='0'");
    while ($r = mysqli_fetch_array($q)) {
        // print_r($r);
        $g = '';
        $ans = explode(' | ', $_POST['customRadio' . $a]);
        if ($ans[0] == $r['answer']) {
            $correct++;
            $g = '+' . $rxx['positive'];
            $tm += $rxx['positive'];
            // echo '<p style="color:green">Your answer is correct [+1]</p>';
        } else {

            if ($ans[0] == '') {
                $notattempted++;
                $g =  0;
                $tm -= 0;
            } else {
                $incorrect++;
                $g = '-' . $rxx['negative'];
                $tm -= $rxx['negative'];
            }
            // echo '<p style="color:red">Your answer is wrong. Correct answer is '.$r['answer'].' [-1]</p>';
        }

        $time = date("h:i:sa");
        $marks = $correct - $incorrect;

        $jo++;
        $ar = array(
            'queid' =>  $r['id'],
            'ans'   =>  $_POST['customRadio' . $a],
            'marks' =>  $g,
            'time' =>$time,
            'stu_id'=>$row['id'],
            'test_id'=>$id,
            'quest_id'=>$r['id'],
            'correct_ans'=>$r['answer']
        );
         array_push($arr, $ar);
    }
}
 
$insert_record = mysqli_query($con, "INSERT INTO `candidate_test_attempts`(`s_id`, `t_id`, `correct`, `incorrect`, `notattempted`, `t_marks`, `type`, `date`, `time`) VALUES ('" . $row['id'] . "','" . $id . "','" . $correct . "','" . $incorrect . "','" . $notattempted . "','" . $tm . "','','" . $date . "','" . $time . "')");
$_SESSION['descriptive_field_id'] = mysqli_insert_id($con);
foreach($arr as $arwe){
    $er="INSERT INTO `test_result`( `date`, `time`, `attempt_id`, `stu_id`, `test_id`, `quest_id`, `answer`, `correct_ans`, `marks`) VALUES ('" . $date . "','" . $arwe['time'] . "','" . $_SESSION['descriptive_field_id'] . "','" . $arwe['stu_id'] . "','" . $arwe['test_id'] . "','" . $arwe['quest_id'] . "','" .$arwe['ans'] . "','" . $arwe['correct_ans'] . "','" . $arwe['marks'] . "')";
    // echo $er;
$insert = mysqli_query($con, $er);
}

if ($_SESSION['descriptive'] == '0') {
    unset($_SESSION['exa']);

    $_SESSION['arra'] = $arr;

    $_SESSION['ana'] = $correct . '|' . $incorrect . '|' . $notattempted . '|' . $tm . '|' . $time;

    require '../php/class/class.phpmailer.php';

    $base_url = "https://www.ccubecoachingclasses.com/";
    $mail_body = "
        <p>Hi <b>" . $name . "</b>,</p>

        <p>This is your result
        <br>Score - <b>" . $tm . " / " . $total_ques . "</b>

        <br>Duration - " . $r['duration'] . "
        <br>Date - " . $time . " </p>

        <p>Best Regards,<br /><b>C cube</b></p>
        <p> Phone:  +91 7905-259-822 , +91 8004-190-658
            </p>
        <p>Email: ccube@gmail.com </p>
        ";
        
        
        $curdate = date('d-m-Y');
        $ToEmail = $st_email;

        $EmailSubject = 'Query data';

        $mailheader = "From:   info@ccubecoachingclasses.com\r\n";
        $mailheader .= "Reply-To:   info@ccubecoachingclasses.com\r\n";
        $mailheader .= "Content-type: text/html; charset=iso-8859-1\r\n";

       mail($ToEmail,  $EmailSubject, $mail_body , $mailheader) or die("Failure");
   
    echo '<script>window.location="preview_answer.php"</script>';
} else {
    $_SESSION['arra'] = $arr;
    $_SESSION['ana'] = $correct . '|' . $incorrect . '|' . $notattempted . '|' . $tm . '|' . $time;

  
    echo '<script>window.location="test-panel-descriptive-start.php"</script>';
}
