<?php
include 'connect.php';
include "super-admin-navbar.php";?>

        
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
    
                  
                    <li class="breadcrumb-item active"><span style="font-size: 1.2rem;">Teachers List</span></li>
                  </ul>
                </div>
              </div>
  
  
              
            </div>
            <div class="row">

						
						
						
			<div class="page-header">
						<div class="row align-items-center">
							
							<div class="col-auto text-end float-end ms-auto">
								<a href="#" class="btn btn-outline-primary me-2"><i class="fas fa-download"></i> Download</a>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
						
							<div class="card card-table">
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-hover table-center mb-0 datatable">
											<thead>
												<tr>
													<th>TEACHER ID</th>
													<th>TEACHER NAME</th>
													<th>SCHOOL NAME</th>
													<th>DOB</th>
													<th>EMAIL</th>
													<th>MOBILE NUMBER</th>
													
												</tr>
											</thead>
											<tbody>
													<?php
													$query1="SELECT t.school_id as school_id,t.teacher_id as teacher_id,t.teacher_name as teacher_name, 
                                                    t.teacher_dob as teacher_dob, t.teacher_email as teacher_email, t.teacher_mob as teacher_mob,s.school_name as school_name FROM teacher_info t,school_info s
													 where s.school_id =	t.school_id";
													$run1=mysqli_query($con,$query1);
													while($res1=mysqli_fetch_assoc($run1))
													{
														echo 
														'<tr><td>'.$res1['teacher_id'].'</td>
														<td><a href="super-admin-teacher-view.php?teacher_id='.$res1['teacher_id'].'">'.$res1['teacher_name'].'</a></td>
														<td>'.$res1['school_name'].'</td>
														<td>'.$res1['teacher_dob'].'</td>
														<td>'.$res1['teacher_email'].'</td>
														<td>'.$res1['teacher_mob'].'</td>
														</tr>';}?>
											</tbody>
										</table>
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
	<!-- jQuery -->
	<script src="assets/js/jquery-3.6.0.min.js"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
		
		<!-- Slimscroll JS -->
		<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
		
		<!-- Datatables JS -->
		<script src="assets/plugins/datatables/datatables.min.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
  </body>
 </html>