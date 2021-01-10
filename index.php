<?php require_once("backend/config.php"); ?>
<?php

         if(!isset($_SESSION['username'])){
            header("Location: login.php");
       
      }
?>
 
<?php

    $username =  $_SESSION['username'];
    $f_query=query("SELECT * FROM `admin` where username='$username' || gmail = '$username'");
    confirm($f_query);
    $f_rows=fetch_array($f_query);
    $type = $f_rows['type'];
    
    if ($type == 'Admin'){
?>

<!-- ============================================================== -->
        <!-- Start Topbar header -->
        <!-- ============================================================== -->
        
            <?php include("header.php"); ?>

        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        
        
        
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
            <?php  include("left-sidebar.php"); ?>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        
    
<?php
                
    $username =  $_SESSION['username'];
    $f_query=query("SELECT * FROM `admin` where username='$username' || gmail = '$username'");
    confirm($f_query);
    $f_rows=fetch_array($f_query);
    $type = $f_rows['type'];
    
    if ($type == 'Admin')
    {
        if($_SERVER['REQUEST_URI'] =='/'  || $_SERVER['REQUEST_URI'] == '/index.php'){
                    include("frontend/admin-content.php");
                   
                }
    }
       
                
                
                ?>
               
               
               
               
   
             <!-- footer Start -->
            <?php include("footer.php"); ?>
             <!-- footer End -->
          
<?php
}
else{
    if($_SERVER['REQUEST_URI'] =='/'  || $_SERVER['REQUEST_URI'] == '/index.php'){
                     include("home.php");
                   
                }
}

?>





