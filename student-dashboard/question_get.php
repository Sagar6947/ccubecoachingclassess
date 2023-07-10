<?php
include 'config.php';

$state=$_GET["state"];

$qs=mysqli_query($con,"SELECT * FROM `test_questions` WHERE `id`='".$state."'");
$r=mysqli_fetch_array($qs);

    	 echo '
            <div class="tab-pane ">
              <h6>Question no. '.$r['id'].'</h6> 
              <div class="alert alert-info" role="alert">
              <p class="mg-b-0"><b>'.$r['question'].'</b></p>
              </div>
              <div class="custom-control custom-radio">
                <input type="radio" id="customRadio1'.$r['id'].'" name="customRadio'.$r['id'].'" class="custom-control-input"  value="'.$r['option_a'].'">
                <label class="custom-control-label" for="customRadio1'.$r['id'].'">'.$r['option_a'].'</label>
              </div>

              <div class="custom-control custom-radio">
                <input type="radio" id="customRadio2'.$r['id'].'" name="customRadio'.$r['id'].'" class="custom-control-input" value="'.$r['option_b'].'">
                <label class="custom-control-label" for="customRadio2'.$r['id'].'">'.$r['option_b'].'</label>
              </div>

              <div class="custom-control custom-radio">
                <input type="radio" id="customRadio3'.$r['id'].'" name="customRadio'.$r['id'].'" class="custom-control-input" value="'.$r['option_c'].'">
                <label class="custom-control-label" for="customRadio3'.$r['id'].'">'.$r['option_c'].'</label>
              </div>

              <div class="custom-control custom-radio">
                <input type="radio" id="customRadio4'.$r['id'].'" name="customRadio'.$r['id'].'" class="custom-control-input" value="'.$r['option_d'].'">
                <label class="custom-control-label" for="customRadio4'.$r['id'].'">'.$r['option_d'].'</label>
              </div>
               <div class="custom-control custom-radio">
                <input type="text" name="idhold" value="'.$r['id'].'">        
                          
              </div>
              <div data-label="" class="df-example" style="border:0px">
                <div class="demo-btn-group">';
                $pre=mysqli_query($con,"select * from test_questions where id = (select max(id) from test_questions where `id`<'".$state."' and test_series_id = '".$r['test_series_id']."')");
				if($prev = mysqli_fetch_array($pre))
				{$previo = $prev['id'];           
                  echo '<button type="button" class="btn btn-primary" onclick="get_question('.$previo.');">Previous : '.$previo.'</button>';
              }

                $ne=mysqli_query($con,"select * from test_questions where id = (select min(id) from test_questions where `id`>'".$state."' and test_series_id = '".$r['test_series_id']."')");
				if($nex = mysqli_fetch_array($ne))
				{$next = $nex['id'];
                 echo '<button type="button" class="btn btn-primary" onclick="get_question('.$next.');">Next : '.$next.'</button> ';
                 }     

				
              echo' 
                </div> 
              </div> 
            </div>';
            
?>

