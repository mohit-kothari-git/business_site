<?php 
require_once("../../resources/config.php");
if(isset($_GET['delete_users_id']))
{
	$query = query("DELETE FROM users WHERE user_id = " . escape_string($_GET['delete_users_id']));
	confirm($query);
	redirect("index.php?users");
	set_message("User Removed !!");
}else
{
	redirect("index.php?users");
}
?>