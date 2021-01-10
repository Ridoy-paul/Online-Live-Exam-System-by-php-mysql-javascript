<?php include ("student-header.php");?>

<section class="banner_part">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-xl-6">
                <div class="banner_text">
                    <div class="banner_text_iner">
                        <h5>March Forward BD</h5>
                        <h1>Education is The Key To Success</h1>
                        <p>March Forward feels that, there is huge gap of quality education between urabn and rural students of Bangladesh. It must be eliminated. Quality education is a basic right of all and a nation never prosper without ensuring this. March Forward is dedicated to combat this inequality.</p>
                        <a href="all-exam-for-student.php" class="btn_1">Live Exam </a>
                        <a href="students-permanent-exam.php" class="btn_2">Test Your Skills </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="feature_part" >
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-xl-12 text-center">
                <div class="single_feature_text ">
                    <h2>Live Exam</h2>
                    <p></p>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
                            
                                // student session start 
                                $username = $_SESSION['username'];
                                $select_student=query("SELECT * FROM `students` where email='$username' ");
                                $fetch_student=fetch_array($select_student);
                                $studentID = $fetch_student['id'];
                                // student session end
                            
                            
                            $query = query("SELECT * FROM `exam` WHERE action='SHOW' AND examStatus='Temporary' ORDER BY id DESC");
                                confirm($query);
                                $rows = mysqli_num_rows($query);
                                if($rows > 0)
                                {
                                    $i = 1;
                                    while($row = fetch_array($query))
                                    {
                                        $scheduleDate = $row_exam['scheduleDate'];
                                        $scheduleTime = $row_exam['scheduleTime'];
                                        $examStartingStatus = $row['StartingAction'];
                                        
                                        $courseID=$row['courseID'];
                                        // $query_course = query("SELECT * FROM `course` WHERE action='SHOW' AND id='$courseID'");
                                        // $batchID = fetch_array($query_course);
                                        
                                        $checkBatchQuery = query("SELECT * FROM studentBatch WHERE studentID='$studentID' AND  batchID='$courseID'");
                                        confirm($checkBatchQuery);
                                        $rowOfStuBatch = fetch_array($checkBatchQuery);
                                        $batchAccess = $rowOfStuBatch['batchID'];
                                        
                                        if(!empty($batchAccess)){
                                            ?>
                                                <div class="col-sm-4 col-xl-4">
                                                    <div class="single_feature">
                                                        <div class="single_feature_part">
                                                            <h4><?php echo $row['name'];?></h4>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-md-6 col-6">
                                                                    <b class="text-primary"></b><?php echo date('j M, Y', strtotime($row['scheduleDate'])); ?> 
                                                                </div>
                                                                <div class="col-md-6 col-6">
                                                                    <?php echo date("g:i a", strtotime($row['scheduleTime']));?>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-md-6 col-6">
                                                                    <b class="text-primary">Total Mark:</b> <?php echo $row['total_mark'];?> 
                                                                </div>
                                                                <div class="col-md-6 col-6">
                                                                    <b class="text-primary">Pass Mark:</b> <?php echo $row['passed_mark'];?>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <?php
                                                                    date_default_timezone_set("Asia/Dhaka");
                                                                    if(strtotime(date("Y/m/d")) <= strtotime($row['scheduleDate']) && strtotime(date("h:i:sa")) <= strtotime($row['examEndTime'])){
                                                                        ?>
                                                                        <div class="col-md-12 col-12">
                                                                        <?php 
                                                                                $examID = $row['id'];
                                                                                 $Stquery = query("SELECT * FROM students WHERE email = '" . $_SESSION['username'] . "'");  
                                                                                 confirm($Stquery);
                                                                                 $row_of_st = fetch_array($Stquery);
                                                                                 $studentID = $row_of_st['id']; 
                                                                                 $checkQuery = query("SELECT * FROM resultForPermanentExam WHERE examID='$examID' AND studentID='$studentID'");
                                                                                 confirm($checkQuery);
                                                                                 $rowOfResult = fetch_array($checkQuery);
                                                                                 $DBexamID = $rowOfResult['examID'];
                                                                                 
                                                                                 if(!empty($DBexamID)){
                                                                                     ?>
                                                                                        <a  href="result.php?examID=<?php echo $DBexamID?>" class="btn bg-warning form-control">See Result</a>
                                                                                     <?php
                                                                                 }
                                                                                 else{
                                                                                     ?>
                                                                                     <a  href="exam-end-questions.php?examID=<?php echo $row['id']?>" class="btn_4">See Questions</a>
                                                                                     <?php
                                                                                 }
                                                                           ?>
                                                                           </div>
                                                                        <?php
                                                                    }
                                                                    else{
                                                                         ?>
                                                                        <div class="col-md-12 col-12">
                                                                            <?php 
                                                                                $examID = $row['id'];
                                                                                 $Stquery = query("SELECT * FROM students WHERE email = '" . $_SESSION['username'] . "'");  
                                                                                 confirm($Stquery);
                                                                                 $row_of_st = fetch_array($Stquery);
                                                                                 $studentID = $row_of_st['id']; 
                                                                                 $checkQuery = query("SELECT * FROM resultForPermanentExam WHERE examID='$examID' AND studentID='$studentID'");
                                                                                 confirm($checkQuery);
                                                                                 $rowOfResult = fetch_array($checkQuery);
                                                                                 $DBexamID = $rowOfResult['examID'];
                                                                                 
                                                                                 if(!empty($DBexamID)){
                                                                                     ?>
                                                                                        <a  href="result.php?examID=<?php echo $DBexamID?>" class="btn bg-warning form-control">See Result</a>
                                                                                     <?php
                                                                                 }
                                                                                 else{
                                                                                     ?>
                                                                                     <a  href="exam-question-for-student.php?examID=<?php echo $row['id']?>" class="btn_4">Start Exam</a>
                                                                                     <?php
                                                                                 }
                                                                           ?>
                                                                        </div>
                                                                        
                                                                        <?php
                                                                    }
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            <?php
                                        }
                                       $i++;
                                       
                                    }
                                }
                              ?>
                          
        </div>
    </div>
</section>


<section class="feature_part">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5">
                <div class="section_tittle text-center">
                    <p></p>
                    <h2>Test Your Skills</h2>
                </div>
            </div>
        </div>
        <div class="row">
            
            <?php
                            
                                // student session start 
                                $_SESSION['username'] = $username;
                                $select_student=query("SELECT * FROM `students` where email='$username' ");
                                $fetch_student=fetch_array($select_student);
                                $studentID = $fetch_student['id'];
                                // student session end
                            
                            
                            $query = query("SELECT * FROM `exam` WHERE action='SHOW' AND examStatus='Permanent'");
                                confirm($query);
                                $rows = mysqli_num_rows($query);
                                if($rows > 0)
                                {
                                    $i = 1;
                                    while($row = fetch_array($query))
                                    {
                                        $scheduleDate = $row_exam['scheduleDate'];
                                        $scheduleTime = $row_exam['scheduleTime'];
                                        $examStartingStatus = $row['StartingAction'];
                                        
                                        $courseID=$row['courseID'];
                                        // $query_course = query("SELECT * FROM `course` WHERE action='SHOW' AND id='$courseID'");
                                        // $batchID = fetch_array($query_course);
                                        
                                        $checkBatchQuery = query("SELECT * FROM studentBatch WHERE studentID='$studentID' AND  batchID='$courseID'");
                                        confirm($checkBatchQuery);
                                        $rowOfStuBatch = fetch_array($checkBatchQuery);
                                        $batchAccess = $rowOfStuBatch['batchID'];
                                        
                                        if(!empty($batchAccess)){
                                            ?>
                                               <div class="col-sm-3 col-xl-3">
                                                    <div class="single_feature">
                                                        <div class="single_feature_part">
                                                            <h4><?php echo $row['name'];?></h4>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-md-6 col-6">
                                                                    <b class="text-primary">Total Mark:</b> <?php echo $row['total_mark'];?> 
                                                                </div>
                                                                <div class="col-md-6 col-6">
                                                                    <b class="text-primary">Pass Mark:</b> <?php echo $row['passed_mark'];?>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                
                                                                <div class="col-md-12 col-12">
                                                                    <?php 
                                                                        $examID = $row['id'];
                                                                        
                                                                         $Stquery = query("SELECT * FROM students WHERE email = '" . $_SESSION['username'] . "'");  
                                                                         confirm($Stquery);
                                                                         $row_of_st = fetch_array($Stquery);
                                                                         $studentID = $row_of_st['id']; 
                                                                         
                                                                         $checkQuery = query("SELECT * FROM resultForPermanentExam WHERE examID='$examID' AND studentID='$studentID'");
                                                                         confirm($checkQuery);
                                                                         $rowOfResult = fetch_array($checkQuery);
                                                                         $DBexamID = $rowOfResult['examID'];
                                                                         
                                                                         if(!empty($DBexamID)){
                                                                             ?>
                                                                                <a  href="result.php?examID=<?php echo $DBexamID?>" class="btn bg-warning form-control">See Result</a>
                                                                             <?php
                                                                         }
                                                                         else{
                                                                             ?>
                                                                             <a  href="start-permanent-exam.php?examID=<?php echo $row['id']?>" class="btn bg-warning form-control">Start Exam</a>
                                                                             <?php
                                                                         }
                                                                    
                                                                   ?>
                                                                </div>
                                                            </div>
                                                      

                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                        }
                                       $i++;
                                       
                                    }
                                }
                              ?>
                      
        </div>
    </div>
</section>


<section class="advance_feature learning_part">
    <div class="container">
        <div class="row align-items-sm-center align-items-xl-stretch">
            <div class="col-md-6 col-lg-6">
                <div class="learning_member_text">
                    <h5>Advance feature</h5>
                    <h2>Our Advance Educator
                        Learning System</h2>
                    <p>Fifth saying upon divide divide rule for deep their female all hath brind mid Days
                        and beast greater grass signs abundantly have greater also use over face earth
                        days years under brought moveth she star</p>
                    <div class="row">
                        <div class="col-sm-6 col-md-12 col-lg-6">
                            <div class="learning_member_text_iner">
                                <span class="ti-pencil-alt"></span>
                                <h4>Learn Anywhere</h4>
                                <p>There earth face earth behold she star so made void two given and also our</p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-12 col-lg-6">
                            <div class="learning_member_text_iner">
                                <span class="ti-stamp"></span>
                                <h4>Expert Teacher</h4>
                                <p>There earth face earth behold she star so made void two given and also our</p>
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

<?php include ("student-footer.php");?>
