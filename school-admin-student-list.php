 <?php session_start();


include'connect.php';
$school_id=$_SESSION['SCHOOL_ID'];
$sql="select school_name from school_info where school_id='$school_id'";
$run = mysqli_fetch_assoc(mysqli_query($con,$sql));
$school_name=$run['school_name'];
if(empty($_SESSION['SCHOOL_ID']))
{
    header('location:school-login.php');
}
if(empty($_SESSION['SCHOOL_ID']))
{
    header('location:index.php');
}
else{

$school_id=$_SESSION['SCHOOL_ID'];
$std=" select s.student_id , s.student_name ,s.date_of_birth,s.address,s.email,s.class_id,s.gender,c.class,c.section from student as s, classes as c where s.school_id='$school_id' and s.class_id=c.class_id";
if(isset($_POST['submit'])) {
    if($_POST['select']=='6th') {   //<=========== 'select'
        $std=" select student_id , student_name ,date_of_birth,address,email,class_id,gender from student where school_id='$school_id' and (class_id='CL0601' or class_id='CL0602' or class_id='CL0603' or class_id='CL0604') ";
    }
    elseif($_POST['select']=='7th') {   //<=========== 'select'
        $std=" select student_id , student_name ,date_of_birth,address,email,class_id,gender from student where school_id='$school_id' and class_id='CL0701' or class_id='CL0702' or class_id='CL0703' or class_id='CL0704' ";
    }
    elseif($_POST['select']=='8th'){
        $std=" select student_id , student_name ,date_of_birth,address,email,class_id,gender from student where school_id='$school_id' and class_id='CL0801' or class_id='CL0802' or class_id='CL0803' or class_id='CL0804' ";
    }
    elseif($_POST['select']=='9th'){
        $std=" select student_id , student_name ,date_of_birth,address,email,class_id,gender from student where school_id='$school_id' and class_id='CL0901' or class_id='CL0902' or class_id='CL0903' or class_id='CL0904' ";
    }
    elseif($_POST['select']=='10th'){
        $std=" select student_id , student_name ,date_of_birth,address,email,class_id,genderfrom student where school_id='$school_id' and class_id='CL1001' or class_id='CL1002' or class_id='CL1003' or class_id='CL1004' ";
    }
    else{

    }

    $result=mysqli_query($con,$std) or die(mysqli_error);
    $counter=mysqli_num_rows($result);
    
}
$result=mysqli_query($con,$std) or die(mysqli_error);
$counter=mysqli_num_rows($result);
}
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
    
                  
                  <li class="breadcrumb-item"><a href="school-admin-student-list.php"><span style="font-size: 1.2rem;">Students</span></a></li>
                    <li class="breadcrumb-item active"><span style="font-size: 1.2rem;">Students list</span></li>
                  </ul>
                </div>
              </div>
              <div class="col-auto text-end float-end ms-auto">
<a href="#" class="btn btn-outline-primary me-2"><i class="fas fa-download"></i> Download</a>
<!--<a href="add-student.php" class="btn btn-primary"><i class="fas fa-plus"></i></a> -->
</div>

</div>
<form class="filteroption" action="" method="post">
    <select id="select" class="form-control form-select" name="select" >

        <option value="6th" >6</option>
        <option value="7th" >7</option>
        <option value="8th" >8</option>
        <option value="9th" >9</option>
        <option value="10th" >10</option>
        <option value=0 selected="selected">select class</option>
    </select>
    <br>
    <input  class="btn btn-primary" type="submit" name="submit" value="submit">
          </form>



<br>
<div class="row">
<div class="col-sm-12">
<div class="card card-table">
<div class="card-body">
<div class="table-responsive">
<table id="myTable" class="table table-hover table-center mb-0 datatable">
<thead>
<tr>
<th>ID</th>
<th>Name</th>
<th>Class_id</th>
<th>DOB</th>
<th>EMAIL</th>
<th>Address</th>
<!-- <th class="text-end">Action</th> -->
</tr>
</thead>
<tbody>
 <?php
foreach ($result as $data) 
{
       $stdname=$data['student_name'];
       $student_id=$data['student_id'];
       $date=$data['date_of_birth'];
       $class_id=$data['class_id'];
       $addres=$data['address'];
       $mail=$data['email'];
    echo
    '<tr>
<td>'.$student_id.'</td>
<td>
<a href="school-admin-student-view.php?student_id='.$student_id.'&class_id='.$class_id.'">'.$stdname.'</a>
</h2>
</td>
<td>'.$class_id.'</td>
<td>'.$date.'</td>
<td>'.$mail.'</td>
<td>'.$addres.'</td>
<td class="text-end">';
}
?> 
  
              
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

<script>
    const searchFun = () => {
        let filter = document.getElementById('class').value;
        
        let myTable = document.getElementById('myTable');
        
        let tr = myTable.getElementsByTagName('tr');

        for(var i=0;i<tr.length;i++){
            let td = tr[i].getElementsByTagName('td')[2];
        
            if(td){
                let textvlaue = td.textContent || td.innerHTML;
                if(textvlaue.toUpperCase().indexOf(filter)>-1){
                    tr[i].style.display = "";
                }
                else{
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>
  </body>
</html>