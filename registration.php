<?php require_once("backend/config.php"); ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>FARA IT Fusion | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Welcome to Online Exam System</p>
            <h3><?php display_message(); ?></h3>
            <form method="post" id="insert_form">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Ex: Name" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" class="form-control" id="phone" placeholder="Ex: +880 162" maxlength="11"  minlength="11" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Gmail</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Ex: abc@gmail.com" required>
                    </div>
                    <div class="form-group">
                        <label for="pass_md5">Password</label>
                        
                        <input type="password" name="pass_md5" class="form-control" id="pass_md5" required>
                    </div>
                <div class="card-footer">
                  <input type="submit" name="insertstudent" id="insert" value="Register" class="btn btn-success form-control"/>
                </div>
              </form>
              <div class="social-auth-links text-center mb-3">
                <p>- OR -</p>
                <a href="login.php" class="btn btn-block btn-warning">
                    <i class="fas fa-registered mr-2"></i>Login
                </a>
        </div>

        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

</body>
</html>

<?php
            
            
            if(isset($_POST['insertstudent'])){
                
                $name = $_POST['name'];
                $phone = $_POST['phone'];
                $gmail = $_POST['email'];
                $password = $_POST['pass_md5'];
                $mdPass = md5($password);
                $status = "Pending";
                // $type = "Shopkeeper";
                
                $gmail_query = query("SELECT * FROM students WHERE email = '$gmail'");
                confirm($gmail_query);
                $crm_row = fetch_array($gmail_query);
                $database_gmail = $crm_row['email'];
               if($database_gmail == $gmail){
                    redirect("registration.php");
                    set_message("Email is exists, Please try again with another gmail.");
                }
                else{
                    $query = query("INSERT INTO students(name, phone, email, pass_md5, without_md5, status) VALUES('$name','$phone', '$gmail', '$mdPass','$password', '$status')");
                    confirm($query);
                    if($query){
                        
                        redirect("login.php");
                        set_message("Successfully Registration.");
                    }
                }
                
                
        }
 
            
            ?>
