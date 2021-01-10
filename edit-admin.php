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
                // admin session start 
                $username =  $_SESSION['username'];
                $f_query=query("SELECT * FROM `admin` where username='$username' || gmail = '$username'");
                confirm($f_query);
                $f_rows=fetch_array($f_query);
                // admin session end
                
                ?>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name" value="<?php echo $f_rows['name'];?>">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" class="form-control" id="phone" value="<?php echo $f_rows['phone'];?>" maxlength="11"  minlength="11" required>
                    </div>
                   
                    <div class="form-group">
                        <label for="pass_md5">Password</label>
                        
                        <input type="text" name="pass_md5" class="form-control" id="pass_md5" value="<?php echo $f_rows['passWithoutMD']?>">
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
                
                $query = query("UPDATE admin SET name='$name',passWithoutMD='$password',password='$mdPass',phone='$phone' WHERE username = '" . $_SESSION['username'] . "' AND gmail = '" . $_SESSION['username'] . "' ");
                confirm($query);
                if($query)
                {
                redirect("admin-profile.php");
                set_message("Update Successfully.");
                 
                }
                
                
        }
 
            
            ?>
<?php include("footer.php"); ?>