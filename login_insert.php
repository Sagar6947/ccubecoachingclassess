<?php
include('config.php');
// print_r($_POST);
// exit();
    // if(isset($_POST['logsubmit']))
    {
        $email = cleandata($_POST['email']);
        $password = cleandata($_POST['password']);
         if($password != false && $email != false ){
        $rt  = "SELECT * FROM `candidate_registre` WHERE `email`='".$email."' AND `password`='".$password."' ";
        // echo $rt;
        $s =mysqli_query($con, $rt);
      
       if($sale=mysqli_fetch_array($s))
        {
            $_SESSION['stud_id']=$sale['id'];

            echo "<script>window.location='student-dashboard/courses_owned.php';</script>";
        }
        else
        {
            echo "<script>alert('Username and password not found...Please try again later!')</script>";
            echo "<script>window.location='index.php';</script>";
        }
         }else{
            echo "<script>alert('We didnt accept URLs !')</script>";
        }
    }
    // else{
        
    // }
    ?>