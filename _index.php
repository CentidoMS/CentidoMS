<?php
	// System load
	include("sysload.php");
	
	/**
	 * First Page
	 *
	 * @package CentidoMS
	 */ 
	
	$stmt = $db->connection->prepare("SELECT `id` FROM ".$sys["mysql"]["prefix"]."themes WHERE `default` = 1");
	$stmt->execute();
	$stmt->bind_result($themeid);
	$stmt->fetch();
	$stmt->close();
	
	$stmt = $db->connection->prepare("SELECT `name`, `mainurl` FROM ".$sys["mysql"]["prefix"]."themes WHERE `id` = ?");
	$stmt->bind_param('i', $themeid);
	$stmt->execute();
	$stmt->bind_result($name, $mainurl);
	$stmt->fetch();
	$stmt->close();
	
	$sys["general"]["themepfath"] = $sys["general"]["urlroot"]."contents/themes/theme_".$name."/";
	
	include($sys["general"]["abspfathroot"]."contents/themes/theme_".$name."/".$mainurl);
?>