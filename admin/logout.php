<?php
	// System load
	include("../sysload.php");
	session_destroy();
	
	/**
	 * Logout Script 
	 *
	 * @package CentidoMS
	 */
	
	redirect("admin/login.php?message=0");
?>