<?php
	/**
	 * All themes
	 *
	 * @package CentidoMS
	 */
	
	if($user->checkperm("editextensions")){
		title(getlang("LANG_ADMIN_DEFAULT_EXTENSIONS_EDIT_THEME_HEADING", false), true);
		
		$stmt = $db->connection->prepare("SELECT `name`, `version`, `author`, `date`, `license`, `positions`, `menus`, `description`, `editurl` FROM ".$sys["mysql"]["prefix"]."themes WHERE `id` = ?");
		$stmt->bind_param('i', $_GET["id"]);
		$stmt->execute();
		$stmt->bind_result($name, $version, $author, $date, $license, $positions, $menus, $description, $editurl);
		$stmt->fetch();
		$stmt->close();
		
		$position = explode(",", $positions);
		$positions = implode(", ", $position);
		
		$menu = explode(",", $menus);
		$menus = implode(", ", $menu);
	?>
<div class="post-header">
<h1><?php getlang("LANG_ADMIN_DEFAULT_EXTENSIONS_EDIT_THEME_HEADING"); ?></h1>
</div>
<hr>
<div class="row">
	<div class="span5">
		<h2><?php getlang("LANG_ADMIN_DEFAULT_EXTENSIONS_EDIT_THEME_DESCRIPTION"); ?></h2>
		<ul class="unstyled">
			<li><b><?php getlang("LANG_ADMIN_DEFAULT_EXTENSIONS_EDIT_THEME_NAME"); ?>:</b> <?php echo $name; ?></li>
			<li><b><?php getlang("LANG_ADMIN_DEFAULT_EXTENSIONS_EDIT_THEME_VERSION"); ?>:</b> <?php echo $version; ?></li>
			<li><b><?php getlang("LANG_ADMIN_DEFAULT_EXTENSIONS_EDIT_THEME_AUTHOR"); ?>:</b> <?php echo $author; ?></li>
			<li><b><?php getlang("LANG_ADMIN_DEFAULT_EXTENSIONS_EDIT_THEME_DATE"); ?>:</b> <?php echo $date; ?></li>
			<li><b><?php getlang("LANG_ADMIN_DEFAULT_EXTENSIONS_EDIT_THEME_LICENSE"); ?>:</b> <?php echo $license; ?></li>
			<li><b><?php getlang("LANG_ADMIN_DEFAULT_EXTENSIONS_EDIT_THEME_POSITIONS"); ?>:</b> <?php echo $positions; ?></li>
			<li><b><?php getlang("LANG_ADMIN_DEFAULT_EXTENSIONS_EDIT_THEME_MENUS"); ?>:</b> <?php echo $menus; ?></li>
			<li><b><?php getlang("LANG_ADMIN_DEFAULT_EXTENSIONS_EDIT_THEME_DESCRIPTION"); ?>:</b> <?php echo $description; ?></li>
		</ul>
	</div>
	<div class="span7">
	<h2><?php getlang("LANG_ADMIN_DEFAULT_EXTENSIONS_EDIT_THEME_PREVIEW"); ?></h2>
	<p class="muted"><?php getlang("LANG_ADMIN_DEFAULT_EXTENSIONS_EDIT_NO_PLAN"); ?></p>
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