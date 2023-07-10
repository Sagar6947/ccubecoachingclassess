<?php

include'config.php';
include("session.php");

if(isset($_GET['id']))
{
	$i=$_GET['id'];
	
	$q=mysqli_query($con,"delete from our_teachers where tid='$i'");
	
	if($q)
	
	{
	   echo '<script>window.location.href="our-teachers.php";</script>';
	}
	
}

?>