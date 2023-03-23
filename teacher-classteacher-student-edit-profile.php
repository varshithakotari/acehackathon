<?php
session_start();

include 'connect.php';
	
 $school_id=$_SESSION['SCHOOL_ID'];
 $stdname=$_GET['student_name'];
 $std_id=$_GET['student_id'];
 $dob=$_GET['dob'];
 $class_id=$_GET['class_id'];
 $gender=$_GET['gender'];
 $address=$_GET['address'];
 $mail=$_GET['email'];				
 

if(isset($_POST['submit']))
{

	$name = $_POST['name'];
	$class_id = $_POST['classid'];
    $student_id=$_POST['student_id'];
    $email=$_POST['mail'];
    $dob=$_POST['dob'];
    $gender=$_POST['gender'];
    $ads=$_POST['ads'];

	
	$insert = "UPDATE student SET student_name='$name', date_of_birth='$dob', gender='$gender',email='$email',address='$ads',class_id='$class_id' where student_id='$std_id' ";
	$insert2 = mysqli_query($con,$insert);
    if($insert2)
    {
        echo" <script>document.location='teacher-classteacher-students-edit.php'</script>";
    }
  
}

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
              <a class="nav-link" href="teacherindex.php">
                <span class="menu-title"><span style="font-size: 1.2rem;">Dashboard</span></span>
                <i class="mdi mdi-home menu-icon "></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic2" aria-expanded="false" aria-controls="ui-basic2">
                <span class="menu-title" style="font-size: 1.2rem;">Student List</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-crosshairs-gps menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic2">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" style="font-size: 1rem;"href="studentlist.php">Students</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title"style="font-size: 1.2rem;">Teacher</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-crosshairs-gps menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link"style="font-size: 1rem;" href="teacherview.php">Teacher View</a></li>
                  <li class="nav-item"> <a class="nav-link"style="font-size: 1rem;" href="teacherclass.php">Teacher Class</a></li>
                </ul>
              </div>
            </li>

        
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic1" aria-expanded="false" aria-controls="ui-basic1">
                <span class="menu-title"style="font-size: 1.2rem;">Student Assesments</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-crosshairs-gps menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic1">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" style="font-size: 1rem;"href="classroomdecorum.php">Classroom Decorum</a></li>
                  <li class="nav-item"> <a class="nav-link"style="font-size: 1rem;" href="learningoutcome.php">Learning Outcomes</a></li>
                </ul>
              </div>
            </li>
 
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic4" aria-expanded="false" aria-controls="ui-basic4">
                <span class="menu-title"style="font-size: 1.2rem;">My Class</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-crosshairs-gps menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic4">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" style="font-size: 1rem;"href="teacherstudentlist1.php">Student List</a></li>
                  <li class="nav-item"> <a class="nav-link"style="font-size: 1rem;" href="teacher-classteacher-students-edit.php">Student Edit</a></li>
                </ul>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic5" aria-expanded="false" aria-controls="ui-basic5">
                <span class="menu-title"style="font-size: 1.2rem;">Co-Curricular Activites</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-crosshairs-gps menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic5">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link"style="font-size: 1.0rem;" href="studentedit.php">Add Co-curricular Activites</a></li>
                </ul>
              </div>
            </li>
    
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic6" aria-expanded="false" aria-controls="ui-basic6">
                <span class="menu-title"style="font-size: 1.2rem;">Student Progress</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-crosshairs-gps menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic6">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link"style="font-size: 1.0rem;" href="studentedit.php">Add Co-curricular Activites</a></li>
                </ul>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic7" aria-expanded="false" aria-controls="ui-basic7">
                <span class="menu-title"style="font-size: 1.2rem;">Exam</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-crosshairs-gps menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic7">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link"style="font-size: 1.0rem;" href="studentedit.php">Create Exam</a></li>
                </ul>
              </div>
            </li>

          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
            <div class="row align-items-center">
							<div class="col">
								<h3 class="page-title">Edit Student Profile</h3>
								<ul class="breadcrumb">
								
                                    <li class="breadcrumb-item"><a href="teacherindex.php">ClassTeacher Dashboard</a></li>
									<li class="breadcrumb-item"><a href="teacher-classteacher-students-edit.php">Student List</a></li>
									<li class="breadcrumb-item active">Edit Student Profile</li>
								</ul>
							</div>
						</div>
					</div>


                    <div class="row">
						<div class="col-sm-12">
						
							<div class="card">
								<div class="card-body">
									<form action="" method="post">
										<div class="row">
											<div class="co-l-12">
												<h5 class="form-title"><span>Student Information</span></h5>
											</div>
                                          
											<div class="col-12 col-sm-6">  
												<div class="form-group">
													<label>Name</label>
													<input type="text" name="name" class="form-control" value="<?php echo $stdname ?>" >
												</div>
											</div>
											<!-- <div class="col-12 col-sm-6">
												<div class="form-group">
													<label>Last Name</label>
													<input type="text" class="form-control">
												</div>
											</div> -->
											<div class="col-12 col-sm-6">  
												<div class="form-group">
													<label>Student Id</label>
													<input type="text" name="student_id" class="form-control" value="<?php echo $std_id ?>" disabled>
												</div>
											</div>
											<div class="col-12 col-sm-6">
												<div class="form-group">
													<label>Gender</label>
													<input type="text" name="gender" class="form-control" value="<?php echo $gender ?>">
												</div>
											</div>
											<div class="col-12 col-sm-6">
												<div class="form-group">
													<label>Date of Birth</label>
													<div>
														<input type="date" name="dob" class="form-control" value="<?php echo $dob ?>">
													</div>
												</div>
											</div>
											<div class="col-12 col-sm-6">
												<div class="form-group">
													<label>Class_id</label>
													<input type="text" name="classid" class="form-control" value="<?php echo $class_id ?>">
												</div>
											</div>
											<div class="col-12 col-sm-6">
												<div class="form-group">
													<label>Email</label>
													<input type="email" name="mail" class="form-control" value="<?php echo $mail ?>">
												</div>
											</div>
                                            <div class="col-12 col-sm-6">
												<div class="form-group">
													<label>address</label>
													<input type="text" name="ads" class="form-control" value="<?php echo $address ?>">
												</div>
											</div>
											<!-- <input type="file" name="file" value="Upload File"> -->
											<div class="col-12">
												<button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
											</div>

										</div>
                                        </form>
								</div>
							</div>							
						</div>					
					</div>					
				</div>				
			</div>

            
            

          

          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <!-- End custom js for this page -->
  </body>
</html>