<?php
include("config.php");
include("session.php");
if (isset($_POST['delete'])) {
    // print_r($_POST);
    foreach ($_POST['data'] as $value) {

        $q = mysqli_query($con, "delete from candidate_registre where id='$value'");
    }
    echo '<script>alert("Records deleted.")</script>';
    echo '<script>window.location.href="student-register.php";</script>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Bootstrap 4 Dashboard Template">
    <meta name="author" content="ThemePixels">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <title>ccube | Registered Student list</title>
    <link href="lib/%40fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="lib/typicons.font/typicons.css" rel="stylesheet">
    <link href="lib/prismjs/themes/prism-vs.css" rel="stylesheet">
    <link href="lib/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="lib/datatables.net-responsive-dt/css/responsive.dataTables.min.css" rel="stylesheet">
    <link href="lib/select2/css/select2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/dashforge.css">
    <link rel="stylesheet" href="assets/css/dashforge.demo.css">

</head>

<body data-spy="scroll" data-target="#navSection" data-offset="120">

    <?php include('header.php'); ?>
    <?php include('sidemenu.php'); ?>


    <div class="content content-components">
        <div class="container">

            <h1 class="df-title">Registered Student list</h1>


            <div class="df-example demo-table">
            <form action="" method="post">
                <div class="row">
                    <div class="col-md-7">
                    </div>
                    <div class="col-md-3"><a href="#" id="check" class="btn btn-primary" data-val="0">Check / Uncheck all</a></div>
                    <div class="col-md-2"><button type="submit" class="btn btn-danger" name="delete">Delete selected</button></div>
                </div>
                <br><br>


                    <table class="table">
                        <thead>
                           <tr>
                    <th class="wd-5p">S.no</th>
                    <th class="wd-5p">Id</th>
                    <th class="wd-15p">Date</th>
                    <th class="wd-20p">Name</th>
                    <th class="wd-15p"> Contact details</th>



                </tr>
                        </thead>
                        <tbody>
                             <?php
                $i=1;
                $b=mysqli_query($con,"select * from `candidate_registre` ORDER BY `id` DESC");
                while($a=mysqli_fetch_array($b))
                {
                    echo ' <tr>
                    <td><input name="data[]" value="' . $a['id'] . '" type="checkbox" class="checkb" checked/> '.$i.'</td>
                    <td>AMB20'.$a['id'].'</td>
                    <td>'.$a['date'].'</td>
                    <td>'.$a['name'].'</td>
                    <td>Email - '.$a['email'].'<br>Mobile no. - '.$a['mobile'].'<br>Password - '.$a['password'].'</td>


                    </tr>';
                    $i++;
                }
                ?>

                        </tbody>
                    </table>

                </form>
            </div>
        </div>



        <?php include('footer.php'); ?>



        <script src="lib/jquery/jquery.min.js"></script>
        <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="lib/feather-icons/feather.min.js"></script>
        <script src="lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
        <script src="lib/prismjs/prism.js"></script>
        <script src="lib/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="lib/datatables.net-dt/js/dataTables.dataTables.min.js"></script>
        <script src="lib/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="lib/datatables.net-responsive-dt/js/responsive.dataTables.min.js"></script>
        <script src="lib/select2/js/select2.min.js"></script>

        <script src="assets/js/dashforge.js"></script>
        <script>
            $(function() {
                'use strict';

                $('#example1').DataTable({
                    language: {
                        searchPlaceholder: 'Search...',
                        sSearch: '',
                        lengthMenu: '_MENU_ items/page',
                    }
                });

                $('#example2').DataTable({
                    responsive: true,
                    language: {
                        searchPlaceholder: 'Search...',
                        sSearch: '',
                        lengthMenu: '_MENU_ items/page',
                    }
                });

                $('#example3').DataTable({
                    'ajax': 'assets/data/datatable-arrays.txt',
                    language: {
                        searchPlaceholder: 'Search...',
                        sSearch: '',
                        lengthMenu: '_MENU_ items/page',
                    }
                });

                $('#example4').DataTable({
                    'ajax': 'assets/data/datatable-objects.txt',
                    "columns": [{
                            "data": "name"
                        },
                        {
                            "data": "position"
                        },
                        {
                            "data": "office"
                        },
                        {
                            "data": "extn"
                        },
                        {
                            "data": "salary"
                        }
                    ],
                    language: {
                        searchPlaceholder: 'Search...',
                        sSearch: '',
                        lengthMenu: '_MENU_ items/page',
                    }
                });

                // Select2
                $('.dataTables_length select').select2({
                    minimumResultsForSearch: Infinity
                });

            });
            $('#check').click(function() {
                var value = $(this).data('val');
                if (value == 0) {
                    $('.checkb').removeAttr('checked');
                    $(this).data('val', '1');
                } else {
                    $('.checkb').attr('checked', 'checked');
                    $(this).data('val', '0');
                }
            });
        </script>
</body>

</html>