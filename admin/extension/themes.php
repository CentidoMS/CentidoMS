<?php
	/**
	 * All themes
	 *
	 * @package CentidoMS
	 */
	
	if($user->checkperm("editextensions")){
		title(getlang("LANG_ADMIN_DEFAULT_EXTENSIONS_ALL_THEMES_HEADING", false), true);
		
		if(isset($_GET["message"])){
			switch($_GET["message"]){
				case 0:
					echo "<div class=\"alert alert-success\">";
					getlang("LANG_ADMIN_DEFAULT_EXTENSIONS_ALL_THEMES_MESSAGE_DELETE_SUCCESSFULL");
					echo "</div>";
					break;
					
				case 1:
					echo "<div class=\"alert alert-success\">";
					getlang("LANG_ADMIN_DEFAULT_EXTENSIONS_ALL_THEMES_MESSAGE_SET_DEFAULT_SUCCESSFULL");
					echo "</div>";
					break;
					
				case 2:
					echo "<div class=\"alert alert-error\">";
					getlang("LANG_ADMIN_DEFAULT_EXTENSIONS_ALL_THEMES_MESSAGE_DELETE_SET_OTHER_DEFAULT_THEME");
					echo "</div>";
					break;
			}
		}
		
		$output = $db->query("SELECT * FROM ".$sys["mysql"]["prefix"]."themes");
		$result = $db->processing($output, "multi");
?>
<div class="post-header">
	<h1><?php getlang("LANG_ADMIN_DEFAULT_EXTENSIONS_ALL_THEMES_HEADING"); ?></h1>
</div>
<hr>
<form method="post" action="<?php echo $sys["general"]["urlroot"]; ?>admin/extension/themes2.php">
<table class="table table-striped table-bordered">
<tr>
	<td><b>#</b></td>
	<td><b><?php getlang("LANG_ADMIN_DEFAULT_EXTENSIONS_ALL_THEMES_NAME"); ?></b></td>
	<td><b><?php getlang("LANG_ADMIN_DEFAULT_EXTENSIONS_ALL_THEMES_VERSION"); ?></b></td>
	<td><b><?php getlang("LANG_ADMIN_DEFAULT_EXTENSIONS_ALL_THEMES_AUTHOR"); ?></b></td>
	<td><b><?php getlang("LANG_ADMIN_DEFAULT_EXTENSIONS_ALL_THEMES_DESCRIPTION"); ?></b></td>
</tr>
<?php
	$count2 = 0;
	while(isset($result[$count2])){
		$data = $result[$count2];
		echo "<tr>";
		echo "<td><input name=\"id\" type=\"radio\" value=\"".$data["id"]."\"></td>";
		if($data["default"] == 1){
			$name = $data["name"]."<span class=\"muted\"> --".getlang("LANG_ADMIN_DEFAULT_EXTENSIONS_ALL_THEMES_MAIN_THEME", false)."</span>";
		}else{
			$name = $data["name"];
		}
		echo "<td>".$name."</td>";
		echo "<td>".$data["version"]."</td>";
		echo "<td>".$data["author"]."</td>";
		echo "<td>".$data["description"]."</td>";
		echo "</tr>";
		
		$count2++;
	}
?>
</table>
<div class="form-actions">
	<?php
		if($user->checkperm("delextensions")){
	?>
	<button name="btn" value="0" type="submit" class="btn btn-danger"><?php getlang("LANG_ADMIN_DEFAULT_GENERAL_UNINSTALL"); ?></button>
	<?php
		}
	?>
	<button name="btn" value="1" type="submit" class="btn right"><?php getlang("LANG_ADMIN_DEFAULT_GENERAL_EDIT"); ?></button>
	<button name="btn" value="2" type="submit" class="btn btn-info right mright10"><?php getlang("LANG_ADMIN_DEFAULT_GENERAL_DEFAULT"); ?></button>
</div>
</form>
<?php
	}else{
		error(2);
	}
?>