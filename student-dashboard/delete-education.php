<?php
include'config.php';
if(isset($_GET['id']))
{
    echo '<script>confirm("Do you want to delete it ??");</script>';
    $i=$_GET['id'];
    $q=mysqli_query($con,"delete from `candidate_education` where id='$i'");

    if($q)

    {
        header("location:profile-of-students.php");
    }

}

?>