<?php 
require_once("../../resources/config.php");
if(isset($_GET['delete_report_id']))
{
	$query = query("DELETE FROM reports WHERE report_id = " . escape_string($_GET['delete_report_id']));
	confirm($query);
	redirect("index.php?reports");
	set_message("Entry Removed !!");
}else
{
	redirect("index.php?reports");
}
?>