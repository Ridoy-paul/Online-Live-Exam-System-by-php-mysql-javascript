<?php require_once("backend/config.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>March Forward - Register</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="formfonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="formcss/style.css">
     <style>
        .main {
    background: #f8f8f8;
    padding: 50px 0;
}

.signup-content {
    padding: 13px 0;
}
#signup {
    background-color: #054C8C;
    text-align: center;
    margin: auto;
    display: block;
}
    </style>
</head>
<body style="background-color:#F79C2D;">

    <div class="main" style="background-color:#F79C2D;">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <div><?php display_message(); ?></div>
                        <form method="POST" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Enter Your Name" required/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Enter Your Email" required/>
                            </div>
                            <div class="form-group">
                                <label for="re-phone"><i class="zmdi zmdi-phone"></i></label>
                                <input type="text" name="phone" id="phone" maxlength="11"  minlength="11" placeholder="Enter Your Phone" required/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass_md5" id="pass" placeholder="Enter Your Password" required/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <select name="cars" id="cars" class="form-control">
                                  <option value="volvo">Volvo</option>
                                  <option value="saab">Saab</option>
                                  <option value="opel">Opel</option>
                                  <option value="audi">Audi</option>
                                </select>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="insertstudent" id="signup" class="form-submit" value="Register" required/>
                            </div>
                            <div class="form-group">
                                <a href="login.php" class="signup-image-link">Login</a>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="media/signup-image.jpg" alt="sing up image"></figure>
                        <!--<a href="#" class="signup-image-link">I am already member</a>-->
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
                    redirect("student-registration.php");
                    set_message('<p style="padding: 20px; background-color: red; color: white; border-radius: 20px;">Email is exists, Please try again with another gmail.</p>');
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

