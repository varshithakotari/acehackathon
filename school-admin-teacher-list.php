<?php session_start();


include'connect.php';

if(empty($_SESSION['SCHOOL_ID']))
{
    header('location:index.php');
}
else{

$school_id=$_SESSION['SCHOOL_ID'];
$std=" select teacher_id , teacher_name ,teacher_dob,teacher_email from teacher_info where school_id='$school_id'";
$result=mysqli_query($con,$std) or die(mysqli_error);
$counter=mysqli_num_rows($result);
}
$sql="select school_name from school_info where school_id='$school_id'";
$run = mysqli_fetch_assoc(mysqli_query($con,$sql));
$school_name=$run['school_name'];
include "admin-navbar.php";
?> 

        
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
            
              <div class="row">
                <div class="col-sm-12">
                  
                  <ul class="breadcrumb">
                    <h3><span class="page-title-icon bg-gradient-primary text-white me-2">
                      <i class="mdi mdi-home"></i>
                    </span></h3>
    
                  
                  <li class="breadcrumb-item"><a href="school-admin-teacher-list.php"><span style="font-size: 1.2rem;">Teachers</span></a></li>
                    <li class="breadcrumb-item active"><span style="font-size: 1.2rem;">Teacher list</span></li>
                  </ul>
                </div>
              </div>
              <div class="col-auto text-end float-end ms-auto">
<a href="#" class="btn btn-outline-primary me-2"><i class="fas fa-download"></i> Download</a>
<!--<a href="add-student.php" class="btn btn-primary"><i class="fas fa-plus"></i></a> -->
</div>

</div>



<br>
<div class="row">
<div class="col-sm-12">
<div class="card card-table">
<div class="card-body">
<div class="table-responsive">
<table class="table table-hover table-center mb-0 datatable">
<thead>
<tr>
<th>ID</th>
<th>Name</th>
<th>DOB</th>
<th></th>

<th>EMAIL</th>
<!-- <th class="text-end">Action</th> -->
</tr>
</thead>
<tbody>
 <?php
foreach ($result as $data) 
{
       $tname=$data['teacher_name'];
       $t_id=$data['teacher_id'];
       $sql="select distinct subject_name from subjects as s,schoolwise_class_subject_teachers as st,teacher_info as t where st.teacher_id='$t_id' and st.subject_id=s.subject_id";
       $res=mysqli_query($con,$sql);
       $res=mysqli_fetch_assoc($res);
       
       $date=$data['teacher_dob'];
    //    $class_id=$data['class_id'];
    //    $addres=$data['address'];
       $mail=$data['teacher_email'];
    echo
    '<tr>
<td>'.$t_id.'</td>
<td>
<a href="school-admin-teacher-view.php?teacher_id='.$t_id.'">'.$tname.'</a>
</h2>
</td>
<td>'.$date.'</td>
<td></td>

<td>'.$mail.'</td>
<td class="text-end">';
}
?> 
<tbody>
</table>


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
    <script src="assets/js/jquery-3.6.0.min.js"></script>

<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<script src="assets/plugins/datatables/datatables.min.js"></script>

<script src="assets/js/script.js"></script>
  </body>
</html>