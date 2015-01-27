<?php
	/**
	 * Script for editing users
	 *
	 * @package CentidoMS
	 */
	
	if($user->checkperm("edituser")){
		title(getlang("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_EDIT_USER_HEADING", false), true);
		$result = $user->getuserbyid($_GET["id"]);
?>
<div class="page-header">
	<h1><?php getlang("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_EDIT_USER_HEADING"); ?></h1>
</div>
<form action="<?php echo $sys["general"]["urlroot"]; ?>admin/user/edituser2.php?id=<?php echo $_GET["id"]; ?>" method="post">
	<fieldset>
		<label><?php getlang("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_GENERAL_USER_FIRST_NAME"); ?></label>
		<input name="firstname" type="text" value="<?php echo $result["first_name"]; ?>" />
		<label><?php getlang("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_GENERAL_USER_LAST_NAME"); ?></label>
		<input name="lastname" type="text" value="<?php echo $result["last_name"]; ?>" />
		<label><?php getlang("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_GENERAL_USER_USERNAME"); ?></label>
		<input name="username" type="text" value="<?php echo $result["username"]; ?>" />
		<label><?php getlang("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_GENERAL_USER_PASSWORD"); ?></label>
		<input name="password" type="password" />
		<label><?php getlang("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_GENERAL_USER_PASSWORD_REPEAT"); ?></label>
		<input name="password2" type="password" />
		<label><?php getlang("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_GENERAL_USER_GROUP"); ?></label>
		<select name="group">
		<?php
			$output2 = $db->query("SELECT * FROM ".$sys["mysql"]["prefix"]."groups");
			$result2 = $db->processing($output2, "multi");
			$count = 0;
			while(isset($result2[$count])){
				$data = $result2[$count];
				if($result["group"] == $data["shortcut"]){
					echo "<option value=\"".$data["shortcut"]."\" selected=\"selected\">".$data["group"]."</option>";
				}else{
					echo "<option value=\"".$data["shortcut"]."\">".$data["group"]."</option>";
				}
				$count++;
			}
		?>
		</select>
		<label><?php getlang("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_GENERAL_USER_LANG"); ?></label>
		<select name="lang">
		<?php
			$output3 = $db->query("SELECT * FROM ".$sys["mysql"]["prefix"]."lang");
			$result3 = $db->processing($output3, "multi");
			$count2 = 0;
			while(isset($result3[$count2])){
				$data2 = $result3[$count2];
				if($result["lang"] == $data2["code"]){
					echo "<option value=\"".$data2["code"]."\" selected=\"selected\">".$data2["name"]."</option>";
				}else{
					echo "<option value=\"".$data2["code"]."\">".$data2["name"]."</option>";
				}
				$count2++;
			}
		?>
		</select>
		<label><?php getlang("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_GENERAL_USER_MAIL"); ?></label>
		<input name="mail" type="text" value="<?php echo $result["mail"]; ?>" />
		<label><?php getlang("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_GENERAL_USER_WEBSITE"); ?></label>
		<input name="url" type="text" value="<?php echo $result["url"]; ?>" />
		<label><?php getlang("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_GENERAL_USER_BIO"); ?></label>
		<textarea name="bio"><?php echo $result["bio"]; ?></textarea>
		<div class="form-actions">
			<a class="btn" href="<?php echo $sys['general']['urlroot']."admin/index.php?page=user/users"; ?>"><?php getlang("LANG_ADMIN_DEFAULT_GENERAL_CANCEL"); ?></a>
			<input class="btn btn-primary right" type="submit" value="<?php getlang("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_EDIT_USER_SUBMIT"); ?>">
		</div>
	</fieldset>
</form>
<?php
	}else{
		error(2);
	}
?>