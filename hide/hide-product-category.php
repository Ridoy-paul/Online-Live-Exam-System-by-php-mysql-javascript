<?php

include("../backend/functions.php");

$PCATid = $_GET['productCATID'];

$query = query("UPDATE `product_categories` SET action='HIDE' WHERE id='$PCATid'");
confirm($query);
if($query){
  redirect("../product-category.php");
    set_message("Category Hide Successful");
}
else{
    set_message("Category can't Hide Successful");
}


?>