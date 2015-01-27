<?php
	/**
	 * Edit settings
	 *
	 * @package CentidoMS
	 */
	if($user->checkperm("editsettings")){
		if(isset($_GET["message"])){
			switch($_GET["message"]){
				case 0:
					echo "<div class=\"alert alert-success\">";
					getlang("LANG_ADMIN_DEFAULT_SYSTEM_SETTINGS_MESSAGE_UPDATE_SUCCESSFULL");
					echo "</div>";
					break;
					
				case 1:
					echo "<div class=\"alert alert-error\">";
					getlang("LANG_ADMIN_DEFAULT_SYSTEM_SETTINGS_MESSAGE_EMPTY_SITENAME");
					echo "</div>";
					break;
			}
		}
?>
<div class="page-header">
	<h1><?php getlang("LANG_ADMIN_DEFAULT_SYSTEM_SETTINGS_EDIT_SETTINGS"); ?></h1>
</div>

<form method="post" action="<?php echo $sys["general"]["urlroot"]; ?>admin/system/editsettings2.php">
	<div class="row">
		<div class="span8">
				<h3><b><?php getlang("LANG_ADMIN_DEFAULT_SYSTEM_SETTINGS_SETTINGS"); ?></b></h3>
				<hr>

				<?php
					$sitename = $system->readsetting("sitename");
					if($sitename == "none"){
						$sitename = "";
					}
				?>
				<label><?php getlang("LANG_ADMIN_DEFAULT_SYSTEM_SETTINGS_SITENAME"); ?></label>
				<input name="sitename" type="text" placeholder="<?php getlang("LANG_ADMIN_DEFAULT_SYSTEM_SETTINGS_SITENAME"); ?>" value="<?php echo $sitename; ?>" />
				<?php
					$siteslogan = $system->readsetting("siteslogan");
					if($siteslogan == "none"){
						$siteslogan = "";
					}
				?>
				<label><?php getlang("LANG_ADMIN_DEFAULT_SYSTEM_SETTINGS_SITE_SLOGAN"); ?></label>
				<input name="siteslogan" type="text" placeholder="<?php getlang("LANG_ADMIN_DEFAULT_SYSTEM_SETTINGS_SITE_SLOGAN"); ?>" value="<?php echo $siteslogan; ?>" />
				<?php
					$sitedescription = $system->readsetting("sitedescription");
					if($sitedescription == "none"){
						$sitedescription = "";
					}
				?>
				<label><?php getlang("LANG_ADMIN_DEFAULT_SYSTEM_SETTINGS_SITE_DESCRIPTION"); ?></label>
				<textarea name="sitedescription" placeholder="<?php getlang("LANG_ADMIN_DEFAULT_SYSTEM_SETTINGS_SITE_DESCRIPTION"); ?>"><?php echo $sitedescription ; ?></textarea>
				<label><?php getlang("LANG_ADMIN_DEFAULT_SYSTEM_SETTINGS_HOMEPAGE"); ?></label>
				<select name="homepage">
					<?php
						$count = $db->count("SELECT COUNT(*) FROM ".$sys["mysql"]["prefix"]."posts WHERE `page` = 1 AND `status` = 1");
						if($count != 0){
							$output = $db->query("SELECT * FROM ".$sys["mysql"]["prefix"]."posts WHERE `page` = 1 AND `status` = 1");
							$result = $db->processing($output, "multi");
						}else{
							$result = false;
						}
						
						$output2 = $db->query("SELECT * FROM ".$sys["mysql"]["prefix"]."settings WHERE `property` = 'homepage'");
						$result2 = $db->processing($output2, "single");
						
						if($result2["value"] == "none"){
							echo "<option value=\"none\" selected=\"selected\">".getlang("LANG_ADMIN_DEFAULT_SYSTEM_SETTINGS_DEFAULT_HOMEPAGE", false)."</option>";
						}else{
							echo "<option value=\"none\">".getlang("LANG_ADMIN_DEFAULT_SYSTEM_SETTINGS_DEFAULT_HOMEPAGE", false)."</option>";
						}
						
						$count2 = 0;
						if($result != false){
							while(isset($result[$count2])){
								$data = $result[$count2];
								if($result2["value"] == $result[$count2]["permlink"]){
									echo "<option value=\"".$data["permlink"]."\" selected=\"selected\">".$data["title"]."</option>";
								}else{
									echo "<option value=\"".$data["permlink"]."\">".$data["title"]."</option>";
								}
								
								$count2++;
							}
						}
					?>
				</select>
		</div>
		<div class="span4">
				<h3><b><?php getlang("LANG_ADMIN_DEFAULT_SYSTEM_SETTINGS_INFORMATIONS"); ?></b></h3>
				<hr>
				<h4><b><?php getlang("LANG_ADMIN_DEFAULT_SYSTEM_SETTINGS_GENERAL_INFORMATIONS"); ?></b></h4>
				<ul class="unstyled">
					<li><b><?php getlang("LANG_ADMIN_DEFAULT_SYSTEM_SETTINGS_ROOT_ABSOLUTE_PFATH"); ?></b><br /><?php echo $sys["general"]["abspfathroot"]; ?></li>
					<li><b><?php getlang("LANG_ADMIN_DEFAULT_SYSTEM_SETTINGS_ROOT_URL"); ?></b><br /><?php echo $sys["general"]["urlroot"];; ?></li>
				</ul>
				<br />
				
				<h4><b><?php getlang("LANG_ADMIN_DEFAULT_SYSTEM_SETTINGS_DATABASE_INFORMATIONS"); ?></b></h4>
				<ul class="unstyled">
					<li><b><?php getlang("LANG_ADMIN_DEFAULT_SYSTEM_SETTINGS_DATABASE_SERVER"); ?></b><br /><?php echo $sys["mysql"]["host"]; ?></li>
					<li><b><?php getlang("LANG_ADMIN_DEFAULT_SYSTEM_SETTINGS_DATABASE"); ?></b><br /><?php echo $sys["mysql"]["db"]; ?></li>
					<li><b><?php getlang("LANG_ADMIN_DEFAULT_SYSTEM_SETTINGS_DATABASE_USER"); ?></b><br /><?php echo $sys["mysql"]["user"]; ?></li>
					<li><b><?php getlang("LANG_ADMIN_DEFAULT_SYSTEM_SETTINGS_DATABASE_PREFIX"); ?></b><br /><?php echo $sys["mysql"]["prefix"]; ?></li>
				</ul>
				<br />
				
				<p>
					<h4><b><?php getlang("LANG_ADMIN_DEFAULT_SYSTEM_SETTINGS_NOTE"); ?></b></h4>
					<?php getlang("LANG_ADMIN_DEFAULT_SYSTEM_SETTINGS_NOTE_TEXT"); ?>
				</p>
		</div>
	</div>
	<div class="form-actions">
		<input class="btn btn-primary right" type="submit" value="<?php getlang("LANG_ADMIN_DEFAULT_GENERAL_UPDATE"); ?>">
	</div>
</form>
<?php
	}else{
		error(2);
	}
?>