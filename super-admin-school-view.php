<?php

include 'connect.php';

session_start();

$school_id = $_GET['school_id'];
$sql = "select * from school_info where school_id='$school_id'";
$run = mysqli_fetch_array(mysqli_query($con, $sql));
$did=$run['district_id'];
$sql1 = "select * from districts  where district_id='$did'";
$run1 = mysqli_fetch_array(mysqli_query($con, $sql1));

$sql2= mysqli_query($con,"select sc.class_id as class_id,c.class as cname,c.section as 
section from school_info  s , classes c , schoolwise_class_details sc where 
s.school_id ='$school_id' and  sc.class_id = c.class_id and sc.school_id=s.school_id");
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
    
                  
                    <li class="breadcrumb-item active"><span style="font-size: 1.2rem;">School Details</span></li>
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
                                                        <span class="title-span">State id : </span>
                                                        <span class="info-span"><?php echo $run['state_id']; ?></span>
                                                    </li>
													<li>
                                                        <span class="title-span">School id : </span>
                                                        <span class="info-span"><?php echo $run['school_id']; ?></span>
                                                    </li>
                                                    <li>
                                                        <span class="title-span">School Name : </span>
                                                        <span class="info-span"><?php echo $run['school_name']; ?></span>
                                                    </li>
                                                    <li>
                                                        <span class="title-span">District : </span>
                                                        <span class="info-span"><?php echo $run['district_id'].'-'.$run1['district_name'];; ?></span>
                                                    </li>
                                                </ul>
											</div>
										</div>
										<div class="col-12 col-lg-4 col-xl-4 d-flex">				

									<div class="card flex-fill">
										<div class="card-header">
											<h5 class="card-title"><?php echo $run['school_name'];?> Classwise Performance</h5>
										</div>
										<div class="card-body">
											<ul class="activity-feed">
												<?php
													while($run2 = mysqli_fetch_assoc($sql2))
													{
														$cid=$run2['class_id'];
														$cname=$run2['cname'];
														$sec=$run2['section']; 
														$sql3=mysqli_query($con,"SELECT e.student_id  as student_id, max(e.total) as total from exam_totals e,exam m where e.school_id='$school_id' and e.eid=m.eid and m.status=1 and e.class_id='$cid' 
														and total=any(select max(e.total) as total from exam_totals e,exam m where e.school_id='$school_id' and e.eid=m.eid and m.status=1 and e.class_id='$cid')");
														$sql4=mysqli_query($con,"SELECT s.student_name  as student_name from student_info s where s.student_name='$school_id' and e.eid=m.eid and m.status=1 and e.class_id='$cid' 
														and total=any(select max(e.total) as total from exam_totals e,exam m where e.school_id='$school_id' and e.eid=m.eid and m.status=1 and e.class_id='$cid')");
														$run3 = mysqli_fetch_assoc($sql3);
														$sid=$run3['student_id'];
														$sql4=mysqli_query($con,"SELECT s.student_name  as student_name from student s where (s.student_id='$sid') ");
														$run4 = mysqli_fetch_assoc($sql4);
														$sname=$run4['student_name'];
														echo '<li class="feed-item">
														<div class="feed-date">'.$cname.'-'.$sec.'</div>

														<span class="feed-text"><a>class topper id : '.$sid.'</a></span><br>
														<span class="feed-text"><a>Student Name : '.$sname.'</a></span>
														</li>';
													
													}
												?>
											</ul>
										</div>					
									</div>
								</div>
							</div>
				
<!-- 
										<div class="row mt-3">                                           
										</div>
										
										<div class="row follow-sec">
                                            <div class="col-md-4 mb-3">
                                                <div class="blue-box">
                                                    <h3>2850</h3>
                                                    <p>Followers</p>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <div class="blue-box">
                                                    <h3>2050</h3>
                                                    <p>Following</p>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <div class="blue-box">
                                                    <h3>2950</h3>
                                                    <p>Friends</p>
                                                </div>
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
									</div> -->
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