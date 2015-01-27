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
				if($user->checkperm("editextensions")){
					$stmt = $db->connection->prepare("SELECT `name`, `uninstallurl` FROM ".$sys["mysql"]["prefix"]."themes WHERE `id` = ?");
					$stmt->bind_param('i', $_POST["id"]);
					$stmt->execute();
					$stmt->bind_result($name, $uninstall);
					$stmt->fetch();
					$stmt->close();
			
					if($uninstall == "none"){
						redirect("admin/extension/uninstalltheme.php?id=".$_POST["id"]);
					}else{
						redirect("contents/themes/theme_".$name."/".$uninstall);
					}
				}else{
					error(2);
				}
				break;
				
			case 1:
				redirect("admin/index.php?page=extension/edittheme&id=".$_POST["id"]);
				break;
			
			case 2:
				$stmt = $db->connection->prepare("UPDATE ".$sys["mysql"]["prefix"]."themes SET `default` = 0 WHERE `default` = 1");
				$stmt->execute();
				$stmt->close();
			
				$stmt = $db->connection->prepare("UPDATE ".$sys["mysql"]["prefix"]."themes SET `default` = 1 WHERE `id` = ?");
				$stmt->bind_param('i', $_POST["id"]);
				$stmt->execute();
				$stmt->close();
			
				redirect("admin/index.php?page=extension/themes&message=1");
				break;
		}
	}else{
		error(2, true);
	}
?>