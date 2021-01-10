<?php require_once("backend/config.php"); ?>
<?php

 $examID = $_GET['examID'];
 
 $examStartQuery = query("UPDATE exam SET StartingAction='1' WHERE id='$examID'");
 confirm($examStartQuery);
 
 if($examStartQuery){
     set_message('<h2 class="m-0 text-dark bg-primary text-center" style="padding: 10px; border-radius: 20px;">Exam is Started</h2>');
     redirect("all-exam.php");
 }


?>