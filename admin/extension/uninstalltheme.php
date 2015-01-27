<?php
	// System load
	include("../../sysload.php");
	
	if($user->checkperm("delextensions")){
	
		/**
		 * Uninstall theme
		 *
		 * @package CentidoMS
		 */
	
		$stmt = $db->connection->prepare("SELECT `name`, `editurl`, `default` FROM ".$sys["mysql"]["prefix"]."themes WHERE `id` = ?");
		$stmt->bind_param('i', $_GET["id"]);
		$stmt->execute();
		$stmt->bind_result($name, $editurl, $default);
		$stmt->fetch();
		$stmt->close();
		
		if($default == 1){
			redirect("admin/index.php?page=extension/themes&message=2");
			exit();
		}
		
		if($editurl != "none"){
			unlink($sys["general"]["abspfathroot"]."admin/extensions/".$editurl);
		}
	
		del($sys["general"]["abspfathroot"]."contents/themes/theme_".$name);
	
		$stmt = $db->connection->prepare("DELETE FROM ".$sys["mysql"]["prefix"]."themes WHERE `id` = ?");
		$stmt->bind_param('i', $_GET["id"]);
		$stmt->execute();
		$stmt->close();
	
		redirect("admin/index.php?page=extension/themes&message=0");
	}else{
		error(2, true);
	}
?>