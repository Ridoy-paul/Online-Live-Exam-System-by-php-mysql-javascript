<?php

include("../backend/functions.php");

$Pid = $_GET['productID'];

$query = query("UPDATE `stock` SET action='SHOW' WHERE id='$Pid'");
confirm($query);
if($query){
  redirect("../all-product.php");
    set_message("Product Showed");
}
else{
    set_message("Product can't Showed");
}


?>