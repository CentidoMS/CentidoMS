<?php
	/**
	 * Delete a category
	 *
	 * @package CentidoMS
	 */
	
	if($user->checkperm("delcategory")){
		$category->del($_GET["id"]);
	}else{
		error(2, true);
	}
?>