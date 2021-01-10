<?php

include("backend/config.php");

$PTid = $_GET['courseID'];

$query = query("UPDATE `course` SET action='SHOW' WHERE id='$PTid'");
confirm($query);
if($query){
  redirect("all-course.php");
    set_message("<h2 style='text-align:center;color:green;'>Course Show Successfully</h2>");
}
else{
    set_message("Course can't Show Successful");
}


?>