<?php 
require_once("../../resources/config.php");
if(isset($_GET['delete_category_id']))
{
	$query = query("DELETE FROM categories WHERE cat_id = " . escape_string($_GET['delete_category_id']));
	confirm($query);
	redirect("index.php?categories");
	set_message("Category Deleted !!");
}else
{
	redirect("index.php?categories");
}
?>