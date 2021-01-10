<?php require_once("backend/config.php"); ?>
<?php include("header.php"); ?>
<?php include ("left-sidebar.php");?>

<?php

     $username =  $_SESSION['username'];
     
    $f_query=query("SELECT * FROM `admin` where username='$username' || gmail = '$username'");
    confirm($f_query);
    $f_rows=fetch_array($f_query);
    $type = $f_rows['type'];
    
    if ($type == 'Admin'){
        ?>
            <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
              
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <div class="row">
                    <div class="col-md-12">
                        <h1 style="text-align:center;">Add New Exam</h1>
                        <h1 class="m-0 text-dark"><?php display_message(); ?></h1>
                    </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form method="post" id="insert_form" style="padding: 0px 50px;" class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Courses</label>
                                <select class="form-control" id="unit" name="course">
                                    <option value="">Select A course</option>
                                    <?php
                                    $query = query("SELECT * FROM course WHERE action = 'SHOW' ORDER BY id DESC");
                                    confirm($query);
                                    $rows = mysqli_num_rows($query);
                                    if($rows > 0){
                                        while($row = fetch_array($query)){
                                        ?>
                                            <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                                       
        <?php
                                     
                                    }
                                    
                                }
        ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Exam Name</label>
                                <input type="text" name="examName" class="form-control"  placeholder="Ex: Test Priliminary" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Total Time in Minutes</label>
                                <input type="number" name="examTime" class="form-control" placeholder="Ex: 40" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Exam Status</label>
                                <select class="form-control"  name="examStatus">
                                    <option value="">Select A Status</option>
                                    <option value="Permanent">Permanent</option>
                                    <option value="Temporary">Temporary</option>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Exam Schedule Date</label>
                                        <input type="date" name="scheduleDate" class="form-control"  placeholder="Ex: " required>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Start Time</label>
                                        <input type="time" name="scheduleTime"  value="2013-10-24T20:36:00" step="1" class="form-control" required>
                                    </div>
                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">End Time</label>
                                        <input type="time" name="endTime"  value="2013-10-24T20:36:00" step="1" class="form-control" required>
                                    </div>
                                    
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="exampleInputEmail1">Total Mark</label>
                                <input type="text" name="mark" class="form-control"  placeholder="Ex: 80" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Passed Mark</label>
                                <input type="text" name="passedMark" class="form-control" placeholder="Ex: 40" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Total Number of Questions</label>
                                <input type="text" name="maxQuestionNum" class="form-control" placeholder="Ex: 200" required>
                            </div>
                            
                        </div>    
                            
                <div class="card-footer">
                  <input  type="submit" name="addexam" id="insert" value="ADD" class="btn btn-success form-control">
                </div>
              </form>
                    
                </div>
              </div>
              <!-- /.card-body -->
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
<?php
}
        ?>

   


 <?php
            
            
            if(isset($_POST['addexam'])){
                
                $course = escape_string($_POST['course']);
                $examName= escape_string($_POST['examName']);
                $examTime= escape_string($_POST['examTime']);
                $examStatus= escape_string($_POST['examStatus']);
                $scheduleDate= escape_string($_POST['scheduleDate']);
                $scheduleTime= escape_string($_POST['scheduleTime']);
                $endTime=escape_string($_POST['endTime']);
                $mark= escape_string($_POST['mark']);
                $passedMark= escape_string($_POST['passedMark']);
                
                $minQuestionNum= 1;
                $maxQuestionNum= escape_string($_POST['maxQuestionNum']);
                $StartingAction = 0;
                
               
                 
            $query = query("INSERT INTO exam(courseID, name, examTime, examStatus, scheduleDate, scheduleTime, total_mark, passed_mark, minQuestionNum, maxQuestionNum, StartingAction, action, examEndTime) VALUES('$course', '$examName', '$examTime', '$examStatus', '$scheduleDate', '$scheduleTime', '$mark', '$passedMark', '$minQuestionNum', '$maxQuestionNum', '$StartingAction', 'SHOW','$endTime')");
            confirm($query);
            if($query){
                set_message('<h2 class="m-0 text-dark bg-primary text-center" style="padding: 10px; border-radius: 20px;">New Exam Added</h2>');
                redirect("all-exam.php");
            }
            
        }
 
            ?>
<!--FOOTER START HERE-->


    <footer class="main-footer">
        <strong>Copyright &copy; 2020 <a href="http://faraitfusion.com">FARA IT Fusion</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 1.1.0
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




</body>
</html>

