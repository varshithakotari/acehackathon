<?php  session_start();

include 'connect.php';
if(empty($_SESSION['STUDENT_ID']))
{
    echo '<script>document.location="student-login.php"</script>';
}
else{

    $student_id = $_SESSION['STUDENT_ID'];
	$class_id = $_SESSION['CLASS_ID'];
	$school_id = $_SESSION['SCHOOL_ID'];

 
    $sql="select * from student where student_id='$student_id'";
    $run = mysqli_query($con,$sql)or die(''.__LINE__.'<br>'.mysqli_error($con));
    $run = mysqli_fetch_assoc($run);
    if(!empty($run))
    {
        $school_id = $run['school_id'];
        $student_id = $run['student_id'];
        $student_name = $run['student_name'];
        $_SESSION['student_name']=$run['student_name'];
        $student_email = $run['email'];
        $student_password = $run['gender'];
        $student_address = $run['address'];
        $student_dob = $run['date_of_birth'];
        $student_classid= $run['class_id'];

	$query1="select eid,ename from exam where status=1";
	$result1=mysqli_query($con,$query1) or die(mysqli_error);
	$res = mysqli_fetch_assoc($result1);
	$eid = $res['eid'];
	$ename = $res['ename'];

    $query="select S.subject_name, M.marks from exam_marks M,subjects S where M.student_id='$student_id' and M.subject_id=S.subject_id and eid='$eid'";
    $result=mysqli_query($con,$query) or die(mysqli_error);
     foreach($result as $data)
     {
        $y[] = $data['subject_name'];
        $x[]=$data['marks'];
    }
	foreach($result as $data)
	{ 
		if($data['subject_name']!="MARATHI"&&$data['subject_name']!="HINDI"){
	   $sub[] = $data['subject_name'];
	}
}
	$query="select m.cocircular_name as cn,c.marks as marks from cocircular_marks c,cocircular m where c.student_id='$student_id' and c.school_id='$school_id' and c.class_id='$class_id' and c.cocircular_id = m.cocircular_id";
    $result=mysqli_query($con,$query) or die(mysqli_error);
     foreach($result as $data)
     {
        $cn[] = $data['cn'];
        $ma[]=$data['marks'];
    }

	$q="SELECT e.marks,s.sport_name FROM sports_marks e,sports s WHERE student_id='$student_id' AND s.sport_id=e.sport_id;";
    $r=mysqli_query($con,$q) or die(mysqli_error);
     foreach($r as $d)
     {
        $l[] = $d['sport_name'];
        $m[]=$d['marks'];
    }
    }

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
}
$sql = mysqli_query($con ,"SELECT (loc.credits/5)*100 as percent  FROM `learning_outcomes_credits` loc , `learning_outcomes` lo where loc.class_id='$class_id' AND loc.school_id='$school_id' and loc.student_id='$student_id' and loc.loc_id = lo.loc_id");
foreach($sql as $data){
   $per[]=$data['percent'];
}
include 'student-navbar.php';
?>

        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
            
              <div class="row">
                <div class="col-sm-12">
                  <h3 class="page-title"><span style="font-size: 1.8rem;">Welcome ! <?php echo $student_name ?></span></h3>
                  <ul class="breadcrumb">
                    <h3><span class="page-title-icon bg-gradient-primary text-white me-2">
                      <i class="mdi mdi-home"></i>
                    </span></h3>
    
                  <li class="breadcrumb-item"><a href="student-dashboard.php"><span style="font-size: 1.2rem;">Dashboard</span></a></li>
                    <li class="breadcrumb-item active"><span style="font-size: 1.2rem;">Student Dashboard</span></li>
                  </ul>
                </div>
              </div>
  
  
              <script>
                            var source=new EventSource("student-academic-rank.php");
                             source.onmessage=function(event)
                             {
                              document.getElementById("rank").innerHTML=event.data;
                              }
                     </script>

            </div>
            <div class="row">
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-danger card-img-holder text-white">
                  <div class="card-body">
                    <h3 class="font-weight-normal mb-3"> <i class="mdi mdi-book-open-variant "></i></h3>

                    <h2 class="mb-5">Academic Rank</h2>
                    <h3 id="rank"><span style="font-size: 2.5rem;"><?php echo $rank; ?></span></h3>                  
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-info card-img-holder text-white">
                  <div class="card-body">
                    <h3 class="font-weight-normal mb-3"> <i class="mdi mdi-book-open-variant "></i></h3>

                    <h2 class="mb-5">Attendance Percentage</h2>
                    <h3 id="rank"><span style="font-size: 2.5rem;">55%</span></h3>                  
                  </div>
                </div>
              </div>

              <script>
                            var source=new EventSource("student-sports-rank.php");
                             source.onmessage=function(event)
                             {
                              document.getElementById("srank").innerHTML=event.data;
                              }
                        </script>

              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-success card-img-holder text-white">
                  <div class="card-body">
                    <h3 class="font-weight-normal mb-3"> <i class="mdi mdi-book-open-variant "></i></h3>

                    <h2 class="mb-5">Sports Rank</h2>
                    <h3 id="srank"><span style="font-size: 2.5rem;"><?php echo $rank; ?></span></h3>                  
                  </div>
                </div>
              </div>
              
            </div>
            <div class="row">
              <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title"><?php echo $ename; ?></h4>
                    
                    <canvas id="acscore"></canvas>
                                            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                                            <script>
												// m = JSON.parse(localStorage.m);
												const ctx = document.getElementById('acscore');
												const myChart = new Chart(ctx, {
													type: 'bar',
													data: {
														labels: <?php echo json_encode($y) ?>,
														//echo json_encode($y), 
														datasets: [{
															label: 'MARKS SCORED',
															data:<?php echo json_encode($x)?>,
														//echo json_encode($x),

															backgroundColor: [
																'rgba(255, 99, 132, 0.2)',
																'rgba(54, 162, 235, 0.2)',
																'rgba(255, 206, 86, 0.2)',
																'rgba(75, 192, 192, 0.2)',
																'rgba(153, 102, 255, 0.2)',
																'rgba(255, 159, 64, 0.2)'
															],
															borderColor: [
																'rgba(255, 99, 132, 1)',
																'rgba(54, 162, 235, 1)',
																'rgba(255, 206, 86, 1)',
																'rgba(75, 192, 192, 1)',
																'rgba(153, 102, 255, 1)',
																'rgba(255, 159, 64, 1)'
															],
															borderWidth: 1
														}]
													},
													options: {
														// maintainAspectRatio: true,
														
														scales: {
															y: {
																beginAtZero: true
															}
														}
													}
												});
											
											</script>

                  </div>
                </div>
              </div>
              <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                  <div class="teaching-card">
												<ul class="activity-feed">
													<li class="feed-item">
														<div class="feed-date1">Current Academic Year 2021-2022 </div>
														<style>
															.checked {
																color: orange;
																}
														</style>
														<?php
															$exam = array("UT1","FA1","UT2","FA2","AEE");
															foreach($exam as $eid)
															{
																$qu1="select e.total as total,ex.ename as ename from exam_totals e, exam ex where e.eid='$eid' and e.student_id='$student_id' and e.eid = ex.eid";
    															$re1=mysqli_query($con,$qu1);
																$re1 = mysqli_fetch_assoc($re1);
																echo '
																<span class="feed-text1"><a>'.$re1['ename'].'</a></span>
																<p><span><a href="student-marklist-perexam.php?eid='.$eid.'">'.$re1['total'].'</span></p>';
															}
														?>
													</li>
													</li>
												</ul>
											</div>
										</div>
                  </div>
                </div>
              </div>
          




            <div class="row">
              <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                 
<div id="chart" >
<canvas id="ccscore" style="display: block; box-sizing: border-box; height: 200px; width: 200px;"></canvas><!-- <canvas id="ccscore"></canvas> -->
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    
const ctxcc = document.getElementById('ccscore');
const myChartcc = new Chart(ctxcc, {
    type: 'doughnut',
    data: {
        labels:  <?php echo json_encode($l)?>, 
        datasets: [{
            label: 'MARKS SCORED',
            data: <?php echo json_encode($m)?>,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        // maintainAspectRatio: true,
        scales: {
            y: {
                // beginAtZero: true
            }
        }
    }
});


</script>
                  </div>
                </div>
              </div>






              <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                  <canvas id="lescore"></canvas>
                                            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                                            <script>
												// m = JSON.parse(localStorage.m);
												const ctx3 = document.getElementById('lescore');
												const myChart3 = new Chart(ctx3, {
													type: 'bar',
													data: {
														labels: <?php echo json_encode($sub) ?>,
														//echo json_encode($y), 
														datasets: [{
															label: 'LEARNING OUTCOME PERCENTAGE',
															data:<?php echo json_encode($per)?>,
															labelLinks: ["view-learning-outcome.php?suid=SUB0603","view-learning-outcome.php?suid=SUB0604","view-learning-outcome.php?suid=SUB0605","view-learning-outcome.php?suid=SUB0606","view-learning-outcome.php?suid=SUB0607"],
														//echo json_encode($x),

															backgroundColor: [
																'rgba(255, 99, 132, 0.2)',
																'rgba(54, 162, 235, 0.2)',
																'rgba(255, 206, 86, 0.2)',
																'rgba(75, 192, 192, 0.2)',
																'rgba(153, 102, 255, 0.2)',
																'rgba(255, 159, 64, 0.2)'
															],
															borderColor: [
																'rgba(255, 99, 132, 1)',
																'rgba(54, 162, 235, 1)',
																'rgba(255, 206, 86, 1)',
																'rgba(75, 192, 192, 1)',
																'rgba(153, 102, 255, 1)',
																'rgba(255, 159, 64, 1)'
															],
															borderWidth: 1
														}]
													},
													options: {
														//maintainAspectRatio: true,
														indexAxis:'y',
														scales: {
															y: {
																beginAtZero: true
															}
														}
													}
												});
												myChart3.canvas.addEventListener('click',(e) => {
                                                clickableScales(myChart3,e)
                                                   });
                                                   function clickableScales(chart,click){
    const{ctx,canvas,scales:{x,y}}=chart;
   const top=y.top
  const left=y.left
  const right=y.right
  const bottom=y.bottom
  const height=y.height/ y.ticks.length;
  // mouse coordinates
  let rect=canvas.getBoundingClientRect();
  const xCoor=click.clientX-rect.left;
  const yCoor=click.clientY-rect.top;
  for(let i=0;i < y.ticks.length;i++){
    if(xCoor>=left && xCoor<=right && yCoor>=top+(height*i)&&
       yCoor<=top+height+(height*i)){
    window.open(chart.data.datasets[0].labelLinks[i]);
      
}
   }
}
											</script>

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
  </body>
</html>