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
                    <h1 style="text-align:center;">All Batch</h1>
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
                        
                        <a href="/add-course.php" class="btn btn-info" role="button"> Add new Batch</a>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                          <thead>
                          <tr>
                            <th>SI.</th>
                            <th>Batch Name</th>
                            <th>Action</th>
                          </tr>
                          </thead>
                          <!--tbody-->
                          <tbody>
                              <?php
                                $query = query("SELECT * FROM `course` WHERE  action='SHOW' ORDER BY id DESC");
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
                                            
                                            <td><abbr title="Click to Edit" class="text-success">
                                                <a href="hide-course.php?courseID=<?php echo $row['id']?>" class="btn btn-sm bg-warning">
                                                <i class="fa fa-eye-slash"></i> Hide</a>
                                                </abbr>
                                                <abbr title="Click to Edit" class="text-success">
                                                <a href="edit-course.php?editcourseID=<?php echo $row['id']?>" class="btn btn-sm bg-success">
                                                <i class="fas fa-edit"></i> Edit</a>
                                                
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
        
        <div class="modal fade" id="modal_insert">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Add New Bank</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form method="post" id="insert_form">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name of Bank</label>
                                <input type="text" name="bankName" class="form-control" id="bankName" placeholder="Ex:DBBL" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Branch Name</label>
                                <input type="text" name="branchName" class="form-control" id="branchName" placeholder="Ex: Mirpur-10-A">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Account No.</label>
                                <input type="text" name="accountNo" class="form-control" id="accountNo" placeholder="Ex: 1136222888" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Account Type</label>
                                <select class="form-control" id="accountType" name="accountType">
                                    <option value="Savings Account">Savings Account</option>
                                    <option value="Current Account">Current Account</option>
                                    <option value="Special Notice Deposit (SND)">Special Notice Deposit (SND)</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Opening Balance</label>
                                <input type="number" name="openingBalance" class="form-control" id="openingBalance" placeholder="Ex: 5000" required step=any>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Starting Cheque Num.</label>
                                <input type="number" name="startingChequeNum" class="form-control" id="openingBalance" placeholder="Ex: 20205001" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ending Cheque Num.</label>
                                <input type="number" name="endingChequeNum" class="form-control" id="openingBalance" placeholder="Ex: 2020540" required>
                            </div>
                            <?php
                                    $query = query("SELECT * FROM admin WHERE username = '" . $_SESSION['username'] . "'");  
                                    confirm($query);
                                    $row_of_admin = fetch_array($query);
                                    $shopkeeper_id = $row_of_admin['id'];
                                   
                                           ?>
                                           <input type="hidden" name="shopkeeper_ID" class="form-control" value="<?php echo $shopkeeper_id; ?>">
                        </div>
                        <!-- /.card-body -->
        
                        <div class="card-footer">
                          <input  type="submit" name="addBank" id="insert" value="ADD" class="btn btn-success form-control" required>
                        </div>
                      </form>
                    </div>
                    <div class="modal-footer justify-content-between">
                      
                    </div>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>

        <?php
        
        ?>


   
 <?php
            
            
            if(isset($_POST['addBank'])){
                
                $BankName = $_POST['bankName'];
                $branchName = $_POST['branchName'];
                $accountNo = $_POST['accountNo'];
                $accountType = $_POST['accountType'];
                $openingBalance = $_POST['openingBalance'];
                $shop_code = $_POST['shopkeeper_ID'];
                $chequeStartNum = $_POST['startingChequeNum'];
                $chequeEndingNum = $_POST['endingChequeNum'];
                
                
                //$shop_code_num_padded = sprintf("%03d", $shop_code);
            
                
            $query = query("INSERT INTO bank(shop_id, bank_name, branch, account_no, account_type, opening_balance, startingChequeNum, endingChequeNum) VALUES('$shop_code', '$BankName', '$branchName', '$accountNo', '$accountType', '$openingBalance', '$chequeStartNum', '$chequeEndingNum')");
            confirm($query);
            if($query){
                set_message("New Bank Added");
                redirect("all-bank.php");
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

