<?php
	// System load
	include("../../sysload.php");
	
	/**
	 * Set order for category
	 *
	 * @package CentidoMS
	 */
	
	if($user->checkperm("editcategory")){
		$category->setdefault($_GET["id"]);
		redirect("admin/index.php?page=content/categories&message=6");
	}else{
		error(2, true);
	}
?>