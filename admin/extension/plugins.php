<?php
	/**
	 * All themes
	 *
	 * @package CentidoMS
	 */
	
	if($user->checkperm("editextensions")){
		title(getlang("LANG_ADMIN_DEFAULT_EXTENSIONS_ALL_PLUGINS_HEADING", false), true);
		
		if(isset($_GET["message"])){
			switch($_GET["message"]){
				case 0:
					echo "<div class=\"alert alert-success\">";
					getlang("LANG_ADMIN_DEFAULT_EXTENSIONS_ALL_PLUGINS_MESSAGE_DELETE_SUCCESSFULL");
					echo "</div>";
					break;
			}
		}
		
		$count = $db->count("SELECT COUNT(*) FROM ".$sys["mysql"]["prefix"]."plugins");
		if($count != 0){
			$output = $db->query("SELECT * FROM ".$sys["mysql"]["prefix"]."plugins");
			$result = $db->processing($output, "multi");
		}else{
			$result = false;
		}
?>
<div class="post-header">
	<h1><?php getlang("LANG_ADMIN_DEFAULT_EXTENSIONS_ALL_PLUGINS_HEADING"); ?></h1>
</div>
<hr>
<form method="post" action="<?php echo $sys["general"]["urlroot"]; ?>admin/extension/plugins2.php">
<table class="table table-striped table-bordered">
<tr>
	<td><b>#</b></td>
	<td><b><?php getlang("LANG_ADMIN_DEFAULT_EXTENSIONS_ALL_PLUGINS_NAME"); ?></b></td>
	<td><b><?php getlang("LANG_ADMIN_DEFAULT_EXTENSIONS_ALL_PLUGINS_VERSION"); ?></b></td>
	<td><b><?php getlang("LANG_ADMIN_DEFAULT_EXTENSIONS_ALL_PLUGINS_AUTHOR"); ?></b></td>
	<td><b><?php getlang("LANG_ADMIN_DEFAULT_EXTENSIONS_ALL_PLUGINS_DESCRIPTION"); ?></b></td>
</tr>
<?php
	if($result == true){
		$count2 = 0;
		while(isset($result[$count2])){
			$data = $result[$count2];
			echo "<tr>";
			echo "<td><input name=\"id\" type=\"radio\" value=\"".$data["id"]."\"></td>";
			echo "<td>".$data["name"]."</td>";
			echo "<td>".$data["version"]."</td>";
			echo "<td>".$data["author"]."</td>";
			echo "<td>".$data["description"]."</td>";
			echo "</tr>";
			
			$count2++;
		}
	}else{
		echo "<tr>";
		echo "<td><input name=\"id\" type=\"radio\" disabled=\"disabled\"></td>";
		echo "<td>".getlang("LANG_ADMIN_DEFAULT_EXTENSIONS_ALL_PLUGINS_NO_PLUGINS", false)."</td>";
		echo "<td>-</td>";
		echo "<td>-</td>";
		echo "<td>-</td>";
		echo "</tr>";
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
</div>
</form>
<?php
	}else{
		error(2);
	}
?>