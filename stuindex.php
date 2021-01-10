<?php require_once("backend/config.php"); ?>
<?php

         if(!isset($_SESSION['username'])){
            header("Location: login.php");
       
      }
      else{
          
                    include("home.php");
                   
      }
?>
 