<?php
	// System load
	include("../../sysload.php");
	
	/**
	 * Add link item to a menu
	 *
	 * @package CentidoMS
	 */
	
	if($user->checkperm("addmenuitem")){
		if($_POST["name"] == "" OR $_POST["url"] == ""){
			redirect("admin/index.php?page=content/menus&menu=".$_GET["menu"]."&message=9");
			exit();
		}
		
		$menu->additem($_GET["menu"], $_POST["higher"], $_POST["name"], $_POST["url"], "link");
		redirect("admin/index.php?page=content/menus&menu=".$_GET["menu"]."&message=3");
	}else{
		error(2, true);
	}
?>