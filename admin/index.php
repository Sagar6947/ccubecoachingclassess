<?php
include("config.php");
 if (isset($_POST["sub"]))
{
  $name =$_POST['name'];
  $password =$_POST['password'];
  $query =  "SELECT * FROM `login` WHERE `username` = '".$name."' and `password` = '".$password."' ";
    $result=($con->query($query));
    if($result->num_rows>0)
    {
       while($row=$result->fetch_array())
         {
             $_SESSION['aim_id']=$row['id'];
             echo '<script>window.location="home.php"</script>';
         }
    }
    else
    {
        echo "<script>alert ('Incorrect Id And Password') </script>";
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="ThemePixels">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <title>C cube | Admin Panel</title>
    <link href="lib/%40fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/dashforge.css">
    <link rel="stylesheet" href="assets/css/dashforge.auth.css">
  </head>
  <body class="bg-light">
  	<div class="content content-fixed content-auth">
      <div class="container">
        <div class="row">
          <div class="col-md-6">

              <img src="assets/img/img15.jpg" class="img-fluid" alt="" style="width:460px;border-radius:20px">

          </div>
          <div class="col-md-6  ">
          <div class="card">
          <div class="card-body">
            <div class="wd-100p">

                <h3 class="tx-color-01 mg-b-5">Sign In</h3>
                <p class="tx-color-03 tx-16 mg-b-40">Welcome ! Please signin to continue.</p>

                <form method="post" action="">
                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="name" class="form-control" placeholder="Ex:-yourname@yourmail.com">
                  </div>
                  <div class="form-group">
                    <div class="d-flex justify-content-between mg-b-5">
                      <label class="mg-b-0-f">Password</label>
                     </div>
                    <input type="password" name="password" class="form-control" placeholder="Enter your password">
                  </div>
                  <input  type="submit" name="sub" value="Sign In" class="btn btn-brand-02 btn-block">
                </form>
            </div>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <script src="lib/jquery/jquery.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="lib/feather-icons/feather.min.js"></script>
    <script src="lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>

    <script src="assets/js/dashforge.js"></script>
    <script src="lib/js-cookie/js.cookie.js"></script>
    <script src="assets/js/dashforge.settings.js"></script>

  </body>
</html>
