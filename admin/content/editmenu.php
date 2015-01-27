<?php
	// System load
	include("../../sysload.php");
	
	/**
	 * Edit link item from a menu
	 *
	 * @package CentidoMS
	 */
	
	if($_POST["btn"] == 0){
		if($user->checkperm("delmenu")){
			$menu->delmenu($_GET["menu"]);
			redirect("admin/index.php?page=content/menus&message=2");
		}else{
			error(2, true);
		}
	}else{
		if($user->checkperm("editmenu")){
			if($_POST["name"] != ""){
				$menu->editmenu($_GET["menu"], nametodir($_POST["name"]), $_POST["position"], $_POST["id"], $_POST["classes"]);
				redirect("admin/index.php?page=content/menus&menu=".$_GET["menu"]."&message=1");
			}else{
				redirect("admin/index.php?page=content/menus&menu=".$_GET["menu"]."&message=6");
			}
		}else{
			error(2, true);
		}
	}
?>