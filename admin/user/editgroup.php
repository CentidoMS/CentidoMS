<?php
	/**
	 * Form for edit a group
	 *
	 * @package CentidoMS
	 */
	
	if($user->checkperm("editgroup")){
		if($_GET["id"] == 1){
			error(4);
			exit();
		}
		title(getlang("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_EDIT_GROUP_HEADING", false), true);
		$result = $user->getgroupbyid($_GET["id"]);
?>

<div class="page-header">
	<h1><?php getlang("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_EDIT_GROUP_HEADING"); ?></h1>
</div>
<form action="<?php echo $sys["general"]["urlroot"]; ?>admin/user/editgroup2.php?id=<?php echo $_GET["id"]; ?>" method="post">
	<fieldset>
		<label><?php getlang("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_EDIT_GROUP_SHORTCUT"); ?></label>
		<span class="input-xlarge uneditable-input"><?php echo $result["shortcut"]; ?></span>
		<label><?php getlang("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_EDIT_GROUP_GROUP_NAME"); ?></label>
		<span class="input-xlarge uneditable-input"><?php echo $result["group"]; ?></span>
		<fieldset>
			<?php getlang("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_EDIT_GROUP_PERMISSIONS"); ?></br>
			<?php
				$output2 = $db->query("SELECT * FROM ".$sys["mysql"]["prefix"]."permissions");
				$result2 = $db->processing($output2, "multi");
				$count = 0;
				while(isset($result2[$count])){
					$data = $result2[$count];
					echo "<label class=\"checkbox checkboxf\">";
					if($sys["groups"][$result["shortcut"]][$data["name"]] == 1){
						echo "<input type=\"checkbox\" name=\"permissions[]\" value=\"".$data["name"]."\" checked=\"checked\" /> ";
					}else{
						echo "<input type=\"checkbox\" name=\"permissions[]\" value=\"".$data["name"]."\" /> ";
					}
					echo getlang($data["displayname"])."</label>";
					$count++;
				}
			?>
		</fieldset>
		<div class="form-actions">
			<a class="btn" href="<?php echo $sys['general']['urlroot']."admin/index.php?page=user/groups"; ?>"><?php getlang("LANG_ADMIN_DEFAULT_GENERAL_CANCEL"); ?></a>
			<input class="btn btn-primary right" type="submit" value="<?php getlang("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_EDIT_GROUP_SUBMIT"); ?>">
		</div>
	</fieldset>
</form>
<?php
	}else{
		error(2);
	}
?>