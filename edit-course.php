<?php require_once("backend/config.php"); ?>
<?php include("header.php"); ?>
<?php include ("left-sidebar.php");?>

<?php

    $clientID = $_GET['editcourseID'];
    
    $query = query("SELECT * FROM course WHERE id = '$clientID'");
    confirm($query);

    $row = fetch_array($query);
    
    

    if (isset($_POST['update'])) {
                $courseName = $_POST['courseName'];
               
                
        $query = query("UPDATE `course` SET `name`='$courseName' WHERE id='$clientID' ");
        confirm($query);
        
         if($query){
             redirect("all-course.php");
             set_message("Clients Updated");
         }
        
    }



?>
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Update Course</h1>
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
               <form method="post" id="insert_form">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Course Name</label>
                        <input type="text" name="courseName" class="form-control" value="<?php echo $row['name']?>" placeholder="Ex: BCS41" required>
                    </div>
                            
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <input  type="submit" name="update" id="insert" value="Update Course" class="btn btn-success form-control">
                </div>
              </form>
             
            </div>
            </div>
             
            
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  

      
 <!-- footer Start -->
            <?php include("footer.php"); ?>
            
            
             <!-- footer End -->