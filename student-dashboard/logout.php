<?php
session_start();
include('../config.php');
// session_start();

unset($_SESSION['stud_id']);
unset($_SESSION['exam']);
 


// if(isset($google_client)){
// //Reset OAuth access token
// $google_client->revokeToken();
// }
//Destroy entire session data.
session_destroy();
 

?>
<script type="text/javascript">
    window.location="../index.php";
</script>