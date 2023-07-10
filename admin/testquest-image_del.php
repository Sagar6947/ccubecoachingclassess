<?php

include 'config.php';
include("session.php");

if (isset($_GET['id'])) {
    $i = $_GET['id'];
    $tag = $_GET['tag'];

    if ($tag == 'question') {
        $q = mysqli_query($con, "UPDATE `test_questions` SET  `image_eng`='',`image_hindi`='' WHERE `id`='$i'");
        echo '<script>alert("Questions images removed successfully");</script>';
    } else if ($tag == 'exp') {
        $q = mysqli_query($con, "UPDATE `test_questions` SET  `exp_image_eng`='',`exp_image_hindi`='' WHERE `id`='$i'");
        echo '<script>alert("Explanation images removed successfully");</script>';
    }
    if ($q) {
        echo '<script>window.location.href="test-series-veiw.php?id=' . $_GET['tid'] . '";</script>';
    }
}
