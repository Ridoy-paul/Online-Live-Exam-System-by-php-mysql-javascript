<?php require_once("backend/config.php"); ?>
<?php include("header.php"); ?>
<?php include ("left-sidebar.php");?>
<style>
    @media only screen and (min-width: 900px) {
      #buttonTD{
          width: 250px;
          text-align: center;
      }
}
</style>
     <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
              <div class="container-fluid">
                <div class="row mb-2">
                  <div class="col-md-12">
                    <h1 style="text-align:center;">All Temporary Exam</h1>
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
                        
                        <a href="/add-exam.php" class="btn btn-info" role="button"> Add new Exam</a>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                          <thead>
                          <tr>
                            <th>SI.</th>
                            <th>course Name</th>
                            <th>Exam Info</th>
                            <th>Schedule Date & Time</th>
                            <th>Total Mark</th>
                            <th>Passed Mark</th>
                            <th>Action</th>
                          </tr>
                          </thead>
                          <!--tbody-->
                          <tbody>
                              <?php
                                $query = query("SELECT * FROM `exam` WHERE action='SHOW' AND examStatus='Temporary' ORDER BY id DESC");
                                confirm($query);
                                $rows = mysqli_num_rows($query);
                                if($rows > 0)
                                {
                                    $i = 1;
                                    while($row = fetch_array($query))
                                    {
                                        $exm_id=$row['courseID'];
                                        $query_course = query("SELECT * FROM `course` WHERE action='SHOW' AND id='$exm_id' ");
                                        $row_course=fetch_array($query_course);
                                        $examStartingStatus = $row['StartingAction'];
                                        $examStatus = $row['examStatus'];
                                        
                                       ?>
                                       <tr>
                                            <td><?php echo $i?></td>
                                            <td><?php echo $row_course['name'];?></td>
                                            <td><b class="text-primary">Exam Name: </b><?php echo $row['name'];?><br><b class="text-primary">Exam Time:</b> <?php echo $row['examTime'];?> min<br></td>
                                            <td><b class="text-primary">Date: </b><?php echo date('j M, Y', strtotime($row['scheduleDate'])); ?> <br><b class="text-primary">Time: </b><?php echo date('H:i:s', strtotime($row['scheduleTime']));?></td>
                                            <td><?php echo $row['total_mark'];?></td>
                                            <td><?php echo $row['passed_mark'];?></td>
                                           <td id="buttonTD">
                                                <a href="hide-exam.php?hideID=<?php echo $row['id']?>" class="btn btn-sm bg-warning">
                                                <i class="fa fa-eye-slash"></i> Hide</a>
                                                <a href="edit-exam.php?editexamID=<?php echo $row['id']?>" class="btn btn-sm bg-success">
                                                <i class="fas fa-edit"></i> Edit</a>
                                                
                                                <?php
                                                if($examStartingStatus == 0 && $examStatus == "Temporary"){
                                                         ?>
                                                         <a  href="start-exam-status.php?examID=<?php echo $row['id']?>" class="btn btn-sm bg-primary">Start Exam</a>
                                                         <?php
                                                     }
                                                     ?>
                                                    <a  href="see-exam-question-admin.php?examID=<?php echo $row['id']?>" class="btn btn-sm bg-info">See Questions</a>
                                            </td>
                                            
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

