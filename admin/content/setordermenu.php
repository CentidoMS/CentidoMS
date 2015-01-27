<?php
	// System load
	include("../../sysload.php");
	
	/**
	 * Set order for items
	 *
	 * @package CentidoMS
	 */
	
	if(1 == 1){
		$menu->setorder($_GET["menu"], $_GET["item"], $_POST["direction"]);
		redirect("admin/index.php?page=content/menus");
	}else{
		error(2, true);
	}
?>