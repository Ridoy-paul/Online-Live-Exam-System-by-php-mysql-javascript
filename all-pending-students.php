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
                <div class="row mb-2">
                  <div class="col-md-12">
                    <h1 style="text-align:center;"><b>All Pending Students</b></h1>
                    <div><?php display_message(); ?></div>
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
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                          </thead>
                          <!--tbody-->
                          <tbody>
                              <?php
                                $query = query("SELECT * FROM `students`  WHERE status='Pending' ORDER BY id DESC");
                                confirm($query);
                                $rows = mysqli_num_rows($query);
                                if($rows > 0)
                                {
                                    $i = 1;
                                    while($row = fetch_array($query))
                                    {
                                        
                                       ?>
                                       <tr>
                                            <td><?php echo $i?></td>
                                            <td><?php echo $row['name'];?></td>
                                            <td><?php echo $row['email'];?></td>
                                            <td><?php echo $row['phone'];?></td>
                                            <td><?php 
                                            if($row['status']=="Pending"){
                                                echo $row['status'];
                                            }
                                            else{
                                                echo $row['status'];
                                            }
                                            ?></td>
                                            <td><abbr title="Click to Edit" class="text-success">
                                                <a href="approve-std.php?approcestdID=<?php echo $row['id']?>" class="btn btn-success">Accept</a>
                                                </abbr>
                                                
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

