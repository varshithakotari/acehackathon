<?php

include 'connect.php';
$query="SELECT s.state_id as state_id , s.state_name as state_name from states s";
$query1="SELECT d.district_id as district_id,d.district_name as district_name from districts d";
$run=mysqli_query($con,$query);
$run1=mysqli_query($con,$query1);
if(isset($_POST['add-school']))
{
    $school_id=$_POST['school_id'];
    $school_name=$_POST['school_name'];
    $state_id=$_POST['state'];
    $district_id=$_POST['district'];
    $school_address=$_POST['school_address'];
    $query3="INSERT INTO `school_info`(`school_id`, `state_id`, `district_id`, `school_name`, `school_address`)
     VALUES ('$school_id','$state_id','$district_id','$school_name','$school_address')";
    $run3=mysqli_query($con,$query3);
    if($run3)
    {
        echo" <script>document.location='super-admin-dashboard.php'</script>";
    }
    else
    {
        echo "<script>alert(' not inserted successfully')</script>";   
    }
}
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
    
                  
                    <li class="breadcrumb-item active"><span style="font-size: 1.2rem;">Adding School</span></li>
                  </ul>
                </div>
              </div>
  
  
              
            </div>
            <div class="row">
						
			<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-body">
									<form method="post" class="needs-validation" >
										<h5 class="card-title">School Information</h5>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label>SCHOOL-ID</label>
													<input type="text" name='school_id' id='school_id' class="form-control" required>
												</div>
												<div class="form-group">
													<label>STATE</label>
													<?php
                                                        echo '<select name="state"  id="state" class="form-control form-select" required>
																<option value="">Select States</option>';
																while($data = mysqli_fetch_assoc($run))
																{
																	echo '<option value='.$data['state_id'].'>'.$data['state_id'].'-'.$data['state_name'].'</option>';
																}
																echo '</select>';
                                                         ?>
												</div>
												<div class="form-group">
													<label>DISTRICT</label>
                                                        <?php
                                                        echo '<select name="district"  id="district" class="form-control form-select" required>
																<option value="">Select Districts</option>';
																while($data1 = mysqli_fetch_assoc($run1))
																{
																	echo '<option value='.$data['district_id'].'>'.$data['district_id'].'-'.$data['district_name'].'</option>';
																}
																echo '</select></td>';
                                                         ?>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>SCHOOL-NAME</label>
													<input  name='school_name' id='school_name' type="text" class="form-control" required>
												</div>

												<div class="form-group">
													<label>SCHOOL-ADDRESS</label>
													<textarea type="text" name='school_address' id='school_address' class="form-control" required   ></textarea>
												</div>
											</div>
										</div>
										<div class="text-end">
											<button type="submit" name="add-school" id="add-school" class="btn btn-primary">Submit</button>
										</div>
									</form>
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
	<script src="assets/js/jquery-3.6.0.min.js"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
		
		<!-- Feather Icon JS -->
		<script src="assets/js/feather.min.js"></script>
		
		<!-- Slimscroll JS -->
		<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
		
		<!-- Select2 JS -->
		<script src="assets/plugins/select2/js/select2.min.js"></script>

		<!-- Datepicker Core JS -->
		<script src="assets/plugins/moment/moment.min.js"></script>
		<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
  </body>
 </html>