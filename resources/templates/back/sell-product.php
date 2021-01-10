
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Product Sell</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       <div class="row">
           <div class="col-md-12">
               <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Existing Client</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Add New Client</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="row card">
                            <div class="col-md-12">
                                                           
                        <form action="" method="POST" style="padding:10px">
                           <div class="row">
                               <div class="col-md-12">
                                   <div class="form-group">
                                       <label for="name" accesskey="U"><span class="required">*</span>Client Code or Phone Number</label>
                                        <input name="phone_number" type="text" id="" class="form-control" value="" required style="border-radius:5px;" placeholder="Enter Client Code or Phone Number"/>
                                   </div>
                               </div>
                           </div>
                           <div class="row">
                               <div class="col-md-12" style="text-align:right; ">
                                   <button type="" name="check_client" value="registration-form" class="btn btn-block btn-info">Check Clients</button>
                               </div>
                           </div>
                       </form>
                            </div>
                        </div>
                    
                  </div>
                  <!-- /.tab-pane -->
                  
<?php
                    

// <!----------------------- Admin Individual Clients or Dealer Check Product Clients Start --------------------->

    if(isset($_POST['check_client'])){
        $phone_number = escape_string($_POST['phone_number']);
        
        $query = query("SELECT * FROM clients WHERE Phone = '$phone_number'");
        
        $rows = mysqli_num_rows($query);
        if ($rows > 0) {
        	$row = fetch_array($query);
        	$db_code = $row['Phone'];
            
            $_SESSION["a"] = $db_code;
        	if ($db_code == $phone_number){
                
        		$client_info = <<<DELIMITER
                <div class="card-body">
                                <center class=""> 
                                
                                    <h4 class="card-title"><b>Name: </b> {$row['Name']}</h4>
                                    <div class="row">
                                        <div class="col-md-6 m-t-10"><h6 class="card-subtitle text-center"><b>Address: </b> {$row['Address']}</h6></div>
                                        <div class="col-md-6 m-t-10"><h6 class="card-subtitle text-center"><b>Phone: </b> {$row['Phone']}</h6></div>
                                    </div>
                                </center>
                            </div>
                            
DELIMITER;
                echo $client_info;
        	}
        	else{
        		
        	}
        }
    }
   


// <!----------------------- Admin Individual Clients or Dealer Check Product Clients END --------------------->
                  
?>  

                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Phone Number</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName2" placeholder="Phone Number">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName2" placeholder="Address">
                        </div>
                      </div>
                    
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Add Now</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
           </div>
       </div>
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
               <ul class="list-group list-group-unbordered mb-3">
                 <?php all_product_list_for_sell(); ?>
                   
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

        
          </div>
          <!-- /.col -->
          <div class="col-md-9">
          
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                
                
     <!-- Product selling list Start -->
                           
<div class="row">
    <div class="col-md-12">
        <div class="card">
    <div class="card-body">
        <h4 class="card-title">selling memo/details</h4>
        <div class="table-responsive">
            <form action="" method="post">
            <table id="mainTable" class="table editable-table table-bordered table-striped m-b-0">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Quantity(Unit)</th>
                        <th>Price(Per Unit)</th>
                    </tr>
                </thead>
                <tbody id = "demo">
                    
                    
                </tbody>
                <tfoot>
                
                </tfoot>
                
            </table>
                 <lebel>Enter amount: </lebel>
                  <input type="number" name="paid" class="form-control">
                   <button type="submit" name="sell" class="btn btn-primary btn-block mt-4">Submit</button>
                    </div>
            </div>
        </div>
    </div>
</div>
                
                
                
<?php

if(isset($_POST['sell'])) {
    $pid = $_POST['pid'];
    $pname     =   $_POST['pname'];
    $quantity   =   $_POST['quantity'];
    $count = count($_POST['pid']);
    $total_price = 333;
    $date = date("j-M-Y g:iA");
    $paid = $_POST['paid'];
    $todays_due = 333;
    
    
    $db_code = $_SESSION["a"];

    for($i = 0; $i < $count; $i++){
        $query = query("INSERT INTO sell (name,quantity,phone,paid) VALUES ('$pname[$i]','$quantity[$i]', '$db_code', '$paid')");
        confirm($query);
    }


}
                
?>
                
                
        <!-- Product selling list End -->        
                
                

                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

           
           
            
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



