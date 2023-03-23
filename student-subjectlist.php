<?php

include 'connect.php';

session_start();

$school_id = $_SESSION['SCHOOL_ID'];
$class_id = $_SESSION['CLASS_ID'];

$sql = "select s.subject_name as subject_name, ti.teacher_name as teacher_name,ti.teacher_mob as teacher_mob 
        from schoolwise_class_subject_teachers scst, teacher_info ti, subjects s where scst.school_id='$school_id'
        and scst.class_id='$class_id' and scst.subject_id=s.subject_id and scst.teacher_id=ti.teacher_id";
$run = mysqli_query($con, $sql);

?>

<?php include "student-navbar.php";?>
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">

            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                  <h4 class="card-title"><strong>Subjects</strong></h4>
                    <p class="card-description"> <b>Dashboard/ </b><code>Subjects</code>
                    </p>
                    <table class="table table-hover table-striped">
                      <thead>
                        <tr>
                        <th> S.No.</th>
                          <th> Subject</th>
                          <th> Teacher </th>
                          <th> Contact</th>
                       </tr>
                      </thead>
                      <tbody>
                      <?php
                                 $i = 0;
                                   while($data = mysqli_fetch_array($run))
                                                    {
                                                        echo '<tr>
                                                        <td>'.++$i.'</td>
                                                        <td>'.$data['subject_name'].'</td>
                                                        <td>'.$data['teacher_name'].'</td>
                                                        <td>'.$data['teacher_mob'].'</td>
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
            
        

          

          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
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