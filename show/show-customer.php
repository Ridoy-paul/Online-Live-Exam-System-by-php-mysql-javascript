<?php

include("../backend/functions.php");

$customerCode = $_GET['customerCode'];

$query = query("UPDATE `clients` SET action='SHOW' WHERE code='$customerCode'");
confirm($query);
if($query){
  redirect("../all-clients.php");
    set_message("Customer Showed");
}
else{
    set_message("Customer can't Showed");
}


?>