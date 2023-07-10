<?php
include('config.php');
$pdfid=$_GET['id'];
$rf1 = "SELECT * FROM `candidate_subscribe` WHERE `stu_id`='" . $id . "' AND `sub_nm`='" . (($_GET['type'] == 'universal')? '1':$pdfid) . "' AND `type_sub`='1' AND `status` = 'OLD' ORDER BY `id` DESC";
//   echo $rf1;
$b1 = mysqli_query($con, $rf1);
if(mysqli_num_rows($b1) > 0){
while ($a1 = mysqli_fetch_array($b1)) {
  $exp =  date("d-m-Y", strtotime(date("Y-m-d", strtotime($a1['create_date'])) . " + 365 day"));

  $date1 = date("d-m-Y");

//   echo $date1 . ' = ' . $exp;
  if ($date1 == $exp) {
    // echo 'Dates are equal.';
    $query_exp = "UPDATE `candidate_subscribe` SET  `status`= 'expired' WHERE `id`=" . $a1['id'];
    $query_exp1 = mysqli_query($con, $query_exp);
    echo '<script>alert("Your plan is expired.Please purchase to continue.");window.location="pdf.php"</script>';
  }elseif(strtotime($date1) > strtotime($exp)){
    //   echo 'Date expired';
    $query_exp = "UPDATE `candidate_subscribe` SET  `status`= 'expired' WHERE `id`=" . $a1['id'];
    $query_exp1 = mysqli_query($con, $query_exp);
    echo '<script>alert("Your plan is expired.Please purchase to continue.");window.location="pdf.php"</script>';
  }


}
}else{
    echo '<script>alert("No Active plans available.Please purchase to continue.");window.location="pdf.php"</script>';
}

$f = "select * from `pdf_category` WHERE `id`='".$pdfid."' ";
// echo $f;
$bm = mysqli_query($con, $f);
$am = mysqli_fetch_array($bm);
$year = $_GET['year'];
?>
<!DOCTYPE html>
<html lang="en">

<head>


  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

  <title> C cube | Our PDF </title>

  <!-- vendor css -->
  <link href="lib/%40fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/typicons.font/typicons.css" rel="stylesheet">
  <link href="lib/prismjs/themes/prism-vs.css" rel="stylesheet">

  <!-- DashForge CSS -->
  <link rel="stylesheet" href="assets/css/dashforge.css">
  <link rel="stylesheet" href="assets/css/dashforge.demo.css">

</head>

<body class="pos-relative" data-spy="scroll" data-target="#navSection" data-offset="120">

  <?php include('header.php'); ?>
  <div class="content content-fixed bd-b">
    <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
      <div class="d-sm-flex align-items-center justify-content-between">
        <div>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style1 mg-b-10">
              <li class="breadcrumb-item"><a href="#">C cube</a></li>
              <li class="breadcrumb-item"><a href="#">Student Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Our PDF</li>
            </ol>
          </nav>
          <h4 class="mg-b-0">Our PDF</h4>
        </div>
        <!--div class="search-form mg-t-20 mg-sm-t-0">
            <input type="search" class="form-control" placeholder="Search events">
            <button class="btn" type="button"><i data-feather="search"></i></button>
          </div-->
      </div>
    </div>
  </div>


  <div class="content">
      <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1><?= $am['name'] ?>-<?= $year ?></h1>
                    <ul class="breadcrumb">
                        <li>
                            <?php
                            $qgb = mysqli_query($con, "SELECT DISTINCT(year) FROM `free_pdf`");
                        while ($rgb = mysqli_fetch_array($qgb)) {
                            ?>
                            <a href="daily_pdf.php?id=<?= $pdfid ?>&year=<?= $rgb['year'] ?>" class="btn btn-warning mt-1"></i>View <?= $rgb['year'] ?> PDF </a>&nbsp; &nbsp;
                        <?php
                        }
                        ?>
                        </li>

                    </ul>
                </div>
            </div>
    <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">

            <div class="row text-center">

                <div class="tab col-md-12" style="text-align:center">
                    <button class="tablinks btn btn-primary" onclick="openCity(event, 'Jan')">Jan</button>
                    <button class="tablinks btn btn-primary" onclick="openCity(event, 'Feb')">Feb</button>
                    <button class="tablinks btn btn-primary" onclick="openCity(event, 'Mar')">Mar</button>
                    <button class="tablinks btn btn-primary" onclick="openCity(event, 'Apr')">Apr</button>
                    <button class="tablinks btn btn-primary" onclick="openCity(event, 'May')">May</button>
                    <button class="tablinks btn btn-primary" onclick="openCity(event, 'Jun')">Jun</button>
                    <button class="tablinks btn btn-primary" onclick="openCity(event, 'Jul')">Jul</button>
                    <button class="tablinks btn btn-primary" onclick="openCity(event, 'Aug')">Aug</button>
                    <button class="tablinks btn btn-primary" onclick="openCity(event, 'Sep')">Sep</button>
                    <button class="tablinks btn btn-primary" onclick="openCity(event, 'Oct')">Oct</button>
                    <button class="tablinks btn btn-primary" onclick="openCity(event, 'Nov')">Nov</button>
                    <button class="tablinks btn btn-primary" onclick="openCity(event, 'Dec')">Dec</button>
                </div>
<div class="  col-md-12" style="text-align:center">
                <div id="Jan" class="tabcontent">
                    <h3>January - PDF</h3>
                    <div class="popular-courses-items row">
                        <?php
                        $q = mysqli_query($con, "SELECT * FROM `free_pdf` WHERE `file_type`='".$pdfid."' AND `month`='Jan' AND `year`='" . $year . "' order by day asc ");
                        while ($r = mysqli_fetch_array($q)) {
                            echo '
                            <div class="col-md-3 col-sm-6 " style="margin-bottom:30px;">
                                <div class="item shadow text-center">
                                    <div class="thumb ">

                                            <img src="../images/pdf.png" style="width:100px;"alt="' . $r['title'] . '" >

                                        <div class="price">' . $r['title'] . '</div>
                                    </div>

                                    <div class="info" style="text-align:center">
                                        <div style="background-color: white;padding: 5px 4px;">
                                            <p>Uploaded on ' . date_format(date_create($r['date']), 'd/m/Y') . '</p>
                                            <a href="admin/' . $r['file_name'] . '" class="btn btn-primary"></i>Download Now</a>
                                        </div>
                                    </div>

                                </div>
                            </div>

                    ';
                        }
                        ?>
                    </div>
                </div>

                <div id="Feb" class="tabcontent">
                    <h3>February - PDF</h3>
                    <div class="popular-courses-items row">
                        <?php
                        $q = mysqli_query($con, "SELECT * FROM `free_pdf` WHERE `file_type`='".$pdfid."' AND `month`='Feb' AND `year`='" . $year . "' order by day asc ");
                        while ($r = mysqli_fetch_array($q)) {
                            echo '
                     <div class="col-md-3 col-sm-6 " style="margin-bottom:30px;">
                         <div class="item shadow text-center">
                             <div class="thumb ">

                                     <img src="../images/pdf.png" style="width:100px;"alt="' . $r['title'] . '" >

                                 <div class="price">' . $r['title'] . '</div>
                             </div>

                             <div class="info" style="text-align:center">
                             <div style="background-color: white;padding: 5px 4px;">
                             <p>Uploaded on ' . date_format(date_create($r['date']), 'd/m/Y') . '</p>
                                <a href="admin/' . $r['file_name'] . '" class="btn btn-primary"></i>Download Now</a></div>
							 </div>

                             </div>
                         </div>

                    ';
                        }
                        ?>
                    </div>
                </div>
                <div id="Mar" class="tabcontent">
                    <h3>March - PDF</h3>
                    <div class="popular-courses-items row">
                        <?php
                        $q = mysqli_query($con, "SELECT * FROM `free_pdf` WHERE `file_type`='".$pdfid."' AND `month`='Mar' AND `year`='" . $year . "' order by day asc ");
                        while ($r = mysqli_fetch_array($q)) {
                            echo '
                     <div class="col-md-3 col-sm-6 " style="margin-bottom:30px;">
                         <div class="item shadow text-center">
                             <div class="thumb ">

                                     <img src="../images/pdf.png" style="width:100px;"alt="' . $r['title'] . '" >

                                 <div class="price">' . $r['title'] . '</div>
                             </div>

                             <div class="info" style="text-align:center">
                             <div style="background-color: white;padding: 5px 4px;">
                             <p>Uploaded on ' . date_format(date_create($r['date']), 'd/m/Y') . '</p>
                                <a href="admin/' . $r['file_name'] . '" class="btn btn-primary"></i>Download Now</a></div>
							 </div>

                             </div>
                         </div>

                    ';
                        }
                        ?>
                    </div>
                </div>
                <div id="Apr" class="tabcontent">
                    <h3>April - PDF</h3>
                    <div class="popular-courses-items row">
                        <?php
                        $q = mysqli_query($con, "SELECT * FROM `free_pdf` WHERE `file_type`='".$pdfid."' AND `month`='Apr' AND `year`='" . $year . "' order by day asc ");
                        while ($r = mysqli_fetch_array($q)) {
                            echo '
                     <div class="col-md-3 col-sm-6 " style="margin-bottom:30px;">
                         <div class="item shadow text-center">
                             <div class="thumb ">

                                     <img src="../images/pdf.png" style="width:100px;"alt="' . $r['title'] . '" >

                                 <div class="price">' . $r['title'] . '</div>
                             </div>

                             <div class="info" style="text-align:center">
                             <div style="background-color: white;padding: 5px 4px;">
                             <p>Uploaded on ' . date_format(date_create($r['date']), 'd/m/Y') . '</p>
                                <a href="admin/' . $r['file_name'] . '" class="btn btn-primary"></i>Download Now</a></div>
							 </div>

                             </div>
                         </div>

                    ';
                        }
                        ?>
                    </div>
                </div>

                <div id="May" class="tabcontent">
                    <h3>May - PDF</h3>
                    <div class="popular-courses-items row">
                        <?php
                        $q = mysqli_query($con, "SELECT * FROM `free_pdf` WHERE `file_type`='".$pdfid."' AND `month`='May'  AND `year`='" . $year . "' order by day asc ");
                        while ($r = mysqli_fetch_array($q)) {
                            echo '
                     <div class="col-md-3 col-sm-6 " style="margin-bottom:30px;">
                         <div class="item shadow text-center">
                             <div class="thumb ">

                                     <img src="../images/pdf.png" style="width:100px;"alt="' . $r['title'] . '" >

                                 <div class="price">' . $r['title'] . '</div>
                             </div>

                             <div class="info" style="text-align:center">
                             <div style="background-color: white;padding: 5px 4px;">
                             <p>Uploaded on ' . date_format(date_create($r['date']), 'd/m/Y') . '</p>
                                <a href="admin/' . $r['file_name'] . '" class="btn btn-primary"></i>Download Now</a></div>
							 </div>

                             </div>
                         </div>

                    ';
                        }
                        ?>
                    </div>
                </div>

                <div id="Jun" class="tabcontent">
                    <h3>June - PDF</h3>
                    <div class="popular-courses-items row">
                        <?php
                        $q = mysqli_query($con, "SELECT * FROM `free_pdf` WHERE `file_type`='".$pdfid."' AND `month`='Jun'  AND `year`='" . $year . "' order by day asc ");
                        while ($r = mysqli_fetch_array($q)) {
                            echo '
                     <div class="col-md-3 col-sm-6 " style="margin-bottom:30px;">
                         <div class="item shadow text-center">
                             <div class="thumb ">

                                     <img src="../images/pdf.png" style="width:100px;"alt="' . $r['title'] . '" >

                                 <div class="price">' . $r['title'] . '</div>
                             </div>

                             <div class="info" style="text-align:center">
                             <div style="background-color: white;padding: 5px 4px;">
                             <p>Uploaded on ' . date_format(date_create($r['date']), 'd/m/Y') . '</p>
                                <a href="admin/' . $r['file_name'] . '" class="btn btn-primary"></i>Download Now</a></div>
							 </div>

                             </div>
                         </div>

                    ';
                        }
                        ?>
                    </div>
                </div>
                <div id="Jul" class="tabcontent">
                    <h3>July - PDF</h3>
                    <div class="popular-courses-items row">
                        <?php
                        $q = mysqli_query($con, "SELECT * FROM `free_pdf` WHERE `file_type`='".$pdfid."' AND `month`='Jul'  AND `year`='" . $year . "' order by day asc ");
                        while ($r = mysqli_fetch_array($q)) {
                            echo '
                     <div class="col-md-3 col-sm-6 " style="margin-bottom:30px;">
                         <div class="item shadow text-center">
                             <div class="thumb ">

                                     <img src="../images/pdf.png" style="width:100px;"alt="' . $r['title'] . '" >

                                 <div class="price">' . $r['title'] . '</div>
                             </div>

                             <div class="info" style="text-align:center">
                             <div style="background-color: white;padding: 5px 4px;">
                             <p>Uploaded on ' . date_format(date_create($r['date']), 'd/m/Y') . '</p>
                                <a href="admin/' . $r['file_name'] . '" class="btn btn-primary"></i>Download Now</a></div>
							 </div>

                             </div>
                         </div>

                    ';
                        }
                        ?>
                    </div>
                </div>

                <div id="Aug" class="tabcontent">
                    <h3>August - PDF</h3>
                    <div class="popular-courses-items row">
                        <?php
                        $q = mysqli_query($con, "SELECT * FROM `free_pdf` WHERE `file_type`='".$pdfid."' AND `month`='Aug'  AND `year`='" . $year . "' order by day asc ");
                        while ($r = mysqli_fetch_array($q)) {
                            echo '
                     <div class="col-md-3 col-sm-6 " style="margin-bottom:30px;">
                         <div class="item shadow text-center">
                             <div class="thumb ">

                                     <img src="../images/pdf.png" style="width:100px;"alt="' . $r['title'] . '" >

                                 <div class="price">' . $r['title'] . '</div>
                             </div>

                             <div class="info" style="text-align:center">
                             <div style="background-color: white;padding: 5px 4px;">
                             <p>Uploaded on ' . date_format(date_create($r['date']), 'd/m/Y') . '</p>
                                <a href="admin/' . $r['file_name'] . '" class="btn btn-primary"></i>Download Now</a></div>
							 </div>

                             </div>
                         </div>

                    ';
                        }
                        ?>
                    </div>
                </div>

                <div id="Sep" class="tabcontent">
                    <h3>September - PDF</h3>
                    <div class="popular-courses-items row">
                        <?php
                        $q = mysqli_query($con, "SELECT * FROM `free_pdf` WHERE `file_type`='".$pdfid."' AND `month`='Sep'  AND `year`='" . $year . "' order by day asc ");
                        while ($r = mysqli_fetch_array($q)) {
                            echo '
                     <div class="col-md-3 col-sm-6 " style="margin-bottom:30px;">
                         <div class="item shadow text-center">
                             <div class="thumb ">

                                     <img src="../images/pdf.png" style="width:100px;"alt="' . $r['title'] . '" >

                                 <div class="price">' . $r['title'] . '</div>
                             </div>

                             <div class="info" style="text-align:center">
                             <div style="background-color: white;padding: 5px 4px;">
                             <p>Uploaded on ' . date_format(date_create($r['date']), 'd/m/Y') . '</p>
                                <a href="admin/' . $r['file_name'] . '" class="btn btn-primary"></i>Download Now</a></div>
							 </div>

                             </div>
                         </div>

                    ';
                        }
                        ?>
                    </div>
                </div>
                <div id="Oct" class="tabcontent">
                    <h3>October - PDF</h3>
                    <div class="popular-courses-items row">
                        <?php
                        $q = mysqli_query($con, "SELECT * FROM `free_pdf` WHERE `file_type`='".$pdfid."' AND `month`='Oct'  AND `year`='" . $year . "' order by day asc ");
                        while ($r = mysqli_fetch_array($q)) {
                            echo '
                     <div class="col-md-3 col-sm-6 " style="margin-bottom:30px;">
                         <div class="item shadow text-center">
                             <div class="thumb ">

                                     <img src="../images/pdf.png" style="width:100px;"alt="' . $r['title'] . '" >

                                 <div class="price">' . $r['title'] . '</div>
                             </div>

                             <div class="info" style="text-align:center">
                             <div style="background-color: white;padding: 5px 4px;">
                             <p>Uploaded on ' . date_format(date_create($r['date']), 'd/m/Y') . '</p>
                                <a href="admin/' . $r['file_name'] . '" class="btn btn-primary"></i>Download Now</a></div>
							 </div>

                             </div>
                         </div>

                    ';
                        }
                        ?>
                    </div>
                </div>

                <div id="Nov" class="tabcontent">
                    <h3>November - PDF</h3>
                    <div class="popular-courses-items row">
                        <?php
                        $q = mysqli_query($con, "SELECT * FROM `free_pdf` WHERE `file_type`='".$pdfid."' AND `month`='Nov'  AND `year`='" . $year . "' order by day asc ");
                        while ($r = mysqli_fetch_array($q)) {
                            echo '
                     <div class="col-md-3 col-sm-6 " style="margin-bottom:30px;">
                         <div class="item shadow text-center">
                             <div class="thumb ">

                                     <img src="../images/pdf.png" style="width:100px;"alt="' . $r['title'] . '" >

                                 <div class="price">' . $r['title'] . '</div>
                             </div>

                             <div class="info" style="text-align:center">
                             <div style="background-color: white;padding: 5px 4px;">
                             <p>Uploaded on ' . date_format(date_create($r['date']), 'd/m/Y') . '</p>
                                <a href="admin/' . $r['file_name'] . '" class="btn btn-primary"></i>Download Now</a></div>
							 </div>

                             </div>
                         </div>

                    ';
                        }
                        ?>
                    </div>
                </div>

                <div id="Dec" class="tabcontent">
                    <h3>December - PDF</h3>
                    <div class="popular-courses-items row">
                        <?php
                        $q = mysqli_query($con, "SELECT * FROM `free_pdf` WHERE `file_type`='".$pdfid."' AND `month`='Dec' AND `year`='" . $year . "' order by day asc ");
                        while ($r = mysqli_fetch_array($q)) {
                            echo '
                     <div class="col-md-3 col-sm-6 " style="margin-bottom:30px;">
                         <div class="item shadow text-center">
                             <div class="thumb ">

                                     <img src="../images/pdf.png" style="width:100px;"alt="' . $r['title'] . '" >

                                 <div class="price">' . $r['title'] . '</div>
                             </div>

                             <div class="info" style="text-align:center">
                             <div style="background-color: white;padding: 5px 4px;">
                             <p>Uploaded on ' . date_format(date_create($r['date']), 'd/m/Y') . '</p>
                                <a href="admin/' . $r['file_name'] . '" class="btn btn-primary"></i>Download Now</a></div>
							 </div>

                             </div>
                         </div>

                    ';
                        }
                        ?>
                    </div>
                </div>

                <script>
                var city = <?= '\''.date('M').'\'' ?>;
                openCity(event, city);
                    function openCity(evt, cityName) {
                        var i, tabcontent, tablinks;
                        tabcontent = document.getElementsByClassName("tabcontent");
                        for (i = 0; i < tabcontent.length; i++) {
                            tabcontent[i].style.display = "none";
                        }
                        tablinks = document.getElementsByClassName("tablinks");
                        for (i = 0; i < tablinks.length; i++) {
                            tablinks[i].className = tablinks[i].className.replace(" active", "");
                        }
                        document.getElementById(cityName).style.display = "block";
                        evt.currentTarget.className += " active";
                    }

                </script>



        </div></div>
    </div>
  </div>

  <?php include('footer.php'); ?>

  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/feather-icons/feather.min.js"></script>
  <script src="lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
  <script src="lib/prismjs/prism.js"></script>

  <script src="assets/js/dashforge.js"></script>
  <script>
    $(function() {
      'use strict'

    });
  </script>
</body>

</html>