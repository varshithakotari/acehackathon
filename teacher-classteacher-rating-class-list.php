<?php

include 'connect.php';

session_start();

$school_id = $_SESSION['SCHOOL_ID']; 
$teacher_id = $_SESSION['TEACHER_ID'];

$sql = "select su.subject_id as sid, su.subject_name as subject_name,c.class as class,c.section as section,scst.class_id as class_id 
		from schoolwise_class_subject_teachers as scst, subjects su ,classes c where scst.school_id = '$school_id' 
		and scst.teacher_id = '$teacher_id' and su.subject_id = scst.subject_id and scst.class_id = c.class_id";
$run = mysqli_query($con, $sql);
include "teacher-navbar.php";
?>


        <div class="main-panel">
          <div class="content-wrapper">
          <div class="content container-fluid">
				
                <!-- Page Header -->
                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title"style="font-size:1.8rem";>Subjects</h3>
                            <ul class="breadcrumb">
                            <li class="breadcrumb-item"style="font-size: 1.1rem;"><a href="teacher-dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item active" style="font-size:1.2rem";>Subjects</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->
                <div class="col-lg-12 grid-margin stretch-card">
                                <div class="card">
                                  <div class="card-body">
                                    
                                    <table class="table table-striped">
                                      </thead>
                                                            
                                      <tr>
                                      <th>S. No.</th>
                                                <th>Subject</th>
                                                <th>Class</th>
                                                <th>Section</th>
                                                <th>Rating</th>
                                    </tr>
            
                                      </thead>
                                      <body>
                                            <?php
                                                $i = 0;
                                                while($run1 = mysqli_fetch_assoc($run))
                                                {
                                                    echo '<tr>
                                                        <td>'.++$i.'</td>
                                                        <td>'.$run1['subject_name'].'</td>
                                                        <td>'.$run1['class'].'</td>
                                                        <td>'.$run1['section'].'</td>
                                                        <td><a href="teacher-classteacher-student-rating2.php?cid='.$run1['class_id'].'&sid='.$run1['sid'].'">Give Rating for this class students</a></td>
                                                    </tr>';
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
