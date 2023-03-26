<?php 
require_once("../../resources/config.php");
if(isset($_GET['delete_order_id']))
{
	$query = query("DELETE FROM orders WHERE order_id = " . escape_string($_GET['delete_order_id']));
	confirm($query);
	redirect("index.php?orders");
	set_message("Order Deleted !!");
}else
{
	redirect("index.php?orders");
}
?>
