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
include "parents-navbar.php";

?>

        <div class="main-panel">
          <div class="content-wrapper">
          <div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title" style="font-size :1.8rem";>Student Details</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a style="font-size :1.2rem"; href="">Student</a></li>
									<li class="breadcrumb-item active" style="font-size :1.2rem";>Student Details</li>
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
											<img src="assets/img/user.jpg" class="me-3 flex-shrink-0" alt="...">
											<div class="media-body flex-grow-1">
												<ul>
                                                    <li>
                                                        <span class="title-span" style="font-size :1.2rem";>Full Name : </span>
                                                        <span class="info-span" style="font-size :1.2rem";><?php echo $run['student_name']; ?></span>
                                                    </li>
                                                    <li>
                                                        <span class="title-span" style="font-size :1.2rem";>CLASS : </span>
                                                        <span class="info-span" style="font-size :1.2rem";> <?php echo $run2['class']; ?></span>
                                                    </li>
                                                    <li>
                                                        <span class="title-span"style="font-size :1.2rem";>SECTION : </span>
                                                        <span class="info-span"style="font-size :1.2rem";><?php echo $run2['section']; ?></span>
                                                    </li>
                                                    <li>
                                                        <span class="title-span"style="font-size :1.2rem";>Email : </span>
                                                        <span class="info-span"style="font-size :1.2rem";><?php echo $run['email']; ?></span>
                                                    </li>
                                                    <li>
                                                        <span class="title-span"style="font-size :1.2rem";>Gender : </span>
                                                        <span class="info-span"style="font-size :1.2rem";><?php
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
                                                        <span class="title-span"style="font-size :1.2rem";>DOB : </span>
                                                        <span class="info-span" style="font-size :1.2rem";><?php echo $run['date_of_birth']; ?></span>
                                                    </li>
                                                </ul>
											</div>
										</div>

										<div class="row mt-3">                                           
										</div>
										
																			<div class="row mt-2">
											<div class="col-md-12">
												<h5 style="font-size :1.2rem";><strong>Permanent Address<strong></h5>
												<p style="font-size :1.2rem";><?php echo $run['address']; ?></p>
											</div>                                            
                                        </div>

                                        <div class="row mt-2">
											<div class="col-md-12">
												<h5 style="font-size :1.2rem";><strong>Present Address</strong></h5>
												<p style="font-size :1.2rem";><?php echo $run['address']; ?></p>
											</div>                                            
                                        </div>
									</div>
								</div>								
							</div>
						</div>
					</div>				
				</div>
				
            </div>



        </div>
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