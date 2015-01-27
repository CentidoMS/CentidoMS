<?php
	// System load
	include("../../sysload.php");
	
	/**
	 * Kategorie hinzufügen
	 *
	 * @package CentidoMS
	 */
	
	if($user->checkperm("addcategory")){
		$category->add($_POST["categoryname"], $_POST["slug"], $_POST["higher"]);
		redirect("admin/index.php?page=content/categories&message=0");
	}else{
		error(0, true);
	}
?>