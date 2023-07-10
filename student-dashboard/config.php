<?php
include('../credential.php');
if(isset($_SESSION['stud_id']))
    {
        $id = $_SESSION['stud_id'];
    }
    else{
    echo '<script>window.location="../index.php"</script>';
    }
    

$mailpassword = '5cRX^j~^uT=U';
$host = 'cs2003.webhostbox.net';
    
$que = mysqli_query($con , "SELECT * FROM `candidate_registre` WHERE `id`= '".$id."'");
$row = mysqli_fetch_array($que);
$name = $row['name'];
$st_email = $row['email']; 
$_SESSION['exam'] = 'ko';
?>
