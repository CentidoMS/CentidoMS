<?php
	/**
	 * Table with users
	 *
	 * @package CentidoMS
	 */
	
	if($user->checkperm("editgroup")){
		title(getlang("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_ALL_GROUPS_HEADING", false), true);
		$output = $db->query("SELECT * FROM ".$sys["mysql"]["prefix"]."groups");
		$result = $db->processing($output, "multi");
	
		if(isset($_GET["message"])){
			switch($_GET["message"]){
				case 0:
					echo "<div class=\"alert alert-success\">";
					getlang("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_ALL_GROUPS_MESSAGE_DELETE_SUCCESSFULL");
					echo "</div>";
					break;
				
				case 1:
					echo "<div class=\"alert alert-success\">";
					getlang("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_ALL_GROUPS_MESSAGE_UPDATE_SUCCESSFULL");
					echo "</div>";
					break;
			
				case 2:
					echo "<div class=\"alert alert-error\">";
					getlang("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_ALL_GROUPS_MESSAGE_SELECT_GROUP");
					echo "</div>";
					break;
				
				case 3:
					echo "<div class=\"alert alert-error\">";
					getlang("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_ALL_GROUPS_MESSAGE_DELETE_USERS");
					echo "</div>";
					break;
			}
		}
?>

<div class="page-header">
	<h1><?php getlang("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_ALL_GROUPS_HEADING"); ?></h1>
</div>
<form method="post" action="<?php echo $sys["general"]["urlroot"]; ?>admin/user/groups2.php">
	<table class="table table-striped table-bordered">
		<tr><td><b>#</b></td><td><b><?php getlang("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_ALL_GROUPS_TABLE_HEADING_GROUP"); ?></b></td><td><b><?php getlang("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_ALL_GROUPS_TABLE_HEADING_SHORTCUT"); ?></b></td></tr>
			<?php
				$count = 0;
				while(isset($result[$count])){
					$data = $result[$count];
					echo "<tr>";
					if($data["shortcut"] == "superadmin"){
						echo "<td><input name=\"id\" type=\"radio\" value=\"".$data["id"]."\" disabled=\"disabled\"></td>";
					}else{
						echo "<td><input name=\"id\" type=\"radio\" value=\"".$data["id"]."\"></td>";
					}
					echo "<td>".$data["group"]."</td>";
					echo "<td>".$data["shortcut"]."</td>";
					echo "</tr>";
	
					$count++;
				}
			?>
	</table>
	<div class="form-actions">
		<button name="btn" value="0" type="submit" class="btn btn-danger right"><?php getlang("LANG_ADMIN_DEFAULT_GENERAL_DELETE"); ?></button>
		<button name="btn" value="1" type="submit" class="btn right mright10"><?php getlang("LANG_ADMIN_DEFAULT_GENERAL_EDIT"); ?></button>
	</div>
</form>
<?php
	}else{
		error(2);
	}
?>