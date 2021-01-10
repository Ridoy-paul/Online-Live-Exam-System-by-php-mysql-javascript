<?php

include("../backend/functions.php");

$PTid = $_GET['manID'];

$query = query("UPDATE `delivery_man` SET action='HIDE' WHERE id='$PTid'");
confirm($query);
if($query){
  redirect("../All-delivery-man.php");
    set_message("Man Hide Successful");
}
else{
    set_message("Man can't Hide Successful");
}


?>