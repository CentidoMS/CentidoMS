<?php
	// System load
	include("../../sysload.php");
	
	/**
	 * Redirect to the function
	 *
	 * @package CentidoMS
	 */
	
	if(!isset($_POST["id"])){
		redirect("admin/index.php?page=user/users&message=2");
	}else{
		switch($_POST["btn"]){
			case "0":
				if($_POST["id"] == 1){
					redirect("admin/index.php?page=user/users&message=6");
					exit();
				}
				
				include("deluser.php");
				break;
			
			case "1":
				redirect("admin/index.php?page=user/edituser&id=".$_POST["id"]."");
				break;
		}
	}
?>