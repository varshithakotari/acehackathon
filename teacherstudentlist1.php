<?php
include 'connect.php';

session_start();
include "teacher-navbar.php";
$school_id = $_SESSION['SCHOOL_ID'];
$teacher_id = $_SESSION['TEACHER_ID'];
$class_id = $_SESSION['CLASS_ID'];
?>






  <body>
    
   

        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">

            <div class="page-header">
            <div class="row align-items-center">
							<div class="col">
								<h3 class="page-title" style="font-size:1.8rem";>Students</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item" style="font-size:1.2rem";><a href="teacher-dashboard.php">ClassTeacher Dashboard</a></li>
									<li class="breadcrumb-item active" style="font-size:1.2rem";>Students</li>
								</ul>
							</div>
							<div class="col-auto text-end float-end ms-auto">
								<a href="#" class="btn btn-outline-primary me-2"><i class="fas fa-download"></i> Download</a>
							</div>
						</div>
					</div>
                    
          <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">    
                    <table class="table table-striped">
                      <thead>
                        <tr>
                        <th>STUDENT ID</th>
													<th>STUDENT NAME</th>
													<th>DOB</th>
													<th>GENDER</th>
													<th>Email</th>
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
														</tr>';}?>
											</tbody>
										</table>
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
  </body>
</html>