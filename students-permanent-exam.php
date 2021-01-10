<?php include ("student-header.php");?>

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
                                $username = $_SESSION['username'];
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


<?php include ("student-footer.php");?>
