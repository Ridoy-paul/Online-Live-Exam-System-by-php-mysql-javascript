<?php
include("backend/config.php");

$studentID = $_GET['studentID'];
$batchID = $_GET['batchID'];

$query = query("INSERT INTO studentBatch(studentID, batchID) VALUES('$studentID', '$batchID')");
confirm($query);
if($query){
    set_message("<h2 style='backgound-color: green; padding: 10px; text-align:center;color:red;'>Access Given</h2>");
    redirect("edit-student-admin.php?studentID=$studentID");
}
else{
    set_message("Access can't Given");
}


?>