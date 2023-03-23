<?php
session_start();
include 'connect.php';
if(empty($_SESSION['TEACHER_ID'])){
    header('location:index.php');

}
else
{
   $stat="select * from cocircular";
   $run=mysqli_query($con,$stat);
   $student_id=$_GET['student_id'];
   $class_id = $_GET['cid'];  
   $student_name = $_GET['sname']; 
   $st="select sum(marks) as sum from cocircular_marks where student_id='$student_id'";
   $r1=mysqli_query($con,$st);
   $r2=mysqli_fetch_assoc($r1);
   if(!empty($_POST['submit']))
   {
      $cocircular_id=$_POST['cocircular_id'];
      $marks=$_POST['marks'];
      $school_id=$_SESSION['SCHOOL_ID'];
      $stat1="SELECT marks FROM cocircular_marks WHERE student_id='$student_id' AND cocircular_id='$cocircular_id' AND school_id='$school_id'";
      $run1=mysqli_query($con,$stat1);
      $res=mysqli_fetch_array($run1);
      $score=$res['marks'];
      if(!empty($res))
      {
        $total=$score+$marks;
        $stat2="UPDATE `cocircular_marks` SET `marks`= $total WHERE student_id='$student_id' AND cocircular_id='$cocircular_id' and class_id='$class_id'";
        $run2=mysqli_query($con,$stat2);
			header('location:teacher-classteacher-add-co-curricular.php?student_id='.$student_id.'&cid='.$class_id.'&sname='.$student_name.'.php');
      }
      else
      {
        $stat2="INSERT INTO `cocircular_marks`(`student_id`, `class_id`, `school_id`, `cocircular_id`, `marks`)  VALUES ('$student_id','$class_id','$school_id','$cocircular_id','$marks')";
        $run2=mysqli_query($con,$stat2);
		header('location:teacher-classteacher-add-co-curricular.php?student_id='.$student_id.'&cid='.$class_id.'&sname='.$student_name.'.php');
      }

   }
}
include "teacher-navbar.php";
?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
          <div class="page-header">
          <div class="row align-items-center">
                    <div class="row align-items-center">    
                    <div class="col">
                        <h3 class="page-title">Teacher Adding Co-Curricular Activities Score for Student</h3>
                        <ul class="breadcrumb">
                        <li class="breadcrumb-item">STUDENT</li>
                        <li class="breadcrumb-item active">Add Performance Marks</li></ul><br>
                        <div class="row">
                        <div class="col-md-12">
                        <h4><b>Name of the Student : </b><?php echo $student_name.'('.$student_id.')';?></h4>
						<h4><b>Current points : </b>
						<?php 
						if(!empty($r2['sum']))
						{echo $r2['sum'];}
						else{ echo '0'; }
						?></h4>
                        </div></div>
                </div>
            </div>

            <div class="row">
						<div class="col-sm-12">
						
							<div class="card">
								<div class="card-body">
									<form  method="post" class="form-validation">
										<div class="row">
											<div class="co-l-12">
												<h5 class="form-title"><span>Add Performance</span></h5>
											</div>
                                          
											<!-- <div class="col-12 col-sm-6">  
												<div class="form-group">
													<label>Student ID</label>
													<input type="text" name="student_id" value="#" disabled="disabled" class="form-control">
												</div>
											</div> -->
											<!-- <div class="col-12 col-sm-6">
												<div class="form-group">
													<label>Last Name</label>
													<input type="text" class="form-control">
												</div>
											</div> -->
                                            <div class="col-12 col-sm-6"> 
                                            <div class="form-group">
                                                    <label>Curricular Activities</label>
                                                    <?php
                                                        echo '<select name="cocircular_id"  id="cocircular_id" class="form-control form-select" required>
                                                                <option value="">Select Co-Currriculum</option>';
                                                                while($data = mysqli_fetch_assoc($run))
                                                                {
                                                                    echo '<option value='.$data['cocircular_id'].'>'.$data['cocircular_id'].'-'.$data['cocircular_name'].'</option>';
                                                                }
                                                                echo '</select></td>';
                                                         ?>
                                                </div>
                                                            </div>
											<div class="col-12 col-sm-6">  
												<div class="form-group">
													<label>Score</label>
													<input type="number" name="marks" class="form-control">
												</div>
											</div>
											
											</div>
											
											</div>
											
											</div>
										
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

<!-- /Page Wrapper -->
</div>
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
teacher-classteacher-add-co-curricular-1.php
Displaying teacher-classteacher-add-co-curricular-1.php.