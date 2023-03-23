<?php
include 'connect.php';
session_start();
$school_id = $_SESSION['SCHOOL_ID'];
$teacher_id = $_SESSION['TEACHER_ID'];
$class_id = $_SESSION['CLASS_ID'];
include "teacher-navbar.php"
?>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SRKR</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!----<link rel="stylesheet" href="assets/css/style1.css">

    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.ico" >
  </head>
  <body>

					<!-- /Page Header -->
          <form method="post">
									<button class="btn btn-outline-primary me-2" name="generate">Genratate</button>
								</form>
					<div class="row">
						<div class="col-sm-12">
						
							<div class="card card-table">
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-hover table-center mb-0 datatable">
                    <thead>
												<tr>
													<th>STUDENT ID</th>
													<th>STUDENT NAME</th>
													<th>Prediction</th>
												</tr>
											</thead>
											<tbody>
												<?php
													if(isset($_POST['generate']))
													{
														$query1="SELECT s.student_id as student_id,s.school_id as school_id, s.student_name as student_name, 
														s.date_of_birth as date_of_birth, s.gender as gender, s.email as email, s.address as address,sc.school_name as school_name,
														c.class as class, c.section as section,s.class_id as class_id FROM test.student s,test.classes c,test.school_info sc WHERE
														c.class_id=s.class_id and sc.school_id=s.school_id and s.class_id='$class_id' and s.school_id='$school_id'";
														$run1=mysqli_query($con,$query1);
														$j = 0;
														while($res1=mysqli_fetch_assoc($run1))
														{
															$sid = $res1['student_id'];
															$marks = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
															$query2 = "select * from ps where student_id='$sid'";
															$res2=mysqli_query($con,$query2);
                              $res2=mysqli_fetch_assoc($res2);
															
														
															$marks[0] = $res2['school'];
															$marks[1] = $res2['sex'];
															$marks[2] = (int)$res2['age'];
															$marks[3] = $res2['address'];
															$marks[4] = $res2['famsize'];
															$marks[5] = $res2['Pstatus'];
															$marks[6] = $res2['Medu'];
															$marks[7] = $res2['Fedu'];
															$marks[8] = $res2['Mjob'];
															$marks[9] = $res2['Fjob'];
															$marks[10] = $res2['reason'];
															$marks[11] = $res2['guardian'];
															$marks[12] = $res2['traveltime'];
															$marks[13] = $res2['studytime'];
															$marks[14] = $res2['failures'];
															$marks[15] = $res2['schoolsup'];
															$marks[16] = $res2['famsup'];
															$marks[17] = $res2['paid'];
															$marks[18] = $res2['activities'];
															$marks[19] = $res2['nursery'];
															$marks[20] = $res2['higher'];
															$marks[21] = $res2['internet'];
															$marks[22] = $res2['romantic'];
															$marks[23] = $res2['famrel'];
															$marks[24] = $res2['freetime'];
															$marks[25] = $res2['goout'];
															$marks[26] = $res2['Dalc'];
															$marks[27] = $res2['Walc'];
															$marks[28] = $res2['health'];
															$marks[29] = $res2['absences'];
															$marks[30] = $res2['G1'];
															$marks[31] = $res2['G2'];
															
															
															echo '
																<script>
																	generate('.$marks[0].','.$marks[1].','.$marks[2].','.$marks[3].','.$marks[4].','.$marks[5].','.$marks[6].','.$marks[7].','.$marks[8].','.$marks[9].','.$marks[10].','.$marks[11].','.$marks[12].','.$marks[13].','.$marks[14].','.$marks[15].','.$marks[16].','.$marks[17].','.$marks[18].','.$marks[19].','.$marks[20].','.$marks[21].','.$marks[22].','.$marks[23].','.$marks[24].','.$marks[25].','.$marks[26].','.$marks[27].','.$marks[28].','.$marks[29].','.$marks[30].','.$marks[31].');
																	function generate(a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z,aa,ab,ac,ad,ae,af) {
																		var xmlhttp=new XMLHttpRequest();
																		xmlhttp.onreadystatechange=function() {
																			if (this.readyState==4 && this.status==200) {

																				
																				console.log(this.responseText);
																				
																				window.r = this.responseText ;
																				
																				if(this.responseText == "GRADE A:EXCELLENT")
																				{
																					document.getElementById("'.$j.'").className = "badge badge-success";
																					document.getElementById("'.$j.'").innerHTML=this.responseText;

																				}
																				else if (this.responseText == "GRADE B:GOOD")
																				{
																					document.getElementById("'.$j.'").className = "badge badge-success";
																					document.getElementById("'.$j.'").innerHTML=this.responseText;

																				}
																				else if (this.responseText == "GRADE C:AVERAGE"){
																					document.getElementById("'.$j.'").className = "badge badge-success";
																					document.getElementById("'.$j.'").innerHTML=this.responseText;
																				}
																				else if (this.responseText == "GRADE D:BELOW AVERAGE"){
																					document.getElementById("'.$j.'").className = "badge badge-danger";
																					document.getElementById("'.$j.'").innerHTML=this.responseText;
																				}
																				else if (this.responseText == "GRADE F:FAIL"){
																					document.getElementById("'.$j.'").className = "badge badge-danger";
																					document.getElementById("'.$j.'").innerHTML=this.responseText;
																				}
																				else{
																					document.getElementById("'.$j.'").className = "badge badge-info";
																					document.getElementById("'.$j.'").innerHTML=this.responseText;
																				}
																																								}
																		}
																		xmlhttp.open("GET","https://test-halq.onrender.com/?m1="+a+"&m2="+b+"&m3="+c+"&m4="+d+"&m5="+e+"&m6="+f+"&m7="+g+"&m8="+h+"&m9="+i+"&m0="+j+"&m11="+k+"&m12="+l+"&m13="+m+"&m14="+n+"&m15="+o+"&m16="+p+"&m17="+q+"&m18="+r+"&m19="+s+"&m20="+t+"&m21="+u+"&m22="+v+"&m23="+w+"&m24="+x+"&m25="+y+"&m26="+z+"&m27="+aa+"&m28="+ab+"&m29="+ac+"&m30="+ad+"&m31="+ae+"&m32="+af,true);
																		xmlhttp.send();
																	}
															
															</script>';

															echo 
															'<tr><td>'.$res1['student_id'].'</td>
															<td>'.$res1['student_name'].'</td>
															<td><a href="teacher-classteacher-predict-list-view.php?sid='.$res1['student_id'].'"><span id="'.$j.'" class="badge badge-success"></span></a></td>
															</tr>';
															$j++;
														}
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


