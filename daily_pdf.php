<?php
include 'config.php';
$pdfid = $_GET['id'];
$f = "select * from `pdf_category` WHERE `id`='" . $pdfid . "' ";
// echo $f;
$bm = mysqli_query($con, $f);
$am = mysqli_fetch_array($bm);

if(isset($_GET['year'])){
    $year = $_GET['year'];
}else{
    // $qyear = mysqli_query($con, "SELECT DISTINCT(`year`) FROM `free_pdf` WHERE `file_type`='" . $pdfid . "'  ");
    // $ryear = mysqli_fetch_array($qyear);
    // print_r($ryear);
    $year = date('Y');
}

?>
<!DOctYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Examin - Education and LMS Template">

    <title>All Courses || C cube </title>

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
        .tablinks {
            margin: 5px;
        }
    </style>
</head>

<body>
    <?php include('header.php'); ?>

    <div class="breadcrumb-area shadow dark text-center bg-fixed text-light" style="background-image: url(assets/img/banner/44.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1><?= $am['name'] ?>-<?= $year ?></h1>
                    <ul class="breadcrumb">
                        <li><a href="daily_pdf.php?id=<?= $pdfid ?>&year=2021" class="btn btn-warning mt-1"></i>View all Daily PDF [2021]</a>
                            &nbsp; &nbsp; <a href="daily_pdf.php?id=<?= $pdfid ?>&year=2022" class="btn btn-warning mt-1"></i>View all Daily PDF [2022]</a>
                </div>
                </li>

                </ul>
            </div>
        </div>
    </div>
    </div>

    <div class="popular-courses default-padding bottom-less without-carousel">
        <div class="container">
            <div class="row">

                <div class="tab" style="text-align:center">
                    <button class="tablinks btn btn-priMary" onclick="openCity(event, 'Jan')">Jan</button>
                    <button class="tablinks btn btn-priMary" onclick="openCity(event, 'Feb')">Feb</button>
                    <button class="tablinks btn btn-priMary" onclick="openCity(event, 'Mar')">Mar</button>
                    <button class="tablinks btn btn-priMary" onclick="openCity(event, 'Apr')">Apr</button>
                    <button class="tablinks btn btn-priMary" onclick="openCity(event, 'May')">May</button>
                    <button class="tablinks btn btn-priMary" onclick="openCity(event, 'Jun')">Jun</button>
                    <button class="tablinks btn btn-priMary" onclick="openCity(event, 'Jul')">Jul</button>
                    <button class="tablinks btn btn-priMary" onclick="openCity(event, 'Aug')">Aug</button>
                    <button class="tablinks btn btn-priMary" onclick="openCity(event, 'Sep')">Sep</button>
                    <button class="tablinks btn btn-priMary" onclick="openCity(event, 'Oct')">Oct</button>
                    <button class="tablinks btn btn-priMary" onclick="openCity(event, 'Nov')">Nov</button>
                    <button class="tablinks btn btn-priMary" onclick="openCity(event, 'Dec')">Dec</button>
                </div>

                <div id="Jan" class="tabcontent">
                    <h3>January - PDF</h3>
                    <div class="popular-courses-items">
                        <?php
                        $q = mysqli_query($con, "SELECT * FROM `free_pdf` WHERE `file_type`='" . $pdfid . "' AND `month`='Jan' AND `year`='" . $year . "' order by day asc ");
                        while ($r = mysqli_fetch_array($q)) {
                            echo '
                            <div class="col-md-3 col-sm-6 " style="margin-bottom:30px;">
                                <div class="item">
                                    <div class="thumb ">

                                            <img src="images/pdf.png" alt="' . $r['title'] . '" >

                                        <div class="price">' . $r['title'] . '</div>
                                    </div>

                                    <div class="info" style="text-align:center">
                                        <div style="background-color: white;padding: 5px 4px;">
                                            <p>Uploaded on ' . date_format(date_create($r['date']), 'd/m/Y') . '</p>
                                            <a href="admin/' . $r['file_name'] . '" class="btn btn-priMary"></i>Download Now</a>
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
                    <div class="popular-courses-items">
                        <?php
                        $q = mysqli_query($con, "SELECT * FROM `free_pdf` WHERE `file_type`='" . $pdfid . "' AND `month`='Feb' AND `year`='" . $year . "' order by day asc ");
                        while ($r = mysqli_fetch_array($q)) {
                            echo '
                     <div class="col-md-3 col-sm-6 " style="margin-bottom:30px;">
                         <div class="item">
                             <div class="thumb ">

                                     <img src="images/pdf.png" alt="' . $r['title'] . '" >

                                 <div class="price">' . $r['title'] . '</div>
                             </div>

                             <div class="info" style="text-align:center">
                             <div style="background-color: white;padding: 5px 4px;">
                             <p>Uploaded on ' . date_format(date_create($r['date']), 'd/m/Y') . '</p>
                                <a href="admin/' . $r['file_name'] . '" class="btn btn-priMary"></i>Download Now</a></div>
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
                    <div class="popular-courses-items">
                        <?php
                        $q = mysqli_query($con, "SELECT * FROM `free_pdf` WHERE `file_type`='" . $pdfid . "' AND `month`='Mar' AND `year`='" . $year . "' order by day asc ");
                        while ($r = mysqli_fetch_array($q)) {
                            echo '
                     <div class="col-md-3 col-sm-6 " style="margin-bottom:30px;">
                         <div class="item">
                             <div class="thumb ">

                                     <img src="images/pdf.png" alt="' . $r['title'] . '" >

                                 <div class="price">' . $r['title'] . '</div>
                             </div>

                             <div class="info" style="text-align:center">
                             <div style="background-color: white;padding: 5px 4px;">
                             <p>Uploaded on ' . date_format(date_create($r['date']), 'd/m/Y') . '</p>
                                <a href="admin/' . $r['file_name'] . '" class="btn btn-priMary"></i>Download Now</a></div>
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
                    <div class="popular-courses-items">
                        <?php
                        $q = mysqli_query($con, "SELECT * FROM `free_pdf` WHERE `file_type`='" . $pdfid . "' AND `month`='Apr' AND `year`='" . $year . "' order by day asc ");
                        while ($r = mysqli_fetch_array($q)) {
                            echo '
                     <div class="col-md-3 col-sm-6 " style="margin-bottom:30px;">
                         <div class="item">
                             <div class="thumb ">

                                     <img src="images/pdf.png" alt="' . $r['title'] . '" >

                                 <div class="price">' . $r['title'] . '</div>
                             </div>

                             <div class="info" style="text-align:center">
                             <div style="background-color: white;padding: 5px 4px;">
                             <p>Uploaded on ' . date_format(date_create($r['date']), 'd/m/Y') . '</p>
                                <a href="admin/' . $r['file_name'] . '" class="btn btn-priMary"></i>Download Now</a></div>
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
                    <div class="popular-courses-items">
                        <?php
                        $q = mysqli_query($con, "SELECT * FROM `free_pdf` WHERE `file_type`='" . $pdfid . "' AND `month`='May'  AND `year`='" . $year . "' order by day asc ");
                        while ($r = mysqli_fetch_array($q)) {
                            echo '
                     <div class="col-md-3 col-sm-6 " style="margin-bottom:30px;">
                         <div class="item">
                             <div class="thumb ">

                                     <img src="images/pdf.png" alt="' . $r['title'] . '" >

                                 <div class="price">' . $r['title'] . '</div>
                             </div>

                             <div class="info" style="text-align:center">
                             <div style="background-color: white;padding: 5px 4px;">
                             <p>Uploaded on ' . date_format(date_create($r['date']), 'd/m/Y') . '</p>
                                <a href="admin/' . $r['file_name'] . '" class="btn btn-priMary"></i>Download Now</a></div>
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
                    <div class="popular-courses-items">
                        <?php
                        $q = mysqli_query($con, "SELECT * FROM `free_pdf` WHERE `file_type`='" . $pdfid . "' AND `month`='Jun'  AND `year`='" . $year . "' order by day asc ");
                        while ($r = mysqli_fetch_array($q)) {
                            echo '
                     <div class="col-md-3 col-sm-6 " style="margin-bottom:30px;">
                         <div class="item">
                             <div class="thumb ">

                                     <img src="images/pdf.png" alt="' . $r['title'] . '" >

                                 <div class="price">' . $r['title'] . '</div>
                             </div>

                             <div class="info" style="text-align:center">
                             <div style="background-color: white;padding: 5px 4px;">
                             <p>Uploaded on ' . date_format(date_create($r['date']), 'd/m/Y') . '</p>
                                <a href="admin/' . $r['file_name'] . '" class="btn btn-priMary"></i>Download Now</a></div>
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
                    <div class="popular-courses-items">
                        <?php
                        $q = mysqli_query($con, "SELECT * FROM `free_pdf` WHERE `file_type`='" . $pdfid . "' AND `month`='Jul'  AND `year`='" . $year . "' order by day asc ");
                        while ($r = mysqli_fetch_array($q)) {
                            echo '
                     <div class="col-md-3 col-sm-6 " style="margin-bottom:30px;">
                         <div class="item">
                             <div class="thumb ">

                                     <img src="images/pdf.png" alt="' . $r['title'] . '" >

                                 <div class="price">' . $r['title'] . '</div>
                             </div>

                             <div class="info" style="text-align:center">
                             <div style="background-color: white;padding: 5px 4px;">
                             <p>Uploaded on ' . date_format(date_create($r['date']), 'd/m/Y') . '</p>
                                <a href="admin/' . $r['file_name'] . '" class="btn btn-priMary"></i>Download Now</a></div>
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
                    <div class="popular-courses-items">
                        <?php
                        $q = mysqli_query($con, "SELECT * FROM `free_pdf` WHERE `file_type`='" . $pdfid . "' AND `month`='Aug'  AND `year`='" . $year . "' order by day asc ");
                        while ($r = mysqli_fetch_array($q)) {
                            echo '
                     <div class="col-md-3 col-sm-6 " style="margin-bottom:30px;">
                         <div class="item">
                             <div class="thumb ">

                                     <img src="images/pdf.png" alt="' . $r['title'] . '" >

                                 <div class="price">' . $r['title'] . '</div>
                             </div>

                             <div class="info" style="text-align:center">
                             <div style="background-color: white;padding: 5px 4px;">
                             <p>Uploaded on ' . date_format(date_create($r['date']), 'd/m/Y') . '</p>
                                <a href="admin/' . $r['file_name'] . '" class="btn btn-priMary"></i>Download Now</a></div>
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
                    <div class="popular-courses-items">
                        <?php
                        $q = mysqli_query($con, "SELECT * FROM `free_pdf` WHERE `file_type`='" . $pdfid . "' AND `month`='Sep'  AND `year`='" . $year . "' order by day asc ");
                        while ($r = mysqli_fetch_array($q)) {
                            echo '
                     <div class="col-md-3 col-sm-6 " style="margin-bottom:30px;">
                         <div class="item">
                             <div class="thumb ">

                                     <img src="images/pdf.png" alt="' . $r['title'] . '" >

                                 <div class="price">' . $r['title'] . '</div>
                             </div>

                             <div class="info" style="text-align:center">
                             <div style="background-color: white;padding: 5px 4px;">
                             <p>Uploaded on ' . date_format(date_create($r['date']), 'd/m/Y') . '</p>
                                <a href="admin/' . $r['file_name'] . '" class="btn btn-priMary"></i>Download Now</a></div>
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
                    <div class="popular-courses-items">
                        <?php
                        $q = mysqli_query($con, "SELECT * FROM `free_pdf` WHERE `file_type`='" . $pdfid . "' AND `month`='Oct'  AND `year`='" . $year . "' order by day asc ");
                        while ($r = mysqli_fetch_array($q)) {
                            echo '
                     <div class="col-md-3 col-sm-6 " style="margin-bottom:30px;">
                         <div class="item">
                             <div class="thumb ">

                                     <img src="images/pdf.png" alt="' . $r['title'] . '" >

                                 <div class="price">' . $r['title'] . '</div>
                             </div>

                             <div class="info" style="text-align:center">
                             <div style="background-color: white;padding: 5px 4px;">
                             <p>Uploaded on ' . date_format(date_create($r['date']), 'd/m/Y') . '</p>
                                <a href="admin/' . $r['file_name'] . '" class="btn btn-priMary"></i>Download Now</a></div>
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
                    <div class="popular-courses-items">
                        <?php
                        $q = mysqli_query($con, "SELECT * FROM `free_pdf` WHERE `file_type`='" . $pdfid . "' AND `month`='Nov'  AND `year`='" . $year . "' order by day asc ");
                        while ($r = mysqli_fetch_array($q)) {
                            echo '
                     <div class="col-md-3 col-sm-6 " style="margin-bottom:30px;">
                         <div class="item">
                             <div class="thumb ">

                                     <img src="images/pdf.png" alt="' . $r['title'] . '" >

                                 <div class="price">' . $r['title'] . '</div>
                             </div>

                             <div class="info" style="text-align:center">
                             <div style="background-color: white;padding: 5px 4px;">
                             <p>Uploaded on ' . date_format(date_create($r['date']), 'd/m/Y') . '</p>
                                <a href="admin/' . $r['file_name'] . '" class="btn btn-priMary"></i>Download Now</a></div>
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
                    <div class="popular-courses-items">
                        <?php
                        $q = mysqli_query($con, "SELECT * FROM `free_pdf` WHERE `file_type`='" . $pdfid . "' AND `month`='Dec' AND `year`='" . $year . "' order by day asc ");
                        while ($r = mysqli_fetch_array($q)) {
                            echo '
                     <div class="col-md-3 col-sm-6 " style="margin-bottom:30px;">
                         <div class="item">
                             <div class="thumb ">

                                     <img src="images/pdf.png" alt="' . $r['title'] . '" >

                                 <div class="price">' . $r['title'] . '</div>
                             </div>

                             <div class="info" style="text-align:center">
                             <div style="background-color: white;padding: 5px 4px;">
                             <p>Uploaded on ' . date_format(date_create($r['date']), 'd/m/Y') . '</p>
                                <a href="admin/' . $r['file_name'] . '" class="btn btn-priMary"></i>Download Now</a></div>
							 </div>

                             </div>
                         </div>

                    ';
                        }
                        ?>
                    </div>
                </div>

                <script>
                    var city = <?= '\'' . date('M') . '\'' ?>;
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