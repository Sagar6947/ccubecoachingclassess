
<?php 
$sql=mysqli_query($con,"SELECT * FROM `courses` ");
while ($row = mysqli_fetch_array($sql))
{
echo "<option value='".$row['id']."'>".$row['name']."</option>";
}
?>  
