<?php

include'config.php';
include("session.php");

if(isset($_GET['id']))
{
	$i=$_GET['id'];

	$q=mysqli_query($con,"delete from test_series where id='$i'");

	$x=mysqli_query($con,"delete from test_questions where test_series_id='$i'");

	if($q)

	{
	   // echo 'good';
	    echo '<script>alert("Test series deleted successfully")</script>';
	   echo '<script>window.location="test-series-list.php";</script>';
	}else{
	   // echo 'bad';
	    echo '<script>alert("server error")</script>';
	    echo '<script>window.location="test-series-list.php";</script>';
	}

}

?>