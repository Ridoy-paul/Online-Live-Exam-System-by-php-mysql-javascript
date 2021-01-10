<?php require_once("backend/config.php"); ?>
<?php include("header.php"); ?>
<?php include ("left-sidebar.php");?>


<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Upload a csv file for Questions</h1>
            <h1 class="m-0 text-dark"><?php display_message(); ?></h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">

            <div class="col-12">
                 <div class="card">
             
              <!-- /.card-header -->
              <div class="card-body">
                 <form class="form-horizontal" action="csvupload-exam.php" method="post" name="upload_excel" enctype="multipart/form-data">
                    <fieldset>
                        <!-- Form Name -->
                        
                        <!-- File Button -->
                        <div class = "row">
                        
                        <div class="col-md-6">
                            <div class="form-group">
                            <label class="col-md-4 control-label" for="filebutton">Select File</label>
                            <div class="col-md-12">
                                <input type="file" name="file" id="file" class="input-large">
                            </div>
                        </div>
                            <div class="form-group">
                            <label class="col-md-4 control-label" for="singlebutton">Import data</label>
                            <div class="col-md-4">
                                <button type="submit" id="submit" name="Import" class="btn btn-primary button-loading" data-loading-text="Loading...">Import</button>
                            </div>
                        </div>
                        </div>
                        <div class="col-md-6 text-center" style="padding: 20px; background-color: #F7F7F9; border-radius: 20px;">
                        <p style="margin-top:10px;"></p>
                        <a class="btn btn btn-info btn-lg btn-block" href="media/questions.csv">Question Demo CSV Download</a> <br/>
                        <!--<a class="btn btn btn-warning btn-lg btn-block" href="all-product-export.php">Existing all Product CSV Download</a> <br/>-->
                            <!--<form class="form-horizontal" action="export.php" method="post" name="upload_excel"  enctype="multipart/form-data">-->
                            <!--    <div class="form-group">-->
                            <!--    <div class="col-md-4 col-md-offset-4">-->
                            <!--        <input type="submit" name="Export" class="btn btn-success" value="export to excel"/>-->
                            <!--    </div>-->
                            <!--    </div>                    -->
                            <!--</form>  -->
                        </div>
                        
                        </div>
                        <!-- Button -->
                        
                    </fieldset>
                </form>
                 
              </div>
              <!-- /.card-body -->
            </div>
            </div>
             
            
        </div>
        <!-- /.row -->
       
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
         <!-- footer Start -->
            <?php include("footer.php"); ?>