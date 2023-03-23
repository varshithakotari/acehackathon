<?php

include 'connect.php';

session_start();

$student_id = $_SESSION['STUDENT_ID'];
$school_id  = $_SESSION['SCHOOL_ID'];
$class_id = $_SESSION['CLASS_ID'];

$sql = "select * from student where student_id='$student_id' and school_id='$school_id'";
$run = mysqli_fetch_array(mysqli_query($con, $sql));

$sql2 = "select class,section from classes where class_id='$class_id'";
$run2 = mysqli_query($con, $sql2);
$run2 = mysqli_fetch_assoc($run2);

$query1="select eid from exam where status=1";
$result1=mysqli_query($con,$query1) or die(mysqli_error);
$res = mysqli_fetch_assoc($result1);
$eid = $res['eid'];

$qu="select e.student_id as sid from exam_totals e,student s where e.eid='$eid' and e.school_id='$school_id' and e.student_id=s.student_id and s.class_id='$class_id' order by e.total desc";
$re=mysqli_query($con,$qu);
$var=0;
foreach($re as $data)
{
	$var=$var+1;
	if($data['sid']==$student_id)
	{
		$rank = $var;
		break;
	}
}

$qu1 = mysqli_query($con , "SELECT student_id,sum(marks) as marks from sports_marks where school_id='$school_id' GROUP BY student_id order by marks desc");
$var3=0;
foreach($qu1 as $data)
{
	$var3=$var3+1;
	if($data['student_id']==$student_id)
	{
		$rank3 = $var3;
		break;
	}
}

$qu5="select student_id as sid,SUM(marks) as sum from cocircular_marks where class_id='$class_id' and school_id='$school_id' GROUP BY student_id order by sum desc";
$re5=mysqli_query($con,$qu5);
$varc=0;
foreach($re5 as $data)
{
	$varc=$varc+1;
	if($data['sid']==$student_id)
	{
		$ccarank = $varc;
		break;
	}
}
$qu6="select c.student_id as sid,SUM(c.marks+e.total+s.marks) as sum from cocircular_marks c,exam_totals e,sports_marks s where e.class_id='$class_id' and e.school_id='$school_id' and e.student_id=c.student_id and e.student_id=c.student_id and e.student_id = s.student_id GROUP BY e.student_id order by sum desc";
$re9=mysqli_query($con,$qu6);
$v = 0;
foreach($re9 as $data)
{
	$v = $v+1;
	if($data['sid']==$student_id)
	{
		$ovrank = $v;
		break;
	}
}
include "parents-navbar.php";
?>

        <div class="main-panel">
            <div class="content-wrapper">
            <div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title" style="font-size:1.8rem";>Student Report card</h3>
								<div id="google_translate_element"></div>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a  style="font-size:1.2rem"; href="">Student</a></li>
									<li class="breadcrumb-item active" style="font-size:1.2rem";>Student Report card</li>
									<script type="text/javascript">
							function googleTranslateElementInit() {
								new google.translate.TranslateElement(
									{pageLanguage: 'en'},
									'google_translate_element'
								);
							}
						</script>
						
						<script type="text/javascript" src=
					"https://translate.google.com/translate_a/element.js?
							cb=googleTranslateElementInit">
						</script>
								</ul>
							</div>
						</div>
					</div>
					
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-md-12">
									<div class="about-info">
										<h4>Z P School</h4>
										
										<div class="media mt-3 d-flex">
											<img src="assets/img/user.jpg" class="me-3 flex-shrink-0" alt="...">
											<div class="media-body flex-grow-1">
												<ul>
                                                    <li>
                                                        <span class="title-span" style="font-size:1.2rem";>Full Name : </span>
                                                        <span class="info-span" style="font-size:1.2rem";><?php echo $run['student_name']; ?></span>
                                                    </li>
                                                    <li>
                                                        <span class="title-span" style="font-size:1.2rem";>CLASS : </span>
                                                        <span class="info-span" style="font-size:1.2rem";><?php echo $run2['class']; ?></span>
                                                    </li>
                                                    <li>
                                                        <span class="title-span" style="font-size:1.2rem";>SECTION : </span>
                                                        <span class="info-span" style="font-size:1.2rem";><?php echo $run2['section']; ?></span>
                                                    </li>
                                                    <li>
                                                        <span class="title-span"style="font-size:1.2rem";>Email : </span>
                                                        <span class="info-span"style="font-size:1.2rem";><?php echo $run['email']; ?></span>
                                                    </li>
                                                    <li>
                                                        <span class="title-span" style="font-size:1.2rem";>Gender : </span>
                                                        <span class="info-span" style="font-size:1.2rem";><?php
																					if($run['gender']== 'M')
																					{
																						echo "MALE";
																					} 
																					else
																					{
																						echo "FEMALE";
																					}
																				?></span>
                                                    </li>
                                                    <li>
                                                        <span class="title-span" style="font-size:1.2rem";>DOB : </span>
                                                        <span class="info-span" style="font-size:1.2rem";><?php echo $run['date_of_birth']; ?></span>
                                                    </li>
                                                </ul>
											</div>
										</div>

										<div class="row mt-3">                                           
										</div>
										<div class="row">
											<div class="col-xl-3 col-sm-6 col-12">
												<div class="card flex-fill fb sm-box">
													<!-- <i class="fab fa-facebook"></i> -->
													<h6><?php echo $rank; ?></h6>
													<p>Academeic Rank</p>
												</div>
											</div>

											<div class="col-xl-3 col-sm-6 col-12">
												<div class="card flex-fill insta sm-box">
													<!-- <i class="fab fa-instagram"></i> -->
													<h6><?php echo $ccarank; ?></h6>
													<p>CCA Rank</p>
												</div>
											</div>

											<div class="col-xl-3 col-sm-6 col-12">
												<div class="card flex-fill twitter sm-box">
													<!-- <i class="fab fa-twitter"></i> -->
													<h6><?php echo $rank3; ?></h6>
													<p>Sports Rank</p>
												</div>
											</div>
						
											<div class="col-xl-3 col-sm-6 col-12">
												<div class="card flex-fill linkedin sm-box">
													<!-- <i class="fab fa-linkedin-in"></i> -->
													<h6><?php echo $ovrank; ?></h6>
													<p>Overall Rank</p>
												</div>
											</div>
										</div>
										
										<!-- <div class="row mt-2">
											<div class="col-md-12">
												<h5>Permanent Address</h5>
												<p><?php echo $run['address']; ?></p>
											</div>                                            
                                        </div>

                                        <div class="row mt-2">
											<div class="col-md-12">
												<h5>Present Address</h5>
												<p><?php echo $run['address']; ?></p>
											</div>                                            
                                        </div> -->
									</div>
								</div>								
							</div>
						</div>
					</div>	
					<div>
                        <br>
                    </div>
					
					<div class="row">
						<?php
                            $eid = array("UT1","FA1","UT2","FA2","AEE");
                            foreach($eid as $id)
                            {
                                $i = 0;
                                $query="select S.subject_name as sn, M.marks as mm from exam_marks M,subjects S where M.student_id='$student_id' and M.subject_id=S.subject_id and eid='$id'";
                                $result=mysqli_query($con,$query) or die(mysqli_error);
                                $query1="select ename from exam where eid='$id'";
                                $result2=mysqli_query($con,$query1) or die(mysqli_error);
                                $res = mysqli_fetch_assoc($result2);
                                echo '<div class="col-lg-12 grid-margin stretch-card">
                                <div class="card">
                                  <div class="card-body">
                                    <h3 class="card-title">'.$res['ename'].'</h3>
                                    <table class="table table-striped">
                                            </thead>
                                                            
                                                        <tr>
                                            <th> S.No. </th>
                                            <th> Subject </th>
                                            <th> Marks </th>
                                            
                                                        </tr>
            
                                            </thead>
                                                        <tbody>';
                                
                                                            while($data = mysqli_fetch_array($result))
                                                            {
                                                                echo '
                                                                <tr>
                                                                    <td>'.++$i.'</td>
                                                                    <td>'.$data['sn'].'</td>
                                                                    <td>'.$data['mm'].'</td>
                                                                </tr>';
                                                            }echo '                  </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                            </div>';
                                    }
                                ?>
                            </div>
                        
                        </div>
                    <div>
                         <br>
                    </div>
					<div class="row">
					<style>
						.checked {
							color: orange;
							}
					</style>
						<?php
							$query = "SELECT s.subject_name as subject_name,ROUND(sum(credits)/5) as num,loc.subject_id as subject_id FROM `learning_outcomes_credits` loc,subjects s WHERE class_id='$class_id' and student_id='$student_id' and s.subject_id=loc.subject_id GROUP BY loc.subject_id";
							$run = mysqli_query($con,$query);

							foreach($run as $id)
							{
								$cc = (int)$id['num'];
								$sum = mysqli_query($con, "SELECT type FROM `conclusion` WHERE id='$cc'");
								echo'
								<div class="col-12 col-md-6 col-lg-4 d-flex">
									<div class="card flex-fill">
										<div class="card-header">
											<h5 class="card-title mb-0">'.$id['subject_name'].'<br><br>Rating : ';
											for($i=1;$i<=$cc;$i++)
											{
												echo '<span class="fa fa-star checked"></span>';
											}
											$k = 6 - $i;
											for($i=0;$i<$k;$i++)
											{
												echo '<span class="fa fa-star"></span>';
											}
											echo '</h5>
										</div>
										<div class="card-body">
											<h6 class="card-text" >Your Score </h6><br>
											<h3 class="card-text" >'.$id['num'].'/5</h3>';
											foreach($sum as $su)
											{
												echo '<p class="card-text">'.$su['type'].'</p>';
											}
											echo '<a class="card-link" href="student-detailed-view.php?suid='.$id['subject_id'].'">View detailed credits</a>
										</div>
									</div>
								</div>
								';
							}
						?>
					</div>
				</div>
				<br>
				<!-- Footer -->
				<!-- <footer>
					<p>Copyright © 2020 Dreamguys.</p>					
				</footer> -->
				<!-- /Footer -->
			</div>
			<!-- /Page Wrapper -->

			
		
        </div>


        </div>
        </div>
    </div>
<!-- /Main Wrapper -->
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