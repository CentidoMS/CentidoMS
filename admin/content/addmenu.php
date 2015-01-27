<?php
	// System load
	include("../../sysload.php");
	
	/**
	 * Add menu
	 *
	 * @package CentidoMS
	 */
	
	if($user->checkperm("addmenu")){
		$stmt = $db->connection->prepare("SELECT COUNT(*) FROM ".$sys["mysql"]["prefix"]."menus WHERE `name` = ?");
		$stmt->bind_param('s', $_POST["name"]);
		$stmt->execute();
		$stmt->bind_result($count);
		$stmt->fetch();
		$stmt->close();
	
		if($count == 0){
			$menu->addmenu($_POST["name"]);
			redirect("admin/index.php?page=content/menus&message=0");
		}else{
			redirect("admin/index.php?page=content/menus&message=6");
		}
	}else{
		error(2, true);
	}
?>