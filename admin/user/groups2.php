<?php
	// System load
	include("../../sysload.php");
	
	/**
	 * Redirect to the function
	 *
	 * @package CentidoMS
	 */
	
	if(!isset($_POST["id"])){
		redirect("admin/index.php?page=user/groups&message=2");
	}else{
		switch($_POST["btn"]){
			case "0":
				include("delgroup.php");
				break;
		
			case "1":
				if($_POST["id"] == 1){
					redirect("admin/index.php?page=user/groups&message=4");
					exit();
				}
				redirect("admin/index.php?page=user/editgroup&id=".$_POST["id"]."");
				break;
		}
	}
?>