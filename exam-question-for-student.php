<?php require_once("backend/config.php"); ?>
<?php
    // student session start 
    $username =  $_SESSION['username'];
    $select_student=query("SELECT * FROM `students` where email='$username' ");
    $fetch_student=fetch_array($select_student);
    $std_row=$fetch_student['id'];
    // student session end

?>
<?php
            $examID = $_GET['examID'];
            
            $query = query("SELECT * FROM `exam` WHERE action='SHOW' AND id='$examID'");
            confirm($query);
            $rowOfExam = fetch_array($query);
            $exName = $rowOfExam['name'];
            $examTime = $rowOfExam['examTime'];
            $scheduleDate = $rowOfExam['scheduleDate'];
            $scheduleTime = $rowOfExam['scheduleTime'];
            $total_mark = $rowOfExam['total_mark'];
            $maxQuestionNum = $rowOfExam['maxQuestionNum'];
            $query_exam=query("SELECT * FROM `exam` WHERE action='SHOW' AND id='$examID'");
            $row_exam=fetch_array($query_exam);
            $exam_id=$row_exam['id'];
            $query_question=query("select * from questions where examID='$exam_id'");
            
     ?>
<!doctype html>
<html lang="en">
    

<!-- Mirrored from preview.colorlib.com/theme/etrain/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Dec 2020 08:16:20 GMT -->
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>MarchForwardBD</title>
<link rel="icon" href="media/fav.png">
<link rel="stylesheet" href="quize/css/bootstrap.min.css">

<link rel="stylesheet" href="quize/css/animate.css">

<link rel="stylesheet" href="quize/css/owl.carousel.min.css">

<link rel="stylesheet" href="quize/css/themify-icons.css">

<link rel="stylesheet" href="quize/css/flaticon.css">

<link rel="stylesheet" href="quize/css/magnific-popup.css">

<link rel="stylesheet" href="quize/css/slick.css">

<link rel="stylesheet" href="quize/css/style.css">
</head>
<style>

    @media only screen and (min-width: 825px) {
      #ExtremedemoCARD{
          margin-top: -90px !important;
      }
}
@media only screen and (max-width: 824px) {
      #examMainStart{
          margin-top: 90px;
      }
      #Extremedemo{
          font-size: 30px !important;
      }
      #demo{
          font-size: 15px !important;
      }
}
</style>
<body>
<header class="main_menu home_menu">
<div class="container">
<div class="row align-items-center">
<div class="col-lg-12">
<nav class="navbar navbar-expand-lg navbar-light">
<a class="navbar-brand" href="index.php"> <img src="quize/img/er-1.png" alt="logo" style="width: 188px;"> </a>

    
<div class="ml-auto" style="border: 2px solid white; border-radius: 10px;"><span id="demo" style="color:#9F1B05; font-weight:bold; font-size:36px"></span></div>
<div class="ml-auto"><span id="submitted" style="color:#FF0000;font-size:36px"></span></div>


<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse main-menu-item justify-content-end" id="navbarSupportedContent">
<ul class="navbar-nav align-items-center">
<li class="nav-item active">
<a class="nav-link" href="home.php">Home</a>
</li>

<li class="nav-item">
<a class="nav-link" href="all-exam-for-student.php">Live Exam</a>
</li>
<li class="nav-item">
<a class="nav-link" href="students-permanent-exam.php">Test Your Skills</a>
</li>
<li class="nav-item">
<a class="nav-link" href="batch.php">Batch</a>
</li>

<li class="d-none d-lg-block nav-item dropdown">
<a class="btn_1 dropdown-toggle" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="">Profile</a>
<div class="card dropdown-menu" aria-labelledby="navbarDropdown" style="width: 15rem;">
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><a class="nav-link" href="#"><?php echo $fetch_student['name'];?></a></li>
    <li class="list-group-item"><a class="nav-link" href="#">Edit Profile</a></li>
    <li class="list-group-item"><a class="nav-link" href="logout.php">Logout</a></li>
  </ul>
</div>
</li>

</ul>
</div>
</nav>
</div>
</div>
</div>
</header>

<section class="advance_feature" id="examMainStart">
        <div class="container">
            <div class="row align-items-sm-center align-items-xl-stretch">
                <div class="col-md-6 col-lg-6">
                    <div class="learning_member_text">
                        <h5>Exam Name</h5>
                        <h2><?php echo $exName; ?></h2>
                        <div class="row">
                            <div class="col-sm-6 col-md-12 col-lg-6 col-6">
                                <div class="learning_member_text_iner">
                                    <h5>Time: <?php echo $examTime; ?> min</h5>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-12 col-lg-6 col-6">
                                <div class="learning_member_text_iner">
                                    <h5>Mark: <?php echo $total_mark; ?></h5>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-md-12 col-lg-6 col-6">
                                <div class="learning_member_text_iner">
                                    <h5>Total Ques: <?php echo $maxQuestionNum; ?></h5>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-12 col-lg-6 col-6">
                                <div class="learning_member_text_iner">
                                    <h5>Mark: <?php echo $total_mark; ?></h5>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="learning_img">
                        <img src="img/advance_feature_img.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

     <div class="content-wrapper">
            
            <!-- Main content -->
            <section class="content">
              <div class="container-fluid">
                <div class="row">
                    <?php
            
                        $examID = $_GET['examID'];
                                        
                        // exam start
                        $query_exam=query("SELECT * FROM `exam` WHERE action='SHOW' AND id='$examID' ");
                        $row_exam=fetch_array($query_exam);
                        
                        $StartingAction = $row_exam['StartingAction'];
                        if($StartingAction == '1'){
                           ?>
                            <div class="col-12" id="ExtremedemoCARD">
                            <div class="card">
                              <!-- /.card-header -->
                              <div class="card-body">
                                  <form method="POST" action="" name="MCQuestion">
                                  <div class="row">
                                      <?php
                                         $Stquery = query("SELECT * FROM students WHERE email = '" . $_SESSION['username'] . "'");  
                                         confirm($Stquery);
                                         $row_of_st = fetch_array($Stquery);
                                         $studentID = $row_of_st['id']; 
                                         
                                         
                                        $examID = $_GET['examID'];
                                        //select course
                                        // $select_course=query("SELECT * FROM `course`");
                                        // $fetch_course=fetch_array($select_course);
                                        // $course_id=$fetch_course['id'];
                                        // course select end
                                        
                                        // exam start
                                        $query_exam=query("SELECT * FROM `exam` WHERE action='SHOW' AND id='$examID' ");
                                        $row_exam=fetch_array($query_exam);
                                        $exam_id=$row_exam['id'];
                                        $exam_status=$row_exam['examStatus'];
                                        $courseID=$row_exam['courseID'];
                                        // exam end
                                        
                                        $query_question=query("select * from questions where examID='$exam_id'  ");
                                        $rows = mysqli_num_rows($query_question);
                                        if($rows > 0)
                                        {
                                            $i = 0;
                                            while($question_row=fetch_array($query_question))
                                            {
                                                 $i +=1;
                                                ?>
                                                <div class="col-md-12">
                                                <div class="card shadow p-3 mb-5 bg-white rounded">
                                                <div class="card-header">
                                                   <div class="row">
                                                       <div class="col-md-1 col-1" style="width: 4.333333%;">
                                                       <h4><b><?php echo $question_row['question_number']?></b></h4>
                                                   </div>
                                                   <div class="col-md-11  col-11">
                                                       <h4><b><?php echo $question_row['questionName']?></b></h4>
                                                   </div>
                                                   </div>
                                                   </div>
                                                <div class="card-body">
                                                    <input type="hidden" value="<?php echo $i?>" name="count">
                                                    <input type="hidden" value="<?php echo $question_row['mark']?>" name="mark[<?php echo $i;?>]">
                                                    <input type="hidden" value="<?php echo $question_row['negativeMark']?>" name="negativeMark[<?php echo $i;?>]">
                                                    <input type="hidden" value="<?php echo $question_row['rightAns']?>" name="rightAns[<?php echo $i;?>]">
                                                    
                                                    <input type="hidden" value="<?php echo $question_row['id']?>" name="questionID[<?php echo $i;?>]">
                                                    <input type="hidden" value=" <?php echo $exam_id?>" name="exam_id[<?php echo $i;?>]">
                                                    <input type="hidden" value=" <?php echo $studentID?>" name="studentID[<?php echo $i;?>]">
                                                    <input type="hidden" value=" <?php echo $question_row['question_number']?>" name="quesNumber[<?php echo $i;?>]">
                                                    
                                                    <input id="firstOption[<?php echo $i;?>]" type="radio" name="selectedOption[<?php echo $i;?>]" value="1"> <label for="firstOption[<?php echo $i;?>]"><p style="margin-top: 7px; font-size: 18px; text-align:justify; color: #000;"><b style="background-color: #fff; border: 2px solid #512B8B; padding: 6px; color: #000; border-radius: 30%;">A</b> <?php echo $question_row['firstOptn']?></p></label><br/>
                                                    <input id="secondOption[<?php echo $i;?>]" type="radio" name="selectedOption[<?php echo $i;?>]" value="2"> <label for="secondOption[<?php echo $i;?>]"><p style="margin-top: 7px; font-size: 18px; text-align:justify; color: #000;"><b style="background-color: #fff; border: 2px solid #512B8B; padding: 6px; color: #000; border-radius: 30%;">B</b> <?php echo $question_row['secondOptn']?></p></label><br/>
                                                    <input id="thirdOption[<?php echo $i;?>]" type="radio" name="selectedOption[<?php echo $i;?>]" value="3"> <label for="thirdOption[<?php echo $i;?>]"><p style="margin-top: 7px; font-size: 18px; text-align:justify; color: #000;"><b style="background-color: #fff; border: 2px solid #512B8B; padding: 6px; color: #000; border-radius: 30%;">C</b> <?php echo $question_row['thirdOptn']?></p></label><br/>
                                                    <input id="fourthOption[<?php echo $i;?>]" type="radio" name="selectedOption[<?php echo $i;?>]" value="4"> <label for="fourthOption[<?php echo $i;?>]"><p style="margin-top: 7px; font-size: 18px; text-align:justify; color: #000;"><b style="background-color: #fff; border: 2px solid #512B8B; padding: 6px; color: #000; border-radius: 30%;">D</b> <?php echo $question_row['fourthOptn']?></p></label>
                                                    
                                                </div>
                                                </div>
                                                </div>
                                        <?php
                                    }
                                }
                              ?>
                        </div>
                      </div>
                      
                       <div class="row">
                            <div class="col-md-12">
                                <input type="submit" class="btn btn-success form-control" value="Complete Exam" id="MCQuestion" name="CompleteExam">
                            </div>
                      <!-- /.card-body -->
                    </div>
                    </form>
                    <!-- /.card -->
                    <!--<form method="post"><input type="hidden" value="<?php// echo $examID; ?>" name="examIDD"><input type="submit" class="btn btn-success form-control" value="timesUp" id="timesUp" name="timesUp"></form>-->
                    
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              
                           
                           <?php
                        }
                        else if($StartingAction == '0'){
                            ?>
                            <div class="col-md-12" id="ExtremedemoCARD">
                                <div class="card">
                                  <div class="card-body">
                                    <div><div style="font-size: 90px; font-weight: bold; text-align: center; color: #4A148C;" id="Extremedemo"></div></div>
                                    
                                    <?php
                                        $examID = $_GET['examID'];
                                        ?>
                                    <form  method="POST">
                                        <input type="hidden" value="<?php echo $examID; ?>" name="examIDDD">
                                        <input style="visibility: hidden;" type="submit" class="" value="" id="startExamForTime" name="startExamForTime">
                                    </form>
                                    
                                        <?php
                                        if(isset($_POST['startExamForTime'])){
                                            
                                                $setAction = 1;
                                                $examid = $_POST['examIDDD'];
                                                
                                                $startExamQuery = query("UPDATE `exam` SET `StartingAction` = '$setAction' WHERE id='$examid'");
                                                confirm($startExamQuery);
                                                if($startExamQuery){
                                                      redirect("exam-question-for-student.php?examID=$examid");
                                                 }
                                                
                                                
                                                
                                        }
                                        
                                        ?>

                                  </div>
                                </div>
                            </div>
                            <?php
                        }
                        else if($StartingAction == '2'){
                            ?>
                                    <div class="col-md-12" id="ExtremedemoCARD">
                                    <div class="card">
                                      <!-- /.card-header -->
                                      <div class="card-body">
                                          <form method="POST" action="" name="MCQuestion">
                                          <div class="row">
                                              <?php
                                                 $Stquery = query("SELECT * FROM students WHERE email = '" . $_SESSION['username'] . "'");  
                                                 confirm($Stquery);
                                                 $row_of_st = fetch_array($Stquery);
                                                 $studentID = $row_of_st['id']; 
                                                 
                                                 
                                                $examID = $_GET['examID'];
                                                //select course
                                                // $select_course=query("SELECT * FROM `course`");
                                                // $fetch_course=fetch_array($select_course);
                                                // $course_id=$fetch_course['id'];
                                                // course select end
                                                
                                                // exam start
                                                $query_exam=query("SELECT * FROM `exam` WHERE action='SHOW' AND id='$examID' ");
                                                $row_exam=fetch_array($query_exam);
                                                $exam_id=$row_exam['id'];
                                                $exam_status=$row_exam['examStatus'];
                                                $courseID=$row_exam['courseID'];
                                                // exam end
                                                
                                                $query_question=query("select * from questions where examID='$exam_id'  ");
                                                $rows = mysqli_num_rows($query_question);
                                                if($rows > 0)
                                                {
                                                    $i = 0;
                                                    while($question_row=fetch_array($query_question))
                                                    {
                                                         $i +=1;
                                                        ?>
                                                        <div class="col-md-12">
                                                        <div class="card shadow p-3 mb-5 bg-white rounded">
                                                        <div class="card-header">
                                                           <div class="row">
                                                               <div class="col-md-1 col-1">
                                                                   <?php //echo $i;?>
                                                               <h4><b><?php echo $question_row['question_number']?></b></h4>
                                                           </div>
                                                           <div class="col-md-11 col-11">
                                                               <h4><b><?php echo $question_row['questionName']?></b></h4>
                                                           </div>
                                                           </div>
                                                           </div>
                                                        <div class="card-body">
                                                            <input type="hidden" value="<?php echo $i?>" name="count">
                                                            <input type="hidden" value="<?php echo $question_row['mark']?>" name="mark[<?php echo $i;?>]">
                                                            <input type="hidden" value="<?php echo $question_row['negativeMark']?>" name="negativeMark[<?php echo $i;?>]">
                                                            <input type="hidden" value="<?php echo $question_row['rightAns']?>" name="rightAns[<?php echo $i;?>]">
                                                            
                                                            <input type="hidden" value="<?php echo $question_row['id']?>" name="questionID[<?php echo $i;?>]">
                                                            <input type="hidden" value=" <?php echo $exam_id?>" name="exam_id[<?php echo $i;?>]">
                                                            <input type="hidden" value=" <?php echo $studentID?>" name="studentID[<?php echo $i;?>]">
                                                            <input type="hidden" value=" <?php echo $question_row['question_number']?>" name="quesNumber[<?php echo $i;?>]">
                                                            
                                                            (A) <?php echo $question_row['firstOptn']?><br/>
                                                            (B) <?php echo $question_row['secondOptn']?><br/>
                                                            (C) <?php echo $question_row['thirdOptn']?><br/>
                                                            (D) <?php echo $question_row['fourthOptn']?>
                                                        </div>
                                                        </div>
                                                        </div>
                                                <?php
                                            }
                                        }
                                      ?>
                                </div>
                              </div>
                               <div class="row">
                                    <!--<div class="col-md-12">-->
                                    <!--    <input type="submit" class="btn btn-success form-control" value="Complete Exam" id="MCQuestion" name="CompleteExam">-->
                                    <!--</div>-->
                              <!-- /.card-body -->
                            </div>
                            </form>
                            <!-- /.card -->
                          </div>
                          <!-- /.col -->
                        </div>
                        <!-- /.row -->
                      </div>
                      
                            
                            
                            <?php
                        }
                        
                    ?>
                    
                  
              <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
          </div>
        
        <?php
        
        ?>


<!--FOOTER START HERE-->
 
<footer class="footer-area">
<div class="container-fluid">
<div class="row">
<div class="col-lg-12">
<div class="copyright_part_text text-center">
<div class="row">
<div class="col-lg-12">
<p class="footer-text m-0">
Copyright &copy;<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>document.write(new Date().getFullYear());</script> This  Software made with <i class="ti-heart" aria-hidden="true"></i> by <a href="https://faraitfusion.com/" target="_blank">FARA IT Fusion</a>
</p>
</div>
</div>
</div>
</div>
</div>
</div>
</footer>


    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<?php

                $examID = $_GET['examID'];
                $query = query("SELECT * FROM `exam` WHERE  id='$examID'");
                confirm($query);
                $row = fetch_array($query);
                $time = $row['examTime'];
                $updateTime = $time*60;
                
                ?>
<!--<script>-->
<!--            var div = document.getElementById('display');-->
<!--            var submitted = document.getElementById('submitted');-->

<!--              function CountDown(duration, display) {-->

<!--                        var timer = duration, minutes, seconds;-->

<!--                      var interVal=  setInterval(function () {-->
<!--                            minutes = parseInt(timer / 60, 10);-->
<!--                            seconds = parseInt(timer % 60, 10);-->

<!--                            minutes = minutes < 10 ? "0" + minutes : minutes;-->
<!--                            seconds = seconds < 10 ? "0" + seconds : seconds;-->
<!--                    display.innerHTML ="<b>" + minutes + "m : " + seconds + "s" + "</b>";-->
<!--                            if (timer > 0) {-->
<!--                               --timer;-->
<!--                            }else{-->
<!--                       clearInterval(interVal)-->
<!--                                SubmitFunction();-->
<!--                             }-->

<!--                       },1000);-->

<!--                }-->

<!--              function SubmitFunction(){-->
<!--                submitted.innerHTML="Time is up!";-->
              

<!--               }-->
               
<!--               CountDown(<?php // echo $updateTime; ?>,div);-->
               
<!--            </script>-->
            
            
            
           
            <?php
                        
                            $examID = $_GET['examID'];
                                            
                            // exam start
                            $query_exam=query("SELECT * FROM `exam` WHERE action='SHOW' AND id='$examID' ");
                            $row_exam=fetch_array($query_exam);
                            $exam_id=$row_exam['id'];
                            $scheduleDate = $row_exam['scheduleDate'];
                            $scheduleTime = $row_exam['scheduleTime'];
                            
                           $StartingAction = $row_exam['StartingAction'];
                           
                        if($StartingAction == '0'){
                           ?>
    <!--// Start exam Start Exam Start exam Start Exam Start exam Start Exam  For Before Exam Timer--------------------For Before Exam Timer---->
                            <script>
                                var countDownDate = <?php echo strtotime("$scheduleDate $scheduleTime") ?> * 1000;
                                var now = <?php echo time() ?> * 1000;
                                
                                // Update the count down every 1 second
                                var x = setInterval(function() {
                                now = now + 1000;
                                // Find the distance between now an the count down date
                                var distance = countDownDate - now;
                                // Time calculations for days, hours, minutes and seconds
                                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                                var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                                // Output the result in an element with id="demo"
                                document.getElementById("Extremedemo").innerHTML = days + "d " + hours + "h " +
                                minutes + "m " + seconds + "s ";
                                // If the count down is over, write some text 
                                if (distance < 0) {
                                clearInterval(x);
                                 document.getElementById('startExamForTime').click();
                                }
                                }, 1000);
                            </script>
        <!--// Start exam Start Exam  For Before Exam Timer End---------------------------------------------------For Before Exam Timer End-------------For Before Exam Timer End---->
             <?php
                        }
                        else if($StartingAction == '1'){
                            ?>
            <!--// For Starting Action Exam Timer--------------------------------------------------For Starting Action Exam Timer--------------------------->
                            <?php
                            
                                $examID = $_GET['examID'];
                                                
                                // exam start
                                $query_exam=query("SELECT * FROM `exam` WHERE action='SHOW' AND id='$examID' ");
                                $row_exam=fetch_array($query_exam);
                                $exam_id=$row_exam['id'];
                                $scheduleDate = $row_exam['scheduleDate'];
                                $examEndTime = $row_exam['examEndTime'];
                                $examTime = $row_exam['examTime'];
                                // strtotime("$scheduleDate $scheduleTime $examTime");
                                // echo strtotime("$examTime");
                                 
                            ?>
                            <script>
                                var countDownDate = <?php echo strtotime("$scheduleDate $examEndTime") ?> * 1000;
                                var now = <?php echo time() ?> * 1000;
                                
                                // Update the count down every 1 second
                                var x = setInterval(function() {
                                now = now + 1000;
                                // Find the distance between now an the count down date
                                var distance = countDownDate - now;
                                // Time calculations for days, hours, minutes and seconds
                                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                                var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                                // Output the result in an element with id="demo"
                                document.getElementById("demo").innerHTML = days + "d " + hours + "h " +
                                minutes + "m " + seconds + "s ";
                                // If the count down is over, write some text 
                                if (distance < 0) {
                                clearInterval(x);
                                 document.getElementById('MCQuestion').click();
                                }
                                }, 1000);
                            </script>
                             <!--// For Starting Action Exam Timer End-----------------------------For Starting Action Exam Timer End-------------------------For Starting Action Exam Timer End-------------->
                             
                            <?php
                        }
             ?>
           

            
</body>
</html>


<?php



// if(isset($_POST['timesUp'])){
    
//         $exam_id = $_POST['examIDD'];
        
//         $setAction = 2;
//         $startExamQuery = query("UPDATE `exam` SET `StartingAction` = '$setAction' WHERE id='$exam_id[$i]'");
//         confirm($startExamQuery);
 
// }



if(isset($_POST['CompleteExam'])){
    
         $count = $_POST['count']+1;
         
          $exam_id = $_POST['exam_id'];
         $studentID = $_POST['studentID'];
         $quesNumber = $_POST['quesNumber'];
         $questionID = $_POST['questionID'];
         $selectedOption = $_POST['selectedOption'];
         
         $QuesMark = $_POST['mark'];
         $negativeMark = $_POST['negativeMark'];
         $rightAns = $_POST['rightAns'];
         
        
    
    for($i=1; $i < $count; $i++){
        
         $resultInsertQuery = query("INSERT INTO resultForPermanentExam(examID, studentID, questionID, selectedAns, questionNum, mark, negativeMark, rightAns) VALUES('$exam_id[$i]', '$studentID[$i]', '$questionID[$i]', '$selectedOption[$i]', '$quesNumber[$i]', '$QuesMark[$i]', '$negativeMark[$i]', '$rightAns[$i]')");
         confirm($resultInsertQuery);
         if($resultInsertQuery){
              set_message('<h2 class="m-0 text-dark bg-success text-center" style="padding: 10px; border-radius: 20px;">Welcome, Your Exam is Complete</h2>');
              redirect("result.php?examID=$exam_id[$i]");
         }
         
    }
     
}



?>

