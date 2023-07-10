<?php
include 'config.php';
if (isset($_POST['submit'])) {

    $date = date("d-m-y");
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];
   
    $sal =  mysqli_query($con, "INSERT INTO `contact`(`name`, `email` , `phone` , `message`, `date`) VALUES ('" . $name . "','" . $email . "','" . $phone . "','" . $message . "','" . $date . "')");
    if ($sal) {
        $base_url = "https://www.ccubecoachingclasses.com/";
        $curdate = date('d-m-Y');
        $ToEmail = 'ccubecoachingclasses@gmail.com';

        $EmailSubject = 'Query Mail';

        $mailheader = "From:   info@ccubecoachingclasses.com\r\n";
        $mailheader .= "Reply-To:   info@ccubecoachingclasses.com\r\n";
        $mailheader .= "Content-type: text/html; charset=iso-8859-1\r\n";
        $mail_body = "
            <p>Hello Admin  ,</p>
            <p>There is a new contact query , by <b>" . $name . "</b> <br> Email : <b>" . $email . "</b>, <br> Phone : <b>" . $phone . "</b>, <br> Message : <b>" . $message . "</b>,
            Have a nice day , sir ";
         
         $mail = mail($ToEmail,  $EmailSubject, $mail_body, $mailheader) or die("Failure");
       
       
       if($mail) {
        echo "<script>alert('Thank You For Contact Us! We wil get back to you soon')</script>";
       }
    } else {
            echo '<script>alert(" You are spammer ! Get out")</script>';
        }
   echo'<script>window.location="contact-us.php"</script>';
}
?>