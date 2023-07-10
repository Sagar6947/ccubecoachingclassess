<?php

include'config.php';
include("session.php");

if(isset($_GET['id']))
{
	$i=$_GET['id'];
	$status=$_GET['status'];

	$q=mysqli_query($con,"UPDATE `test_series` SET  `status`= '$status' WHERE `id`='$i'");


	if($q)

	{
	   echo '<script>window.location.href="test-series-list.php";</script>';
	}

}

?>