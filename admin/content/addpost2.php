<?php
	// System load
	include("../../sysload.php");
	
	/**
	 * Save post
	 *
	 * @package CentidoMS
	 */
	
	if($user->checkperm("addpost")){
		if($_POST["content"] == ""){
			$content = "-";
		}else{
			$content = $_POST["content"];
		}
		
		$date = date("Y-m-d H:i:s");
		
		if($_POST["title"] == ""){
			$title = "No title!";
		}else{
			$title = $_POST["title"];
		}
		
		if($_POST["permlink"] == ""){
			$permlink = nametodir($title);
		}else{
			$permlink = nametodir($_POST["permlink"]);
		}
		
		$post->add($title, $content, $permlink, $_SESSION["username"], $_POST["btn"], $date, $_POST["page"]);
		
		$result = $post->getbypermlink($permlink);
	
		if(!empty($_POST["category"])){
			$post->editcategories($_POST["category"], $result["id"]);
		}else{
			$post->editcategories("none", $result["id"]);
		}
		
		redirect("admin/index.php?page=content/posts&message=2");
	}else{
		error(2, true);
	}
?>