<?php
session_start();
$con = mysqli_connect("localhost", "weban82x_ccube", "%Rx#JRrN6g}G", "weban82x_c_cube") or die("Error " . mysqli_error($con));
// $con = mysqli_connect("localhost", "root", "", "ccube") or die("Error " . mysqli_error($con));

date_default_timezone_set("Asia/Calcutta");

$emailid = 'ccubecoachingclasses@gmail.com';
$address = 'H.NO 1 TAGORE NAGAR PHASE 1 KHAJURI KALAN ROAD PIPLANI BHOPAL';
