<?php add_product(); ?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php display_message(); ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Products</a></li>
              <li class="breadcrumb-item active">Add Product</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    
    

    <section class="content">
      <div class="container-fluid">
                                  <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                
                        <form action="" method="POST" style="padding:10px" enctype="multipart/form-data">
                           <div class="row">
                               <div class="col-md-12">
                                   <div class="form-group">
                                       <label for="name" accesskey="U"><span class="required">*</span>Product Name</label>
                                        <input name="product_name" type="text" id="" class="form-control" value="" required style="border-radius:5px;"/>
                                   </div>
                               </div>
                           </div>
                           <div class="row">
                               <div class="col-md-6">
                                    <div class="form-group">
                                       <label for="name" accesskey="U"><span class="required">*</span>Price</label>
                                        <input name="price" type="number" id="" class="form-control" value="" required style="border-radius:5px;" placeholder="Price per unit" />
                                   </div>
                                   </div>
                                   <div class="col-md-6">
                                    <div class="form-group">
                                       <label for="name" accesskey="U"><span class="required">*</span>Product image</label>
                                        <input name="image" type="file" id="" class="form-control" value="" required style="border-radius:5px; " />
                                   </div>
                               </div>
                               </div>
                               
                           <div class="row">
                               <div class="col-md-12" style="text-align:right; ">
                                   <button type="" name="add_product" value="registration-form" class="btn btn-primary">Add Now</button>
                                   
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




