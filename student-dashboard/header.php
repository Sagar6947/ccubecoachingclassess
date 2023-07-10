  <?php
  include("config.php");

  ?>
  <header class="navbar navbar-header navbar-header-fixed" style="height:75px;">
    <a href="#" id="mainMenuOpen" class="burger-menu"><i data-feather="menu"></i></a>
    <div class="navbar-brand">
      <a href="courses_owned.php" class="df-logo"><img src="../assets/img/logo.png" style="margin:15px;height:60px"></a>
    </div><!-- navbar-brand -->
    <div id="navbarMenu" class="navbar-menu-wrapper">
      <div class="navbar-menu-header">
        <a href="courses_owned.php" class="df-logo"><img src="../assets/img/logo.png" style="margin:15px;height:60px"></a>
        <a id="mainMenuClose" href="#"><i data-feather="x"></i></a>
      </div><!-- navbar-menu-header -->
      <ul class="nav navbar-menu">

        <li class="nav-label pd-l-20 pd-lg-l-25 d-lg-none">Main Navigation</li>
        <!-- <li class="nav-item"><a href="home.php" class="nav-link"><i data-feather="archive"></i> Dashboard</a></li> -->
        <li class="nav-item"><a href="test-series.php" class="nav-link"><i data-feather="archive"></i> Question Paper</a></li>
        <!-- <li class="nav-item"><a href="test-result.php" class="nav-link"><i data-feather="archive"></i> Test Results</a> -->
        <!-- </li> -->
        <!-- <li class="nav-item"><a href="pdf.php" class="nav-link"><i data-feather="archive"></i>PDF</a>
        </li> -->
        <li class="nav-item"><a href="../all-courses.php" target="_blank" class="nav-link"><i data-feather="archive"></i> Classes</a></li>
        <li class="nav-item"><a href="courses_owned.php" class="nav-link"><i data-feather="archive"></i> Classes Purchased</a></li>
        <li class="nav-item"><a href="profile-of-students.php" class="nav-link"><i data-feather="archive"></i> Profile</a></li>

        <!--<li class="nav-item"><a href="query-with-ambition.php" class="nav-link"><i data-feather="archive"></i> Query-->
        <!--                    Us</a></li>-->
        <li class="nav-item"><a href="logout.php" class="nav-link"><i data-feather="archive"></i> Logout</a></li>

      </ul>
    </div><!-- navbar-menu-wrapper -->
    <div class="navbar-right">

      <div class="dropdown dropdown-profile">
        <a href="#" class="dropdown-link" data-toggle="dropdown" data-display="static">
          <div class="avatar avatar-sm"><img src="user-pic/<?php echo $row['img']; ?>" class="rounded-circle" alt="" ></div>
        </a><!-- dropdown-link -->
        <div class="dropdown-menu dropdown-menu-right tx-13">
          <div class="avatar avatar-lg mg-b-15"><img src="user-pic/<?php echo $row['img']; ?>" class="rounded-circle" alt=""></div>
          <h6 class="tx-semibold mg-b-5">Student Dashboard</h6>
          <p class="mg-b-25 tx-12 tx-color-03">Student</p>
            <a href="change-password.php?id=<?= $row['id'] ?>" class="dropdown-item"><i data-feather="edit-3"></i> Change Password</a>
          <div class="dropdown-divider"></div>
          <a href="help-center.php" class="dropdown-item"><i data-feather="help-circle"></i> Help Center</a>
          <a href="logout.php" class="dropdown-item"><i data-feather="log-out"></i>Sign Out</a>
        </div><!-- dropdown-menu -->
      </div><!-- dropdown -->
    </div><!-- navbar-right -->
  </header><!-- navbar -->