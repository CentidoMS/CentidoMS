<?php
	// System load
	include("../../sysload.php");
	
	if($user->checkperm("delextensions")){
		
		/**
		 * Uninstall theme
		 *
		 * @package CentidoMS
		 */
	
		$stmt = $db->connection->prepare("SELECT `name`, `editurl` FROM ".$sys["mysql"]["prefix"]."mods WHERE `id` = ?");
		$stmt->bind_param('i', $_GET["id"]);
		$stmt->execute();
		$stmt->bind_result($name, $editurl);
		$stmt->fetch();
		$stmt->close();
	
		if($editurl != "none"){
			unlink($sys["general"]["abspfathroot"]."admin/extensions/".$editurl);
		}
		
		del($sys["general"]["abspfathroot"]."contents/mods/mod_".$name);
	
		$stmt = $db->connection->prepare("DELETE FROM ".$sys["mysql"]["prefix"]."mods WHERE `id` = ?");
		$stmt->bind_param('i', $_GET["id"]);
		$stmt->execute();
		$stmt->close();
	
		redirect("admin/index.php?page=extension/mods&message=0");
	}else{
		error(2, true);
	}
?>