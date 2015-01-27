<?php
	// System load
	include("../../sysload.php");
	
	/**
	 * Add link item to a menu
	 *
	 * @package CentidoMS
	 */
	
	if($user->checkperm("addmenuitem")){
		if($_POST["category"] == "0"){
			redirect("admin/index.php?page=content/menus&menu=".$_GET["menu"]."&message=8");
			exit();
		}elseif($_POST["name"] == ""){
			redirect("admin/index.php?page=content/menus&menu=".$_GET["menu"]."&message=9");
			exit();
		}else{
			$categoryslug = $category->getslugbyid($_POST["category"]);
			
			
			$menu->additem($_GET["menu"], $_POST["higher"], $_POST["name"], $categoryslug, "category");
			redirect("admin/index.php?page=content/menus&menu=".$_GET["menu"]."&message=3");
		}
	}else{
		error(2, true);
	}
?>