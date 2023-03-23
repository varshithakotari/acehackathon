<?php

include 'connect.php';

session_start();

$teacher_id = $_GET['teacher_id'];

$sql = "SELECT s.school_id as school_id,s.school_name as school_name, t.teacher_id as teacher_id, t.teacher_name as teacher_name, 
t.teacher_dob as teacher_dob, t.teacher_email as teacher_email, t.teacher_mob as teacher_mob
FROM teacher_info t,school_info s WHERE teacher_id='$teacher_id' and s.school_id = t.school_id";
$run = mysqli_fetch_array(mysqli_query($con, $sql));
$sid=$run['school_id'];
$sql1=" SELECT DISTINCT(s.subject_name) from schoolwise_class_subject_teachers sw,subjects s 
where sw.teacher_id='$teacher_id' and sw.school_id='$sid' and sw.subject_id=s.subject_id ";
$run1 = mysqli_query($con, $sql1);
include "super-admin-navbar.php";
?>

        
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
            
              <div class="row">
                <div class="col-sm-12">
                  
                  <ul class="breadcrumb">
                    <h3><span class="page-title-icon bg-gradient-primary text-white me-2">
                      <i class="mdi mdi-home"></i>
                    </span></h3>
    
                  
                    <li class="breadcrumb-item active"><span style="font-size: 1.2rem;">Teacher Details</span></li>
                  </ul>
                </div>
              </div>
  
  
              
            </div>
            <div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-md-12">
									<div class="about-info">
										
										
										<div class="media mt-3 d-flex">
											
											<div class="media-body flex-grow-1">
												<ul>
												<li>
                                                        <span class="title-span">School id :</span>
                                                        <span class="info-span"><?php echo $run['school_id']; ?></span>
                                                    </li>
                                                    <li>
                                                        <span class="title-span">Teacher Name :</span>
                                                        <span class="info-span"><?php echo $run['teacher_name']; ?></span>
                                                    </li>
                                                    <li>
                                                        <span class="title-span">School Name :</span>
                                                        <span class="info-span"><?php echo $run['school_name']; ?></span>
                                                    </li>
                                                    <li>
                                                        <span class="title-span">Email :</span>
                                                        <span class="info-span"><?php echo $run['teacher_email']; ?></span>
                                                    </li>
                                                    <li>
                                                        <span class="title-span">DOB :</span>
                                                        <span class="info-span"><?php echo $run['teacher_dob']; ?></span>
                                                    </li>
                                                    <li>
                                                        <span class="title-span">Mobile Number :</span>
                                                        <span class="info-span"><?php echo $run['teacher_mob']; ?></span>
                                                    </li>
                                                    
                                                </ul>
											</div>
										</div>

										<div class="row mt-3">                                           
										</div>
										
								
										
									</div>
								</div>								
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 col-lg-6">
						
							
		<!-- /Main Wrapper -->
		
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
	<!-- jQuery -->
	<script src="assets/js/jquery-3.6.0.min.js"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
		
		<!-- Slimscroll JS -->
        <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
		
		<!-- Custom JS -->
		<script  src="assets/js/script.js"></script>
  </body>
 </html>