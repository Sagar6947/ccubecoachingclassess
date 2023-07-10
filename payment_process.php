<?php 
session_start();

if(isset($_POST['payment_id']) && isset($_SESSION['OID']))
{
    $payment = $_POST['payment_id'];
   $mal = mysqli_query($con , "UPDATE `candidate_subscribe` SET `status` = 'complete' , `payment_id`='$payment' WHERE id='".$_SESSION['OID']."' ");
   
   echo $mal;
    exit();
}


?>