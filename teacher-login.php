<?php
session_start();
include "connect.php";


if(isset($_POST['login']))
{
	$tid=$_POST['teacher_id'];
    $sql = "select teacher_id,school_id,teacher_name from teacher_info where teacher_id='$tid'";
    $run = mysqli_query($con,$sql);
    $run = mysqli_fetch_assoc($run);
    if(!empty($run))
    {	
		$_SESSION['TEACHER_ID'] = $tid;
		$_SESSION['SCHOOL_ID'] = $sid = $run['school_id'];
    $_SESSION['TEACHER_NAME']=$run['teacher_name'];
		$sql2 = mysqli_query($con,"select count(*) as cc from schoolwise_class_subject_teachers where teacher_id='$tid'");
		$sql2 = mysqli_fetch_assoc($sql2);
		if($sql2['cc'] == 0)
		{
			echo "<script>document.location='pet-dashboard.php'</script>";
		}
	    $sql = "select class_id from schoolwise_class_details where teacher_id='{$_POST['teacher_id']}' and school_id='$sid'";
    	$run1 = mysqli_query($con,$sql);
    	$run1 = mysqli_fetch_assoc($run1);
		if(!empty($run1))
		{
			$_SESSION['CLASS_ID'] = $run1['class_id'];
			echo "<script>document.location='teacher-dashboard.php'</script>";
		}
		else
		{
			echo "<script>document.location='teacher-dashboard.php'</script>";
		}
    }
    else
    {
        echo '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>Error!</strong> Invalid login credentials. Please retry or contact your administrator.
			<button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>';
    }

}

?>



<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V1</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	<div class="limiter">
		<div class="container-login100">
	
			<div class="wrap-login100">
				
				

				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/img-01.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" method="post">
					<span class="login100-form-title">
						Teacher Login
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid Username is required: ST1000">
						<input class="input100" type="text" name="teacher_id" placeholder="Username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="teacher_id" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="login" value="submit">
							Login
						</button>
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span>
						<a class="txt2" href="forgot-password.php">
							Username / Password?
						</a>
					</div>

					
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>