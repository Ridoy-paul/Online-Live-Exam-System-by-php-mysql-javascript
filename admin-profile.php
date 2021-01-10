<?php require_once("backend/config.php"); ?>
<?php include("header.php"); ?>
<?php include ("left-sidebar.php");?>
<style>
    .student-profile .card {
  border-radius: 10px;
}

.student-profile .card .card-header .profile_img {
  width: 150px;
  height: 150px;
  object-fit: cover;
  margin: 10px auto;
  border: 10px solid #ccc;
  border-radius: 50%;
}

.student-profile .card h3 {
  font-size: 20px;
  font-weight: 700;
}

.student-profile .card p {
  font-size: 16px;
  color: #000;
}

.student-profile .table th,
.student-profile .table td {
  font-size: 14px;
  padding: 5px 10px;
  color: #000;
}
</style>
<?php

// admin session start 
$username =  $_SESSION['username'];
$f_query=query("SELECT * FROM `admin` where username='$username' || gmail = '$username'");
confirm($f_query);
$f_rows=fetch_array($f_query);
// admin session end




?>
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
                    <div class="student-profile py-4">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <div class="card shadow-sm">
          <div class="card-header bg-transparent text-center">
            <img class="profile_img" src="media/hqdefault.png" alt="">
            <h3><a href="edit-admin.php" class="btn btn-info btn-sm" role="button">Edit profile</a></h3>
          </div>
          
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card shadow-sm">
          <div class="card-header bg-transparent border-0">
            <h3 class="mb-0"><i class="far fa-clone pr-1"></i>General Information</h3>
          </div>
          <div class="card-body pt-0">
            <table class="table table-bordered">
              <tr>
                <th width="30%">ID</th>
                <td width="2%">:</td>
                <td><?php echo $f_rows['id']?></td>
              </tr>
              <tr>
                <th width="30%">Name</th>
                <td width="2%">:</td>
                <td><?php echo $f_rows['name'];?></td>
              </tr>
              <tr>
                <th width="30%">Email</th>
                <td width="2%">:</td>
                <td><?php echo $f_rows['gmail'];?></td>
              </tr>
              <tr>
                <th width="30%">Password</th>
                <td width="2%">:</td>
                <td><?php echo $f_rows['passWithoutMD']?></td>
              </tr>
              
              <tr>
                <th width="30%">Phone</th>
                <td width="2%">:</td>
                <td><?php echo $f_rows['phone']?></td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
    
  </div>
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
<!-- footer Start -->
<?php include("footer.php"); ?>
<!-- footer End -->