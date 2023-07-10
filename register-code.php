<?php
// include('php/database_connection.php');
include('config.php');
// require 'php/class/class.phpmailer.php';

if (count($_POST) > 0) {
    $c_message = '';
    $date = date("d/m/Y");
    $name = cleandata($_POST['name']);
    $email = cleandata($_POST['email']);
    $number = cleandata($_POST['phone']);


    $query = mysqli_query($con, "SELECT * FROM candidate_registre WHERE email = '" . $email . "'");
    $no_of_row = mysqli_num_rows($query);


    if ($no_of_row > 0) {
        echo  '<script>alert("Email Already Exists")</script>';
    } else {
        if ($name != false && $email != false && $number != false) {
            $password = "ccube@" . rand(50000, 1000);
            $user_activation_code = md5(rand());

            $sal =   mysqli_query($con, "INSERT INTO `candidate_registre`(`name`, `email`, `mobile`, `date`, `password`) VALUES ('" . $name . "','" . $email . "','" . $number . "','" . $date . "','" . $password . "')");
            if ($sal) {

                $base_url = "https://www.ccubecoachingclasses.com/";
                
                    $ToEmail = $email;
                    
                    $adminmail = 'ccubecoachingclasses@gmail.com';
            
                    $EmailSubject = 'Registration Successful';
                    $EmailadminSubject = 'Registration Successful';
            
                    $mailheader = "From:   info@ccubecoachingclasses.com\r\n";
                    $mailheader .= "Reply-To:   info@ccubecoachingclasses.com\r\n";
                    $mailheader .= "Content-type: text/html; charset=iso-8859-1\r\n";
                    
                $mail_body = "
                    <p>Hi <b>" . $_POST['name'] . "</b>,</p>
                    <p>Thanks for Registration. Your user id is <b>" . $email . "</b> & password is <b>" . $password . "</b>, Please login from <a href='http://ccubecoachingclasses.com/'>Click here to Login</a> .</p>
                    <p>Best Regards,<br /><b>C cube</b></p>
                    <p> Phone:   +91 8004-190-658 ,+91 7905-259-822
                        </p>
                    <p>Email: ccubecoachingclasses@gmail.com</p>
                    ";
                $mail_body1 =  "<p>Hello Admin ,</p>
                    <p>Here is a <b>New Registration</b> is done by <b>" . $_POST['name'] . "</b> ,Your user id is <b>" . $email . "</b> & password is <b>" . $password . "</b> </p>
                    <p> Have a nice Day , Sir. </p>";
                
                   $send = mail($ToEmail,  $EmailSubject, $mail_body, $mailheader) or die("Failure");   
                   
                   mail($adminmail,  $EmailadminSubject, $mail_body1, $mailheader) or die("Failure");
                   
                   
                if ($send)                              
                {
                    echo  '<script>alert("Register Done, Please check your mail for ID and password")</script>';
                } else {
                    echo  '<script>alert("Register Done, Please check your Mail for ID and password (Inbox & Spam Folder also)")</script>';
                }
               
            }
        }
        else {
            echo "<script>alert('We didnt accept URLs ! ')</script>";
        }

    }
echo '<script>window.location="index.php"</script>';
}
