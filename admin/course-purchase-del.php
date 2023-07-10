<?php

include'config.php';
include("session.php");

if(isset($_GET['id']))
{
	$i=$_GET['id'];
	
	$q=mysqli_query($con,"delete from candidate_subscribe where id='$i'");
	
	if($q)
	
	{
	   echo '<script>window.location.href="course-purchase.php";</script>';
	}
	
}

?>