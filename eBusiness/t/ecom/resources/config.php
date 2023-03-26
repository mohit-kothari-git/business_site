<?php
//output buffering
ob_start();
//for starting session
session_start();
// for destroying session
//session_destroy();
//defining directories for templates front and Back
defined("DS") ? null : define("DS",DIRECTORY_SEPARATOR);
defined("TEMPLATE_FRONT") ? null : define("TEMPLATE_FRONT", __DIR__ . DS . "templates/front");  
defined("TEMPLATE_BACK") ? null : define("TEMPLATE_BACK", __DIR__ . DS . "templates/back");
defined("UPLOAD_DIRECTORY") ? null : define("UPLOAD_DIRECTORY", __DIR__ . DS . "../../resources/uploads");

//database values 
defined("DB_HOST") ? null : define("DB_HOST","localhost");
defined("DB_USER") ? null : define("DB_USER","root");
defined("DB_PASS") ? null : define("DB_PASS","");
defined("DB_NAME") ? null : define("DB_NAME","ecom_db");
$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
//to include functions.php files everywhere where config.php is included
require_once("functions.php");
require_once("cart.php");
?>