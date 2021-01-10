<?php

include("backend/config.php");

$courseID = $_GET['courseID'];

$query = query("UPDATE `course` SET action='HIDE' WHERE id='$courseID'");
confirm($query);
if($query){
    redirect("all-hide-course.php");
    set_message("<h2 style='text-align:center;color:red;'>Course Hide Successfully</h2>");
}
else{
    set_message("Man can't Show Successful");
}


?>