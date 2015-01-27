<?php
	/**
	 * Write
	 *
	 * @package CentidoMS
	 */
	
	include("settings.php");
	
	if($_POST["sitename"] == ""){
		redirect("index.php?step=4&action=0&lang=de_DE&message=1");
		exit();
	}
	
	if($_POST["slogan"] == ""){
		$slogan = "none";
	}else{
		$slogan = $_POST["slogan"];
	}
	
	if($_POST["description"] == ""){
		$description = "none";
	}else{
		$description = $_POST["description"];
	}
	
	if($_POST["user"] == ""){
		redirect("index.php?step=4&action=0&lang=de_DE&message=2");
		exit();
	}
	
	if($_POST["password"] == ""){
		redirect("index.php?step=4&action=0&lang=de_DE&message=3");
		exit();
	}
	
	if($_POST["password"] != $_POST["password2"]){
		redirect("index.php?step=4&action=0&lang=de_DE&message=4");
		exit();
	}
	
	if($_POST["mail"] == ""){
		redirect("index.php?step=4&action=0&lang=de_DE&message=5");
		exit();
	}
	
	$mysqli = new mysqli($sys["mysql"]["host"], $sys["mysql"]["user"], $sys["mysql"]["password"], $sys["mysql"]["db"]);
	if($mysqli->connect_errno){
		redirect("index.php?step=3&action=0&lang=de_DE&message=0");
		exit();
	}
	
	$sql[0] = "INSERT INTO `".$sys["mysql"]["prefix"]."categories` (`level`, `target`, `order`, `name`, `slug`, `default`) VALUES (0, 0, 1, 'Uncategorized',  'uncategorized', 1)";
	
	$sql[1] = "INSERT INTO `".$sys["mysql"]["prefix"]."categories` (`level`, `target`, `order`, `name`, `slug`, `default`) VALUES (0, 0, 2, 'Beispiel',  'example', 0)";
	
	$sql[2] = "INSERT INTO `".$sys["mysql"]["prefix"]."groups` (`shortcut`, `group`, `permissions`) VALUES ('superadmin', 'Super Administrator', 'a:1:{i:0;s:4:\"none\";}')";
	
	$sql[3] = "INSERT INTO `".$sys["mysql"]["prefix"]."lang` (`name`, `code`) VALUES ('Deutsch', 'de_DE')";
	
	$sql[4] = "INSERT INTO `".$sys["mysql"]["prefix"]."menus` (`name`, `position`, `htmlid`, `htmlclasses`) VALUES ('example', 'topmenu', 'none', 'none')";
	
	$sql[5] = "INSERT INTO `".$sys["mysql"]["prefix"]."menu_example`(`level`, `target`, `order`, `name`, `value`, `type`) VALUES (0, 0, 1, 'CentidoMS', 'http://centidoms.org', 'link')";
	
	$sql[6] = "INSERT INTO `".$sys["mysql"]["prefix"]."menu_example`(`level`, `target`, `order`, `name`, `value`, `type`) VALUES (0, 0, 2, 'Beispiel', 'example', 'category')";
	
	$sql[7] = "INSERT INTO `".$sys["mysql"]["prefix"]."permissions` (`name`, `displayname`) VALUES ('addgroup', 'LANG_ADMIN_DEFAULT_PERMISSIONS_ADDGROUP'), ('adduser', 'LANG_ADMIN_DEFAULT_PERMISSIONS_ADDUSER'), ('deluser', 'LANG_ADMIN_DEFAULT_PERMISSIONS_DELUSER'), ('edituser', 'LANG_ADMIN_DEFAULT_PERMISSIONS_EDITUSER'), ('delgroup', 'LANG_ADMIN_DEFAULT_PERMISSIONS_DELGROUP'), ('editgroup', 'LANG_ADMIN_DEFAULT_PERMISSIONS_EDITGROUP'), ('addpost', 'LANG_ADMIN_DEFAULT_PERMISSIONS_ADDPOST'), ('editpost', 'LANG_ADMIN_DEFAULT_PERMISSIONS_EDITPOST'), ('delpost', 'LANG_ADMIN_DEFAULT_PERMISSIONS_DELPOST'), ('addcategory', 'LANG_ADMIN_DEFAULT_PERMISSIONS_ADDCATEGORY'), ('editcategory', 'LANG_ADMIN_DEFAULT_PERMISSIONS_EDITCATEGORY'), ('delcategory', 'LANG_ADMIN_DEFAULT_PERMISSIONS_DELCATEGORY'), ('addmenu', 'LANG_ADMIN_DEFAULT_PERMISSIONS_ADDMENU'), ('editmenu', 'LANG_ADMIN_DEFAULT_PERMISSIONS_EDITMENU'), ('delmenu', 'LANG_ADMIN_DEFAULT_PERMISSIONS_DELMENU'), ('addmenuitem', 'LANG_ADMIN_DEFAULT_PERMISSIONS_ADDMENUITEM'), ('editmenuitem', 'LANG_ADMIN_DEFAULT_PERMISSIONS_EDITMENUITEM'), ('delmenuitem', 'LANG_ADMIN_DEFAULT_PERMISSIONS_DELMENUITEM'), ('addextensions', 'LANG_ADMIN_DEFAULT_PERMISSIONS_ADDEXTENSIONS'), ('delextensions', 'LANG_ADMIN_DEFAULT_PERMISSIONS_DELEXTENSIONS'), ('editextensions', 'LANG_ADMIN_DEFAULT_PERMISSIONS_EDITEXTENSIONS'), ('editsettings', 'LANG_ADMIN_DEFAULT_PERMISSIONS_EDITSETTINGS')";
	
	$sql[8] = "INSERT INTO `".$sys["mysql"]["prefix"]."settings` (`property`, `value`) VALUES ('homepage', 'none'), ('sitedescription', '".$description."'), ('sitename', '".$_POST["sitename"]."'), ('siteslogan', '".$slogan."')";
	
	$sql[9] = "INSERT INTO `".$sys["mysql"]["prefix"]."themes` (`name`, `type`, `version`, `author`, `date`, `license`, `description`, `devcode`, `updateurl`, `installurl`, `uninstallurl`, `mainurl`, `editurl`, `positions`, `menus`, `default`) VALUES ('BestPHP', 'theme', '1.0.00', 'Sahithyen Kanaganayagam', '29-7-13', 'GNU/GPL', 'Ein Theme das durch die Inspiration von \'php.net\' enstanden ist.', 'AA-AA-AA-AA-AAAA', 'none', 'none', 'none', 'index.php', 'none', 'sidebar,widget', 'topmenu', 1)";
  
  $sql[10] = "INSERT INTO `".$sys["mysql"]["prefix"]."plugins` (`id`, `name`, `type`, `version`, `author`, `date`, `license`, `description`, `devcode`, `updateurl`, `installurl`, `uninstallurl`, `mainurl`, `editurl`) VALUES (NULL, 'HelloWorld', 'plugin', '1.0.00', 'Sahithyen Kanaganayagam', '10-7-13', 'GNU/GPL', 'Ein Test-Plugin!', 'AA-AA-AA-AA-AAAA', 'none', 'none', 'none', 'index.php', 'none')";
	
	$sql[11] = "INSERT INTO `".$sys["mysql"]["prefix"]."users` (`username`, `password`, `group`, `groupdn`, `lang`, `mail`) VALUES ('".$_POST["user"]."', '".md5($_POST["password"])."', 'superadmin', 'Super Administrator', '".$_GET["lang"]."', '".$_POST["mail"]."')";
	
	$sql[12] = "INSERT INTO `".$sys["mysql"]["prefix"]."posts`(`title`, `alias`, `permlink`, `categories`, `author`, `date`, `status`, `page`) VALUES ('Erste Installation', '7V7JSSCLJS72QIHU', 'firstins', '2', '".$_POST["user"]."', '".date("Y-m-d H:i:s")."', 1, 0)";
  
  $sql[13] = "INSERT INTO `".$sys["mysql"]["prefix"]."load` (`id`, `plugin`, `position`) VALUES (1, 1, 'sidebar'), (2, 1, 'widget')";
	
	$count = 0;
	while(isset($sql[$count])){
		$mysqli->query($sql[$count]);
		
		$count++;
	}
?>