<?php
session_start();
unset($_SESSION['aim_id']);
session_destroy();

?>
<script type="text/javascript">
window.location="index.php";
</script>