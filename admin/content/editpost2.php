<?php
	// System load
	include("../../sysload.php");
	
	/**
	 * Save post
	 *
	 * @package CentidoMS
	 */
	
	if($user->checkperm("addpost")){
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
		
		$post->edit($_GET["id"], $title, $_POST["content"], $permlink, $_POST["btn"], $_POST["page"]);
		
		if(!empty($_POST["category"])){
			$post->editcategories($_POST["category"], $_GET["id"]);
		}else{
			$post->editcategories("none", $_GET["id"]);
		}
		
		redirect("admin/index.php?page=content/editpost&id=".$_GET["id"]."&message=0");
	}else{
		error(2, true);
	}
?>