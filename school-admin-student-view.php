<?php

include 'connect.php';

session_start();

$student_id = $_GET['student_id'];
$school_id  = $_SESSION['SCHOOL_ID'];
$class_id = $_GET['class_id'];

$sql = "select * from student where student_id='$student_id' and school_id='$school_id'";
$run = mysqli_fetch_array(mysqli_query($con, $sql));

$sql2 = "select class,section from classes where class_id='$class_id'";
$run2 = mysqli_query($con, $sql2);
$run2 = mysqli_fetch_assoc($run2);
$sq="select school_name from school_info where school_id='$school_id'";
$ru = mysqli_fetch_assoc(mysqli_query($con,$sq));
$school_name=$ru['school_name'];
include "admin-navbar.php";
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
    
                  
                    <li class="breadcrumb-item active"><span style="font-size: 1.2rem;">About Student</span></li>
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
                                                        <span class="title-span">Student id : </span>
                                                        <span class="info-span"><?php echo $student_id; ?></span>
                                                    </li>
                                                    <li>
                                                        <span class="title-span">Full Name : </span>
                                                        <span class="info-span"><?php echo $run['student_name']; ?></span>
                                                    </li>
                                                    <li>
                                                        <span class="title-span">CLASS : </span>
                                                        <span class="info-span"><?php echo $run2['class']; ?></span>
                                                    </li>
                                                    <li>
                                                        <span class="title-span">SECTION : </span>
                                                        <span class="info-span"><?php echo $run2['section']; ?></span>
                                                    </li>
                                                    <li>
                                                        <span class="title-span">Email : </span>
                                                        <span class="info-span"><?php echo $run['email']; ?></span>
                                                    </li>
                                                    <li>
                                                        <span class="title-span">Gender : </span>
                                                        <span class="info-span"><?php
																					if($run['gender']== 'M')
																					{
																						echo "MALE";
																					} 
																					else
																					{
																						echo "FEMALE";
																					}
																				?></span>
                                                    </li>
                                                    <li>
                                                        <span class="title-span">DOB : </span>
                                                        <span class="info-span"><?php echo $run['date_of_birth']; ?></span>
                                                    </li>
                                                </ul>
											</div>
										</div>

										
										

										
										<div class="row mt-2">
											<div class="col-md-12">
												<h5>Permanent Address</h5>
												<p><?php echo $run['address']; ?></p>
											</div>                                            
                                        </div>

                                        <div class="row mt-2">
											<div class="col-md-12">
												<h5>Present Address</h5>
												<p><?php echo $run['address']; ?></p>
											</div>                                            
                                        </div>
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