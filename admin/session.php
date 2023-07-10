<?php

if(isset($_SESSION['aim_id']))
{
	$sid = $_SESSION['aim_id'];
	$nm = 'admin';
// 	$login_query = "SELECT * FROM `candidate_registre` WHERE `id` = '$sid' ";
// 	echo $login_query;
// 	$sdr = mysqli_query($con , $login_query);
// 	$ro = mysqli_fetch_array($sdr);
// 	print_r($ro);
// 	$nm = $ro['name'];
}
else
{
	echo '<script>window.location="index.php";</script>';
}

?>