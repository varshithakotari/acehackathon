<?php

include 'connect.php';

session_start();

$student_id = $_SESSION['STUDENT_ID'];
$school_id  = $_SESSION['SCHOOL_ID'];
$class_id = $_SESSION['CLASS_ID'];

$sql = "select * from student where student_id='$student_id' and school_id='$school_id'";
$run = mysqli_fetch_array(mysqli_query($con, $sql));

$sql2 = "select class,section from classes where class_id='$class_id'";
$run2 = mysqli_query($con, $sql2);
$run2 = mysqli_fetch_assoc($run2);
include "student-navbar.php";
?>

<div class="main-panel">
          <div class="content-wrapper">

				
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Student Details</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="">Student</a></li>
									<li class="breadcrumb-item active">Student Details</li>
								</ul>
							</div>
						</div>
					</div>
					
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-md-12">
									<div class="about-info">
										<h4>About Me</h4>
										
										<div class="media mt-3 d-flex">
											<img src="https://www.shutterstock.com/image-photo/male-high-school-student-studying-260nw-182148719.jpg" class="me-3 flex-shrink-0" alt="...">
											<div class="media-body flex-grow-1">
												<ul>
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

										<div class="row mt-3">                                           
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
				
				<!-- Footer -->
				<!-- <footer>
					<p>Copyright © 2020 Dreamguys.</p>					
				</footer> -->
				<!-- /Footer -->
			</div>
			<!-- /Page Wrapper -->
		
        </div>
		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
		
    </body>
</html>