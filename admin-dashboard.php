<?php session_start();
include "connect.php";
if(empty($_SESSION['SCHOOL_ID'])){
	echo '<script>document.location="school-login.php"</script>';
}else{
	$school_id=$_SESSION['SCHOOL_ID'];
	$sql="select * from school_info where school_id='$school_id'";
	$run = mysqli_query($con,$sql)or die(''._LINE_.'<br>'.mysqli_error($con));
	$run = mysqli_fetch_assoc($run);
	if(!empty($run))
    {
	$school_name=$run['school_name'];
	$s="select count(*) as total from student where school_id='$school_id'";
	$res=mysqli_query($con,$s);
	$res= mysqli_fetch_assoc($res);
	$te="select count(*)  as total from teacher_info where school_id='$school_id'";
	$t=mysqli_query($con,$te);
	$t= mysqli_fetch_assoc($t);
	$cl="select count(*)  as total from schoolwise_class_details  where school_id='$school_id'";
	$c=mysqli_query($con,$cl);
	$c= mysqli_fetch_assoc($c);
	$m="select concat(c.class,c.section) as cls from classes as c,schoolwise_class_details as sc where sc.school_id='$school_id' and sc.class_id=c.class_id";
    $result=mysqli_query($con,$m) or die(mysqli_error);
	foreach($result as $data){
		$r[]=$data['cls'];
	}
   $pass="select count(*) as pass from exam_totals where school_id='$school_id' and eid='AEE' and total>245";
   $pas=mysqli_query($con,$pass);
   $pas=mysqli_fetch_assoc($pas);

   
	$query="SELECT count(*) FROM student where school_id='$school_id' group by class_id";
    $result=mysqli_query($con,$query) or die(mysqli_error);
	foreach($result as $data){
		$r1[]=$data['count(*)'];
	}

	}
}
include "admin-navbar.php";
?>
        
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
            
              <div class="row">
                <div class="col-sm-12">
                  <h3 class="page-title"><span style="font-size: 1.8rem;">Welcome !<?php  echo $school_name ;?></span></h3>
                  <ul class="breadcrumb">
                    <h3><span class="page-title-icon bg-gradient-primary text-white me-2">
                      <i class="mdi mdi-home"></i>
                    </span></h3>
    
                  <li class="breadcrumb-item"><a href="admin-dashboard.php"><span style="font-size: 1.2rem;">Dashboard</span></a></li>
                    <li class="breadcrumb-item active"><span style="font-size: 1.2rem;">Admin Dashboard</span></li>
                  </ul>
                </div>
              </div>
  
  
              
            </div>
            <div class="row">
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-danger card-img-holder text-white">
                  <div class="card-body">
                    <h3 class="font-weight-normal mb-3"> <i class="mdi mdi-book-open-variant "></i></h3>

                    <h2 class="mb-5">Total Students</h2>
                    <h3 id="rank"><span style="font-size: 2.5rem;"><?php echo $res['total'] ;?></span></h3>                  
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-info card-img-holder text-white">
                  <div class="card-body">
                    <h3 class="font-weight-normal mb-3"> <i class="mdi mdi-book-open-variant "></i></h3>

                    <h2 class="mb-5">Total teachers</h2>
                    <h3 id="rank"><span style="font-size: 2.5rem;"><?php echo $t['total'];?></span></h3>                  
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-info card-img-holder text-white">
                  <div class="card-body">
                    <h3 class="font-weight-normal mb-3"> <i class="mdi mdi-book-open-variant "></i></h3>

                    <h2 class="mb-5">Pass Percentage</h2>
                    <h3 id="rank"><span style="font-size: 2.5rem;"><?php echo round(($pas['pass']/$res['total'])*100); echo "%";?></span></h3>                  
                  </div>
                </div>
              </div>
              
              <div class="card">
						 <div class="card-body">
             <h3 class="page-title"> <span style="font-size: 2.0rem;">Number of students in each class </span></h3>
							 <div class="row">
							  <div class="col-md-12">
							  <div class="card-body">
								<canvas id="acscore"></canvas>
									<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
									<script>
										const ctx = document.getElementById('acscore');
										const myChart = new Chart(ctx, {
											type: 'bar',
											data: {
												labels: <?php echo json_encode($r) ?>,
												//echo json_encode($y), 
												datasets: [{
													label: 'No.of Students',
													data:<?php echo json_encode($r1) ?>,
												//echo json_encode($x),

													backgroundColor: [
														'rgba(255, 99, 132, 0.2)',
														'rgba(54, 162, 235, 0.2)',
														'rgba(255, 206, 86, 0.2)',
														'rgba(75, 192, 192, 0.2)',
														'rgba(153, 102, 255, 0.2)',
														'rgba(255, 159, 64, 0.2)'
													],
													borderColor: [
														'rgba(255, 99, 132, 1)',
														'rgba(54, 162, 235, 1)',
														'rgba(255, 206, 86, 1)',
														'rgba(75, 192, 192, 1)',
														'rgba(153, 102, 255, 1)',
														'rgba(255, 159, 64, 1)'
													],
													borderWidth: 1
												}]
											},
											options: {
												//maintainAspectRatio: true,
												scales: {
													y: {
														beginAtZero: true
													}
												}
											}
										});
									</script>
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