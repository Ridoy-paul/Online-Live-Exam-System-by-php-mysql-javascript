<?php

include("../backend/functions.php");

$PTid = $_GET['productID'];

$query = query("UPDATE `stock` SET action='HIDE' WHERE id='$PTid'");
confirm($query);
if($query){
  redirect("../all-product.php");
    set_message("Product Hide Successful");
}
else{
    set_message("Product can't Hide Successful");
}


?>