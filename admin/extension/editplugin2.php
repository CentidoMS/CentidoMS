<?php
	// System load
	include("../../sysload.php");
	
	/**
	 * Extension installer
	 *
	 * @package CentidoMS
	 */
	
	if($user->checkperm("addpost")){
		
		if(!isset($_POST["positions"])){
      $positions = false;
		}else{
      $positions = $_POST["positions"];
    }
		
    $plugin->editposition($_GET["id"], $positions);
    
		redirect("admin/index.php?page=extension/editplugin&id=".$_GET["id"]."&message=0");
	}else{
		error(2, true);
	}
?>