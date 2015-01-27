<?php
	/**
	 * Script for delete the user
	 *
	 * @package CentidoMS
	 */
	
	if($user->checkperm("delgroup")){
		$result = $user->getgroupbyid($_POST["id"]);
		
		$stmt = $db->connection->prepare("SELECT COUNT(*) FROM ".$sys["mysql"]["prefix"]."users WHERE `group` = ?");
		$stmt->bind_param('s', $result["shortcut"]);
		$stmt->execute();
		$stmt->bind_result($result2);
		$stmt->fetch();
		$stmt->close();
	
		if($result2 == 0){
			$user->delgroup($_POST["id"]);
			redirect("admin/index.php?page=user/groups&message=0");
		}else{
			redirect("admin/index.php?page=user/groups&message=3");
		}
	}else{
		error(2, true);
	}
?>