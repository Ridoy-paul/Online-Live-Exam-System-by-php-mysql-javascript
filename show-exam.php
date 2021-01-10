<?php

include("backend/config.php");

$PTid = $_GET['examID'];

$query = query("UPDATE `exam` SET action='SHOW' WHERE id='$PTid'");
confirm($query);
if($query){
  redirect("all-exam.php");
    set_message("<h2 style='text-align:center;color:green;'>Exam Show Successfully</h2>");
}
else{
    set_message("Course can't Show Successful");
}


?>