<?php
	// System load
	include("../../sysload.php");
	
	/**
	 * Make a new Group
	 *
	 * @package CentidoMS
	 */
	
	if($user->checkperm("addgroup")){
		if($_POST['shortcut'] == "" OR $_POST['group'] == ""){
			redirect("admin/index.php?page=user/addgroup&message=1");
			exit();
		}else{
			// Check if the Shortcut is reserved
			$stmt = $db->connection->prepare("SELECT COUNT(*) FROM ".$sys["mysql"]["prefix"]."groups WHERE `shortcut` = ?");
			$stmt->bind_param('s', $_POST['shortcut']);
			$stmt->execute();
			$stmt->bind_result($control1);
			$stmt->fetch();
			$stmt->close();
			
			// Check if the Groupname is reserved
			$stmt = $db->connection->prepare("SELECT COUNT(*) FROM ".$sys["mysql"]["prefix"]."groups WHERE `group` = ?");
			$stmt->bind_param('s', $_POST['group']);
			$stmt->execute();
			$stmt->bind_result($control2);
			$stmt->fetch();
			$stmt->close();
		}
		
		
		if($control1 == 0 AND $control2 == 0){
			if(!isset($_POST["permissions"])){
				$permissions[0] = "none";
			}else{
				$permissions[0] = $_POST["permissions"];
			}
			
			$user->addgroup($_POST["shortcut"], $_POST["group"], $permissions);
			redirect("admin/index.php?page=user/addgroup&message=0");
		}else{
			redirect("admin/index.php?page=user/addgroup&message=2");
		}
	}else{
		error(2, true);
	}
?>