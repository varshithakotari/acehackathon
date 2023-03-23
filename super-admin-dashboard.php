<?php
include 'connect.php';
$query    = "select count(school_id) as sc from school_info";
$run      = mysqli_query($con, $query);
$school_count = mysqli_fetch_assoc($run);

$query1    = "select count(student_id) as stc  from student";
$run1      = mysqli_query($con, $query1);
$student_count = mysqli_fetch_assoc($run1);

$query2    = "select count(teacher_id) as tc from teacher_info";
$run2      = mysqli_query($con, $query2);
$teach_count = mysqli_fetch_assoc($run2);
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
    
                  
                    <li class="breadcrumb-item active"><span style="font-size: 1.2rem;">Super Admin Dashboard</span></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="content container-fluid">
            <div class="row">
						<div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-danger card-img-holder text-white">
                  <div class="card-body">
                    <h3 class="font-weight-normal mb-3"> <i class="mdi mdi-book-open-variant "></i></h3>

                    <h2 class="mb-5">Total Schools</h2>
                    <h3 id="rank"><span style="font-size: 2.5rem;"><?php echo $school_count['sc'];?></span></h3>                 
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-danger card-img-holder text-white">
                  <div class="card-body">
                    <h3 class="font-weight-normal mb-3"> <i class="mdi mdi-book-open-variant "></i></h3>

                    <h2 class="mb-5"> Total Teachers</h2>
                    <h3 id="rank"><span style="font-size: 2.5rem;"><?php echo $teach_count['tc'];?></span></h3>                 
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-danger card-img-holder text-white">
                  <div class="card-body">
                    <h3 class="font-weight-normal mb-3"> <i class="mdi mdi-book-open-variant "></i></h3>

                    <h2 class="mb-5">Total Students</h2>
                    <h3 id="rank"><span style="font-size: 2.5rem;"><?php echo $student_count['stc'];?></span></h3>                  
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
		
		<!-- Slimscroll JS -->
		<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
		
		<!-- Chart JS -->
		<script src="assets/plugins/apexchart/apexcharts.min.js"></script>
		<script src="assets/plugins/apexchart/chart-data.js"></script>

		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
  </body>
 </html>