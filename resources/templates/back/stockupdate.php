

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
 
    
    <section class="content">
      <div class="container-fluid">
                        <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <?php update_stock(); ?>
                        <form action="" method="POST" style="padding:10px">
                           <div class="row">
                               <div class="col-md-12">
                                   <div class="form-group">
                                       <label for="name" accesskey="U"><span class="required">*</span>Enter number of Unit</label>
                                        <input name="num_unit" type="number" id="" class="form-control" value="" required style="border-radius:5px;"/>
                                   </div>
                               </div>
                           </div>
                           <div class="row">
                               <div class="col-md-12" style="text-align:right; ">
                                   <button type="" name="update_stock" value="registration-form" class="btn btn-primary">Add Now</button>
                                   
                               </div>
                           </div>
                       </form>
                            </div>
                        </div>
                    </div>
                </div>
               </div>
        <!-- /.row -->
      
    </section>
    <!-- /.content -->


  </div>
  <!-- /.content-wrapper -->




