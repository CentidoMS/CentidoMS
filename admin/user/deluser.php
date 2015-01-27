<?php
	/**
	 * Script for delete the user
	 *
	 * @package CentidoMS
	 */
	
	if($user->checkperm("deluser")){
		echo $_POST["id"];
		if($_POST["id"] == 1){
			redirect("admin/index.php?page=user/users&message=6");
			exit();
		}
		$user->deluser($_POST["id"]);
		
		redirect("admin/index.php?page=user/users&message=0");
	}else{
		error(2, true);
	}
?>