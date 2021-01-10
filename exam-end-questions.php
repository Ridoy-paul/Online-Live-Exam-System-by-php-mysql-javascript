<?php include ("student-header.php");?>
<?
    $examID = $_GET['examID'];
    //select course
    // $select_course=query("SELECT * FROM `course`");
    // $fetch_course=fetch_array($select_course);
    // $course_id=$fetch_course['id'];
    // course select end
    
    // exam start
    $query_exam=query("SELECT * FROM `exam` WHERE action='SHOW' AND id='$examID'");
    $row_exam=fetch_array($query_exam);
    $total_mark = $row_exam['total_mark'];
    $exName=$row_exam['name'];
    $maxQuestionNum = $row_exam['maxQuestionNum'];
   $passed_mark = $row_exam['passed_mark'];
   $examTime = $row_exam['examTime'];

?>
<style>
  @media only screen and (max-width: 824px) {
  #examMainStart {
    margin-top: 70px;
  }
  
}  
#questionTable{
    margin-top: -80px !important;
}

</style>
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
                                    <h5>Passed Mark: <?php echo $passed_mark; ?></h5>
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

            <!-- Main content -->
            <section class="content">
              <div class="container-fluid">
                <div class="row" id="questionTable">
                  <div class="col-12">
                    <div class="card" >
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
                                $query_exam=query("SELECT * FROM `exam` WHERE action='SHOW' AND id='$examID'");
                                $row_exam=fetch_array($query_exam);
                                $exam_id=$row_exam['id'];
                                $exam_status=$row_exam['examStatus'];
                                $courseID=$row_exam['courseID'];
                                // exam end
                                
                                $query_question=query("select * from questions where examID='$exam_id'");
                                $rows = mysqli_num_rows($query_question);
                                if($rows > 0)
                                {
                                    $i = 0;
                                    while($question_row=fetch_array($query_question))
                                    {
                                         $i +=1;
                                        ?>
                                        <div class="col-md-12">
                                                <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                                                  <div class="card-body">
                                                      <div class="row">
                                                            <div class="col-md-1 col-1">
                                                                <div style="height: 40px; width: 40px; background-color: #007BFF; border-radius: 30px; text-align:center;"><p style="font-size: 20px; color: white;"><?php echo $question_row['question_number']?></p></div>
                                                            </div>
                                                            <div class="col-md-11 col-11 qes">
                                                                <h5 class="card-title text-bold" style="margin-top: 10px;"><?php echo $question_row['questionName']?></h5> 
                                                            </div>
                                                        </div>
                                                                <ul class="list-group list-group-flush">
                                                                    <li class="list-group-item"></li>
                                                                    <li class="list-group-item <?php if($question_row['rightAns'] == 1){ echo "bg-success";}?>"><p style="margin-top: 7px; text-align:justify; color: #000;"><b style="background-color: #fff; border: 2px solid #512B8B; padding: 6px; color: #000; border-radius: 30%;">A</b> <?php echo $question_row['firstOptn']?></p></li>
                                                                    <li class="list-group-item <?php if($question_row['rightAns'] == 2){ echo "bg-success";}?>"><p style="margin-top: 7px; text-align:justify; color: #000;"><b style="background-color: #fff; border: 2px solid #512B8B; padding: 6px; color: #000; border-radius: 30%;">B</b> <?php echo $question_row['secondOptn']?></p></li>
                                                                    <li class="list-group-item <?php if($question_row['rightAns'] == 3){ echo "bg-success";}?>"><p style="margin-top: 7px; text-align:justify; color: #000;"><b style="background-color: #fff; border: 2px solid #512B8B; padding: 6px; color: #000; border-radius: 30%;">C</b> <?php echo $question_row['thirdOptn']?></p></li>
                                                                    <li class="list-group-item <?php if($question_row['rightAns'] == 4){ echo "bg-success";}?>"><p style="margin-top: 7px; text-align:justify; color: #000;"><b style="background-color: #fff; border: 2px solid #512B8B; padding: 6px; color: #000; border-radius: 30%;">D</b> <?php echo $question_row['fourthOptn']?></p></li>
                                                                  </ul><br>
                                                                  <div style=" background-color: #D7F7D4; padding: 10px;  border-radius: 5px;">
                                                                  <p style="font-size: 16px;margin-top:10px;text-align: justify;"><b class="text-dark">Right Ans Des: </b><?php echo $rowOfQuestions['rightAnsDes']?></p>
                                                                  </div>
                                                  </div>
                                                  <div class="card-footer" style="background-color:#4a148c;color:#fff;">
                                                      
                                                  </div>
                                                </div>
                                            </div>
                                        <?php
                        
                                    }
                                   
                                }
                              ?>
                          
                        </div>
                      </div>
                      
                    </form>
                    <!-- /.card -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
          </div>
        
        <?php
        
        ?>


<?php include ("student-footer.php");?>

