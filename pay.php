<?php
session_start();
// print_r($_SESSION);
// echo'sd';
$name = $_POST['name'];
$email = $_POST['email'];
$number = $_POST['number'];
$address = $_POST['address'];
$course = $_POST['course_id'];
$studenti = $_POST['student_id'];
$fee = $_POST['fee'];
$payid = $_POST['payid'];

// $oid = $_SESSION['oid'];
if ($payid != '') {
    $_SESSION['oid'] = $payid;
?>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <button id="rzp-button1" style="opacity: 0;">Pay</button>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        var pid = '';
        var options = {
            "key": "rzp_live_niRawKURafQtQJ",
            // "key": "rzp_test_juqB8BfnYhCbSz",
            "amount": "<?= $fee * 100 ?>", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
            "currency": "INR",
            "name": "C cube",
            "description": "Course Purchase",
            "image": "assets/img/logo.png",
            "handler": function(response) {
                // console.log(response.razorpay_payment_id);
                // console.log(response);
                var pid = response.razorpay_payment_id;
                // alert(response.razorpay_payment_id);
                if ( response.razorpay_payment_id == 'undefined' ||  response.razorpay_payment_id < 1) {
                  var redirect_url =
                //   console.log(redirect_url);

                  window.location='message.php?msg=success&pid='+response.razorpay_payment_id+'&';
                } else {
                  var redirect_url = 'message.php?msg=error&pid='+response.razorpay_payment_id;
                //   console.log(redirect_url);
                }
                $('#payid').val(response.razorpay_payment_id);
                $("#form").submit();
            },
            "prefill": {
                "name": "<?= $name ?>",
                "email": "<?= $email ?>",
                "contact": "<?= $number ?>"
            },
            "notes": {
                "address": "Razorpay Corporate Office"
            },
            "theme": {
                "color": "#3399cc"
            }
        };
        var rzp1 = new Razorpay(options);
        rzp1.on('payment.failure', function(response) {
            window.location = "all-courses.php";
        });
        rzp1.on('payment.cancel', function(response) {
            window.location = "all-courses.php";
        });
        document.getElementById('rzp-button1').onclick = function(e) {
            var d = rzp1.open();
            e.preventDefault();
        }
        document.getElementById('rzp-button1').click();

        // alert('redirect_url');
    </script>
<?php
} else {
    echo "<script>alert('Server error')</script>";
}

?>
<form action="message.php" method="post" id="form">
    <input type="hidden" value="<?= $oid ?>" name="oid" />
    <input type="hidden" value="" name="payid" id="payid" />
</form>