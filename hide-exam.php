<?php

include("backend/config.php");

$courseID = $_GET['hideID'];

$query = query("UPDATE `exam` SET action='HIDE' WHERE id='$courseID'");
confirm($query);
if($query){
    redirect("all-hide-exam.php");
    set_message("<h2 style='text-align:center;color:red;'>Exam Hide Successfully</h2>");
}
else{
    set_message("Man can't Show Successful");
}


?>