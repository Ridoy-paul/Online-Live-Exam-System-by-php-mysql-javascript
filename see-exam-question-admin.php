<?php require_once("backend/config.php"); ?>
<?php include("header.php"); ?>
<?php include ("left-sidebar.php");?>
<style>
    @media only screen and (min-width: 900px) {
      #buttonTD{
          width: 200px;
          text-align: center;
      }
}
</style>
     <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
              <div class="container-fluid">
                <div class="row">
                    <?php
                        $examID = $_GET['examID'];
                        
                        
                        $query = query("SELECT * FROM `exam` WHERE action='SHOW' AND id='$examID'");
                        confirm($query);
                        $rowOfExam = fetch_array($query);
                        $exName = $rowOfExam['name'];
                        $examTime = $rowOfExam['examTime'];
                        $scheduleDate = $rowOfExam['scheduleDate'];
                        $scheduleTime = $rowOfExam['scheduleTime'];
                        $total_mark = $rowOfExam['total_mark'];
                        $maxQuestionNum = $rowOfExam['maxQuestionNum'];
                        
              ?>
                    <div class="col-md-12">
                        <div class="card">
                          <h3 class="card-header text-center text-bold bg-success"><?php echo $exName; ?></h3>
                          <div class="card-body">
                              <div class="row">
                                <div class="col-md-6">
                                    <h5 class="card-title"><b>Time:</b> <?php echo $examTime; ?></h5><br>
                                </div>
                                <div class="col-md-6">
                                    <h5 class="card-title"><b>Date:</b> <?php echo date('j M, Y', strtotime($scheduleDate)); ?></h5><br>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <h5 class="card-title"><b>Total Mark:</b> <?php echo $total_mark; ?></h5><br>
                                </div>
                                <div class="col-md-6">
                                    <h5 class="card-title"><b>Total Question:</b> <?php echo $maxQuestionNum; ?></h5><br>
                                </div>
                            </div>
                            
                            
                          </div>
                        </div>
                    </div>
                </div>
              </div><!-- /.container-fluid -->
            </section>
        
            <!-- Main content -->
            <section class="content">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-12">
                    <div class="card">
                      <!-- /.card-header -->
                      <div class="card-body">
                          <div class="row">
                              <?php
                                $query = query("SELECT * FROM `questions` WHERE examID='$examID'");
                                confirm($query);
                                $rows = mysqli_num_rows($query);
                                if($rows > 0)
                                {
                                    $i = 1;
                                    while($row = fetch_array($query))
                                    {
                                       ?>
                                       <div class="col-md-12">
                                            <div class="card" style="border: 2px solid #494E53;">
                                              <div class="card-body">
                                                  <div class="row">
                                                        <div class="col-md-1">
                                                            <div style="height: 40px; width: 40px; background-color: #007BFF; border-radius: 30px; text-align:center;"><p style="font-size: 25px; color: white;"><?php echo $row['question_number']?></p></div>
                                                        </div>
                                                        <div class="col-md-11">
                                                            <h5 class="card-title text-bold"><?php echo $row['questionName']?></h5>
                                                        </div>
                                                    </div>
                                                            <ul class="list-group list-group-flush">
                                                                <li class="list-group-item"></li>
                                                                <li class="list-group-item"><b>(A)</b> <?php echo $row['firstOptn']?></li>
                                                                <li class="list-group-item"><b>(B)</b> <?php echo $row['secondOptn']?></li>
                                                                <li class="list-group-item"><b>(C)</b> <?php echo $row['thirdOptn']?></li>
                                                                <li class="list-group-item"><b>(D)</b> <?php echo $row['fourthOptn']?></li>
                                                              </ul>
                                                              <p style="margin-left: 25px;"><b>Right Ans: </b><?php echo $row['rightAns']?></p>
                                              </div>
                                              <div class="card-footer text-muted">
                                                  <div class="row">
                                                    <div class="col-md-10">
                                                        <p><b>Right Ans Des: </b><?php echo $row['rightAnsDes']?></p>
                                                    </div>
                                                    <div class="col-md-2 text-center">
                                                        <a href="edit-question.php?quesID=<?php echo $row['id'];?>" type="button" class="btn btn-danger">Edit Question</a>
                                                    </div>
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

