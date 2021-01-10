<?php

include("../backend/functions.php");

$customerCode = $_GET['customerCode'];

$query = query("UPDATE `clients` SET action='HIDE' WHERE code='$customerCode'");
confirm($query);
if($query){
  redirect("../all-clients.php");
    set_message("Customer Hide");
}
else{
    set_message("Customer can't Hide");
}


?>