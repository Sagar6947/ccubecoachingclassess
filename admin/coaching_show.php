
<?php 
include('config.php');
            $id=$_GET['id'];
					$que = mysqli_query($con,"SELECT * FROM `add_coaching` WHERE 
						`id`='".$id."'");
					$row = mysqli_fetch_array($que);
					$show = $row['status'];
					if($show == 'YES')
					{
						$query ="UPDATE `add_coaching` SET `status`='NO' WHERE `id`='".$id."'";
						$result = mysqli_query ($con,$query) or die (mysqli_error());
						header("Location:coaching.php");
					}
					else
					{
						$query ="UPDATE `add_coaching` SET `status`='YES' WHERE 
						`id`='".$id."'";
						$result = mysqli_query ($con,$query) or die (mysqli_error());
						header("Location:coaching.php");
					}

?>