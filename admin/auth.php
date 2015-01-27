<?php
	// System load
	include("../sysload.php");
	
	/**
	 * Login
	 *
	 * @package CentidoMS
	 */
	
	$username = $_POST["username"]; // Save the username in a variable
	$password = md5($_POST["pass"]); // Save the password with MD5 in a variable
	
	// Save the redirect to the wished destination
	if(isset($_GET["redirect"]) AND !empty($_GET["redirect"])){
		$redirect = "redirect=".$_GET["redirect"];
	}else{
		$redirect = "";
	}
	
	// Check if the form is filled
	if(empty($_POST["username"]) OR empty($_POST["pass"])){
		redirect("admin/login.php?message=1".$redirect);
		exit();
	}
	
	// Count the users with the username of the form
	$stmt = $db->connection->prepare("SELECT COUNT(*) FROM ".$sys["mysql"]["prefix"]."users WHERE username = ?");
	$stmt->bind_param('s', $username);
	$stmt->execute();
	$stmt->bind_result($count);
	$stmt->fetch();
	$stmt->close();
	
	// Check if exists a user with the username
	if($count == 1){
		$stmt = $db->connection->prepare("SELECT `id`, `password`, `group`, `lang` FROM ".$sys["mysql"]["prefix"]."users WHERE username = ?");
		$stmt->bind_param('s', $username);
		$stmt->execute();
		$stmt->bind_result($id, $password2, $group, $lang);
		$stmt->fetch();
		$stmt->close();
	}else{
		redirect("admin/login.php?message=1".$redirect);
		echo $count;
		exit();
	}
	
	// Check if password is correct
	if($password == $password2){
		$_SESSION["status"] = 1;
		$_SESSION["id"] = $id;
		$_SESSION["username"] = $username;
		$_SESSION["group"] = $group;
		$_SESSION["lang"] = $lang;
		
		if(isset($_GET["redirect"]) AND !empty($_GET["redirect"])){
			redirect("admin/index.php?page=".$_GET["redirect"]);
		}else{
			redirect("admin/index.php");
		}
		
	}else{
		redirect("admin/login.php?message=1&".$redirect);
		exit();
	}
?>