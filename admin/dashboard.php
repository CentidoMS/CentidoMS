<?php
	/**
	 * Dashboard
	 *
	 * @package CentidoMS
	 */
	
	title(getlang("LANG_ADMIN_DEFAULT_DASHBOARD_HEADING", false), true);
	
	echo "<div class=\"page-header\"><h1>".getlang("LANG_ADMIN_DEFAULT_DASHBOARD_HEADING", false)."</h1></div>";
	
	echo "<h1>".getlang("LANG_ADMIN_DEFAULT_DASHBOARD_WELCOM", false)."</h1><br />";
	echo getlang("LANG_ADMIN_DEFAULT_DASHBOARD_WELCOM_TEXT", false)."<br /><br />";
	echo "<b>".getlang("LANG_ADMIN_DEFAULT_DASHBOARD_USERNAME", false)."</b> ".$_SESSION["username"]."<br />";
	echo "<b>".getlang("LANG_ADMIN_DEFAULT_DASHBOARD_LANGUAGE", false)."</b> ".$_SESSION["lang"]."<br />";
	echo "<b>".getlang("LANG_ADMIN_DEFAULT_DASHBOARD_GROUP", false)."</b> ".$_SESSION["group"]."<br />";
	echo "<b>".getlang("LANG_ADMIN_DEFAULT_DASHBOARD_SITENAME", false)."</b> ".$system->readsetting("sitename")."<br />";
	echo "<b>".getlang("LANG_ADMIN_DEFAULT_DASHBOARD_LAST_REFRESH", false)."</b> ".date("Y-m-d H:i:s")."<br />";
	echo "<b>".getlang("LANG_ADMIN_DEFAULT_DASHBOARD_IP_ADDRESS", false)."</b> ".$_SERVER["REMOTE_ADDR"];
?>