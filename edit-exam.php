<?php require_once("backend/config.php"); ?>
<?php include("header.php"); ?>
<?php include ("left-sidebar.php");?>

<?php

    $clientID = $_GET['editexamID'];
    
    $query_exam = query("SELECT * FROM exam WHERE id = '$clientID'");
    confirm($query_exam);

    $row_exam = fetch_array($query_exam);
    
    if (isset($_POST['update'])) {
      
       
                $course = escape_string($_POST['course']);
                $examName = escape_string($_POST['examName']);
                $examTime= escape_string($_POST['examTime']);
                $endTime=escape_string($_POST['endTime']);
                $examStatus= escape_string($_POST['examStatus']);
               // $schedule = $_POST['schedule']);
                $mark = escape_string($_POST['mark']);
                $passedMark= escape_string($_POST['passedMark']);
                
                $scheduleDate= escape_string($_POST['scheduleDate']);
                $scheduleTime= escape_string($_POST['scheduleTime']);
                $maxQuestionNum= escape_string($_POST['maxQuestionNum']);
                
               
                 
        $query_exam_up = query("UPDATE `exam` SET `courseID`='$course',`name`='$examName',`examTime`='$examTime',`examStatus`='$examStatus', `scheduleDate`='$scheduleDate', `scheduleTime`='$scheduleTime',`total_mark`='$mark',`passed_mark`='$passedMark', `maxQuestionNum`='$maxQuestionNum', examEndTime='$endTime'  WHERE id='$clientID' ");
        confirm($query_exam_up);
        
         if($query_exam_up){
             redirect("all-exam.php");
             set_message("Exam Updated");
         }
        
    }

  



?>
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Update Exam</h1>
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
               <form method="post" id="insert_form" style="padding: 0px 50px;" class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Courses</label>
                                <select class="form-control" id="unit" name="course">
                                    <!--<option value="" <?php if($row['name']=="") echo "selected";?>>--Select--</option>-->
                                    <?php
                                    $query = query("SELECT * FROM course WHERE action = 'SHOW' ORDER BY id DESC");
                                    confirm($query);
                                    $rows = mysqli_num_rows($query);
                                    if($rows > 0){
                                        while($row = fetch_array($query)){
                                        ?>
                                            <option value="<?php echo $row['id']; ?>" <?php if ($row_exam['courseID'] == $row['id']) echo ' selected="selected"'; ?>><?php echo $row['name']; ?></option>
                                       

                                        <?php
                                     
                                    }
                                    
                                }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Exam Name</label>
                                <input type="text" name="examName" class="form-control" value="<?php echo $row_exam['name']?>"  placeholder="Ex: Test Priliminary" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Total Time in Minutes</label>
                                <input type="number" name="examTime" class="form-control" value="<?php echo $row_exam['examTime']?>" placeholder="Ex: 40" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Exam Status</label>
                                <select class="form-control"  name="examStatus">
                                    
                                    <option value="Permanent" <?php if ($row_exam['examStatus'] == "Permanent") echo ' selected="selected"'; ?>>Permanent</option>
                                    <option value="Temporary" <?php if ($row_exam['examStatus'] == "Temporary") echo ' selected="selected"'; ?>>Temporary</option>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Exam Schedule Date</label>
                                        <input type="date" name="scheduleDate" value="<?php echo $row_exam['scheduleDate']?>"  class="form-control"  placeholder="Ex: " required>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">StartTime</label>
                                        <input type="time" name="scheduleTime"  value="<?php echo $row_exam['scheduleTime']?>" step="1" class="form-control" required>
                                    </div>
                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">End Time</label>
                                        <input type="time" name="endTime"   value="<?php echo $row_exam['examEndTime'] ?>" step="1" class="form-control" required>
                                    </div>
                                    
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="exampleInputEmail1">Total Mark</label>
                                <input type="text" name="mark" class="form-control"  value="<?php echo $row_exam['total_mark']?>" placeholder="Ex: 80" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Passed Mark</label>
                                <input type="text" name="passedMark" class="form-control" value="<?php echo $row_exam['passed_mark']?>" placeholder="Ex: 40" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Total Number of Questions</label>
                                <input type="text" name="maxQuestionNum" class="form-control" value="<?php echo $row_exam['maxQuestionNum']?>" placeholder="Ex: 200" required>
                            </div>
                        </div>    
                            
                <div class="card-footer">
                  <input  type="submit" name="update" id="insert" value="Update" class="btn btn-success form-control">
                </div>
              </form>
             
            </div>
            </div>
             
            
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  
   
 <!-- footer Start -->
            <?php include("footer.php"); ?>
            
            
             <!-- footer End -->