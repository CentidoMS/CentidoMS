<?php
	// System load
	include("../../sysload.php");
	
	/**
	 * Add a user for the backend 
	 *
	 * @package CentidoMS
	 */
	
	if($user->checkperm("adduser")){
	
		// Check the informations
		if($_POST["username"] == "" OR $_POST["password"] == "" OR $_POST["group"] == "" OR $_POST["mail"] == ""){
			redirect("admin/index.php?page=user/adduser&message=1");
			exit();
		}
	
		if($_POST["password"] != $_POST["password2"]){
			redirect("admin/index.php?page=user/adduser&message=2");
			exit();
		}
		
		$stmt = $db->connection->prepare("SELECT COUNT(*) FROM ".$sys["mysql"]["prefix"]."users WHERE `username` = ?");
		$stmt->bind_param('s', $_POST["username"]);
		$stmt->execute();
		$stmt->bind_result($count);
		$stmt->fetch();
		$stmt->close();
		if($count == 1){
			redirect("admin/index.php?page=user/adduser&message=3");
			exit();
		}
	
		// Save the Informations in variables
		if($_POST["firstname"] == ""){
			$firstname = "NULL";
		}else{
			$firstname = $_POST["firstname"];
		}
		
		if($_POST["lastname"] == ""){
			$lastname = "NULL";
		}else{
			$lastname = $_POST["lastname"];
		}
	
		$username = $_POST["username"];
		
		$password = md5($_POST["password"]);
		
		$group = $_POST["group"];
		
		$stmt = $db->connection->prepare("SELECT `group` FROM ".$sys["mysql"]["prefix"]."groups WHERE `shortcut` = ?");
		$stmt->bind_param('s', $_POST["group"]);
		$stmt->execute();
		$stmt->bind_result($groupdn);
		$stmt->fetch();
		$stmt->close();
		
		$lang = $_POST["lang"];
	
		$mail = $_POST["mail"];
	
		if($_POST["url"] == ""){
		$url = "NULL";
		}else{
			$url = $_POST["url"];
		}
	
		if($_POST["bio"] == ""){
		$bio = "NULL";
		}else{
			$bio = $_POST["bio"];
		}
	
		// Save the Informations in the database
		$user->adduser($firstname, $lastname, $username, $password, $group, $groupdn, $lang, $mail, $url, $bio);
		redirect("admin/index.php?page=user/adduser&message=0");
	}else{
		error(2, true);
	}
?>