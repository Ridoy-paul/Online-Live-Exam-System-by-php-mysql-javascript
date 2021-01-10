<?php require_once("backend/config.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>FARA IT Fusion</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="Login/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="Login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login/css/util.css">
	<link rel="stylesheet" type="text/css" href="Login/css/main.css">
<!--===============================================================================================-->

<style>
    @media only screen and (max-width: 768px) {
        #topImg{
            display:none;
        }
}
@media only screen and (min-width: 768px) {
        #welcomeTo{
            display: none;
        }
        #footerImg{
            display:none;
        }
        .login100-pic.js-tilt {
            margin-top: -130px;
        }
        form.login100-form.validate-form {
            margin-top: -141px;
        }
}

</style>
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="media/mark.png" alt="IMG">
				</div>
				<form class="login100-form validate-form">
				    
				    <div class="row">
                        <div class="col-md-12">
                                <center>
                                    <h3 id="welcomeTo" style="font-size: 20px;">Welcome to <b>POS</b></h3>
                                    <div id="topImg">
                                    <img style="width: 150px;" src="media/fara-IT-Logo.png" alt="IMG">
                                        </div>
                                </center>
                        </div>
                    </div>
				
					
					<div class="container-login100-form-btn">
						<button type="button" class="login100-form-btn btn btn-success" data-toggle="modal" data-target="#exampleModal">Login</button>
					</div>
					<div class="container-login100-form-btn">
					    <a href="registration.php" class="login100-form-btn btn btn-success">Register</a>
					</div>
					<div class="container-login100-form-btn">
						<a href="crm-registration.php" class="login100-form-btn btn btn-success">Help</a>
					</div>
					<div class="container-login100-form-btn">
						<a href="crm-registration.php" class="login100-form-btn btn btn-success">FAQ</a>
					</div>
					


					<div class="row">
                        <div class="col-md-12">
                                <center id="footerImg">
                                    <img style="width: 150px;" src="media/loo.png" alt="IMG">
                                </center>
                        </div>
                    </div>
                    <div class="text-center p-t-13">
						<a class="txt2" href="#">
						    Technical Support by <b>FARA IT Fusion</b><br>
						    Hotline: <a href="tel:+8801309923205"><i class="fa fa-phone" aria-hidden="true"></i>+880 130 992 3205</a>
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	
	<!-- Login Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
                <div class="input-group mb-3">
                    <input type="text" name="email" class="form-control" placeholder="gmail or username">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="pass_md5" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!--<div class="col-8">-->
                    <!--    <div class="icheck-primary">-->
                    <!--        <input type="checkbox" id="remember">-->
                    <!--        <label for="remember">-->
                    <!--            Remember Me-->
                    <!--        </label>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!-- /.col -->
                    <div class="col-4">
                        <button href="index.php" name="admin_login" type="submit" class="btn btn-primary btn-block">Login</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
	

	
<!--===============================================================================================-->	
	<script src="Login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="Login/vendor/bootstrap/js/popper.js"></script>
	<script src="Login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="Login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="Login/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="Login/js/main.js"></script>

</body>
</html>
<?php

if(isset($_POST['admin_login'])){
        $email = escape_string($_POST['email']);
        $password = escape_string($_POST['pass_md5']);

        $query = query("SELECT * FROM admin WHERE email = '$email'");
        confirm($query);
        $rows = mysqli_num_rows($query);
        if ($rows > 0) {
            $row = fetch_array($query);
            $db_pass = $row['password'];
            $status = $row['status'];
            if($db_pass == md5($password)) {
                $_SESSION['email'] = $email;
                redirect("index.php");
                set_message("Login Successfull");
               
            }
            else {
                redirect("login.php");
                echo "Sorry Username or password is invalid, Please try again";
                
            }
        }
        // student login start
        $query_student = query("SELECT * FROM students WHERE email = '$username'");
        confirm($query_student);
        $rows_student = mysqli_num_rows($query_student);
        if ($rows_student > 0) {
            $row_student = fetch_array($query_student);
            $db_pass_student = $row_student['pass_md5'];
            if($db_pass_student == md5($password)) {
                $_SESSION['email'] = $username;
                redirect("index.php");
                set_message("Login Successfull");
               
            }
            else {
                redirect("login.php");
                echo "Sorry Username or password is invalid, Please try again";
                
            }
        }
        // end
        
    }




?>

