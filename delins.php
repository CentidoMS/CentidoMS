<?php
	// System load
	include("sysload.php");
	
	/**
	 * Delete Installation
	 *
	 * @package CentidoMS
	 */
	
	unlink("index.php");
	rename("_index.php", "index.php");
	del("installation");
	unlink("delins.php");
	
	redirect("index.php");
?>