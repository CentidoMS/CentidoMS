<?php
	// System load
	include("../../sysload.php");
	
	/**
	 * Edit settings
	 *
	 * @package CentidoMS
	 */
	
	if($user->checkperm("editsettings")){
		if($_POST["sitename"] != ""){
			$system->writesetting("sitename", $_POST["sitename"]);
		}else{
			redirect("admin/index.php?page=system/editsettings&message=1");
			exit();
		}
	
		if($_POST["siteslogan"] != ""){
			$system->writesetting("siteslogan", $_POST["siteslogan"]);
		}else{
			$system->writesetting("siteslogan", "none");
		}
	
		if($_POST["sitedescription"] != ""){
			$system->writesetting("sitedescription", $_POST["sitedescription"]);
		}else{
			$system->writesetting("sitedescription", "none");
		}
	
		$system->writesetting("homepage", $_POST["homepage"]);
	
		redirect("admin/index.php?page=system/editsettings&message=0");
	}else{
		error(2, true);
	}
?>