<?php

include("../backend/functions.php");

$PCATid = $_GET['productCATID'];

$query = query("UPDATE `product_categories` SET action='SHOW' WHERE id='$PCATid'");
confirm($query);
if($query){
  redirect("../product-category.php");
    set_message("Category Showed");
}
else{
    set_message("Category can't Showed");
}


?>