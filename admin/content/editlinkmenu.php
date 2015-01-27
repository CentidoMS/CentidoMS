<?php
	// System load
	include("../../sysload.php");
	
	/**
	 * Edit link item from a menu
	 *
	 * @package CentidoMS
	 */
	
	switch($_POST["btn"]){
		case 0:
			if($user->checkperm("delmenuitem")){
				$reporting = $menu->delitem($_GET["menu"], $_GET["item"]);
				
				switch($reporting){
					case 0:
						redirect("admin/index.php?page=content/menus&menu=".$_GET["menu"]."&message=5");
						break;
					case 1:
						redirect("admin/index.php?page=content/menus&menu=".$_GET["menu"]."&item=".$_GET["item"]."&message=7");
						break;
				}
			}else{
				error(2, true);
			}
			break;
		case 1:
			if($user->checkperm("editmenuitem")){
				$menu->edititem($_GET["menu"], $_GET["item"], $_POST["higher"], $_POST["name"], $_POST["url"]);
				redirect("admin/index.php?page=content/menus&menu=".$_GET["menu"]."&item=".$_GET["item"]."&message=4");
			}else{
				error(2, true);
			}
			break;
	}
?>