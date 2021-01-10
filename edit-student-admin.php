<?php require_once("backend/config.php"); ?>
<?php include("header.php"); ?>
<?php include ("left-sidebar.php");?>
<style>
    
    @media only screen and (min-width: 900px) {
     
}
</style>
     <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
              <div class="container-fluid">
                <div class="row mb-2">
                  <div class="col-md-12">
                    <h1 style="text-align:center;"></h1>
                    <div><?php display_message(); ?></div>
                  </div>
                  
                </div>
              </div><!-- /.container-fluid -->
            </section>
        <?php
        
                $studentID = $_GET['studentID'];
                
                $studentQuery = query("SELECT * FROM students WHERE id = '$studentID'");
                confirm($studentQuery);
                $student_row = fetch_array($studentQuery);
                
                
                ?>
            <!-- Main content -->
            <section class="content">
              <div class="container-fluid">
                <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="media/hqdefault.png"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?php echo $student_row['name'];?></h3>

                <p class="text-muted text-center"><?php echo $student_row['address'];?></p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                      <div class="row">
                        <div class="col-md-2 text-right">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="col-md-10">
                            <b><?php echo $student_row['phone'];?></b>
                        </div>
                    </div>
                  </li>
                  <li class="list-group-item">
                    <div class="row">
                        <div class="col-md-2 text-right">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="col-md-10">
                            <b><?php echo $student_row['email'];?></b>
                        </div>
                    </div>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">About</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                     <!-- About Me Box -->
                        <div class="">
                          
                          <!-- /.card-header -->
                          <div class="card-body">
                            <strong><i class="fas fa-book mr-1"></i> Education</strong>
            
                                    <p class="text-muted">
                                      B.S. in Computer Science from the University of Tennessee at Knoxville
                                    </p>
                    
                                    <hr>
                    
                                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>
                    
                                    <p class="text-muted">Malibu, California</p>
                                     <hr>
                                     <hr>
                                  </div>
                                  <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                                      </div>
                              
                              <div class="tab-pane" id="settings">
                                    
                                    <table id="" class="table table-hover">
                                        <thead class="bg-danger">
                                          <tr>
                                            <th>Batch Name</th>
                                            <th class="text-center">Access Info</th>
                                          </tr>
                                          </thead>
                                              <tbody>
                                                  <?php
                                                  
                                                    $studentID = $_GET['studentID'];
                                                    // student session end
                                                  
                                                    $query = query("SELECT * FROM `course` WHERE action='SHOW'");
                                                    confirm($query);
                                                    $rows = mysqli_num_rows($query);
                                                    if($rows > 0)
                                                    {
                                                        $i = 1;
                                                        while($row = fetch_array($query))
                                                        {
                                                            $courseID = $row['id'];
                                                            
                                                            $checkBatchQuery = query("SELECT * FROM studentBatch WHERE studentID='$studentID' AND  batchID='$courseID'");
                                                            confirm($checkBatchQuery);
                                                            $rowOfStuBatch = fetch_array($checkBatchQuery);
                                                            $batchAccess = $rowOfStuBatch['batchID'];
                                                            
                                                           ?>
                                                           <tr>
                                                                <td><b><?php echo $row['name'];?></b></td>
                                                                <?php
                                                                    if(!empty($batchAccess)){
                                                                        ?>
                                                                       <td style="font-weight: bold; text-align:center;">Access Given
                                                                       <!--<a href="start-permanent-exam.php?studentID=<?php //echo $studentID;?>" class="btn btn-sm bg-danger">Get Access</a>-->
                                                                       </td>
                                                                        <?php
                                                                    }
                                                                    else {
                                                                            ?>
                                                                            <td style="font-weight: bold; text-align:center;">
                                                                                <form method="get" action="give-batch-access.php">
                                                                                <input  value="<?php echo $courseID;?>" name="batchID" type="hidden">
                                                                                <input  value="<?php echo $studentID;?>" name="studentID" type="hidden">
                                                                                <input  class="btn btn-sm bg-primary" value="Give Access" type="submit">
                                                                                </form>
                                                                                </td>
                                                                        <?php
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
                              <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                          </div><!-- /.card-body -->
                        </div>
                        <!-- /.nav-tabs-custom -->
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                <div class="row">
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
                              
                                
                                $studentID = $_GET['studentID'];
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
                                                        <td style="text-align:center;"><a  class="btn btn-sm bg-danger">Not Attend</a></td>
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
                              
                                
                                $studentID = $_GET['studentID'];
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
              <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
          </div>
        
       

        <?php
        
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

