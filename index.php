<?php
include 'config.php';
$msg = '';
if (isset($_POST['submit'])) {

  // if ($responseKeys["success"]) {


  $name = cleandata($_POST['name']);
  $email = cleandata($_POST['email']);
  $number = cleandata($_POST['phone']);
  $message = cleandata($_POST['message']);
  $date = date("d-m-y");
  if ($name != false && $email != false && $number != false  && $message != false) {
    $query = mysqli_query($con, "INSERT INTO `web_query` (`date`,  `name`, `email`, `message`, `phone`) VALUES ('" . $date . "',  '" . $name . "' , '" . $email . "', '" . $message . "','" . $number . "')");
    if ($query) {
      $mail_body1 =  "<p>Hi ,</p>

            <p>There is a new Query , by <b>" . $_POST['name'] . "</b> <br>Email :  '.$email.'<br>Contact No. :'.$number.'<br>Message : '.$message.'<br></p>

            <p> Have a nice Day , Sir. </p>";
      require 'php/class/class.phpmailer.php';

      $mail1 = new PHPMailer;
      $mail1->IsSMTP();                                //Sets Mailer to send message using SMTP
      $mail1->Host = 'mail.webangeltech.com';        //Sets the SMTP hosts of your Email hosting, this for Godaddy
      $mail1->Port = '587';                                //Sets the default SMTP server port
      $mail1->SMTPAuth = true;                         //Sets SMTP authentication. Utilizes the Username and Password variables
      $mail1->Username = 'ccube@webangeltech.com';         //Sets SMTP username
      $mail1->Password = '5cRX^j~^uT=U';         //Sets SMTP password
      $mail1->SMTPSecure = '';                         //Sets connection prefix. Options are "", "ssl" or "tls"
      $mail1->From = 'ccube@webangeltech.com';            //Sets the From email address for the message
      $mail1->FromName = 'C cube';                    //Sets the From name of the message
      $mail1->AddAddress('<?= $emailid ?>', 'C cube Query Notification');       //Adds a "To" address
      $mail1->WordWrap = 50;                           //Sets word wrapping on the body of the message to a given number of characters
      $mail1->IsHTML(true);                            //Sets message type to HTML
      $mail1->Subject = 'C cube Query Notification';          //Sets the Subject of the message
      $mail1->Body = $mail_body1;                           //An HTML or plain text message body
      if ($mail1->Send()) {
      } else {
      }
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

  <title>C cube Coaching Classes - Awadhpuri Bhopal (5-12th Class) </title>

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
  <!--<script src="https://www.google.com/recaptcha/api.js"></script>-->

</head>

<body>

  <?php include('header.php'); ?>

  <div class="banner-area content-top-heading less-paragraph text-normal" style="height:86%;">
    <div id="bootcarousel" class="carousel slide animate_text">

      <!-- Wrapper for slides -->
      <div class="carousel-inner text-light carousel-zoom">
        <div class="item active">
          <div class="slider-thumb bg-fixed" style="background-image: url(images/banner3.webp);"></div>
          <div class="box-table dark">
            <div class="box-cell">
              <div class="container">
                <!--<div class="row">-->
                <!--    <div class="col-md-8">-->
                <!--        <div class="content">-->
                <!--            <h3 data-animation="animated slideInLeft">WELCOME TO </h3>-->
                <!--            <h1 data-animation="animated slideInUp">C cube Coaching classes</h1>-->
                <!--            <a data-animation="animated slideInUp" class="btn btn-light border btn-md" href="about-us.php">Learn more</a>-->
                <!--            <a data-animation="animated slideInUp" class="btn btn-theme effect btn-md" href="all-courses.php">View Courses</a>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->
              </div>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="slider-thumb bg-fixed" style="background-image: url(images/banner2.webp);"></div>
          <div class="box-table dark">
            <div class="box-cell">
              <div class="container">
                <div class="row">
                  <!--<div class="col-md-8">-->
                  <!--    <div class="content">-->
                  <!--        <h3 data-animation="animated slideInLeft">We offer, </h3>-->
                  <!--        <h1 data-animation="animated slideInUp">Study material + Test series for 5th - 12th class student</h1>-->
                  <!--        <a data-animation="animated slideInUp" class="btn btn-light border btn-md" href="about-us.php">Learn more</a>-->
                  <!--        <a data-animation="animated slideInUp" class="btn btn-theme effect btn-md" href="all-courses.php">View Courses</a>-->
                  <!--    </div>-->
                  <!--</div>-->
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="slider-thumb bg-fixed" style="background-image: url(images/banner1.webp);"></div>
          <div class="box-table dark">
            <div class="box-cell">
              <div class="container">
                <!--<div class="row">-->
                <!--    <div class="col-md-8">-->
                <!--        <div class="content">-->
                <!--            <h3 data-animation="animated slideInLeft">Don't miss out on the opportunity </h3>-->
                <!--            <h1 data-animation="animated slideInUp">to enroll in our classes</h1>-->
                <!--            <a data-animation="animated slideInUp" class="btn btn-light border btn-md" href="about-us.php">Learn more</a>-->
                <!--            <a data-animation="animated slideInUp" class="btn btn-theme effect btn-md" href="https://www.youtube.com/channel/UC9fGNCCyjRzIqS3Tjxv4lGQ">View all videos</a>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->
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
  <div class="banner-area auto-height banner-box text-default text-light bg-gradient">

    <div class="item">
      <div class="box-table shadow dark">
        <div class="box-cell">
          <div class="container">
            <div class="row item-flex center">
              <div class="col-md-5 thumb">
                <img src="images/whoweare.webp" alt="Thumb">
              </div>
              <div class="col-md-7">
                <div class="content pt-3 pb-3">
                  <br><br>
                  <h1>Who we are</h1>
                  <h4> C cube coaching classes</h4>
                  <p>We are one of the leading institutes , providing quality education to students preparing for various class exams such as 10th and 12th Board exams. <br><br>Our team motto is to strive hard to bring out the best capability in each and every student in their academic career. By keeping this in mind for the success of student in various class exams, we use the latest technology and teaching methodology.</p><br>
                  <!-- <a class="btn btn-light border btn-md" href="#">Learn more</a>
                                    <a class="btn btn-light effect btn-md" href="#">View Courses</a> -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="wcs-area default-padding bg-light content-default">
    <div class="container">
      <div class="row">
        <div class="col-md-6 thumb">
          <img src="assets/img/a-about.png" alt="Thumb" style="border-radius:20px;">
        </div>
        <div class="col-md-6 content">
          <div class="site-heading text-left">
            <h2>Why chose us</h2>
            <p>
              We are one of the leading institutes , providing quality education to students preparing for various class exams such as 10th and 12th Board exams.
            </p>
          </div>

          <!-- item -->
          <div class="item">
            <div class="icon">
              <i class="flaticon-trending"></i>
            </div>
            <div class="info">
              <h4>
                <a href="#">Bilingual Expert Faculties are Available.</a>
              </h4>
            </div>
          </div>
          <!-- item -->

          <!-- item -->
          <div class="item">
            <div class="icon">
              <i class="flaticon-books"></i>
            </div>
            <div class="info">
              <h4>
                <a href="#">Depth Knowledge Notes </a>
              </h4>
            </div>
          </div>
          <div class="item">
            <div class="icon">
              <i class="flaticon-books"></i>
            </div>
            <div class="info">
              <h4>
                <a href="#"> Recommended Books Available</a>
              </h4>
            </div>
          </div>
          <!-- item -->

          <!-- item -->
          <div class="item">
            <div class="icon">
              <i class="flaticon-professor"></i>
            </div>
            <div class="info">
              <h4>
                <a href="#"> Weekly Test Series Available</a>
              </h4>
            </div>
          </div>
          <!-- item -->
          <!-- item -->
          <div class="item">
            <div class="icon">
              <i class="flaticon-professor"></i>
            </div>
            <div class="info">
              <h4>
                <a href="#"> Speed Test
                </a>
              </h4>
            </div>
          </div>
          <!-- item -->
          <!-- item -->
          <div class="item">
            <div class="icon">
              <i class="flaticon-professor"></i>
            </div>
            <div class="info">
              <h4>
                <a href="#"> Doubt Session</a>
              </h4>
            </div>
          </div>
          <!-- item -->

        </div>
      </div>
    </div>
  </div>

  <div class="what-learn-area bg-dark default-padding">
    <div class="container">
      <div class="content-box">
        <div class="row dflx">

          <div class="col-md-4 info text-light">
            <h2>What you will learn with us</h2>
            <p>
              Learning allows us to make sense of the world around us, the world inside of us, and where we fit within the world.
            </p>
          </div>

          <div class="col-md-8 categories">
            <div class="row">
              <!-- Single Item -->
              <div class="col-md-4 col-sm-4 single-item">
                <div class="item ">
                  <a href="javascript:void(0)" class="h230">
                    <i class="flaticon-feature"></i>
                    <div class="info">
                      <h4>5th to 8th class</h4>
                      <span>All subject</span>
                    </div>
                  </a>
                </div>
              </div>
              <!-- End Single Item -->
              <!-- Single Item -->
              <div class="col-md-4 col-sm-4 single-item">
                <div class="item">
                  <a href="javascript:void(0)" class="h230">
                    <i class="flaticon-interaction"></i>
                    <div class="info">
                      <h4>9th & 10th Class</h4>
                      <span>Maths and science</span>
                    </div>
                  </a>
                </div>
              </div>
              <!-- End Single Item -->
              <!-- Single Item -->
              <div class="col-md-4 col-sm-4 single-item">
                <div class="item">
                  <a href="javascript:void(0)" class="h230">
                    <i class="flaticon-conveyor"></i>
                    <div class="info">
                      <h4>11th & 12th Class</h4>
                      <span style="margin-bottom:2px">Math</span><span> Physics</span>
                      <span>Chemistry </span> <span>Biology</span>
                    </div>
                  </a>
                </div>
              </div>
              <!-- End Single Item -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <section id="advisor" class="advisor-area bg-gray carousel-shadow default-padding bottom-less">
    <div class="container">
      <div class="row">
        <div class="site-heading text-center">
          <div class="col-md-8 col-md-offset-2">
            <h2>Our Top Rankers</h2>

          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="advisor-items advisor-carousel-solid owl-carousel owl-theme text-center text-light">

            <?php
            $i = 1;
            $b = mysqli_query($con, "select * from `ranker`  ORDER BY `id` DESC ");
            while ($a = mysqli_fetch_array($b)) {
            ?>

              <div class="advisor-item">
                <div class="info-box">
                  <img src="admin/<?= $a['image'] ?>" alt="Thumb" style="height: 115px; object-fit: contain; background: #e9e9e9;">
                  <div class="info-title">
                   <h3> <span><?= $a['result'] ?> %</span></h3>
                    <h4 style="color:black"><?= $a['name'] ?></h4>
                    
                    <div class="social">
                     <b>
                         <?= $a['class_id'] ?>th Class
                       </b>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            <?php
            }
            ?>

          </div>
        </div>
      </div>
    </div>
  </section>


  <div id="portfolio" class="portfolio-area default-padding">
    <div class="container">
      <div class="row">
        <div class="site-heading text-center">
          <div class="col-md-8 col-md-offset-2">
            <h2>SOME SWEET MEMORIES </h2>
            <!--<p>-->
            <!--    Discourse assurance estimable applauded to so. Him everything melancholy uncommonly but solicitude inhabiting projection off. Connection stimulated estimating excellence an to impression. -->
            <!--</p>-->
          </div>
        </div>
      </div>
      <div class="portfolio-items-area text-center">
        <div class="row">
          <div class="col-md-12 portfolio-content">


            <div class="row magnific-mix-gallery masonary text-light">
              <div id="portfolio-grid" class="portfolio-items col-3">

                <?php
                $i = 0;
                $er = "SELECT * FROM `tbl_gallery_image` ORDER BY `pi_id` DESC LIMIT 18";
                $pro = mysqli_query($con, $er);
                while ($gallery = mysqli_fetch_array($pro)) {

                ?>
                  <div class="pf-item ceremony students">
                    <div class="item-effect">
                      <img src="images/gallery/<?= $gallery['pi_name'] ?>" alt="C Cube" />
                      <div class="overlay">
                        <a href="images/gallery/<?= $gallery['pi_name'] ?>" class="item popup-link"><i class="fa fa-expand"></i></a>
                        <!--<a href="#"><i class="fas fa-link"></i></a>-->
                      </div>
                    </div>
                  </div>
                <?php
                }

                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="reg-area default-padding-top bg-gray">
    <div class="container">
      <div class="row">
        <div class="reg-items">
          <div class="col-md-6 reg-form default-padding-bottom c-form">
            <div class="site-heading text-left">
              <h2>Need guidance ??</h2>
              <p>
                Learning allows us to make sense of the world around us, the world inside of us, and where we fit within the world.
              </p>
            </div>
            <form action="" method="post">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <input class="form-control" placeholder="Full Name" name="name" type="text">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <input class="form-control" placeholder="Email*" name="email" type="email">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <input class="form-control" placeholder="Phone" name="phone" type="text">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <textarea name="message" id="" cols="30" rows="10" class="form-control" placeholder="Write any message"></textarea>
                  </div>
                </div>

                <div class="col-md-12">
                  <button type="submit" name="submit">
                    Consult Now
                  </button>
                </div>
              </div>
            </form>
          </div>
          <div class="col-md-6 thumb">
            <img src="assets/img/about/1.png" alt="Thumb">
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Registration -->
  <?php include('footer.php'); ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
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
  <script src="assets/js/loopcounter.js"></script>
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