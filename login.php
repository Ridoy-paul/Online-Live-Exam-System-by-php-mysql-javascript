<?php require_once("backend/config.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>March Forward - Login</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="formfonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="formcss/style.css">
    <style>
        .main {
    background: #f8f8f8;
    padding: 50px 0;
}
.signin-content {
    padding-top: 38px;
    padding-bottom: 0;
}
#signin {
    background-color: #054C8C;
    text-align: center;
    margin: auto;
    display: block;
}
    </style>
</head>
<body style="background-color:#F79C2D;">

    <div class="main" style="background-color:#F79C2D;">

       
        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="media/signin-image.jpg" alt="sing up image"></figure>
                        
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Sign in</h2>
                        <form method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="email" id="email" placeholder="Enter Email"/>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass_md5" id="your_pass" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <a href="student-registration.php" class="signup-image-link">Create an account</a>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="std_login" id="signin" class="form-submit" value="Log in"/>
                            </div>
                            
                        </form>
                        
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="formvendor/jquery/jquery.min.js"></script>
    <script src="formjs/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
<?php
// std login
if(isset($_POST['std_login'])){
        $email = escape_string($_POST['email']);
        $pass_md5= escape_string($_POST['pass_md5']);

        $query_student = query("SELECT * FROM students WHERE email = '$email'");
        confirm($query_student);
        $rows_student = mysqli_num_rows($query_student);
        if ($rows_student > 0) {
            $row_student = fetch_array($query_student);
            $db_pass_student = $row_student['pass_md5'];
            if($row_student['status']=="Accepted")
            {
                if($db_pass_student == md5($pass_md5)) {
                $_SESSION['username'] = $email;
                redirect("index.php");
                set_message("Login Successfull");
               
            }
                else {
                redirect("login.php");
                echo "Sorry Username or password is invalid, Please try again";
                
            }
            }
            else
            {
                 if($db_pass_student == md5($pass_md5)) {
                $_SESSION['username'] = $email;
                redirect("std-pending.php");
                set_message("Login Successfull");
               
            }
                else {
                redirect("login.php");
                echo "Sorry Username or password is invalid, Please try again";
                
            }
            }
            
            
        }  
        else{
        if(isset($_POST['std_login'])){
        $username = escape_string($_POST['email']);
        $password = escape_string($_POST['pass_md5']);

        $query = query("SELECT * FROM admin WHERE username = '$username'");
        confirm($query);
        $rows = mysqli_num_rows($query);
        if ($rows > 0) {
            $row = fetch_array($query);
            $db_pass = $row['password'];
            $status = $row['status'];
            if($db_pass == md5($password)) {
                $_SESSION['username'] = $username;
                redirect("index.php");
                set_message("Login Successfull");
               
            }
            else {
                redirect("login.php");
                echo "Sorry Username or password is invalid, Please try again";
                
            }
        }  
    }
    }
    }
    


?>

