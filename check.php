<?php require_once("backend/config.php"); ?>
<?php include("header.php"); ?>
<?php include ("left-sidebar.php");?>

<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"></h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">

            <div class="col-12">
           <div class="card">
               <div class="card-header">
                   <h3>Add question</h3>
               </div>
               <div class="card-body">
                   <?php
        if (isset($_POST['send']))
        {
             
            if(!empty($_POST['option'])){
                $count=count($_POST['option']);
                echo "out of 5,You have selected".$count;
                
                $result=0;
                $wrong_result=0;
                $i=0;
                $selected=$_POST['option'];
                //select course
                $select_course=query("SELECT * FROM `course`");
                $fetch_course=fetch_array($select_course);
                $course_id=$fetch_course['id'];
                // course select end
                
                // exam start
                $query_exam=query("SELECT * FROM `exam` WHERE action='SHOW'   AND examStatus='Temporary' AND courseID='$course_id' AND StartingAction=1 ");
                $row_exam=fetch_array($query_exam);
                $exam_id=$row_exam['id'];
                $exam_status=$row_exam['examStatus'];
                $courseID=$row_exam['courseID'];
                // exam end
                $correctAnswers = 0;
                $wrongAnswers = 0;
                //question start
                $q=query("select * from questions where examID='$exam_id' ");
                
                while($row=fetch_array($q)){
                    $sl = $row['id'];
                    // $correct=$row['rightAns'];
                    // if ($correct == $_POST['option']['1']) {
		                  //  $correctAnswers +=1;
                    // }
                    // else {
		                  //  $wrongAnswers +=1;
                    //         }
                    if($row['rightAns']==1){
                        
                        $ck = $row['firstOptn'];
                        
                        
                        if($ck == $selected[$sl]){
                        
                        $result++;
                        }
                        
                    }
                    
                    if($row['rightAns']==2){
                        
                        $ck = $row['secondOptn'];
                        
                        
                        if($ck == $selected[$sl]){
                        
                        $result++;
                        }
                    }
                    if($row['rightAns']==3){
                        
                        $ck = $row['thirdOptn'];
                        
                        
                        if($ck == $selected[$sl]){
                        
                        $result++;
                        }
                    }
                    if($row['rightAns']==4){
                        
                        $ck = $row['fourthOptn'];
                        
                        
                        if($ck == $selected[$sl]){
                        
                        $result++;
                        }
                    }
                    
                    
                   
                   
                }
                //for incorrect
               
                 echo "<br>".$result."<br>";
                 echo $wrong_result;
                 
            }
            
            $_SESSION['email'] = $username;
                $select_student=query("SELECT * FROM `students` where email='$username' ");
                $fetch_student=fetch_array($select_student);
                $std_row=$fetch_student['id'];
                 
                //  course id start
                $exam_id=escape_string($_POST['exam_id']);
                $courseID=escape_string($_POST['courseID']);
                
                // course id end
                 $query=query("INSERT INTO `result`(studentID,courseID,examID) VALUES ('$std_row','$courseID','$exam_id') ");
        }
                
        ?>
               </div>
             
            </div>
            </div>
             
            
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <?php 

$numberOfQs = $correctAnswers + $wrongAnswers;
$score = round(($correctAnswers / $numberOfQs) * 100);
?>

Correct Answers: <?php echo $correctAnswers; ?> <br>
Wrong Answers: <?php echo $wrongAnswers; ?> <br>
Score: <?php echo $score; 

?>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  

      
 <!-- footer Start -->
            <?php include("footer.php"); ?>
            
            
             <!-- footer End -->