<?php
	// System load
	include("../../sysload.php");
	
	/**
	 * Script for editing users
	 *
	 * @package CentidoMS
	 */
	
	// Check the informations
	if($_POST["username"] == "" OR $_POST["group"] == "" OR $_POST["mail"] == ""){
		redirect("admin/index.php?page=user/curuser&message=1");
		exit();
	}
	
	if($_POST["password"] != ""){
		if($_POST["password"] != $_POST["password2"]){
			redirect("admin/index.php?page=user/curuser&message=2");
			exit();
		}else{
			$passwordcheck = true;
		}
	}else{
		$passwordcheck = false;
	}
	
	$stmt = $db->connection->prepare("SELECT COUNT(*) FROM ".$sys["mysql"]["prefix"]."users WHERE `username` = ?");
	$stmt->bind_param('s', $_POST["username"]);
	$stmt->execute();
	$stmt->bind_result($count);
	$stmt->fetch();
	$stmt->close();
	if($count != 0){
		$stmt = $db->connection->prepare("SELECT `id` FROM ".$sys["mysql"]["prefix"]."users WHERE `username` = ?");
		$stmt->bind_param('s', $_POST["username"]);
		$stmt->execute();
		$stmt->bind_result($id2);
		$stmt->fetch();
		$stmt->close();
		if($id2 == $_GET["id"]){
			$usernamecheck = true;
		}else{
			redirect("admin/index.php?page=user/curuser&message=3");
			exit();
		}
	}else{
		$usernamecheck = true;
	}
	
	// Save the Informations in variables and save the Informations in the database
	if($_POST["firstname"] == ""){
		$firstname = "NULL";
	}else{
		$firstname = $_POST["firstname"];
	}
	
	$user->editusersel($_GET["id"], "first_name", $firstname);
	
	if($_POST["lastname"] == ""){
		$lastname = "NULL";
	}else{
		$lastname = $_POST["lastname"];
	}
	$user->editusersel($_GET["id"], "last_name", $lastname);
	
	if($usernamecheck){
		$username = $_POST["username"];
		$user->editusersel($_GET["id"], "username", $username);
	}
	
	if($passwordcheck){
		$password = md5($_POST["password"]);
		$password = $password;
		$user->editusersel($_GET["id"], "password", $password);
	}
	
	$group = $_POST["group"];
	$user->editusersel($_GET["id"], "group", $group);
	
	
	$stmt = $db->connection->prepare("SELECT `group` FROM ".$sys["mysql"]["prefix"]."groups WHERE `shortcut` = ?");
	$stmt->bind_param('s', $_POST["group"]);
	$stmt->execute();
	$stmt->bind_result($groupdn);
	$stmt->fetch();
	$stmt->close();
	$user->editusersel($_GET["id"], "groupdn", $groupdn);
	
	$lang = $_POST["lang"];
	$user->editusersel($_GET["id"], "lang", $lang);
	
	$mail = $_POST["mail"];
	$user->editusersel($_GET["id"], "mail", $mail);
	
	if($_POST["url"] == ""){
		$url = "NULL";
	}else{
		$url = $_POST["url"];
	}
	$user->editusersel($_GET["id"], "url", $url);
	
	if($_POST["bio"] == ""){
		$bio = "NULL";
	}else{
		$bio = $_POST["bio"];
	}
	$user->editusersel($_GET["id"], "bio", $bio);
	
	redirect("admin/index.php?page=user/curuser&message=0");
?>