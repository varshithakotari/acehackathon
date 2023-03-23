<?php
include 'connect.php';
session_start();
$school_id = $_SESSION['SCHOOL_ID'];
$teacher_id = $_SESSION['TEACHER_ID'];
$class_id = $_SESSION['CLASS_ID'];
include "teacher-navbar.php";
?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
          <div class="page-header">
						<div class="row align-items-center">
							<div class="col">
								<h3 class="page-title" style="font-size:1.8rem";>Students</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"style="font-size:1.2rem";><a href="teacher-dashboard.php">ClassTeacher Dashboard</a></li>
									<li class="breadcrumb-item active" style="font-size:1.2rem";>Students</li>
								</ul>
							</div>
							<div class="col-auto text-end float-end ms-auto">
								<form method="post" action="">
									<button class="btn btn-outline-primary me-2" name="generate" style="font-size:1.2rem";>Genratate</button>
								</form>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
				
					<div class="row">
						<div class="col-sm-12">
						
							<div class="card card-table">
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-hover table-center mb-0">
											<thead>
												<tr>
													<th>STUDENT ID</th>
													<th>STUDENT NAME</th>
													<th>Prediction</th>
												</tr>
											</thead>
											<tbody>
												<?php
													if(isset($_POST['generate']))
													{
														$query1="SELECT s.student_id as student_id,s.school_id as school_id, s.student_name as student_name, 
														s.date_of_birth as date_of_birth, s.gender as gender, s.email as email, s.address as address,sc.school_name as school_name,
														c.class as class, c.section as section,s.class_id as class_id FROM test2.student s,test2.classes c,test2.school_info sc WHERE
														c.class_id=s.class_id and sc.school_id=s.school_id and s.class_id='$class_id' and s.school_id='$school_id'";
														$run1=mysqli_query($con,$query1);
														$j = 0;
														while($res1=mysqli_fetch_assoc($run1))
														{
															$sid = $res1['student_id'];
															$marks = array(0,0,0);
															$query2 = "select total from test3.exam_totals where student_id='$sid' order by year asc";
															$run2=mysqli_query($con,$query2);
															$i = 0;
															while($res2=mysqli_fetch_assoc($run2))
															{
																$marks[$i] = $res2['total'];
																$i++;																	
															}
															echo '
																<script>
																	generate('.$marks[0].','.$marks[1].','.$marks[2].');
																	function generate(a,b,c) {
																		var xmlhttp=new XMLHttpRequest();
																		xmlhttp.onreadystatechange=function() {
																			if (this.readyState==4 && this.status==200) {

																				
																				console.log(this.responseText);
																				
																				window.r = this.responseText ;
																				
																				if(this.responseText == "Improving")
																				{
																					document.getElementById("'.$j.'").className = "badge badge-success";
																					document.getElementById("'.$j.'").innerHTML=this.responseText;

																				}
																				else if (this.responseText == "Poor")
																				{
																					document.getElementById("'.$j.'").className = "badge badge-danger";
																					document.getElementById("'.$j.'").innerHTML=this.responseText;

																				}
																				else if (this.responseText == "Degrading"){
																					document.getElementById("'.$j.'").className = "badge badge-danger";
																					document.getElementById("'.$j.'").innerHTML=this.responseText;
																				}
																				else{
																					document.getElementById("'.$j.'").className = "badge badge-info";
																					document.getElementById("'.$j.'").innerHTML=this.responseText;
																				}
																																								}
																		}
																		xmlhttp.open("GET","https://stdpyml.herokuapp.com/?m1="+a+"&m2=1&m3="+b+"&m4=1&m5="+c+"&m6=1",true);
																		xmlhttp.send();
																	}
															
															</script>';

															echo 
															'<tr><td>'.$res1['student_id'].'</td>
															<td>'.$res1['student_name'].'</td>
															<td><a href="teacher-classteacher-predict-list-view.php?sid='.$res1['student_id'].'"><span id="'.$j.'" class="badge badge-success"></span></a></td>
															</tr>';
															$j++;
														}
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
			
			</div>
			<!-- /Page Wrapper -->
			
        </div>
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
