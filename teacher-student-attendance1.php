<?php
include "conn.php";
$student_id= $_GET['student_id'];
$sql1="UPDATE attendance SET day1='p' where student_id='$student_id'";
$res2=mysqli_query($con,$sql1);
echo "<script>document.location='teacher-student-attendance.php'</script>"
?>