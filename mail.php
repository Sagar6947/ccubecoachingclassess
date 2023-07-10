<?php

$msg = '';

        $curdate = date('d-m-Y');
        $ToEmail = 'muskaanrashujain@gmail.com';

        $EmailSubject = 'Query data';

        $mailheader = "From:   info@ccubecoachingclasses.com\r\n";
        $mailheader .= "Reply-To:   info@ccubecoachingclasses.com\r\n";
        $mailheader .= "Content-type: text/html; charset=iso-8859-1\r\n";

        $msg = "My Name IS Muskan ";
      

        mail($ToEmail,  $EmailSubject, $msg, $mailheader) or die("Failure");


?>