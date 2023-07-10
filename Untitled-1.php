<?php
include 'config.php';
$msg = '';
if (isset($_POST['submit'])) {
    // if (isset($_POST['g-recaptcha-response'])) {
    //     $captcha = $_POST['g-recaptcha-response'];
    // }
    // if (!$captcha) {
    //     echo '<script>alert("Please check the the captcha form.")</script>';
    //     echo '<script>window.location="index.php"</script>';
    // }
    // $secretKey = "6LcpbXIeAAAAANAdg_Eoj99gtkYrqbWmC5i5XRaH";
    // $ip = $_SERVER['REMOTE_ADDR'];
    // // post request to server
    // $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
    // $response = file_get_contents($url);
    // $responseKeys = json_decode($response, true);
    // // should return JSON with success as true
    // if ($responseKeys["success"]) {
        $name = cleandata($_POST['name']);
        $email = cleandata($_POST['email']);
        $number = cleandata($_POST['phone']);
        $message = cleandata($_POST['message']);
        $date = date("d-m-y");
        if ($name != false && $email != false && $number != false  && $message != false) {
            $query = mysqli_query($con, "INSERT INTO `web_query` (`date`,  `name`, `email`, `message`, `phone`) VALUES ('" . $date . "',  '" . $name . "' , '" . $email . "', '" . $message . "','" . $number . "')");
            if ($query) {
               
              
              $mail_body = '';

        $curdate = date('d-m-Y');
        $ToEmail = 'ccubecoachingclasses@gmail.com';

        $EmailSubject = 'Query Mail';

        $mailheader = "From:   info@ccubecoachingclasses.com\r\n";
        $mailheader .= "Reply-To:   info@ccubecoachingclasses.com\r\n";
        $mailheader .= "Content-type: text/html; charset=iso-8859-1\r\n";

         $mail_body =  "<p>Hi ,</p>
            <p>There is a new Query , by <b>" . $_POST['name'] . "</b> <br>Email :  '.$email.'<br>Contact No. :'.$number.'<br>Message : '.$message.'<br></p>
            <p> Have a nice Day , Sir. </p>";
      

           mail($ToEmail,  $EmailSubject, $mail_body, $mailheader) or die("Failure");

              
               
                echo '<script>alert("Your query is submitted successfully")</script>';
            } else {
                echo '<script>alert(" You are spammer ! Get out")</script>';
            }
        } else {
            echo "<script>alert('We didnt accept URLs !')</script>";
        }
    // }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>C cube | Home Page</title>
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
    <link href="assets/css/flaticon-set.css" rel="stylesheet" />
    <link href="assets/css/magnific-popup.css" rel="stylesheet" />
    <link href="assets/css/owl.carousel.min.css" rel="stylesheet" />
    <link href="assets/css/owl.theme.default.min.css" rel="stylesheet" />
    <link href="assets/css/animate.css" rel="stylesheet" />
    <link href="assets/css/bootsnav.css" rel="stylesheet" />
    <link href="style.css" rel="stylesheet">
    <link href="assets/css/responsive.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700,800" rel="stylesheet">
    <?php include_once("analyticstracking.php") ?>
    <script src="https://www.google.com/recaptcha/api.js"></script>
</head>
<body>
    <?php include('header.php'); ?>
    <div class="banner-area content-top-heading less-paragraph text-normal" style="height:70%;">
        <div id="bootcarousel" class="carousel slide animate_text carousel-fade" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner text-light carousel-zoom">
                <div class="item active">
                    <div class="slider-thumb bg-fixed" style="background-image: url(assets/img/banner/1.jpg);"></div>
                    <div class="box-table shadow dark">
                        <div class="box-cell">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="content">
                                            <h3 data-animation="animated slideInLeft">WELCOME TO </h3>
                                            <h1 data-animation="animated slideInUp">C cube Coaching classes</h1>
                                            <a data-animation="animated slideInUp" class="btn btn-light border btn-md" href="about-us.php">Learn more</a>
                                            <a data-animation="animated slideInUp" class="btn btn-theme effect btn-md" href="all-courses.php">View Courses</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="slider-thumb bg-fixed" style="background-image: url(assets/img/banner/2.jpg);"></div>
                    <div class="box-table shadow dark">
                        <div class="box-cell">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="content">
                                            <h3 data-animation="animated slideInLeft">We offer, </h3>
                                            <h1 data-animation="animated slideInUp">Study material + Test series</h1>
                                            <a data-animation="animated slideInUp" class="btn btn-light border btn-md" href="about-us.php">Learn more</a>
                                            <a data-animation="animated slideInUp" class="btn btn-theme effect btn-md" href="all-courses.php">View Courses</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="slider-thumb bg-fixed" style="background-image: url(assets/img/banner/3.jpg);"></div>
                    <div class="box-table shadow dark">
                        <div class="box-cell">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="content">
                                            <h3 data-animation="animated slideInLeft">Join now</h3>
                                            <h1 data-animation="animated slideInUp">To get </h1>
                                            <a data-animation="animated slideInUp" class="btn btn-light border btn-md" href="about-us.php">Learn more</a>
                                            <a data-animation="animated slideInUp" class="btn btn-theme effect btn-md" href="https://www.youtube.com/channel/UC9fGNCCyjRzIqS3Tjxv4lGQ">View all videos</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a class="left carousel-control" href="#bootcarousel" data-slide="prev">
                <i class="fa fa-angle-left"></i>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#bootcarousel" data-slide="next">
                <i class="fa fa-angle-right"></i>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <div id="top-categories" class="top-cat-area   ">
        <div class="reg-area inc-faq default-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-6  ">
                        <img src="assets/img/about.jpg" class="logo" alt="about ">
                    </div>
                    <div class="col-md-6 faq-items">
                        <div class="site-heading text-left">
                            <h2>About us</h2>
                        </div>
                        <!-- Start Accordion -->
                        <div class="acd-items acd-arrow">
                            <div class="panel-group symb" id="accordion">
                                <br>
                                <h4>
                                    <ul>
                                        <li><i class="fas fa-handshake"></i> "Change does not roll on the wheels of inevitability, but comes through continuous struggle."</li>
                                        <li><br><i class="fas fa-handshake"></i> We are one of the leadinginstitutes; providing quality education to students preparing for various competitive exams such as Pre-engineering and Pre-medical exams. Our team motto is to strive hard to bring out the best capability in each and every student in their academic career. By keeping this in mind for the success of student in various competitive exams, we use the latest technology and teaching methodology.</li>
                                    </ul>
                                </h4>
                            </div>
                        </div>
                        <!-- End Accordion -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="top-categories" class="top-cat-area   bottom-less ">
        <div class="container  ">
            <div class="row">
                <div class="popular-courses-items">
                    <div class="col-md-4 col-sm-6 equal-height">
                        <div class="item">
                            <div class="thumb">
                                <div class="price"><a href="all-courses.php">
                                        <h1>5th to 8th</h1>
                                        <h3>Class</h3>
                                    </a>
                                    <br>
                                    <hr style="color:black"><br>
                                    <p>All subject</p>
                                    <!-- <br><hr style="color:black"><br>
                                    <a href="https://www.youtube.com/channel/UC9fGNCCyjRzIqS3Tjxv4lGQ" class="btn btn-xs btn-warning" target="_blank"> View all videos</a><br> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 equal-height">
                        <div class="item">
                            <div class="thumb">
                                <div class="price"><a href="all-courses.php">
                                        <h1>9th & 10th</h1>
                                        <h3>Class</h3>
                                    </a>
                                    <br>
                                    <hr style="color:black"><br>
                                    <p>Maths and science</p>
                                    <!-- <br><hr style="color:black"><br>
                                    <a href="free_pdf.php" class="btn btn-xs btn-warning" target="_blank"> View Pdf</a><br> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 equal-height">
                        <div class="item">
                            <div class="thumb">
                                <div class="price"><a href="all-courses.php">
                                        <h1>11th & 12th</h1>
                                        <h3>Class</h3>
                                        <br>
                                        <hr style="color:black"><br>
                                        <p>Maths, Physics, chemistry, Biology</p>
                                    </a>
                                    <!-- <br><hr style="color:black"><br>
                                    <a class="btn btn-xs btn-warning" href="index_login.php">
                                        Login to practice
                                    </a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>
        </div>
    </div>
    <div class="testimonials-area carousel-shadow default-padding bg-dark text-light">
        <div class="container">
            <div class="row">
                <div class="site-heading text-center">
                    <div class="col-md-8 col-md-offset-2">
                        <h2>Students Review</h2>
                        <!-- <p>
                            Able an hope of body. Any nay shyness article matters own removal nothing his forming. Gay own additions education satisfied the perpetual. If he cause manor happy. Without farther she exposed saw man led. Along on happy could cease green oh.
                        </p> -->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="clients-review-carousel owl-carousel owl-theme">
                        <!-- Single Item -->
                        <div class="item">
                            <div class="col-md-5 thumb">
                                <img src="assets/img/team/2.jpg" alt="Thumb">
                            </div>
                            <div class="col-md-7 info">
                                <p>
                                Great learning ambience... experienced teaching... Now also a study library .....You have been the best faculties ever
                                </p>
                                <h4>sandali s</h4>
                                <span> </span>
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-md-5 thumb">
                                <img src="assets/img/team/3.jpg" alt="Thumb">
                            </div>
                            <div class="col-md-7 info">
                                <p>
                                 As a student if I want to give a review than I will say that C cube is the best coaching."
                                </p>
                                <h4>madhulika p</h4>
                                <span> </span>
                            </div>
                        </div>
                        <!-- Single Item -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="top-categories" class="top-cat-area   ">
        <div class="reg-area inc-faq default-padding">
            <div class="container">
                <div class="row">
                    <div class="reg-items">
                        <div class="col-md-5 reg-form">
                            <div class="reg-box text-light" style="background-color:#5A89CE;">
                                <h3>Get a Free online Registration</h3>
                                <form action="register-code.php" method="post" id="register">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input class="form-control" placeholder="Full Name " type="text" name="name" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input class="form-control" placeholder="Email " type="email" name="email" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input class="form-control" placeholder="Contact No. " type="text" name="phone" maxlength="11" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <button class="g-recaptcha regsubmit" data-sitekey="6LceDMIeAAAAADuQeDyOEdwp6biC0mtwwi1K1lvI" data-callback='onSubmit' data-action='submit' name="regsubmit">Sign up</button>
                                            <!--<button type="submit" name="regsubmit" class="regsubmit">-->
                                            <!--    Sign up-->
                                            <!--</button>-->
                                        </div>
                                    </div>
                            </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-1  ">
                    </div>
                    <div class="col-md-6 faq-items">
                        <div class="site-heading text-left">
                            <br>
                            <h2> Why should you join C Cube</h2>
                            <p></p>
                        </div>
                        <!-- Start Accordion -->
                        <div class="acd-items acd-arrow">
                            <div class="panel-group symb" id="accordion">
                                <h4>
                                    <ul>
                                        <li> <br><i class="fas fa-handshake"></i>
                                            <b> Bilingual Expert Faculties are Available.
                                            </b>
                                        </li>
                                        <li> <br><i class="fas fa-handshake"></i>
                                            <b> Depth Knowledge Notes & Recommended
                                                Books Available
                                            </b>
                                        </li>
                                        <li> <br><i class="fas fa-handshake"></i>
                                            <b> Weekly Test Series Available
                                            </b>
                                        </li>
                                        <li> <br><i class="fas fa-handshake"></i>
                                            <b> Speed Test
                                            </b>
                                        </li>
                                        <li> <br><i class="fas fa-handshake"></i>
                                            <b> Doubt Session
                                            </b>
                                        </li>
                                    </ul>
                                </h4>
                                <br>
                                <div class="col-md-12">
                                    <hr style="background:red;">
                                </div>
                                <?php
                                if ($login_button == '') {
                                    //
                                    // echo '<div class="panel-heading">Welcome User</div><div class="panel-body">';
                                    // echo '<img src="'.$_SESSION["user_image"].'" class="img-responsive img-circle img-thumbnail" />';
                                    // echo '<h3><b>Name :</b> '.$_SESSION['user_first_name'].' '.$_SESSION['user_last_name'].'</h3>';
                                    // echo '<h3><b>Email :</b> '.$_SESSION['user_email_address'].'</h3>';
                                    // echo '<h3><a href="logout.php">Logout</h3></div>';
                                } else {
                                    echo '<div  style="color:white;text-align:center;">OR<br>' . $login_reg_button . '</div>';
                                }
                                ?>
                            </div>
                        </div>
                        <!-- End Accordion -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="pricing" class="pricing-area default-padding bg-gray bottom-less">
        <div class="container">
            <div class="row">
                <div class="site-heading text-center" style="margin-bottom:30px;">
                    <div class="col-md-8 col-md-offset-2">
                        <h2>Our Educational Videos</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="pricing pricing-simple text-center">
                    <?php
                    $q = mysqli_query($con, "SELECT * FROM `free_video` order by id desc limit 9");
                    while ($r = mysqli_fetch_array($q)) {
                        echo '
                        <div class="col-md-4 equal-height">
                        <div class="pricing-item"  >
                            <iframe width="100%" height="200px"
                            src="' . str_replace('https://youtu.be/', 'https://www.youtube.com/embed/', str_replace('https://www.youtube.com/watch?v=', 'https://www.youtube.com/embed/', $r['url']))  . '" allowfullscreen>' . $r['name'] . '
                            </iframe>
                        </div>
                    </div>
                    ';
                    }
                    ?>
                    <?php
                    // $apiKey = 'AIzaSyAkkaBdNw4dWPvgXGp_ZRIFVVTK_DK9YYY';
                    // $channelId = 'UC9fGNCCyjRzIqS3Tjxv4lGQ';
                    // $resultsNumber = '3';
                    // $requestUrl = 'https://www.googleapis.com/youtube/v3/search?key=' . $apiKey . '&channelId=' . $channelId . '&part=snippet,id&maxResults=' . $resultsNumber . '&order=date';
                    // // echo $requestUrl;
                    // // Try file_get_contents first
                    // if (function_exists(file_get_contents($requestUrl))) {
                    //     $response = file_get_contents($requestUrl);
                    //     $json_response = json_decode($response, TRUE);
                    // } else {
                    //     // No file_get_contents? Use cURL then...
                    //     if (function_exists('curl_version')) {
                    //         $curl = curl_init();
                    //         curl_setopt($curl, CURLOPT_URL, $requestUrl);
                    //         curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                    //         curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, TRUE);
                    //         $response = curl_exec($curl);
                    //         curl_close($curl);
                    //         $json_response = json_decode($response, TRUE);
                    //     } else {
                    //         // Unable to get response if both file_get_contents and cURL fail
                    //         $json_response = NULL;
                    //     }
                    // }
                    // // If there's a JSON response
                    // if ($json_response) {
                    //     $i = 1;
                    //     echo '<div class="youtube-channel-videos">';
                    //     foreach ($json_response['items'] as $item) {
                    //         $videoTitle = $item['snippet']['title'];
                    //         $videoID = $item['id']['videoId'];
                    //         //$videoThumbnail = $item['snippet']['thumbnails']['high']['url'];
                    //         if ($videoTitle && $videoID) {
                    //             echo '<div class="col-md-4 equal-height">
                    //                 <div class="pricing-item" class="youtube-channel-video-embed vid-' . $videoID . ' video-' . $i++ . '">
                    //                 <iframe width="100%" height="200px"
                    //                 src="https://www.youtube.com/embed/' . $videoID . '" allowfullscreen>' . $videoTitle . '
                    //                 </iframe>
                    //                 </div>
                    //                 </div>';
                    //         }
                    //     }
                    //     echo '</div><!-- .youtube-channel-videos -->';
                    //     // If there's no response
                    // } else {
                    //     // Display error message
                    //     echo '<div class="youtube-channel-videos error"><p>No videos are available at this time from the channel specified!</p></div>';
                    // }
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12  " style="text-align:center">
                    <a href="https://www.youtube.com/channel/UC9fGNCCyjRzIqS3Tjxv4lGQ" class="btn btn-xs btn-warning"> Subscribe to View all Videos </a>
                </div>
            </div>
        </div>
    </div>
    <?php include('footer.php'); ?>
    <script src="assets/js/jquery-1.12.4.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/equal-height.min.js"></script>
    <script src="assets/js/jquery.appear.js"></script>
    <script src="assets/js/jquery.easing.min.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/modernizr.custom.13711.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/isotope.pkgd.min.js"></script>
    <script src="assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="assets/js/count-to.js"></script>
    <script src="assets/js/bootsnav.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>
<script>
    function onSubmit(token) {
        document.getElementById("register").submit();
    }
</script>
<script>
    // function onClick(e) {
    //     e.preventDefault();
    //     grecaptcha.ready(function() {
    //         grecaptcha.execute('6Ld1vbIeAAAAAMzdlRbT3nRyZqeASayD360pKsQC', {
    //             action: 'regsubmit'
    //         }).then(function(token) {
    //             // Add your logic to submit to your backend server here.
    //         });
    //     });
    // }
    $('#mesage').keyup(function() {
        var msg = $('#mesage').val().toLowerCase();
        var err = msg.search("http://");
        var err2 = msg.search("https://");
        if (err < 0 && err2 < 0) {
            $("#qs").attr("disabled", false);
            $('#mes').html('');
        } else {
            $("#qs").attr("disabled", true);
            $('#mes').html('<span class="text-danger">Contains url</span>');
        }
    });
</script>