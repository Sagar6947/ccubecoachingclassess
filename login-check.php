<?php
include 'config.php';

$email = cleandata($_POST['email']);
$password = cleandata($_POST['password']);
$course_id = cleandata($_POST['course_id']);
if ($email != false && $password != false && $course_id != false) {

    $s = mysqli_query($con, "SELECT * FROM `candidate_registre` WHERE `email`='" . $email . "' AND `password`='" . $password . "' ");
    // echo "SELECT * FROM `candidate_registre` WHERE `email`='" . $email . "' AND `password`='" . $password . "' ";exit;

    if ($sale = mysqli_fetch_array($s)) {
        $_SESSION['student_login'] = 'Active';
        $_SESSION['stud_id'] = $sale['id'];
    } else {
        echo "<script>alert('Error in Login...Please try again later!')</script>";
    }
} else {
    echo "<script>alert('We didnt accept URLs !')</script>";
}
echo '<script>window.location="checkout.php?id=' . $course_id . '"</script>';
