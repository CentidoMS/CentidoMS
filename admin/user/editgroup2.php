<?php
	// System load
	include("../../sysload.php");
	
	/**
	 * Make a new Group
	 *
	 * @package CentidoMS
	 */
	
	if($user->checkperm("editgroup")){
		if(!isset($_POST["permissions"])){
			$permissions[0] = "none";
		}else{
			$permissions[0] = $_POST["permissions"];
		}
		
		$user->editgroup($_GET["id"], $permissions);
		redirect("admin/index.php?page=user/groups&message=1");
	}else{
		error(2, true);
	}
?>