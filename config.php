<?php
include('credential.php');

$sender_mail = 'info@ccubecoachingclasses.com';
$mailpassword = '5cRX^j~^uT=U';
$host = 'cs2003.webhostbox.net';

require_once 'vendor/autoload.php';


$login_button = '';
$login_reg_button = '';

if (isset($_GET["code"])) {

    $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);


    if (!isset($token['error'])) {

        $google_client->setAccessToken($token['access_token']);


        $_SESSION['access_token'] = $token['access_token'];


        $google_service = new Google_Service_Oauth2($google_client);


        $data = $google_service->userinfo->get();
        //  print_r($data);
        if (!empty($data['given_name'])) {
            $_SESSION['user_first_name'] = $data['given_name'];
        }

        if (!empty($data['family_name'])) {
            $_SESSION['user_last_name'] = $data['family_name'];
        }

        if (!empty($data['email'])) {
            $_SESSION['user_email_address'] = $data['email'];
        }

        if (!empty($data['gender'])) {
            $_SESSION['user_gender'] = $data['gender'];
        }

        if (!empty($data['picture'])) {
            $_SESSION['user_image'] = $data['picture'];
        }
    }
    $s = mysqli_query($con, "SELECT * FROM `candidate_registre` WHERE `email`='" . $_SESSION['user_email_address'] . "' ");
    if (mysqli_num_rows($s) > 0) {
        if ($sale = mysqli_fetch_array($s)) {
            $_SESSION['stud_id'] = $sale['id'];
        } else {
            $login_button = '<a href="' . $google_client->createAuthUrl() . '" class="btn btn-primary">Login With Google</a>';
        }
    } else {
        $date = date("d/m/Y");
        $password = "ccube@" . rand(50000, 1000);
        $user_activation_code = md5(rand());
        $insert_query = "INSERT INTO `candidate_registre` ( `date` ,`name`, `email` ,`mobile` ,`password`, `user_activation_code` , `user_email_status`)
        VALUES ( '$date','" . $_SESSION['user_first_name'] . ' ' . $_SESSION['user_last_name'] . "',  '" . $_SESSION['user_email_address'] . "'  , '' , '$password', '$user_activation_code','verified')";
        // echo $insert_query;
        $statement = mysqli_query($con, $insert_query);
        $idxc = mysqli_insert_id($con);
        $_SESSION['stud_id'] = $idxc;
        if (isset($statement)) {
            $base_url = "https://www.ccubecoachingclasses.com/";
            $mail_body = "
            <p>Hi <b>" . $_SESSION['user_first_name'] . ' ' . $_SESSION['user_last_name'] . "</b>,</p>

            <p>Thanks for Registration. Your user id is <b>" . $_SESSION['user_email_address'] . "</b> & password is <b>" . $password . "</b>, Please login from <a href='https://webangeltech.com/'>Click here to Login</a> .</p>

            <p>Best Regards,<br /><b>C cube</b></p>
            <p> Phone:   +91 8004-190-658 , +91 7905-259-822
                </p>
            <p>Email: " . $emailid ."</p>
            ";


            $mail_body1 =  "<p>Hi ,</p>

            <p>New Registration is done by <b>" . $_SESSION['user_first_name'] . ' ' . $_SESSION['user_last_name'] . "</b> ,Your user id is <b>" . $_SESSION['user_email_address'] . "</b> & password is <b>" . $password . "</b> </p>

            <p> Have a nice Day , Sir. </p>";
            require 'php/class/class.phpmailer.php';

            $mail1 = new PHPMailer;
            $mail1->IsSMTP();                                //Sets Mailer to send message using SMTP
            $mail1->Host = $host;        //Sets the SMTP hosts of your Email hosting, this for Godaddy
            $mail1->Port = '465';                                //Sets the default SMTP server port
            $mail1->SMTPAuth = true;                         //Sets SMTP authentication. Utilizes the Username and Password variables
            $mail1->Username = $sender_mail;         //Sets SMTP username
            $mail1->Password = $mailpassword;         //Sets SMTP password
            $mail1->SMTPSecure = '';                         //Sets connection prefix. Options are "", "ssl" or "tls"
            $mail1->From = $sender_mail;            //Sets the From email address for the message
            $mail1->FromName = 'C cube';                    //Sets the From name of the message
            $mail1->AddAddress($emailid);       //Adds a "To" address
            $mail1->WordWrap = 50;                           //Sets word wrapping on the body of the message to a given number of characters
            $mail1->IsHTML(true);                            //Sets message type to HTML
            $mail1->Subject = 'C cube Registeration Notification';          //Sets the Subject of the message
            $mail1->Body = $mail_body1;                           //An HTML or plain text message body
            if ($mail1->Send()) {
            } else {
            }

            $mail = new PHPMailer;
            $mail->IsSMTP();                                //Sets Mailer to send message using SMTP
            $mail->Host = $host;        //Sets the SMTP hosts of your Email hosting, this for Godaddy
            $mail->Port = '465';                                //Sets the default SMTP server port
            $mail->SMTPAuth = true;                         //Sets SMTP authentication. Utilizes the Username and Password variables
            $mail->Username = $sender_mail;         //Sets SMTP username
            $mail->Password = $mailpassword;         //Sets SMTP password
            $mail->SMTPSecure = '';                         //Sets connection prefix. Options are "", "ssl" or "tls"
            $mail->From = $sender_mail;            //Sets the From email address for the message
            $mail->FromName = 'C cube';                    //Sets the From name of the message
            $mail->AddAddress($_SESSION['user_email_address']);       //Adds a "To" address
            $mail->WordWrap = 50;                           //Sets word wrapping on the body of the message to a given number of characters
            $mail->IsHTML(true);                            //Sets message type to HTML
            $mail->Subject = 'Email Verification';          //Sets the Subject of the message
            $mail->Body = $mail_body;                           //An HTML or plain text message body
            if ($mail->Send())                               //Send an Email. Return true on success or false on error
            {
                echo  '<script>alert("Register Done, Please check your mail for ID and password")</script>';
            } else {
                print_r($mail);
                // echo  '<script>alert("Register Done, Please check your Mail for ID and password (Inbox & Spam Folder also)")</script>';

            }
        }
    }
}


// if (!isset($_SESSION['access_token'])) {
//     $login_reg_button = '<a href="' . $google_client->createAuthUrl() . '" class="btn btn-danger"><i class="fa fa-google-plus-official" aria-hidden="true"></i> Register now With Google</a>';
//     $login_button = '<a href="' . $google_client->createAuthUrl() . '" class="btn btn-danger"><i class="fa fa-google-plus-official" aria-hidden="true"></i>  Login With Google</a>';
// }

function cleandata($data)
{
    $pattern = '~[a-z]+://\S+~';
    $num_found = 0;
    $num_found = preg_match_all($pattern, $data, $out);

    if ($num_found == 0) {
        $data = strip_tags($data);
        $data = htmlentities($data);
    } else {
        $data = false;
    }
    return $data;
}
