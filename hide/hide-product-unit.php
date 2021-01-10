<?php

include("../backend/functions.php");

$PTid = $_GET['productUNITID'];

$query = query("UPDATE `product_unit_types` SET action='HIDE' WHERE id='$PTid'");
confirm($query);
if($query){
  redirect("../product-unit.php");
    set_message("Unit Hide Successfully");
}
else{
    set_message("Unit can't Hide Successfully");
}


?>