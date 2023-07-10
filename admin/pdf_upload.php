<?php
include("config.php");
include("session.php");
// if (isset($_POST['upload'])) {
  $title = $_POST['title'];
  $year = $_POST['year'];
  $month = $_POST['month'];
  $day = $_POST['day'];
  $type = $_POST['type'];
  $file = $_FILES['logo']['name'];
  $tmpfile = $_FILES['logo']['tmp_name'];
  $folder = 'free_pdf/' . date("dmyhis") . '-' . $file;
  move_uploaded_file($tmpfile, $folder);

  $fg = "INSERT INTO `free_pdf`(`title`, `subject_id`, `year`, `month`, `day`,  `file_name`) VALUES ('" . $title . "','" . $type . "','" . $year . "','" . $month . "','" . $day . "','" . $folder . "')";
//   echo $fg;
  $sal =  mysqli_query($con, $fg);
  if ($sal) {
    echo '<script>window.location="pdf-add.php";</script>';
  } else {
      echo '<script>alert("Error in Insertion of your file...Please try again later!");</script>';

  }
// }
