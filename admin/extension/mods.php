<?php
	/**
	 * All themes
	 *
	 * @package CentidoMS
	 */
	
	if($user->checkperm("editextensions")){
		title(getlang("LANG_ADMIN_DEFAULT_EXTENSIONS_ALL_MODS_HEADING", false), true);
		
		if(isset($_GET["message"])){
			switch($_GET["message"]){
				case 0:
					echo "<div class=\"alert alert-success\">";
					getlang("LANG_ADMIN_DEFAULT_EXTENSIONS_ALL_MODS_MESSAGE_DELETE_SUCCESSFULL");
					echo "</div>";
					break;
			}
		}
		
		$count = $db->count("SELECT COUNT(*) FROM ".$sys["mysql"]["prefix"]."mods");
		if($count != 0){
			$output = $db->query("SELECT * FROM ".$sys["mysql"]["prefix"]."mods");
			$result = $db->processing($output, "multi");
		}else{
			$result = false;
		}
?>
<div class="post-header">
	<h1><?php getlang("LANG_ADMIN_DEFAULT_EXTENSIONS_ALL_MODS_HEADING"); ?></h1>
</div>
<hr>
<form method="post" action="<?php echo $sys["general"]["urlroot"]; ?>admin/extension/mods2.php">
<table class="table table-striped table-bordered">
<tr>
	<td><b>#</b></td>
	<td><b><?php getlang("LANG_ADMIN_DEFAULT_EXTENSIONS_ALL_MODS_NAME"); ?></b></td>
	<td><b><?php getlang("LANG_ADMIN_DEFAULT_EXTENSIONS_ALL_MODS_VERSION"); ?></b></td>
	<td><b><?php getlang("LANG_ADMIN_DEFAULT_EXTENSIONS_ALL_MODS_AUTHOR"); ?></b></td>
	<td><b><?php getlang("LANG_ADMIN_DEFAULT_EXTENSIONS_ALL_MODS_EDIT"); ?></b></td>
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
			if($data["editurl"] == "none"){
				echo "<td>".getlang("LANG_ADMIN_DEFAULT_EXTENSIONS_ALL_MODS_UNEDITABLE", false)."</td>";
			}else{
				$editurl = explode(".", $data["editurl"]);
				echo "<td><a href=\"".$sys["general"]["urlroot"]."admin/index.php?page=extensions/mod_".$data["name"]."/".$editurl[0]."\">".getlang("LANG_ADMIN_DEFAULT_GENERAL_EDIT", false)."</a></td>";
			}
			
			echo "</tr>";
			
			$count2++;
		}
	}else{
		echo "<tr>";
		echo "<td><input name=\"id\" type=\"radio\" disabled=\"disabled\"></td>";
		echo "<td>".getlang("LANG_ADMIN_DEFAULT_EXTENSIONS_ALL_MODS_NO_MODS", false)."</td>";
		echo "<td>-</td>";
		echo "<td>-</td>";
		echo "<td>-</td>";
		echo "</tr>";
	}
?>
</table>
<?php
	if($user->checkperm("delextensions")){
?>
<div class="form-actions">
	<button name="btn" value="0" type="submit" class="btn btn-danger right"><?php getlang("LANG_ADMIN_DEFAULT_GENERAL_UNINSTALL"); ?></button>
</div>
<?php
	}
?>

</form>
<?php
	}else{
		error(2);
	}
?>