<?php
	/**
	 * Form for make a new Group
	 *
	 * @package CentidoMS
	 */
	
	if($user->checkperm("addgroup")){
		title(getlang("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_ADD_GROUP_HEADING", false), true);
		if(isset($_GET["message"])){
			switch($_GET["message"]){
				case 0:
					echo "<div class=\"alert alert-success\">";
					getlang("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_ADD_GROUP_MESSAGE_SUCCESSFULL");
					echo "</div>";
					break;
					
				case 1:
					echo "<div class=\"alert alert-error\">";
					getlang("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_ADD_GROUP_MESSAGE_FILL_OUT");
					echo "</div>";
					break;
				
				case 2:
					echo "<div class=\"alert alert-error\">";
					getlang("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_ADD_GROUP_MESSAGE_GROUP_EXIST");
					echo "</div>";
					break;
			}
		}
?>
<div class="page-header">
	<h1><?php getlang("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_ADD_GROUP_HEADING"); ?></h1>
</div>
<form action="<?php echo $sys["general"]["urlroot"]; ?>admin/user/addgroup2.php" method="post">
	<label><?php getlang("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_ADD_GROUP_SHORTCUT"); ?></label>
	<input name="shortcut" type="text" />
	<label><?php getlang("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_ADD_GROUP_GROUP_NAME"); ?></label>
	<input name="group" type="text" />
	<fieldset>
		<?php getlang("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_ADD_GROUP_PERMISSIONS"); ?></br>
		<?php
			$output = $db->query("SELECT * FROM ".$sys["mysql"]["prefix"]."permissions");
			$result = $db->processing($output, "multi");
			$count = 0;
			while(isset($result[$count])){
				$data = $result[$count];
				echo "<label class=\"checkbox checkboxf\">";
				echo "<input type=\"checkbox\" name=\"permissions[]\" value=\"".$data["name"]."\"> ";
				echo getlang($data["displayname"])."</label>";
				$count++;
			}
		?>
	</fieldset>
	<div class="form-actions">
		<input class="btn" type="reset" value="<?php getlang("LANG_ADMIN_DEFAULT_GENERAL_RESET"); ?>">
		<input class="btn btn-primary right" type="submit" value="<?php getlang("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_ADD_GROUP_SUBMIT"); ?>">
	</div>
</form>
<?php
	}else{
		error(2);
	}
?>