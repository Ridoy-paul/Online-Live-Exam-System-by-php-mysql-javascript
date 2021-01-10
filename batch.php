<?php include ("student-header.php");?>

<section class="feature_part">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5">
                <div class="section_tittle text-center">
                    <p></p>
                    <h2>All Batch</h2>
                </div>
            </div>
        </div>
        <div class="row" style="padding-bottom: 30px;">
            
            <?php
                            
                                // student session start 
                                $username = $_SESSION['username'];
                                $select_student=query("SELECT * FROM `students` where email='$username' ");
                                $fetch_student=fetch_array($select_student);
                                $studentID = $fetch_student['id'];
                                // student session end
                            
                            
                            $query = query("SELECT * FROM `course` WHERE action='SHOW'");
                                confirm($query);
                                $rows = mysqli_num_rows($query);
                                if($rows > 0)
                                {
                                    $i = 1;
                                    while($row = fetch_array($query))
                                    {
                                       
                                        $courseID=$row['id'];
                                        // $query_course = query("SELECT * FROM `course` WHERE action='SHOW' AND id='$courseID'");
                                        // $batchID = fetch_array($query_course);
                                        
                                        $checkBatchQuery = query("SELECT * FROM studentBatch WHERE studentID='$studentID' AND  batchID='$courseID'");
                                        confirm($checkBatchQuery);
                                        $rowOfStuBatch = fetch_array($checkBatchQuery);
                                        $batchAccess = $rowOfStuBatch['batchID'];
                                        
                                            ?>
                                               <div class="col-sm-4 col-xl-4">
                                                    <div class="single_feature">
                                                        <div class="single_feature_part">
                                                            <h4><?php echo $row['name'];?></h4>
                                                            <hr>
                                                            <div class="row">
                                                                <?php
                                                                    if(!empty($batchAccess)){
                                                                        ?>
                                                                        <div class="col-md-5 col-5">
                                                                            <a class="btn_4" href="batch-wise-live-exam.php?batchID=<?php echo $row['id'];?>">Live Exam</a>
                                                                        </div>
                                                                        <div class="col-md-7 col-7">
                                                                            <a class="btn_4" href="batch-wise-test-exam.php?batchID=<?php echo $row['id'];?>">Test Your Skills</a>
                                                                        </div>
                                                                        
                                                                   <?php
                                                                    }
                                                                    else{
                                                                        ?>
                                                                        <div class="col-md-12">
                                                                            <a class="btn_4" href="#">Contact for Access</a>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                            <?php
                                       $i++;
                                       
                                    }
                                }
                              ?>
                      
        </div>
    </div>
</section>


<?php include ("student-footer.php");?>
