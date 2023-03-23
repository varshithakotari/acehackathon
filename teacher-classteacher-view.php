<?php


include'connect.php';
session_start();
$school_id = $_SESSION['SCHOOL_ID'];
$teacher_id = $_SESSION['TEACHER_ID'];
$class_id = $_SESSION['CLASS_ID'];

$sql = "SELECT s.school_id as school_id,s.school_name as school_name, t.teacher_id as teacher_id, t.teacher_name as teacher_name, 
t.teacher_dob as teacher_dob, t.teacher_email as teacher_email, t.teacher_mob as teacher_mob
FROM teacher_info t,school_info s WHERE teacher_id='$teacher_id' and s.school_id = t.school_id";
$run = mysqli_fetch_array(mysqli_query($con, $sql));
$sid=$run['school_id'];
$sql1=" SELECT DISTINCT(s.subject_name) from schoolwise_class_subject_teachers sw,subjects s 
where sw.teacher_id='$teacher_id' and sw.school_id='$sid' and sw.subject_id=s.subject_id ";
$run1 = mysqli_query($con, $sql1);
include "teacher-navbar.php";
?>
      
 <!-- partial -->
 <div class="main-panel">
          <div class="content-wrapper">
            
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title" style="font-size:1.8rem";>Teacher Details</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a  style="font-size:1.2rem"; href=teacher-dashboard.php>Dashboard</a></li>
                                <li class="breadcrumb-item active" style="font-size:1.2rem";>Teacher Details</li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="about-info">
                                    <h4 style="font-size:1.8rem";>About Me</h4>
                                    
                                    <div class="media mt-3 d-flex">
                                        <img src="assets/img/user.jpg" class="me-3 flex-shrink-0" alt="...">
                                        <div class="media-body flex-grow-1">
                                            <ul>
                                                <li>
                                                    <span class="title-span"style="font-size:1.2rem";>Teacher Name :</span>
                                                    <span class="info-span" style="font-size:1.2rem";><?php echo $run['teacher_name']; ?></span>
                                                </li>
                                                <li>
                                                    <span class="title-span" style="font-size:1.2rem";>School Name :</span>
                                                    <span class="info-span" style="font-size:1.2rem";><?php echo $run['school_name']; ?></span>
                                                </li>
                                                <li>
                                                    <span class="title-span" style="font-size:1.2rem";>Email :</span>
                                                    <span class="info-span" style="font-size:1.2rem";><?php echo $run['teacher_email']; ?></span>
                                                </li>
                                                <li>
                                                    <span class="title-span" style="font-size:1.2rem";>DOB :</span>
                                                    <span class="info-span" style="font-size:1.2rem";><?php echo $run['teacher_dob']; ?></span>
                                                </li>
                                                <li>
                                                    <span class="title-span" style="font-size:1.2rem";>Mobile Number :</span>
                                                    <span class="info-span" style="font-size:1.2rem";><?php echo $run['teacher_mob']; ?></span>
                                                </li>
                                                <li>
                                                    <span class="title-span" style="font-size:1.2rem";>SUBJECTS :</span>
                                                    <?php
                                                         echo'<ul>';
                                                         while($data = mysqli_fetch_array($run1)){
                                                             echo'<li><span class="info-span" style="font-size:1.2rem";>'.$data['subject_name'].'</span></li>';
                                                            }
                                                         echo'</ul>';                                                         ?>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    
                                    
                                </div>
                            </div>								
                        </div>
                    </div>
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
  </body>
</html>  
