<?php
include("session.php");
include'config.php';

if(isset($_GET['id']))
{
	$i=$_GET['id'];
	
	$q=mysqli_query($con,"delete from add_coaching where id='$i'");
	
	if($q)
	
	{
	   header("location:coaching.php");
	}
	
}

?>