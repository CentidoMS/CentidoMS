<?php
	/**
	 * All themes
	 *
	 * @package CentidoMS
	 */
	if($user->checkperm("editextensions")){
		title(getlang("LANG_ADMIN_DEFAULT_EXTENSIONS_EDIT_PLUGIN_HEADING", false), true);
		
		if(isset($_GET["message"])){
			switch($_GET["message"]){
				case 0:
					echo "<div class=\"alert alert-success\">";
					getlang("LANG_ADMIN_DEFAULT_EXTENSIONS_EDIT_PLUGIN_MESSAGE_UPDATE_SUCCESSFULL");
					echo "</div>";
					break;
			}
		}
		
		$stmt = $db->connection->prepare("SELECT `name`, `version`, `author`, `date`, `license`, `description`, `editurl` FROM ".$sys["mysql"]["prefix"]."plugins WHERE `id` = ?");
		$stmt->bind_param('i', $_GET["id"]);
		$stmt->execute();
		$stmt->bind_result($name, $version, $author, $date, $license, $description, $editurl);
		$stmt->fetch();
		$stmt->close();
?>
<div class="post-header">
	<h1><?php getlang("LANG_ADMIN_DEFAULT_EXTENSIONS_EDIT_PLUGIN_HEADING"); ?></h1>
</div>
<hr>
<div class="row">
	<div class="span5">
		<h2><?php getlang("LANG_ADMIN_DEFAULT_EXTENSIONS_EDIT_PLUGIN_DESCRIPTION"); ?></h2>
		<ul class="unstyled">
			<li><b><?php getlang("LANG_ADMIN_DEFAULT_EXTENSIONS_EDIT_PLUGIN_NAME"); ?>:</b> <?php echo $name; ?></li>
			<li><b><?php getlang("LANG_ADMIN_DEFAULT_EXTENSIONS_EDIT_PLUGIN_VERSION"); ?>:</b> <?php echo $version; ?></li>
			<li><b><?php getlang("LANG_ADMIN_DEFAULT_EXTENSIONS_EDIT_PLUGIN_AUTHOR"); ?>:</b> <?php echo $author; ?></li>
			<li><b><?php getlang("LANG_ADMIN_DEFAULT_EXTENSIONS_EDIT_PLUGIN_DATE"); ?>:</b> <?php echo $date; ?></li>
			<li><b><?php getlang("LANG_ADMIN_DEFAULT_EXTENSIONS_EDIT_PLUGIN_LICENSE"); ?>:</b> <?php echo $license; ?></li>
			<li><b><?php getlang("LANG_ADMIN_DEFAULT_EXTENSIONS_EDIT_PLUGIN_DESCRIPTION"); ?>:</b> <?php echo $description; ?></li>
		</ul>
	</div>
	<div class="span7">
		<h2><?php getlang("LANG_ADMIN_DEFAULT_EXTENSIONS_EDIT_PLUGIN_POSITIONS"); ?></h2>
		<form method="post" action="<?php echo $sys["general"]["urlroot"]; ?>admin/extension/editplugin2.php?id=<?php echo $_GET["id"]; ?>">
<?php
	$stmt = $db->connection->prepare("SELECT `positions` FROM ".$sys["mysql"]["prefix"]."themes WHERE `default` = 1");
	$stmt->execute();
	$stmt->bind_result($positions);
	$stmt->fetch();
	$stmt->close();
	
	$position = explode(",", $positions);
	
	$count = 0;
	while(isset($position[$count])){
		$stmt = $db->connection->prepare("SELECT COUNT(*) FROM ".$sys["mysql"]["prefix"]."load WHERE `plugin` = ? AND `position` = ?");
		$stmt->bind_param('is', $_GET["id"], $position[$count]);
		$stmt->execute();
		$stmt->bind_result($count2);
		$stmt->fetch();
		$stmt->close();
		
		if($count2 != 0){
			echo "<label class=\"checkbox checkboxf\"><input type=\"checkbox\" name=\"positions[]\" value=\"".$position[$count]."\" checked=\"checked\"> ".$position[$count]."</label>";
		}else{
			echo "<label class=\"checkbox checkboxf\"><input type=\"checkbox\" name=\"positions[]\" value=\"".$position[$count]."\"> ".$position[$count]."</label>";
		}
		
		
		$count++;
	}
?>
			<div class="clearfix"></div>
			<div class="form-actions">
				<button name="btn" value="1" type="submit" class="btn right"><?php getlang("LANG_ADMIN_DEFAULT_GENERAL_UPDATE"); ?></button>
			</div>
		</form>
	</div>
</div>

<?php
		if($editurl != "none"){
			echo "<hr>";
			include("../extensions/plugin_".$name."/".$editurl);
		}
	}else{
		error(2);
	}
?>