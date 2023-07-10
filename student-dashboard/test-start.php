<?php
include('config.php');
$_SESSION['exa'] = 'on';
if ($id = $_GET['id']) {
    $_SESSION['h'] = $id;

    $qx = mysqli_query($con, "SELECT * FROM `test_series` WHERE `id`  = '" . $id . "' ");
    while ($r = mysqli_fetch_array($qx)) {
        $_SESSION['positive'] = $r['positive'];
        $_SESSION['negative'] = $r['negative'];
        $_SESSION['questio'] = $r['total_questions'];
        $_SESSION['duration'] = $r['duration'];
        $_SESSION['descriptive'] = $r['descriptive'];
        $_SESSION['ds_num'] = '';
        $_SESSION['ds_time'] = '';
        // $_SESSION['ds_positive'] = '';
    }
    $qu = mysqli_query($con, "SELECT * FROM `candidate_test_attempts` WHERE `s_id`='" . $row['id'] . "'  AND `type` = 'FREE'");
    $qu1 = mysqli_num_rows($qu);
    if ($qu1 > 0) {
        $qu2 = mysqli_query($con, "SELECT * FROM `candidate_subscribe` WHERE `stu_id`='" . $row['id'] . "' AND `status`= 'ACTIVE'");
        $qu3 = mysqli_num_rows($qu2);
        if ($qu3 > 0) {
            echo '<script>window.location="subscription.php"</script>';
        } else {
            echo '<script>window.location="test-panel-start.php"</script>';
        }
    } else {
        echo '<script>window.location="test-panel-start.php"</script>';
    }
}
