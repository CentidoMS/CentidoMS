<?php
	/**
	 * Table with users
	 *
	 * @package CentidoMS
	 */
	
	if($user->checkperm("edituser")){
		title(getlang("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_ALL_USERS_HEADING", false), true);
		$output = $db->query("SELECT * FROM ".$sys["mysql"]["prefix"]."users");
		$result = $db->processing($output, "multi");
			
			if(isset($_GET["message"])){
				switch($_GET["message"]){
				case 0:
					echo "<div class=\"alert alert-success\">";
					getlang("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_ALL_USERS_MESSAGE_DELETE_SUCCESSFULL");
					echo "</div>";
					break;
				
				case 1:
					echo "<div class=\"alert alert-success\">";
					getlang("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_ALL_USERS_MESSAGE_UPDATE_SUCCESSFULL");
					echo "</div>";
					break;
				
				case 2:
					echo "<div class=\"alert alert-error\">";
					getlang("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_ALL_USERS_MESSAGE_SELECT_USER");
					echo "</div>";
					break;
				
				case 3:
					echo "<div class=\"alert alert-error\">";
					getlang("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_ALL_USERS_MESSAGE_FILL_OUT");
					echo "</div>";
					break;
				
				case 4:
					echo "<div class=\"alert alert-error\">";
					getlang("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_ALL_USERS_MESSAGE_PASSWORD");
					echo "</div>";
					break;
						
				case 5:
					echo "<div class=\"alert alert-error\">";
					getlang("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_ALL_USERS_MESSAGE_USER_EXIST");
					echo "</div>";
					break;
						
				case 6:
					echo "<div class=\"alert alert-error\">";
					getlang("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_ALL_USERS_MESSAGE_DONT_DELETE_OWNER");
					echo "</div>";
					break;
			}
		}
?>
<div class="page-header">
	<h1><?php getlang("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_ALL_USERS_HEADING"); ?></h1>
</div>
<form method="post" action="<?php echo $sys["general"]["urlroot"]; ?>admin/user/users2.php">
	<table class="table table-striped table-bordered">
		<tr><td><b>#</b></td><td><b><?php getlang("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_ALL_USERS_USERNAME"); ?></b></td><td><b><?php getlang("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_ALL_USERS_NAME"); ?></b></td><td><b><?php getlang("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_ALL_USERS_GROUP"); ?></b></td><td><b><?php getlang("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_ALL_USERS_MAIL"); ?></b></td></tr>
		<?php
			$count = 0;
			while(isset($result[$count])){
				$data = $result[$count];
				echo "<tr>";
				echo "<td><input name=\"id\" type=\"radio\" value=\"".$data["id"]."\"></td>";
				
				if($data["id"] != 1){
					echo "<td>".$data["username"]."</td>";
				}else{
					echo "<td>".$data["username"]."<span class=\"muted\"> -- ".getlang("LANG_ADMIN_DEFAULT_USER_MANAGEMENT_GENERAL_USER_OWNER", false)."</span></td>";
				}
				
				if(isset($data["first_name"]) AND isset($data["last_name"])){
					if($data["first_name"] != "NULL" AND $data["last_name"] != "NULL"){
						echo "<td>".$data["first_name"]." ".$data["last_name"]."</td>";
					}else{
						echo "<td>-</td>";
					}
				}else{
					echo "<td>-</td>";
				}
				echo "<td>".$data["groupdn"]."</td>";
				echo "<td>".$data["mail"]."</td>";
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