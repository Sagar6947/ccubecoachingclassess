<?php
	include 'config.php';
	$radioval = $_POST['radioval'];
	$queid = $_POST['ques'];

	$sql = "INSERT INTO `exam`( `question`, `answer`) VALUES ('$queid','$radioval')";
	if (mysqli_query($con, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
 
?>
 

