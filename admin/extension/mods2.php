<?php
	// System load
	include("../../sysload.php");
	
	if($user->checkperm("delextensions")){
		
		/**
		 * Uninstall theme
		 *
		 * @package CentidoMS
		 */
	
		$stmt = $db->connection->prepare("SELECT `name`, `editurl`, `uninstallurl` FROM ".$sys["mysql"]["prefix"]."mods WHERE `id` = ?");
		$stmt->bind_param('i', $_POST["id"]);
		$stmt->execute();
		$stmt->bind_result($name, $editurl, $uninstallurl);
		$stmt->fetch();
		$stmt->close();
	
		redirect("contents/mods/mod_".$name."/".$uninstallurl."?id=".$_POST["id"]);
	}else{
		error(2, true);
	}
?>