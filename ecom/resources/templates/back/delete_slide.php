<?php 
require_once("../../resources/config.php");
if(isset($_GET['delete_slide_id']))
{
	$find_image_name = query("SELECT slide_image FROM slides WHERE slide_id = " . escape_string($_GET['delete_slide_id']) . "LIMIT 1");
	$query = query("DELETE FROM slides WHERE slide_id = " . escape_string($_GET['delete_slide_id']));
	confirm($query);
	$imgname = fetch_array($find_image_name);
	$target = "../../resources/uploads/".$imgname;
	unlink($target);
	$query = query("DELETE FROM slides WHERE slide_id = " . escape_string($_GET['delete_slide_id']));
	confirm($query);
	redirect("index.php?slides");
	set_message("Slide Deleted !!!");
}else
{
	redirect("index.php?slides");
}
?>
