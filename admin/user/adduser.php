<?php
	/**
	 * Add a user for the backend 
	 *
	 * @package CentidoMS
	 */
	
	if($user->checkperm("adduser")){
		title(getlang("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_ADD_USER_HEADING", false), true);
?>
<div class="page-header">
	<h1><?php getlang("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_ADD_USER_HEADING"); ?></h1>
</div>
<?php
	if(isset($_GET["message"])){
		switch($_GET["message"]){
			case 0:
				echo "<div class=\"alert alert-success\">";
				getlang("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_ADD_USER_MESSAGE_SUCCESSFULL");
				echo "</div>";
				break;
			
			case 1:
				echo "<div class=\"alert alert-error\">";
				getlang("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_ADD_USER_MESSAGE_FILL_OUT");
				echo "</div>";
				break;
		
			case 2:
				echo "<div class=\"alert alert-error\">";
				getlang("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_ADD_USER_MESSAGE_PASSWORD");
				echo "</div>";
				break;
				
			case 3:
				echo "<div class=\"alert alert-error\">";
				getlang("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_ADD_USER_MESSAGE_USER_EXIST");
				echo "</div>";
				break;
		}
	}
?>
<form action="<?php echo $sys["general"]["urlroot"]; ?>admin/user/adduser2.php" method="post">
	<fieldset>
		<label><?php getlang("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_GENERAL_USER_FIRST_NAME"); ?></label>
		<input name="firstname" type="text" />
		<label><?php getlang("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_GENERAL_USER_LAST_NAME"); ?></label>
		<input name="lastname" type="text" />
		<label><?php getlang("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_GENERAL_USER_USERNAME"); ?></label>
		<input name="username" type="text" />
		<label><?php getlang("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_GENERAL_USER_PASSWORD"); ?></label>
		<input name="password" type="password" />
		<label><?php getlang("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_GENERAL_USER_PASSWORD_REPEAT"); ?></label>
		<input name="password2" type="password" />
		<label><?php getlang("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_GENERAL_USER_GROUP"); ?></label>
		<select name="group">
			<?php
				$output = $db->query("SELECT * FROM ".$sys["mysql"]["prefix"]."groups");
				$result = $db->processing($output, "multi");
				$count = 0;
				while(isset($result[$count])){
					$data = $result[$count];
					echo "<option value=\"".$data["shortcut"]."\">".$data["group"]."</option>";
					$count++;
				}
			?>
		</select>
		<label><?php getlang("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_GENERAL_USER_LANG"); ?></label>
		<select name="lang">
		<?php
			$output2 = $db->query("SELECT * FROM ".$sys["mysql"]["prefix"]."lang");
			$result2 = $db->processing($output2, "multi");
			$count2 = 0;
			while(isset($result2[$count2])){
				$data2 = $result2[$count2];
				echo "<option value=\"".$data2["code"]."\">".$data2["name"]."</option>";
				$count2++;
			}
		?>
		</select>
		<label><?php getlang("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_GENERAL_USER_MAIL"); ?></label>
		<input name="mail" type="text" />
		<label><?php getlang("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_GENERAL_USER_WEBSITE"); ?></label>
		<input name="url" type="text" />
		<label><?php getlang("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_GENERAL_USER_BIO"); ?></label>
		<textarea name="bio"></textarea>
		<div class="form-actions">
			<button type="reset" class="btn"><?php getlang("LANG_ADMIN_DEFAULT_GENERAL_RESET"); ?></button>
			<input class="btn btn-primary right" type="submit" value="<?php getlang("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_ADD_USER_SUBMIT"); ?>">
		</div>
	</fieldset>
</form>
<?php
	}else{
		error(2);
	}
?>