<?php 

include'connect.php';
session_start();
$school_id = $_SESSION['SCHOOL_ID'];
$teacher_id = $_SESSION['TEACHER_ID'];
$class_id = $_SESSION['CLASS_ID'];

if(empty($_SESSION['SCHOOL_ID']))
{
    header('location:index.php');
}
else{

$school_id=$_SESSION['SCHOOL_ID'];
$std=" select s.student_id as student_id ,c.class as class, c.section as section, s.student_name as student_name ,s.date_of_birth as date_of_birth,s.address as address,s.email as email,s.class_id as class_id,s.gender as gender from student s,classes c where s.school_id='$school_id' and s.class_id ='$class_id' and s.class_id=c.class_id";
$result=mysqli_query($con,$std) or die(mysqli_error);
$res=mysqli_fetch_array($result);
$counter=mysqli_num_rows($result);
}
include "teacher-navbar.php";
?> 






      <!-- partial -->
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">

            <div class="page-header">
            <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title" style="font-size:1.8rem";><?php echo $res['class'].'-'.$res['section']; ?> Class Students</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item" style="font-size:1.2rem";><a href="teacher-dashboard.php">ClassTeacher Dashboard</a></li>
                                <li class="breadcrumb-item active" style="font-size:1.2rem";>Student List</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
    
        
        <table class="table table-striped">
          <thead>
            <tr>
            <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Edit Student Details</th>
            </tr>
          </thead>
                                        <tbody>
                                        <?php
                                        foreach ($result as $data) 
                                        {
                                            $stdname=$data['student_name'];
                                            $std_id=$data['student_id'];
                                            $date=$data['date_of_birth'];
                                            $class_id=$data['class_id'];
                                            $gender=$data['gender'];
                                            $address=$data['address'];
                                            $mail=$data['email'];
                                            echo
                                            '<tr>
                                                <td>'.$std_id.'</td>
                                                <td>
                                                <a href="teacher-student-view.php?student_id='.$std_id.'">'.$stdname.'</a>
                                                </td>
                                                <td><a href="teacher-classteacher-student-edit-profile.php?student_id='.$std_id.'&student_name='.$stdname.'&dob='.$date.'&class_id='.$class_id.'&gender='.$gender.'&address='.$address.'&email='.$mail.'" class="btn btn-primary">
                                                 <i class="fas fa-edit "></i>Edit Student
                                                </a></td>
                                                <td class="text-end">';
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