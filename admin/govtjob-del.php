<?php

include'config.php';
include("session.php");

$id=$_GET['id'];
					$que = mysqli_query($con,"SELECT * FROM `govt` WHERE `id`='".$id."'");
					$row = mysqli_fetch_array($que);
					$delete = $row['status'];
					if($delete == '1')
					{
						$query ="UPDATE `govt` SET `status`='0' WHERE `id`='".$id."'";
						$result = mysqli_query ($con,$query) or die (mysqli_error());
						header("Location:govt-vacancy.php");
					}
					else
					{
						$query ="UPDATE `govt` SET `status`='1' WHERE `id`='".$id."'";
						$result = mysqli_query ($con,$query) or die (mysqli_error());
						header("Location:govt-vacancy.php");
					}
?>