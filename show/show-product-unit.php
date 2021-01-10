<?php

include("../backend/functions.php");

$PUnitid = $_GET['productUNITID'];

$query = query("UPDATE `product_unit_types` SET action='SHOW' WHERE id='$PUnitid'");
confirm($query);
if($query){
  redirect("../product-unit.php");
    set_message("Unit Showed");
}
else{
    set_message("Unit can't Showed");
}


?>