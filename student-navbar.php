
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SRKR</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!----<link rel="stylesheet" href="assets/css/style1.css">

    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/logo.jpg" >
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="student-dashboard.php"><img src="assets/images/logo.jpg" alt="logo" height="100%" width="10%" />SRKR</a>
          <a class="navbar-brand brand-logo-mini" href="student-dashboard.php"><img src="assets/images/logo.jpg" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
              
            <li class="nav-item d-none d-lg-block full-screen-link">
              <a class="nav-link">
                <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
              </a>
            </li>
            
            <li class="nav-item nav-logout d-none d-lg-block">
              <a class="nav-link" href="logout.php">
                <i class="mdi mdi-power"></i>
              </a>
            </li>
            <li class="nav-item nav-settings d-none d-lg-block">
              <a class="nav-link" href="#">
                <i class="mdi mdi-format-line-spacing"></i>
              </a>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar" style="font-family: 'Poppins', sans-serif;">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="nav-profile-image">
                 <img src="https://www.shutterstock.com/image-photo/male-high-school-student-studying-260nw-182148719.jpg" alt="profile">
                  <span class="login-status online"></span>
                  <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2"><span style="font-size: 0.8rem;"><?php echo $_SESSION['student_name'] ?></span></span>
                  <span class="text-secondary text-small"style="font-size:1rem">Student</span>
                </div>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="student-dashboard.php">
                <span class="menu-title"><span style="font-size: 1.2rem;">Dashboard</span></span>
                <i class="mdi mdi-home menu-icon "></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="student-marklist.php">
                <span class="menu-title"><span style="font-size: 1.2rem;">MarkList</span></span>
                <i class="mdi mdi-content-paste menu-icon "></i>
              </a>
            </li>

            
            <li class="nav-item">
              <a class="nav-link" href="student-studentview.php">
                <span class="menu-title" style="font-size: 1.2rem;" >Student View</span>
                <i class="mdi mdi-contacts menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="student-subjectlist.php">
                <span class="menu-title" style="font-size: 1.2rem;">Subject List</span>
                <i class="mdi mdi-content-paste menu-icon "></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="student-reportcard.php">
                <span class="menu-title" style="font-size: 1.2rem;">Report Card</span>
                <i class="mdi mdi-chart-bar menu-icon"></i>
              </a>
             <!-- <li class="nav-item">
              <a class="nav-link" href="learningoutcome.php">
                <span class="menu-title" style="font-size: 1.2rem;">Learning Outcomes</span>
                <i class="mdi mdi-book-open menu-icon"></i>
              </a>

            </li>  -->
            <li class="nav-item">
              <a class="nav-link" href="backback.html">
                <span class="menu-title" style="font-size: 1.2rem;">Feed Back</span>
                <i class="mdi mdi-table-large menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="futureanalysis.html">
                <span class="menu-title" style="font-size: 1.2rem;">Future Analysis</span>
                <i class="mdi mdi-table-large menu-icon"></i>
              </a>
            </li>

          </ul>
        </nav>
