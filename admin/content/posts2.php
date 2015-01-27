<?php
	// System load
	include("../../sysload.php");
	
	/**
	 * Delete or edit a post
	 *
	 * @package CentidoMS
	 */
	
	if(!isset($_POST["id"])){
		redirect("admin/index.php?page=content/posts&message=3");
	}else{
		switch($_POST["btn"]){
			case "0":
				include("delpost.php");
				break;
				
			case "1":
				redirect("admin/index.php?page=content/editpost&id=".$_POST["id"]."");
				break;
		}
	}
?>