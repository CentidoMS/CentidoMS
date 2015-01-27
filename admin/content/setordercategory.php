<?php
	// System load
	include("../../sysload.php");
	
	/**
	 * Set order for category
	 *
	 * @package CentidoMS
	 */
	
	if($user->checkperm("editcategory")){
		$category->setorder($_GET["id"], $_POST["direction"]);
		redirect("admin/index.php?page=content/categories");
	}else{
		error(2, true);
	}
?>