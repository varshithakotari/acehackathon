<?php

include 'connect.php';

session_start();
$subject_id = $_GET['suid'];
$student_id = $_SESSION['STUDENT_ID'];
$school_id  = $_SESSION['SCHOOL_ID'];
$class_id = $_SESSION['CLASS_ID'];

$sql = mysqli_query($con ,"SELECT lo.loc as locs, loc.credits as credits FROM `learning_outcomes_credits` loc , `learning_outcomes` lo where loc.class_id='$class_id' AND loc.school_id='$school_id' and loc.student_id='$student_id' and loc.subject_id='$subject_id' and loc.loc_id = lo.loc_id");
include "student-navbar.php";
?>
		<div class="main-panel">
          <div class="content-wrapper">
					<div class="page-header">
						<div class="row align-items-center">
							<div class="col">
								<h3 class="page-title">Deatailed Learning outcomes view</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="teacher-classteacher-dashboard.php">Dashboard</a></li>
									<li class="breadcrumb-item active"><a href="student-reportcard.php">Student Report</a></li>
									<li class="breadcrumb-item active">Detailed View</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
				
					<div class="row">
						<div class="col-sm-12">
						
							<div class="card card-table">
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-hover table-striped">
											<thead>
												<tr>
													<th>S. No.</th>
													<th>Learning Outcome</th>
													<th>Marks</th>
													<th>Percentage</th>
												</tr>
											</thead>
											<tbody>
                                                <?php
													$i = 0;
													while($run1 = mysqli_fetch_assoc($sql))
													{
														$per=$run1['credits']/5*100;
														echo '<tr>
															<td>'.++$i.'</td>
															<td>'.$run1['locs'].'</td>
															<td>'.$run1['credits'].'</td>
															<td>'.$per.'%</td>
														</tr>';
													}
                                                ?>
                                            </tbody>
										</table>
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