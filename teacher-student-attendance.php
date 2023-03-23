
<?php

include 'conn.php';

session_start();

$school_id = $_SESSION['SCHOOL_ID']; 
$teacher_id = $_SESSION['TEACHER_ID'];
$class_id = $_SESSION['CLASS_ID'];

$sql = "select su.subject_id as sid, su.subject_name as subject_name,c.class as class,c.section as section,scst.class_id as class_id 
		from schoolwise_class_subject_teachers as scst, subjects su ,classes c where scst.school_id = '$school_id' 
		and scst.teacher_id = '$teacher_id' and su.subject_id = scst.subject_id and scst.class_id = c.class_id";

$run = mysqli_query($con, $sql);


?>
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
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!----<link rel="stylesheet" href="assets/css/style1.css">

    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.ico" >
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="index.html">srkr</a>
          <a class="navbar-brand brand-logo-mini" href="index.html"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
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
              <a class="nav-link" href="#">
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
                 <img src="assets/images/faces/face1.jpg" alt="profile">
                  <span class="login-status online"></span>
                  <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2"><span style="font-size: 1rem;"><?php echo $student_name ?></span></span>
                  <span class="text-secondary text-small"style="font-size:0.894rem">Student</span>
                </div>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.html">
                <span class="menu-title"><span style="font-size: 1rem;">Dashboard</span></span>
                <i class="mdi mdi-home menu-icon "></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="marklist.html">
                <span class="menu-title"><span style="font-size: 1rem;">MarkList</span></span>
                <i class="mdi mdi-home menu-icon "></i>
              </a>
            </li>

            
            <li class="nav-item">
              <a class="nav-link" href="studentview.html">
                <span class="menu-title" style="font-size: 1rem;" >Student View</span>
                <i class="mdi mdi-contacts menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="subjectlist.php">
                <span class="menu-title" style="font-size: 1rem;">Subject List</span>
                <i class="mdi mdi-content-paste menu-icon "></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="reportcard.html">
                <span class="menu-title" style="font-size: 1rem;">Report Card</span>
                <i class="mdi mdi-chart-bar menu-icon"></i>
              </a>
              <li class="nav-item">
              <a class="nav-link" href="learningoutcome.php">
                <span class="menu-title" style="font-size: 1rem;">Learning Outcome Assesment</span>
              </a>

            </li>
            <li class="nav-item">
              <a class="nav-link" href="feedback.html">
                <span class="menu-title" style="font-size: 1rem;">Feed Back</span>
                <i class="mdi mdi-table-large menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="futureanalysis.html">
                <span class="menu-title" style="font-size: 1rem;">Future Analysis</span>
                <i class="mdi mdi-table-large menu-icon"></i>
              </a>
            </li>

          </ul>
        </nav>
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
             
            <div class="row">
						<div class="col-sm-12">
						
							<div class="card card-table">
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-hover table-center mb-0 datatable">
											<thead>
												<tr>
													<th>STUDENT ID</th>
													<th>STUDENT NAME</th>
													<th>DOB</th>
													<th>GENDER</th>
													<th>Email</th>
                          <th>ATTENDANCE<th>
												</tr>
											</thead>
											<tbody>
													<?php
													$query1="SELECT s.student_id as student_id,s.school_id as school_id, s.student_name as student_name, 
													s.date_of_birth as date_of_birth, s.gender as gender, s.email as email, s.address as address,sc.school_name as school_name,
													c.class as class, c.section as section,
													 s.class_id as class_id FROM student s,classes c,school_info sc WHERE c.class_id=s.class_id and sc.school_id=s.school_id and s.class_id='$class_id' and s.school_id='$school_id'";
													$run1=mysqli_query($con,$query1);
													while($res1=mysqli_fetch_assoc($run1))
													{
														echo 
														'<tr><td>'.$res1['student_id'].'</td>
														<td><a href="teacher-student-view.php?student_id='.$res1['student_id'].'">'.$res1['student_name'].'</a></td>
														<td>'.$res1['date_of_birth'].'</td>
														<td>'.$res1['gender'].'</td>
														<td>'.$res1['email'].'</td>
                            <td><a href="teacher-student-attendance1.php?student_id='.$res1['student_id'].'">
                              <button>submit</button></a>
                          </form>
                        <td>
														</tr>';}?>
											</tbody>
										</table>
									</div>
								</div>
							</div>							
						</div>					
					</div>	
