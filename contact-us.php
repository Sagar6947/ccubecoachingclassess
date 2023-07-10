<?php
include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Examin - Education and LMS Template">

    <title>C cube | Contact with us</title>

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
    <style>
        .form-wrapper-outer {
            padding: 40px;
            border-radius: 8px;
            margin: auto;
            width: 460px;
            border: 1px solid #DADCE0;
            margin-top: 7%;
        }

        .field-wrapper {
            position: relative;
            margin-bottom: 15px;
        }

        .field-wrapper input {
            border: 1px solid #DADCE0;
            padding: 15px;
            border-radius: 4px;
            width: 100%;
        }

        .field-wrapper input:focus {
            border: 1px solid #1A73E8;
        }

        .field-wrapper .field-placeholder {
            font-size: 16px;
            position: absolute;
            /* background: #fff; */
            bottom: 17px;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            color: #80868b;
            left: 8px;
            padding: 0 8px;
            -webkit-transition: transform 150ms cubic-bezier(0.4, 0, 0.2, 1), opacity 150ms cubic-bezier(0.4, 0, 0.2, 1);
            transition: transform 150ms cubic-bezier(0.4, 0, 0.2, 1), opacity 150ms cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 1;

            text-align: left;
            width: 100%;
        }

        .field-wrapper .field-placeholder span {
            background: #ffffff;
            padding: 0px 8px;
        }

        .field-wrapper input:not([disabled]):focus~.field-placeholder {
            color: #1A73E8;
        }

        .field-wrapper input:not([disabled]):focus~.field-placeholder,
        .field-wrapper.hasValue input:not([disabled])~.field-placeholder {
            -webkit-transform: scale(.75) translateY(-39px) translateX(-60px);
            transform: scale(.75) translateY(-39px) translateX(-60px);

        }


        .field-wrapper.field-error {
            border: 1px solid red;
        }

        .field-wrapper.field-error .field-placeholder span {
            color: red;
        }

        #message-wrap {
            padding: 15px;
            text-align: center;
            display: none;
            border-radius: 4px;
        }

        #message-wrap.success-msg {
            color: green;
            background: #e3ffd5;
        }

        #message-wrap.error-msg {
            color: red;
            background: #ffd5d5;
        }
    </style>

</head>

<body>

    <?php include('header.php'); ?>
    <div class="breadcrumb-area shadow dark text-center bg-fixed text-light" style="background-image: url(assets/img/banner/44.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Contact Us</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="contact-info-area default-padding">
        <div class="container">
            <div class="row">
                <div class="contact-info">
                    <div class="col-md-4 col-sm-4">
                        <div class="item">
                            <div class="icon">
                                <i class="fas fa-mobile-alt"></i>
                            </div>
                            <div class="info">
                                <h4>Call Us</h4>

                                <span> +91 9424444132 </span><br>
                                <span> +91 9826608987</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="item">
                            <div class="icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="info">
                                <h4>Address</h4>
                                <span>H.NO 1 TAGORE NAGAR PHASE 1 KHAJURI KALAN ROAD PIPLANI BHOPAL</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="item">
                            <div class="icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="info">
                                <h4>Email Us</h4>
                               
                                <span>ccubecoachingclasses@gmail.com</span><br>
                                <span>info@ccubecoachingclasses.com</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="seperator col-md-12">
                    <span class="border"></span>
                </div>

                <div class="maps-form">
                    <div class="col-md-6 maps">
                        <h3>Our Location</h3>
                        <div class="google-maps">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14664.430723805795!2d77.4898928!3d23.2391683!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x397c41eb075421c1%3A0xa1f670a1a64c218b!2sC%20Cube%20Coaching%20Classes!5e0!3m2!1sen!2sin!4v1682012492155!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                    <div class="col-md-6 form">
                        <div class="heading">
                            <h3>Contact Us</h3>
                            <p>
                                <br>
                            </p>
                        </div>
                        <div>
                            <!--contact_code.php-->
                            <form action="contact_code.php" method="POST" name="htmlform"  >
                                <div class="field-wrapper">
                                    <div id="message-wrap">
                                        <span></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="form-group field-wrapper">
                                            <input class="form-control form-checkfield" name="name" placeholder="Name" id="name" type="text" required>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="form-group field-wrapper">
                                            <input class="form-control form-checkfield" name="email" placeholder="Email*" id="email" type="email" required>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="form-group field-wrapper">
                                            <input class="form-control form-checkfield" name="phone" placeholder="Phone" id="phone" type="text" required maxlength="11">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="form-group comments">
                                            <textarea class="form-control" name="message" id="message" style="resize: none;" placeholder="Tell Me Your Message*"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="col-md-12">
                                <div class="form-group" style="height:100px;">
                                    <div id="google_recaptcha"></div>
                                </div>
                            </div> -->
                                <div class="col-md-12">
                                    <div class="row">
                                        <input type="submit" name="submit"  value="Send Message" class="btn btn-warning">

                                        <!--<input type="button" id="submit-test-form" value="Submit" class="btn btn-warning">-->
                                    </div>
                                </div>
                                <!-- Alert Message -->

                            </form>
                        </div>
                    </div>
                </div>
                <!-- End Maps & Contact Form -->

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
    <script>
        // var onloadCallback = function () {
        //     grecaptcha.render('google_recaptcha', {
        //         'sitekey': '6LcKnqMeAAAAAPZPjoYBy0mLcsokS2YhfjIuNxzu'
        //     });
        // };

        // $(function() {
        //     //Check if required fields are filled
        //     function checkifreqfld() {
        //         var isFormFilled = true;
        //         $("#test-form").find(".form-checkfield:visible").each(function() {
        //             var value = $.trim($(this).val());
        //             if ($(this).prop('required')) {
        //                 if (value.length < 1) {
        //                     $(this).closest(".field-wrapper").addClass("field-error");
        //                     isFormFilled = false;
        //                 } else {
        //                     $(this).closest(".field-wrapper").removeClass("field-error");
        //                 }
        //             } else {
        //                 $(this).closest(".field-wrapper").removeClass("field-error");
        //             }
        //         });
        //         return isFormFilled;
        //     }
        //     const haystack = ["http://", "https://", "http://www.", "https://www.", "HTTP://WWW.", "HTTPS://WWW."];

        //     function checkAvailability(arr, val) {
        //         return arr.some(function(arrVal) {
        //             return val === arrVal;
        //         });
        //     }
        //     //Form Submit Event
        //     $("#submit-test-form").click(function() {
        //         if (checkifreqfld()) {
        //             // event.preventDefault();
        //             // var rcres = grecaptcha.getResponse();
        //             // console.log(rcres);
        //             var msg = $('#message').val().toLowerCase();
        //             var name = $('#name').val().toLowerCase();
        //             var err = msg.search("http://");
        //             var err2 = msg.search("https://");
        //             var err3 = name.search("http://");
        //             var err4 = name.search("https://");

        //             if (err < 0 && err2 < 0 && err3 < 0 && err4 < 0) {
        //                 // if (rcres.length) {
        //                 $.ajax({
        //                     type: 'POST',
        //                     data: {
        //                         name: $('#name').val(),
        //                         email: $('#email').val(),
        //                         phone: $('#phone').val(),
        //                         message: $('#message').val()
        //                     },
        //                     url: 'contact_code.php',
        //                     success: function(data) {
        //                         alert("We got your query successfully");
        //                         location.reload();
        //                     }
        //                 });
        //                 grecaptcha.reset();

        //                 $('#name').val('');
        //                 $('#email').val('');
        //                 $('#phone').val('');
        //                 $('#message').val('');
        //                 // $('.form-control').find('input:text').val('');
        //                 // $('.form-control').find('textarea').val('');

        //                 // } else {
        //                 //     showHideMsg("Please verify reCAPTCHA", "error");
        //                 // }
        //             } else {
        //                 showHideMsg("Any field contains external links", "error");
        //             }
        //         } else {
        //             showHideMsg("Fill required fields!", "error");
        //         }
        //     });

        //     //Show/Hide Message
        //     function showHideMsg(message, type) {
        //         if (type == "success") {
        //             $("#message-wrap").addClass("success-msg").removeClass("error-msg");
        //         } else if (type == "error") {
        //             $("#message-wrap").removeClass("success-msg").addClass("error-msg");
        //         }

        //         $("#message-wrap").stop()
        //             .slideDown()
        //             .html(message)
        //             .delay(3000)
        //             .slideUp();
        //     }


        //     //Google Style InputFields
        //     $(".field-wrapper .field-placeholder").on("click", function() {
        //         $(this).closest(".field-wrapper").find("input").focus();
        //     });
        //     $(".field-wrapper input").on("keyup", function() {
        //         var value = $.trim($(this).val());
        //         if (value) {
        //             $(this).closest(".field-wrapper").addClass("hasValue");
        //         } else {
        //             $(this).closest(".field-wrapper").removeClass("hasValue");
        //         }
        //     });
        // });
    </script>
</body>

</html>