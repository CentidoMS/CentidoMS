<?php
	/**
	 * Extension installer
	 *
	 * @package CentidoMS
	 */
	
	if($user->checkperm("addextensions")){
		title(getlang("LANG_ADMIN_DEFAULT_EXTENSIONS_EXTENSION_INSTALLER_MESSAGE_HEADING", false), true);
		
		if(isset($_GET["message"])){
			switch($_GET["message"]){
				case 0:
					echo "<div class=\"alert alert-success\">";
					getlang("LANG_ADMIN_DEFAULT_EXTENSIONS_EXTENSION_INSTALLER_MESSAGE_INSTALLATION_SUCCESSFULL");
					echo "</div>";
					break;
					
				case 1:
					echo "<div class=\"alert alert-error\">";
					getlang("LANG_ADMIN_DEFAULT_EXTENSIONS_EXTENSION_INSTALLER_MESSAGE_UPLOAD_FAILED");
					echo "</div>";
					break;
					
				case 2:
					echo "<div class=\"alert alert-error\">";
					getlang("LANG_ADMIN_DEFAULT_EXTENSIONS_EXTENSION_INSTALLER_MESSAGE_NOT_ZIP");
					echo "</div>";
					break;
					
				case 3:
					echo "<div class=\"alert alert-error\">";
					getlang("LANG_ADMIN_DEFAULT_EXTENSIONS_EXTENSION_INSTALLER_MESSAGE_FILE_SIZE_TOO_LARGE");
					echo "</div>";
					break;
					
				case 4:
					echo "<div class=\"alert alert-error\">";
					getlang("LANG_ADMIN_DEFAULT_EXTENSIONS_EXTENSION_INSTALLER_MESSAGE_NO_EXTENSIONINFO");
					echo "</div>";
					break;
					
				case 5:
					echo "<div class=\"alert alert-error\">";
					getlang("LANG_ADMIN_DEFAULT_EXTENSIONS_EXTENSION_INSTALLER_MESSAGE_EXTENSION_EXIST");
					echo "</div>";
					break;
			}
		}
		
		
?>
<div class="post-header">
	<h1><?php getlang("LANG_ADMIN_DEFAULT_EXTENSIONS_EXTENSION_INSTALLER_MESSAGE_HEADING"); ?></h1>
</div>
<hr>
<p>
<?php getlang("LANG_ADMIN_DEFAULT_EXTENSIONS_EXTENSION_INSTALLER_MESSAGE_DESCRIPTION"); ?>
</p>
<form class="form-inline" action="<?php echo $sys['general']['urlroot']; ?>admin/extension/installer2.php" method="post" enctype="multipart/form-data">
	<input class="input" type="file" accept="application/zip" name="file" />
	<button class="btn" type="submit"><?php getlang("LANG_ADMIN_DEFAULT_GENERAL_UPLOAD"); ?></button>
</form>

<?php
	}else{
		error(2);
	}
?>