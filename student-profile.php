<?php include ("student-header.php");?>
<style>
    .student-profile .card {
  border-radius: 10px;
}

.student-profile .card .card-header .profile_img {
  width: 150px;
  height: 150px;
  object-fit: cover;
  margin: 10px auto;
  border: 10px solid #ccc;
  border-radius: 50%;
}

.student-profile .card h3 {
  font-size: 20px;
  font-weight: 700;
}

.student-profile .card p {
  font-size: 16px;
  color: #000;
}

.student-profile .table th,
.student-profile .table td {
  font-size: 14px;
  padding: 5px 10px;
  color: #000;
}
</style>
<?php

// student session start 
 $username = $_SESSION['username'];
$select_student=query("SELECT * FROM `students` where email='$username' ");
$fetch_student=fetch_array($select_student);
$std_row=$fetch_student['id'];
// student session end


// // start exam select
// $select_exam=query("SELECT * FROM `exam` WHERE examStatus='Permanent' order by id desc");
// $fetch_exam=fetch_array($select_exam);
// $fetch_exam_id=$fetch_exam['id'];
// // start exam end



// // for permanent exam start

// //right ans
// $sumOfRightAns=query("SELECT SUM(mark) as total_for FROM resultForPermanentExam WHERE selectedAns=rightAns AND examID='$fetch_exam_id' AND studentID='$std_row'  ");
// //wrong ans
// $sumOfWrongAns=query("SELECT SUM(negativeMark) as total_for FROM resultForPermanentExam WHERE selectedAns!=rightAns AND selectedAns!='0' AND examID='$fetch_exam_id' AND studentID='$std_row'");

// // for permanent exam end



// // temporary starts

// // start exam select
// $select_exam_tmp=query("SELECT * FROM `exam` WHERE examStatus='Temporary' order by id desc");
// $fetch_exam_tmp=fetch_array($select_exam_tmp);
// $fetch_exam_id_tmp=$fetch_exam_tmp['id'];
// // start exam end

// //right ans
// $tmp_right=query("SELECT SUM(mark) as total_for_right_temp FROM resultForPermanentExam WHERE selectedAns=rightAns AND examID='$fetch_exam_id_tmp' AND studentID='$std_row'");
// //wrong ans
// $tmp_wrong=query("SELECT SUM(negativeMark) as total_for_wrong_temp FROM resultForPermanentExam WHERE selectedAns!=rightAns AND selectedAns!='0' AND examID='$fetch_exam_id_tmp' AND studentID='$std_row'");




?>
 <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
              <div class="container-fluid">
                  <div class="row">
                        <div class="col-sm-12 col-xl-12 text-center"  style="padding: 50px 0px;">
                            <div class="single_feature_text ">
                                <h2></h2>
                                <p></p>
                            </div>
                        </div>
                    </div>
                <div class="row mb-2">
                  <div class="col-md-12">
                    <h1 style="text-align:center;"></h1>
                    <h1 class="m-0 text-dark"><?php display_message(); ?></h1>
                  </div>
                </div>
              </div><!-- /.container-fluid -->
            </section>
        
            <!-- Main content -->
            <section class="content">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-12">
                    <!-- /.card -->
                    <div class="student-profile py-4">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <div class="card shadow-sm">
          <div class="card-header bg-transparent text-center">
            <img class="profile_img" src="media/hqdefault.png" alt="">
            <h3><a href="edit-student.php" class="btn btn-info btn-sm" role="button">Edit profile</a></h3>
          </div>
          <!--<div class="card-body">-->
          <!--  <p class="mb-0"><strong class="pr-1">Student ID:</strong><?php echo $std_row?></p>-->
          <!--  <p class="mb-0"><strong class="pr-1">Email:</strong><?php echo $username?></p>-->
            
          <!--</div>-->
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card shadow-sm">
          <div class="card-header bg-transparent border-0">
            <h3 class="mb-0"><i class="far fa-clone pr-1"></i>General Information</h3>
          </div>
          <div class="card-body pt-0">
            <table class="table table-bordered">
              <tr>
                <th width="30%">ID</th>
                <td width="2%">:</td>
                <td><?php echo $std_row?></td>
              </tr>
              <tr>
                <th width="30%">Name</th>
                <td width="2%">:</td>
                <td><?php echo $fetch_student['name'];?></td>
              </tr>
              <tr>
                <th width="30%">Email</th>
                <td width="2%">:</td>
                <td><?php echo $username?></td>
              </tr>
              <tr>
                <th width="30%">Password</th>
                <td width="2%">:</td>
                <td><?php echo $fetch_student['without_md5']?></td>
              </tr>
              
              <tr>
                <th width="30%">Phone</th>
                <td width="2%">:</td>
                <td><?php echo $fetch_student['phone']?></td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="row" style="padding-top: 20px;">
        <!--permanent  total score start-->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center"><h3>Permanent Total Score</h3></div>
                <div class="card-body">
                        <table id="" class="table table-hover">
                          <thead>
                          <tr class="bg-primary">
                            <th style="color: white;">Exam Name</th>
                            <th style="color: white;">Score</th>
                          </tr>
                          </thead>
                          
                          <tbody>
                              <?php
                              
                                // student session start 
                                $_SESSION['email'] = $username;
                                $select_student=query("SELECT * FROM `students` where email='$username' ");
                                $fetch_student=fetch_array($select_student);
                                $studentID = $fetch_student['id'];
                                // student session end
                              
                                $query = query("SELECT * FROM `exam` WHERE examStatus='Permanent' ORDER BY id DESC");
                                confirm($query);
                                $rows = mysqli_num_rows($query);
                                if($rows > 0)
                                {
                                    $i = 1;
                                    while($row = fetch_array($query))
                                    {
                                        $examID = $row['id'];
                                        
                                        
                                        $checkExamIDQueryInResult = query("SELECT * FROM resultForPermanentExam WHERE  examID='$examID'");
                                        confirm($checkExamIDQueryInResult);
                                        $rowOfResult = fetch_array($checkExamIDQueryInResult);
                                        $ResultExamID = $rowOfResult['examID'];
                                        
                                        
                                        //right ans
                                        $sumOfRightAns=query("SELECT SUM(mark) as total_for FROM resultForPermanentExam WHERE selectedAns=rightAns AND examID='$examID' AND studentID='$studentID' ");
                                        $sumOfRight=fetch_array($sumOfRightAns);
                                        $right = $sumOfRight['total_for'];
                                        //wrong ans
                                        $sumOfWrongAns=query("SELECT SUM(negativeMark) as total_for FROM resultForPermanentExam WHERE selectedAns!=rightAns AND selectedAns!='0' AND examID='$examID' AND studentID='$studentID'");
                                        $sumOfNegative=fetch_array($sumOfWrongAns);
                                        $wrong =  $sumOfNegative['total_for'];
                                        
                                        $score = $right + $wrong;

                                       ?>
                                       <tr>
                                            <td style="width: 350px;"><b><?php echo $row['name'];?></b></td>
                                            <?php
                                                if(!empty($score)){
                                                    ?>
                                                   <td style="font-size: 30px; font-weight: bold; text-align:center;"><b><?php echo $score;?></b></td>
                                                    <?php
                                                }
                                                else {
                                                    
                                                    if($score==0  && !empty($ResultExamID)){
                                                        ?>
                                                        <td style="font-size: 30px; font-weight: bold; text-align:center;"><?php echo $score;?></td>
                                                    <?php
                                                    }
                                                    else{
                                                        ?>
                                                        <td style="text-align:center;"><a href="start-permanent-exam.php?examID=<?php echo $examID;?>" class="btn_4">Start Exam</a></td>
                                                    <?php
                                                    }
                                                    }
                                            ?>
                                          </tr>
                          
                                       <?php
                                       $i++;
                                       
                                    }
                                }
                              ?>
                          
                          
                          </tbody>
                          <!--tfooter-->
                          
                        </table>
                      </div>
            </div>
        </div>
        <!--permanent end total score end-->
        
        <!--Temporary  total score start-->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center"><h3>Temporary Total Score</h3></div>
                <div class="card-body">
                        <table id="" class="table table-hover">
                          <thead>
                          <tr class="bg-primary">
                            <th style="color: white;">Exam Name</th>
                            <th style="color: white;">Score</th>
                          </tr>
                          </thead>
                          
                          <tbody>
                              <?php
                              
                                // student session start 
                                $_SESSION['email'] = $username;
                                $select_student=query("SELECT * FROM `students` where email='$username' ");
                                $fetch_student=fetch_array($select_student);
                                $studentID = $fetch_student['id'];
                                // student session end
                              
                                $query = query("SELECT * FROM `exam` WHERE examStatus='Temporary' AND action='SHOW' ORDER BY id DESC");
                                confirm($query);
                                $rows = mysqli_num_rows($query);
                                if($rows > 0)
                                {
                                    $i = 1;
                                    while($row = fetch_array($query))
                                    {
                                        $examID = $row['id'];
                                        
                                        $checkExamIDQueryInResult = query("SELECT * FROM resultForPermanentExam WHERE  examID='$examID'");
                                        confirm($checkExamIDQueryInResult);
                                        $rowOfResult = fetch_array($checkExamIDQueryInResult);
                                        $ResultExamID = $rowOfResult['examID'];
                                        
                                        
                                        //right ans
                                        $sumOfRightAns=query("SELECT SUM(mark) as total_for FROM resultForPermanentExam WHERE selectedAns=rightAns AND examID='$examID' AND studentID='$studentID' ");
                                        $sumOfRight=fetch_array($sumOfRightAns);
                                        $right = $sumOfRight['total_for'];
                                        //wrong ans
                                        $sumOfWrongAns=query("SELECT SUM(negativeMark) as total_for FROM resultForPermanentExam WHERE selectedAns!=rightAns AND selectedAns!='0' AND examID='$examID' AND studentID='$studentID'");
                                        $sumOfNegative=fetch_array($sumOfWrongAns);
                                        $wrong =  $sumOfNegative['total_for'];
                                        
                                        $score = $right + $wrong;

                                       ?>
                                       <tr>
                                            <td style="width: 350px;"><b><?php echo $row['name'];?></b></td>
                                            <?php
                                                if(!empty($score)){
                                                    ?>
                                                   <td style="font-size: 30px; font-weight: bold; text-align:center;"><b><?php echo $score;?></b></td>
                                                    <?php
                                                }
                                                else {
                                                    
                                                    if($score==0  && !empty($ResultExamID)){
                                                        ?>
                                                        <td style="font-size: 30px; font-weight: bold; text-align:center;"><?php echo $score;?></td>
                                                    <?php
                                                    }
                                                    else{
                                                        ?>
                                                        <td style="text-align:center;"></td>
                                                    <?php
                                                    }
                                                    }
                                            ?>
                                          </tr>
                          
                                       <?php
                                       $i++;
                                       
                                    }
                                }
                              ?>
                          
                          
                          </tbody>
                          <!--tfooter-->
                          
                        </table>
                      </div>
            </div>
        </div>
    </div>
  </div>
</div>
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
<!-- footer Start -->
<?php include ("student-footer.php");?>
<!-- footer End -->