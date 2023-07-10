<?php

include'config.php';
include("session.php");

if(isset($_GET['id']))
{
	$i=$_GET['id'];
	
	$q=mysqli_query($con,"delete from exam_section where id='$i'");
	
	if($q)
	
	{
	   echo '<script>window.location="home.php"</script>';
	}
	
}

?>