<?php
//session_start();

/*if($_SESSION['status']!="Active")
{
    header("location:change-password.php");
}*/

include 'config.php';
       if(isset($_GET['id']))
		{
			$id=$_GET['id'];
			
			if (isset($_POST['update']))
			{
				$a=cleandata($_POST['email']);
				$b=cleandata($_POST['password']);
				
	 if($a != false && $b != false ){
				$qu=mysqli_query($con,"UPDATE `candidate_registre` set email='$a', password='$b'  where id='$id' ");
				
				if ($qu)
				{
					header('location:index.php');
				}
	 }else{
            echo "<script>alert('We didnt accept URLs !')</script>";
        }
				
			}
			
			$sql=mysqli_query($con,"select * from `candidate_registre` where id='$id' ");
		    $row=mysqli_fetch_array($sql);
		}
?>

 <!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Examin - Education and LMS Template">
    <title>Ambition | Change Password</title>
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
	
	<!--script>  
	function matchPassword() {  
  var pw1 = document.getElementById("password");  
  var pw2 = document.getElementById("confirm-password");  
  if(pw1 != pw2)  
  {   
    alert("Passwords did not match");  
  } else {  
    alert("Password created successfully");  
  }  
}  
</script-->  

</head>

<body>
<?php include('header.php'); ?>
    <div class="login-area default-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <form action="" method="post"  class="white-popup-block">
                        <div class="col-md-4 login-social">
                            
                            <ul>
                                <img src="images/php-login-and-authentication-the-definitive-guide.png" style="height: 200px;">
                            </ul>
                        </div>
                        <div class="col-md-8 login-custom">
                            <h4>Change Your Password !</h4>
                 <div class="col-md-12">
						<div class="row">
							<div class="form-group">
								<input class="form-control" placeholder="Email" type="email" name="email" value="<?php echo $row['email']; ?>" >
							</div>
						</div>
				</div>
                 <div class="col-md-12">
					<div class="row">
						<div class="form-group">
							<input class="form-control" placeholder=" Password" type="password" name="password" value="<?php echo $row['password']; ?>">
						</div>
					</div>
				</div>
			<!--div class="col-md-12">
                <div class="row">
                    <div class="form-group">
                        <input class="form-control" placeholder="Confirm Password" type="password" name="confirm-password">
                    </div>
                </div>
            </div-->
				<div class="col-md-12">
					<div class="row">
						<button type="submit" name="update">
							Login
						</button>
					</div>
				</div>
			
        </div>
                    </form>
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