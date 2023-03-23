<?php
include "connect.php";
session_start();

$school_id = $_SESSION['SCHOOL_ID'] ;
$student_id = $_SESSION['STUDENT_ID'];
$class_id = $_SESSION['CLASS_ID'] ;

$query = mysqli_query($con, "select * from parent_student_assesment where school_id='$school_id' and class_id='$class_id' and student_id='$student_id'");
$count = mysqlI_num_rows($query);

if($count !=0)
{
	echo "<script>alert('Already Given')</script>";
	echo "<script>document.location='parent-dashboard.php'</script>";

}

$sql="select question_id as ai,question from assessment_questions where assessment_id='FA'";
$query=mysqli_query($con,$sql);

if(isset($_POST['submit']))
{
	$sql="select question_id as ai from assessment_questions where assessment_id='FA'";
	$query=mysqli_query($con,$sql);
	foreach($query as $data)
	{
		$d = $data['ai'];
		$mark = $_POST[$d];

		$insert = mysqli_query($con,"INSERT INTO `parent_student_assesment` (`school_id`, `student_id`, `question_id`, `class_id`, `marks`) VALUES ('$school_id', '$student_id', '$d', '$class_id', '$mark')");
	}
	echo "<script>document.location='parent-dashboard.php'</script>";
}
include "parents-navbar.php";
?>
<div class="main-panel">
            <div class="content-wrapper">
            <div class="page-header">
						<div class="row align-items-center">
							<div class="col">
								<h5 class="page-title">Parent-Student-Assessment</h5>
								<ul class="breadcrumb">
									<!-- <li class="breadcrumb-item"><a href="school-admin-section-list.php">Section-list</a></li>
									<li class="breadcrumb-item active">Add Section</li> -->
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					<div class="row">
						<div class="col-sm-12">
						
							<div class="card card-table">
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-hover table-center">
											<thead>
												<tr>
													<th>S No</th>
													<th>Question</th>
													<th>Mark</th>
												</tr>
											</thead>
											<form method="post" action="">
												<tbody>
													<?php
														$i = 0;
														foreach($query as $data)
														{
															echo
															'<tr>
																<td>'.++$i.'</td>
																<td name="'.$data['ai'].'">'.$data['question'].'</td>
																<td>
																	<div class="form-group">
																	<div>
																		<select name="'.$data['ai'].'" class="form-control form-select"required>
																			<option value="">-- Select --</option>
																			<option value=1>1</option>
																			<option value=2>2</option>
																			<option value=3>3</option>
																			<option value=4>4</option>
																			<option value=5>5</option>
																		</select>
																	</div>
																</td>
															</tr>';
														}
													?>
												</tbody>
												
											</form>
                                            
										</table>
                                        <br>
                                        <input type="submit" class="btn btn-primary" name="submit">
									</div>
								</div>
							</div>							
						</div>					
					</div>
				
			</div>
			<!-- /Page Wrapper -->
			
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