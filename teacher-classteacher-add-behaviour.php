<?php
    session_start();
    include'connect.php';
    $class_id = $_GET['cid'];
    $student_id = $_GET['sid'];
    $school_id = $_SESSION['SCHOOL_ID'];
    $teacher_id = $_SESSION['TEACHER_ID'];
    $student_name = $_GET['sname'];
    $query="select classroom_behaviour from behaviour_points where student_id='$student_id' and school_id='$school_id'";
    $result=mysqli_query($con,$query);
    $details=mysqli_fetch_assoc($result);
    $oldbehave=(int)$details['classroom_behaviour'];
    $points = 0;
    $points = $oldbehave;
    if(isset($_POST['submit']))
    {
        $nd = 0;
        $nc = 0;
        $nb=$_POST['behave'];
        $re=$_POST['reason'];
        $oldbehave=(int)$oldbehave+(int)$nb;
        $points=$oldbehave;
 
        $query2="update behaviour_points set classroom_behaviour='$oldbehave'
        where student_id='$student_id' and school_id='$school_id'";
        $result2=mysqli_query($con,$query2) or die(mysqli_error);
        if($result2){
             $qu="INSERT INTO `log_classteacher_addbehavior`(`student_id`, `teacher_id`, `points`, `purpose`) 
             VALUES ('$student_id','$teacher_id','$nb','$re')";
             $re=mysqli_query($con,$qu) or die(mysqli_error);
             echo "<script>header.location='teacher-classteacher-add-behaviour.php?sid=$student_id&
             cid=$class_id&sname=$student_name'</script>";
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
                        <h3 class="page-title">Teacher Adding Peformance Score for Student </h3>
                        <ul class="breadcrumb">
                        <li class="breadcrumb-item">STUDENT</li>
                        <li class="breadcrumb-item active">Add Performance Marks</li></ul><br>
                        <div class="row">
                        <div class="col-md-12">
                        <h4><b>Name of the Student : </b><?php echo $student_name.'('.$student_id.')';?></h4>
                        <h4><b>Current Student Points : </b><?php echo $points;?></h4></div></div>
                </div>
            </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <form method="post">
                    <div class="row">
                        <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Classroom Behaviour Points</label>
                                    <input type="number"  name="behave" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6 ">
                                <div class="form-group">
                                    <label>Purpose For Adding Points</label>
                                    <input list="reasons" name="reason" id="reason" class="form-control">
                                    <datalist id="reasons">
                                        <option  value="Good behaviour in the class">
                                        <option  value="attentiveness in the class">
                                        <option value="Not so attentive in the class">
                                        <option  value="Rude behaviour in the class">
                                        <option  value="Well dressed">
                                    </datalist>
                                </div>
                            </div>
                        </div>

                     <div class="col-12">
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                     </div>
                    </div>
                </form>
            </div>
        </div>
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




                    
                