<?php
include('config.php');
    if(isset($_POST['regsubmit']))
    {
        $date=date("d-m-y");
        $name = cleandata($_POST['name']);
        $email = cleandata($_POST['email']);
        $phone = cleandata($_POST['phone']);
        $password= rand(11111,99999999);
        if($name != false && $email != false && $phone != false){
        $sal=  mysqli_query($con, "INSERT INTO `candidate_registre`(`name`, `email`, `mobile`, `date`, `password`) VALUES ('".$name."','".$email."','".$phone."','".$date."','".$password."')");
        if($sal)
        {
            echo "<script>window.location='index.php'</script>";
        }
        else
        {
            echo "<script>alert('Error in Insertion of your Registeration...Please try again later!')</script>";
        }
        }else{
            echo "<script>alert('We didnt accept URLs !')</script>";
        }
    }
