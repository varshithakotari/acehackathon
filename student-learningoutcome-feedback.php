<?php
include "conn.php";
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Learning Outcomes</title>
	<style>
		/* Style the form */
		form {
			font-size: 16px;
			font-family: Arial, sans-serif;
			padding: 20px;
			border: 1px solid #ccc;
			border-radius: 10px;
			background-color: #f2f2f2;
		}

		/* Style the radio buttons */
		input[type="radio"] {
			margin: 10px;
		}

		/* Style the submit button */
		input[type="submit"] {
			margin-top: 20px;
			padding: 10px 20px;
			background-color: #4CAF50;
			color: white;
			border: none;
			border-radius: 5px;
			cursor: pointer;
		}

		/* Style the feedback message */
		#feedback {
			margin-top: 20px;
			font-weight: bold;
			font-size: 18px;
			color: #f00;
		}
	</style>
</head>
<body>
	<form id="mcq-form" action="feedback.php" method="post">
		<h2>MCQ Form</h2>
		<p><?php $_SESSION['q1']=$q1="Q1. What is the capital of France?";
        echo $q1;?></p>
        <input type="text" name="str">
		
		<p><?php $_SESSION['q2']=$q2='Q2. Which is the largest planet in our solar system?';
        echo $q2;?></p>
        <input type="text" name="str1">

		<input type="submit" name="submit" value="submit">
	</form>

	<div id="feedback"></div>

</body>
</html>
