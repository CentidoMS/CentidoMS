<?php
	/**
	 * Delete post
	 *
	 * @package CentidoMS
	 */
	
	if($user->checkperm("delpost")){
		$post->del($_POST["id"]);
		redirect("admin/index.php?page=content/posts&message=0");
	}else{
		error(2, true);
	}
?>