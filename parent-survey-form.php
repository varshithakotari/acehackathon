<?php
include "connect.php";
if(isset($_POST['submit']))
{
$sql="INSERT INTO ps values('{$_POST['Field1']}','{$_POST['Field2']}','{$_POST['Field3']}','{$_POST['Field4']}','{$_POST['Field5']}'
,'{$_POST['Field6']}','{$_POST['Field7']}','{$_POST['Field8']}','{$_POST['Field9']}','{$_POST['Field10']}'
,'{$_POST['Field11']}','{$_POST['Field12']}','{$_POST['Field13']}','{$_POST['Field14']}','{$_POST['Field15']}'
,'{$_POST['Field16']}','{$_POST['Field17']}','{$_POST['Field18']}')";
$sqli=mysqli_query($con,$sql);
}
?>