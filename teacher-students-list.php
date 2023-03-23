<?php
session_start();

include 'connect.php';
include "teacher-navbar.php";



$school_id = $_SESSION['SCHOOL_ID']; 
$teacher_id = $_SESSION['TEACHER_ID'];

$sql = "select su.subject_id as sid, su.subject_name as subject_name,c.class as class,c.section as section,scst.class_id as class_id 
		from schoolwise_class_subject_teachers as scst, subjects su ,classes c where scst.school_id = '$school_id' 
		and scst.teacher_id = '$teacher_id' and su.subject_id = scst.subject_id and scst.class_id = c.class_id";

$run = mysqli_query($con, $sql);

?>








        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">

            <div class="page-header">
            <div class="row align-items-center">
							<div class="col">
								<h3 class="page-title"style="font-size: 1.5rem;">Classwise Students List</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"style="font-size: 1.1rem;"><a href="teacher-dashboard.php">Teacher Dashboard</a></li>
									<li class="breadcrumb-item active"style="font-size: 1.1rem;">Ongoing Classes</li>
								</ul>
							</div>
						</div>
					</div>
   
                <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    
                    <table class="table table-striped">
                      <thead>
                        <tr>
                        <th style="font-size:1.0rem";>Subject Teaching</th>
						<th style="font-size:1.0rem";>Class-Section</th>
                      </thead>
                      <tbody>
                          <?php
													while($run1 = mysqli_fetch_assoc($run))
													{  
                                                        $cid=$run1['class_id'];
														echo '<tr>
															<td>'.$run1['subject_name'].'</td>
															<td><a href="teacher-classwise-students.php?class_id='.$cid.'&school_id='.$school_id.'">'.$run1['class'].'-'.$run1['section'].' Students List</a></td>
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