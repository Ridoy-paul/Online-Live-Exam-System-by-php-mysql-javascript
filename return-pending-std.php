<?php

include("backend/config.php");

$studentID = $_GET['approcestdID'];

$query = query("UPDATE `students` SET status='Pending' WHERE id='$studentID'");
confirm($query);
if($query){
    set_message("<h2 style='text-align:center;color:red;'>Student Returned</h2>");
    redirect("all-pending-students.php");
}
else{
    set_message("<h2 style='text-align:center;color:red;'>Student can't Returned</h2>");
}


?>