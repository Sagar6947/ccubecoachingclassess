<?php

include'config.php';
include("session.php");

if(isset($_GET['id']))
{
	$i=$_GET['id'];
	
	$q=mysqli_query($con,"delete from candidate_registre where id='$i'");
	
	if($q)
	
	{
	    $q=mysqli_query($con,"delete from candidate_subscribe where stu_id='$i'");
	   echo '<script>window.location.href="student-register.php";</script>';
	}
	
}

?>