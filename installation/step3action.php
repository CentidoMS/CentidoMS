<?php
	/**
	 * Create settings file and database
	 *
	 * @package CentidoMS
	 */
	
	$sfile = fopen("settings.php", "w");
	fwrite($sfile, "<?php
	/**
	 * All settings
	 *
	 * @package CentidoMS
	 */
		   
	// Settings

	// MySQL sonnection settings
	\$sys[\"mysql\"][\"host\"] = \"".$_POST["dbserver"]."\"; // Database host
	\$sys[\"mysql\"][\"user\"] = \"".$_POST["dbuser"]."\"; // Database user
	\$sys[\"mysql\"][\"password\"] = \"".$_POST["dbpassword"]."\"; // Database password
	\$sys[\"mysql\"][\"db\"] = \"".$_POST["dbname"]."\"; // Database name
	\$sys[\"mysql\"][\"prefix\"] = \"".$_POST["dbprefix"]."\"; // Database prefix

	// General settings
	\$sys[\"general\"][\"urlroot\"] = \"".$urlroot."\";
	\$sys[\"general\"][\"abspfathroot\"] = \"".$abspfath."\";
	\$sys[\"general\"][\"defaultlang\"] = \"".$_GET["lang"]."\";
?>");
	fclose($sfile);
	chmod("settings.php", 0664);

	$mysqli = new mysqli($_POST["dbserver"], $_POST["dbuser"], $_POST["dbpassword"], $_POST["dbname"]);
	if($mysqli->connect_errno){
		redirect("index.php?step=3&action=0&lang=de_DE&message=0");
		exit();
	}

	$sql[0] = "CREATE TABLE IF NOT EXISTS `".$_POST["dbprefix"]."categories` (`id` int(8) NOT NULL AUTO_INCREMENT, `level` int(8) NOT NULL, `target` int(8) NOT NULL, `order` int(8) NOT NULL, `name` varchar(256) NOT NULL, `slug` varchar(256) NOT NULL, `default` int(1) NOT NULL, PRIMARY KEY (`id`)) ENGINE = InnoDB  DEFAULT CHARSET = latin1 AUTO_INCREMENT = 1";

	$sql[1] = "CREATE TABLE IF NOT EXISTS `".$_POST["dbprefix"]."groups` (`id` int(8) NOT NULL AUTO_INCREMENT, `shortcut` varchar(64) NOT NULL, `group` varchar(64) NOT NULL, `permissions` varchar(1024) NOT NULL, PRIMARY KEY (`id`)) ENGINE = InnoDB  DEFAULT CHARSET = latin1 AUTO_INCREMENT = 1";

	$sql[2] = "CREATE TABLE IF NOT EXISTS `".$_POST["dbprefix"]."lang` (`id` int(8) NOT NULL AUTO_INCREMENT, `name` varchar(32) NOT NULL, `code` varchar(8) NOT NULL, PRIMARY KEY (`id`)) ENGINE = InnoDB  DEFAULT CHARSET = latin1 AUTO_INCREMENT = 1";

$sql[3] = "CREATE TABLE IF NOT EXISTS `".$_POST["dbprefix"]."load` (`id` int(8) NOT NULL AUTO_INCREMENT, `plugin` int(8) NOT NULL, `position` varchar(1024) NOT NULL, PRIMARY KEY (`id`)) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1";

	$sql[4] = "CREATE TABLE IF NOT EXISTS `".$_POST["dbprefix"]."menus` (`id` int(8) NOT NULL AUTO_INCREMENT, `name` varchar(256) NOT NULL, `position` varchar(1024) NOT NULL, `htmlid` varchar(32) NOT NULL, `htmlclasses` varchar(256) NOT NULL, PRIMARY KEY (`id`)) ENGINE = InnoDB  DEFAULT CHARSET = latin1 AUTO_INCREMENT = 1";

	$sql[5] = "CREATE TABLE IF NOT EXISTS `".$_POST["dbprefix"]."menu_example` (`id` int(8) NOT NULL AUTO_INCREMENT, `level` int(8) NOT NULL, `target` int(8) NOT NULL, `order` int(8) NOT NULL, `name` varchar(256) NOT NULL, `value` varchar(256) NOT NULL, `type` varchar(64) NOT NULL, PRIMARY KEY (`id`)) ENGINE = InnoDB  DEFAULT CHARSET = latin1 AUTO_INCREMENT = 1";

	$sql[6] = "CREATE TABLE IF NOT EXISTS `".$_POST["dbprefix"]."mods` (`id` int(8) NOT NULL AUTO_INCREMENT, `name` varchar(256) NOT NULL, `type` varchar(8) NOT NULL, `version` varchar(8) NOT NULL, `author` varchar(64) NOT NULL, `date` varchar(10) NOT NULL, `license` varchar(64) NOT NULL, `description` varchar(1024) NOT NULL, `devcode` varchar(16) NOT NULL, `updateurl` varchar(1024) NOT NULL, `installurl` varchar(1024) NOT NULL, `uninstallurl` varchar(1024) NOT NULL, `editurl` varchar(1024) NOT NULL, PRIMARY KEY (`id`)) ENGINE = InnoDB  DEFAULT CHARSET = latin1 AUTO_INCREMENT = 1";

	$sql[7] = "CREATE TABLE IF NOT EXISTS `".$_POST["dbprefix"]."permissions` (`id` int(8) NOT NULL AUTO_INCREMENT, `name` varchar(256) NOT NULL, `displayname` varchar(256) NOT NULL, PRIMARY KEY (`id`)) ENGINE = InnoDB  DEFAULT CHARSET = latin1 AUTO_INCREMENT = 1";

	$sql[8] = "CREATE TABLE IF NOT EXISTS `".$_POST["dbprefix"]."plugins` (`id` int(8) NOT NULL AUTO_INCREMENT, `name` varchar(256) NOT NULL, `type` varchar(8) NOT NULL, `version` varchar(8) NOT NULL, `author` varchar(64) NOT NULL, `date` varchar(10) NOT NULL, `license` varchar(64) NOT NULL, `description` varchar(1024) NOT NULL, `devcode` varchar(16) NOT NULL, `updateurl` varchar(1024) NOT NULL, `installurl` varchar(1024) NOT NULL, `uninstallurl` varchar(1024) NOT NULL, `mainurl` varchar(1024) NOT NULL, `editurl` varchar(1024) NOT NULL, PRIMARY KEY (`id`)) ENGINE = InnoDB  DEFAULT CHARSET = latin1 AUTO_INCREMENT = 1";

	$sql[9] = "CREATE TABLE IF NOT EXISTS `".$_POST["dbprefix"]."posts` (`id` int(8) NOT NULL AUTO_INCREMENT, `title` varchar(256) NOT NULL, `alias` varchar(16) NOT NULL, `permlink` varchar(256) NOT NULL, `categories` varchar(256) DEFAULT NULL, `author` varchar(256) NOT NULL, `date` datetime NOT NULL, `status` int(2) NOT NULL, `page` int(1) NOT NULL, PRIMARY KEY (`id`)) ENGINE = InnoDB  DEFAULT CHARSET = latin1 AUTO_INCREMENT = 1";

	$sql[10] = "CREATE TABLE IF NOT EXISTS `".$_POST["dbprefix"]."settings` (`property` varchar(64) NOT NULL, `value` varchar(128) NOT NULL, PRIMARY KEY (`property`)) ENGINE = InnoDB DEFAULT CHARSET = latin1";

	$sql[11] = "CREATE TABLE IF NOT EXISTS `".$_POST["dbprefix"]."themes` (`id` int(8) NOT NULL AUTO_INCREMENT, `name` varchar(256) NOT NULL, `type` varchar(8) NOT NULL, `version` varchar(8) NOT NULL, `author` varchar(64) NOT NULL, `date` varchar(10) NOT NULL, `license` varchar(64) NOT NULL, `description` varchar(1024) NOT NULL, `devcode` varchar(16) NOT NULL, `updateurl` varchar(1024) NOT NULL, `installurl` varchar(1024) NOT NULL, `uninstallurl` varchar(1024) NOT NULL, `mainurl` varchar(1024) NOT NULL, `editurl` varchar(1024) NOT NULL, `positions` varchar(1024) NOT NULL, `menus` varchar(1024) NOT NULL, `default` int(1) NOT NULL, PRIMARY KEY (`id`)) ENGINE = InnoDB  DEFAULT CHARSET = latin1 AUTO_INCREMENT = 1";

	$sql[12] = "CREATE TABLE IF NOT EXISTS `".$_POST["dbprefix"]."users` (`id` int(8) NOT NULL AUTO_INCREMENT, `first_name` varchar(32) DEFAULT NULL, `last_name` varchar(32) DEFAULT NULL, `username` varchar(32) NOT NULL, `password` varchar(32) NOT NULL, `group` varchar(32) NOT NULL, `groupdn` varchar(64) NOT NULL, `lang` varchar(8) NOT NULL, `mail` varchar(128) NOT NULL, `url` varchar(128) DEFAULT NULL, `bio` varchar(1024) DEFAULT NULL, PRIMARY KEY (`id`)) ENGINE = InnoDB  DEFAULT CHARSET = latin1 AUTO_INCREMENT = 1";

	$count = 0;
	while(isset($sql[$count])){
		$mysqli->query($sql[$count]);
		
		$count++;
	}
?>