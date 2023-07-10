<?php
include("config.php"); 
$b = mysqli_query($con, "select * from `free_pdf` ");
while($a = mysqli_fetch_array($b)){
    if(file_exists($a['file_name']))
    {
        
    }else{
        
        $r = explode('-',$a['file_name']);
        // print_r($r);
        if(file_exists('allpdf/'.$r[1])){
            move_uploaded_file($r[1]['tmp_name'],$a['file_name']);
        }else{
            echo  $a['file_name'].' - not found <br>';
        }
    }
}
 

?>