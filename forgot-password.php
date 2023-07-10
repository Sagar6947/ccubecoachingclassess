<?php
include("config.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
if($_POST)
{
	$email = $_POST['email'];


	$query = mysqli_query($con,"SELECT * FROM `candidate_registre` WHERE email='$email'") or die(mysqli_error($con));

	$count = mysqli_num_rows($query);

	$row = mysqli_fetch_array($query);

	if($count>0)
	{
		//echo $row['password'];
		$mail_body = "
		<p>Hi <b>".$row['name']."</b>,</p>

		<p>Have you forget your credentials ??. Your user id is <b>".$row['email']."</b> & password is <b>".$row['password']."</b>, Please login from <a href='https://examison.com/'>Click here to Login</a> .</p>

		<p>Best Regards,<br /><b>C cube</b></p>
		<p> Phone:  +91 7905-259-822 , +91 8004-190-658
			</p>
		<p>Email: examison1.o@gmail.com </p>
		";

					require 'vendor/autoload.php';

					$mail = new PHPMailer(true);
					try {
						//Server settings
						$mail->SMTPDebug = 0;
						$mail->isSMTP();
						$mail->Host = 'mail.examison.com';        //Sets the SMTP hosts of your Email hosting, this for Godaddy
						$mail->Port = '587';                                //Sets the default SMTP server port
						$mail->SMTPAuth = true;              //Sets SMTP authentication. Utilizes the Username and Password variables
						$mail->Username = 'testseries@examison.com';         //Sets SMTP username
						$mail->Password = '5cRX^j~^uT=U';
						$mail->SMTPSecure = 'tls';


						//Recipients
						$mail->setFrom('examison1.o@gmail.com', 'Examison');
						$mail->addAddress($email, $email);

						//Content

						$mail->isHTML(true);
						$mail->Subject = 'Forgot Password';
						$mail->Body    =  ($mail_body);

						$mail->send();

						echo '<script>alert("Successful send ! Check your email")</script>';
					} catch (Exception $e) {
						// echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
						echo '<script>alert("Successful send ! Check your email also check spam mails also")</script>';
					}

		// print_r($mail);


	}
	else{
		echo"<script>alert('Email not found');</script>";
	}
}
echo '<script>window.location="index_login.php"</script>';

 ?>
