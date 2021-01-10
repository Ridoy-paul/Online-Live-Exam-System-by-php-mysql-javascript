<?php require_once("backend/config.php"); ?>
<?php include("header.php"); ?>
<?php include ("left-sidebar.php");?>
<div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
              <div class="container-fluid">
                <div class="row mb-2">
                  <div class="col-md-12">
                    <h1 style="text-align:center;"></h1>
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
        <div class="card-body login-card-body">
            <p class="login-box-msg"><h3 style="color:#000;text-align:center;">Edit Profile</h3></p>
            <h3><?php display_message(); ?></h3>
            <form method="post" id="insert_form">
                <?php
                $gmail_query = query("SELECT * FROM students WHERE email = '" . $_SESSION['username'] . "' ");
                confirm($gmail_query);
                $crm_row = fetch_array($gmail_query);
                
                ?>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name" value="<?php echo $crm_row['name'];?>">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" class="form-control" id="phone" value="<?php echo $crm_row['phone'];?>" maxlength="11"  minlength="11" required>
                    </div>
                   
                    <div class="form-group">
                        <label for="pass_md5">Password</label>
                        
                        <input type="text" name="pass_md5" class="form-control" id="pass_md5" value="<?php echo $crm_row['without_md5']?>">
                    </div>
                <div class="card-footer">
                  <input type="submit" name="update" id="insert" value="Update" class="btn btn-success form-control"/>
                </div>
              </form>
              

        </div>
        <!-- /.login-card-body -->
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
            
            
            if(isset($_POST['update'])){
                
                $name = $_POST['name'];
                $phone = $_POST['phone'];
                $gmail = $_POST['email'];
                $password = $_POST['pass_md5'];
                $mdPass = md5($password);
                
                $query = query("UPDATE students SET name='$name',without_md5='$password',pass_md5='$mdPass',phone='$phone' WHERE email = '" . $_SESSION['username'] . "' ");
                confirm($query);
                if($query)
                {
                redirect("student-profile.php");
                set_message("Update Successfully.");
                 
                }
                
                
        }
 
            
            ?>
<?php include("footer.php"); ?>