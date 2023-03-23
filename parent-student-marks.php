<?php

include 'connect.php';

session_start();

$student_id = $_SESSION['STUDENT_ID'];
include "parents-navbar.php";
?>
        <div class="main-panel">
          <div class="content-wrapper">
               
        <div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title" style="font-size :1.8rem";>Mark List</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a style="font-size :1.2rem"; href="parent-dashboard.php">Dashboard</a></li>
									<li class="breadcrumb-item active" style="font-size :1.2rem";>Mark List</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<?php
                            $eid = array("UT1","FA1","UT2","FA2","AEE");
                            foreach($eid as $id)
                            {
                                $i = 0;
                                $query="select S.subject_name as sn, M.marks as mm from exam_marks M,subjects S where M.student_id='$student_id' and M.subject_id=S.subject_id and eid='$id'";
                                $result=mysqli_query($con,$query) or die(mysqli_error);
                                $query1="select ename from exam where eid='$id'";
                                $result2=mysqli_query($con,$query1) or die(mysqli_error);
                                $res = mysqli_fetch_assoc($result2);
                                echo '<div class="col-lg-12 grid-margin stretch-card">
                                <div class="card">
                                  <div class="card-body">
                                    <h3 class="card-title">'.$res['ename'].'</h3>
                                    <table class="table table-striped">
                                      </thead>
                                                            
                                                        <tr>
                                            <th> S.No. </th>
                                            <th> Subject </th>
                                            <th> Marks </th>
                                            
                                                        </tr>
            
                                      </thead>
                                                        <tbody>';
                                
                                                            while($data = mysqli_fetch_array($result))
                                                            {
                                                                echo '
                                                                <tr>
                                                                    <td>'.++$i.'</td>
                                                                    <td>'.$data['sn'].'</td>
                                                                    <td>'.$data['mm'].'</td>
                                                                </tr>';
                                                            }
                                echo '                  
                                                        </tbody>
                                    </table>
                                                
                                </div>
                                </div>
                                </div>';
                            }
                        ?>
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
                        </div>
		
        </div>
		<!-- /Main Wrapper -->
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