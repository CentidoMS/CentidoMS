<?php
	// System load
	include("../../sysload.php");
		
	if($user->checkperm("editextensions")){	
	
		/**
		 * Action for Themes
		 *
		 * @package CentidoMS
		 */
	
		switch($_POST["btn"]){
			case 0:
				if($user->checkperm("delextensions")){
					$stmt = $db->connection->prepare("SELECT `name`, `uninstallurl` FROM ".$sys["mysql"]["prefix"]."plugins WHERE `id` = ?");
					$stmt->bind_param('i', $_POST["id"]);
					$stmt->execute();
					$stmt->bind_result($name, $uninstall);
					$stmt->fetch();
					$stmt->close();
			
					if($uninstall != "none"){
						redirect("admin/extension/uninstallplugin.php?id=".$_POST["id"]);
					}else{
						redirect("contents/plugins/plugin_".$name."/".$uninstall);
					}
				}else{
					error(2);
				}
				break;
				
			case 1:
				redirect("admin/index.php?page=extension/editplugin&id=".$_POST["id"]);
				break;
		}
	}else{
		error(2, true);
	}
?>