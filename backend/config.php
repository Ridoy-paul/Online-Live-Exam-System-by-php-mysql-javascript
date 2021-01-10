<?php

ob_start();
session_start();
date_default_timezone_set("Asia/Dhaka");

defined("DS") ? null : define("DS", DIRECTORY_SEPARATOR);

//defined("PRODUCT_IMAGES")? null : define("PRODUCT_IMAGES", __DIR__ .DS. "media");


defined("DB_HOST")? null : define("DB_HOST", "localhost");
defined("DB_USER")? null : define("DB_USER", "root");
defined("DB_PASS")? null : define("DB_PASS", "");
defined("DB_NAME")? null : define("DB_NAME", "onlineexam");


$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

mysqli_query($connection, 'SET CHARACTER SET utf8');

mysqli_query($connection, "SET SESSION collation_connection = 'utf8_general_ci'");




require_once("functions.php");

?>