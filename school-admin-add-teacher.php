<?php
session_start();

include 'connect.php';
	
 					

if(isset($_POST['submit']))
{
	$name = $_POST['name'];
    $school_id=$_SESSION['SCHOOL_ID'];
    $teacher_id=$_POST['teacher_id'];
    $email=$_POST['mail'];
    $dob=$_POST['dob'];
    $mob=$_POST['mob'];

	
	$insert = "INSERT INTO teacher_info ( school_id,teacher_id,teacher_name, teacher_dob,teacher_email,teacher_mob) 
			VALUES ('$school_id','$teacher_id',  '$name', '$dob','$email','$mob')";
	$insert2 = mysqli_query($con,$insert);

}
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
    
                    <li class="breadcrumb-item"><a href="school-admin-teacher-list.php"><span style="font-size: 1.2rem;">Teachers</span></a></li>
                    <li class="breadcrumb-item active"><span style="font-size: 1.2rem;">Add-teacher</span></li>
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
													<input type="text" name="name" class="form-control">
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
													<label>Teacher Id</label>
													<input type="text" name="teacher_id" class="form-control">
												</div>
											</div>
									
											<div class="col-12 col-sm-6">
												<div class="form-group">
													<label>Date of Birth</label>
													<div>
														<input type="date" name="dob" class="form-control">
													</div>
												</div>
											</div>
										
											<div class="col-12 col-sm-6">
												<div class="form-group">
													<label>Email</label>
													<input type="email" name="mail" class="form-control" >
												</div>
											</div>
                                            <div class="col-12 col-sm-6">
												<div class="form-group">
													<label>Mobile no</label>
													<input type="text" name="mob" class="form-control">
												</div>
											</div>
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
    <script src="assets/js/jquery-3.6.0.min.js"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
		
		<!-- Slimscroll JS -->
		<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

		<!-- Select2 JS -->
		<script src="assets/plugins/select2/js/select2.min.js"></script>

		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
  </body>
</html>

