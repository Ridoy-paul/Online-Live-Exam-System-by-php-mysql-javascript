<?php require_once("backend/config.php"); ?>
<?php include("header.php"); ?>
<?php include ("left-sidebar.php");?>
<div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
              <div class="container-fluid">
                <div class="row mb-2">
                  <div class="col-md-12">
                    <h1 style="text-align:center;">Student Report</h1>
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
        
                    <div class="card">
                      <div class="card-header">
                        
                        
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                          <thead>
                          <tr>
                            <th>SI.</th>
                            <th>Student Name</th>
                            <th>Student Phone</th>
                            <th>Student Email</th>
                            <th>Exam Name</th>
                            <th>Total Score</th>
                            
                          </tr>
                          </thead>
                          <!--tbody-->
                          <tbody>
                              <?php
                              //select course
                            //   $query_course = query("SELECT * FROM `course`  WHERE action='SHOW'  ");
                            //   $query_course_fetch=fetch_array($query_course);
                            //   $std_course=$query_course_fetch['id'];
                              
                            //   select exam
                            //   $query_exam = query("SELECT * FROM `exam`  WHERE action='SHOW'  ");
                            //   $query_exam_fetch=fetch_array($query_exam);
                            //   $std_exam=$query_exam_fetch['id'];
                            
                            $query = query("SELECT * FROM `resultForPermanentExam` GROUP BY examID  ORDER BY id DESC");
                                confirm($query);
                                $rows = mysqli_num_rows($query);
                                if($rows > 0)
                                {
                                    $i = 1;
                                    while($row = fetch_array($query))
                                    {
                                        $row_ex_id=$row['examID'];
                                        $studentID=$row['studentID'];
                                        //   select exam
                                          $query_exam = query("SELECT * FROM `exam`  WHERE action='SHOW' AND id='$row_ex_id' ORDER BY id DESC ");
                                          $query_exam_fetch=fetch_array($query_exam);
                                          $std_exam=$query_exam_fetch['name'];
                                          
                                        // select student
                                        $query_student = query("SELECT * FROM `students`  WHERE status='Accepted'  AND id='$studentID' ORDER BY id DESC ");
                                        $query_student_fetch=fetch_array($query_student);
                                        
                                        
                                        
                                        //right ans
                                        $sumOfRightAns=query("SELECT SUM(mark) as total_for FROM resultForPermanentExam WHERE selectedAns=rightAns AND examID='$row_ex_id' AND studentID='$studentID' ");
                                        $sumOfRight=fetch_array($sumOfRightAns);
                                        $right = $sumOfRight['total_for'];
                                        //wrong ans
                                        $sumOfWrongAns=query("SELECT SUM(negativeMark) as total_for FROM resultForPermanentExam WHERE selectedAns!=rightAns AND selectedAns!='0' AND examID='$row_ex_id' AND studentID='$studentID'");
                                        $sumOfNegative=fetch_array($sumOfWrongAns);
                                        $wrong =  $sumOfNegative['total_for'];
                                        
                                        $score = $right + $wrong;
                                        
                                        
                                        
                                        
                                        
                                       ?>
                                       <tr>
                                            <td><?php echo $i?></td>
                                            <td><?php echo $query_student_fetch['name'];?></td>
                                            <td><?php echo $query_student_fetch['phone'];?></td>
                                            <td><?php echo $query_student_fetch['email'];?></td>
                                            <td><?php echo $query_exam_fetch['name'];?></td>
                                            <?php
                                                if(!empty($score)){
                                                    ?>
                                                   <td><b><?php echo $score;?></b></td>
                                                    <?php
                                                }
                                                else {
                                                    
                                                    if($score==0  && !empty($row_ex_id)){
                                                        ?>
                                                        <td><?php echo $score;?></td>
                                                    <?php
                                                    }
                                                    else{
                                                        ?>
                                                        <td>Not Attend</a></td>
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

