<?php

include("backend/config.php");

$studentID = $_GET['approcestdID'];

$query = query("UPDATE `students` SET status='Accepted' WHERE id='$studentID'");
confirm($query);
if($query){
    set_message("<h2 style='text-align:center;color:red;'>Student Accepted</h2>");
    redirect("all-approved-students.php");
}
else{
    set_message("Student can't Accepted");
}


?>