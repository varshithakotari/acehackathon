<?php
session_start();

include 'connect.php';
 $school_id=$_SESSION['SCHOOL_ID'];
 $teacher_id=$_GET['teacher_id'];
 $name=$_GET['teacher_name'];					
 $dob=$_GET['teacher_dob'];
 $email=$_GET['email'];
 $mob=$_GET['mob'];

if(isset($_POST['submit']))
{
	
	$name = $_POST['name'];
    $school_id=$_SESSION['SCHOOL_ID'];
    $teacher_id=$_POST['teacher_id'];
    $email=$_POST['mail'];
    $dob=$_POST['dob'];
    $mob=$_POST['mob'];

	
	$insert = "UPDATE teacher_info SET teacher_name='$name', teacher_dob= '$dob',teacher_email='$email',teacher_mob='$mob' where teacher_id='$teacher_id'";
	$insert2 = mysqli_query($con,$insert);
  include "admin-navbar.php";
}
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
    
                  
                    <li class="breadcrumb-item active"><span style="font-size: 1.2rem;">Edit Teacher details</span></li>
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
													<input type="text" name="name" class="form-control" value="<?php echo $name ?>">
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
													<input type="text" name="teacher_id" class="form-control" value="<?php echo $teacher_id ?>" disabled>
												</div>
											</div>
									
											<div class="col-12 col-sm-6">
												<div class="form-group">
													<label>Date of Birth</label>
													<div>
														<input type="date" name="dob" class="form-control"value="<?php echo $dob ?>">
													</div>
												</div>
											</div>
										
											<div class="col-12 col-sm-6">
												<div class="form-group">
													<label>Email</label>
													<input type="email" name="mail" class="form-control" value="<?php echo $email ?>">
												</div>
											</div>
                                            <div class="col-12 col-sm-6">
												<div class="form-group">
													<label>Mobile no</label>
													<input type="text" name="mob" class="form-control" value="<?php echo $mob ?>" >
												</div>
											</div>
											<!-- <input type="file" name="file" value="Upload File"> -->
											<div class="col-12">
												<button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
											</div>

										</div>
                                        </form>
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