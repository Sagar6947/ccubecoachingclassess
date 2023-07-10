<?php

include'config.php';
include("session.php");

if(isset($_GET['id']))
{
	$i=$_GET['id'];
	
	$q=mysqli_query($con,"delete from test_questions where id='$i'");
	
	if($q)
	
	{
	   echo '<script>window.location.href="test-series-veiw.php?id='.$_GET['tid'].'";</script>';
	}
	
}

?>