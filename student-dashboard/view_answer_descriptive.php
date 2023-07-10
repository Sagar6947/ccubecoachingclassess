<?php
include 'config.php';
if (isset($_SESSION['exa']) == 'on') {
} else {
    echo '<script>window.location="test-series.php"</script>';
}

$id = $_SESSION['h'];
// if ($_SESSION['descriptive'] == '1') {
//     $_SESSION['exam'] = 'OFF';
// }

$er = $_SESSION['arr'];
print_r($er);
$date = date("d/m/Y");
$arr = array();
$correct = 0;
$incorrect = 0;
$notattempted = 0;

$qxx = mysqli_query($con, "SELECT * FROM `test_series` WHERE `id`='" . $id . "'");
$rxx = mysqli_fetch_array($qxx);

$jo = 1;
foreach ($er as $a) {

    $q = mysqli_query($con, "SELECT * FROM `test_questions` WHERE `id`='" . $a . "' and `quest_type`='1'");
    while ($r = mysqli_fetch_array($q)) {
        // print_r($r);
        $g = '';
        $ans = $_POST['customRadio' . $a];

        $time = date("h:i:sa");

        $insert = mysqli_query($con, "INSERT INTO `test_result`( `date`, `time`, `stu_id`, `test_id`, `quest_id`, `answer`, `correct_ans`, `marks`,`attempt_id`) VALUES ('" . $date . "','" . $time . "','" . $row['id'] . "','" . $id . "','" . $r['id'] . "','" . $ans . "','','','".$_SESSION['descriptive_field_id']."')");
        $jo++;
        $ar = array(
            'queid' =>  $r['id'],
            'ans'   =>  $_POST['customRadio' . $a],
            'marks' =>  ''
        );
        $arp = array_push($arr, $ar);
    }
}


if ($_SESSION['descriptive'] == '1') {
    unset($_SESSION['exa']);

    $_SESSION['arra'][] = $arr;

    $base_url = "https://ccubecoachingclasses.com/";
    $mail_body = "
        <p>Hi <b>" . $name . "</b>,</p>

        <p>This is your result
        <br>Score - <b>  Check in Panel , will be finalised after descriptive section marking</b>

        <br>Duration - " . $r['duration'] . "
        <br>Date - " . $time . " </p>

        <p>Best Regards,<br /><b>C cube</b></p>
        <p> Phone:  +91 7905-259-822 , +91 8004-190-658
            </p>
        <p>Email: ccubecoachingclasses@gmail.com </p>
        ";
        $curdate = date('d-m-Y');
        $ToEmail = $st_email;

        $EmailSubject = 'Result Info';

        $mailheader = "From:   info@ccubecoachingclasses.com\r\n";
        $mailheader .= "Reply-To:   info@ccubecoachingclasses.com\r\n";
        $mailheader .= "Content-type: text/html; charset=iso-8859-1\r\n";

       
        mail($ToEmail,  $EmailSubject, $mail_body , $mailheader) or die("Failure");
        
     }
     
     echo '<script>window.location="view_old_answer.php?id='.$_SESSION['descriptive_field_id'].'"</script>';
