<?php
	/**
	 * Table with users
	 *
	 * @package CentidoMS
	 */
	
	if($user->checkperm("editpost")){
		title(getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_ALL_POSTS_HEADING", false), true);
		$count = $db->count("SELECT COUNT(*) FROM ".$sys["mysql"]["prefix"]."posts");
		if($count != 0){
			$output = $db->query("SELECT * FROM ".$sys["mysql"]["prefix"]."posts");
			$result = $db->processing($output, "multi");
		}else{
			$result = false;
		}
		
		if(isset($_GET["message"])){
			switch($_GET["message"]){
				case 0:
					echo "<div class=\"alert alert-success\">";
					getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_ALL_POSTS_MESSAGE_DELETE_SUCCESSFULL");
					echo "</div>";
					break;
					
				case 1:
					echo "<div class=\"alert alert-success\">";
					getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_ALL_POSTS_MESSAGE_UPDATE_SUCCESSFULL");
					echo "</div>";
					break;
					
				case 2:
					echo "<div class=\"alert alert-success\">";
					getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_ALL_POSTS_MESSAGE_ADD_SUCCESSFULL");
					echo "</div>";
					break;
					
				case 3:
					echo "<div class=\"alert alert-error\">";
					getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_ALL_POSTS_MESSAGE_SELECT_POST");
					echo "</div>";
					break;
			}
		}
?>
<div class="post-header">
	<h1><?php getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_ALL_POSTS_HEADING"); ?></h1>
</div>
<hr>
<form method="post" action="<?php echo $sys["general"]["urlroot"]; ?>admin/content/posts2.php">
	<table class="table table-striped table-bordered">
		<tr><td><b>#</b></td><td><b><?php getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_ALL_POSTS_TITLE"); ?></b></td><td><b><?php getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_ALL_POSTS_AUTHOR"); ?></b></td><td><b><?php getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_GENERAL_STATUS"); ?></b></td></tr>
		<?php
			if($result == true){
				$count2 = 0;
				while(isset($result[$count2])){
					$data = $result[$count2];
					echo "<tr>";
					echo "<td><input name=\"id\" type=\"radio\" value=\"".$data["id"]."\"></td>";
					if($data["page"] == 0){
						echo "<td>".$data["title"]."</td>";
					}else{
						echo "<td>".$data["title"]."<span class=\"muted\"> -- ".getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_ALL_POSTS_PAGE", false)."</span></td>";
					}
					
					echo "<td>".$data["author"]."</td>";
					switch($data["status"]){
					case 0:
						$status = getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_GENERAL_STATUS_DRAFT", false);
						break;
					case 1:
						$status = getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_GENERAL_STATUS_PUBLISHED", false);
						break;
					}
					echo "<td>".$status."</td>";
					echo "</tr>";
				
					$count2++;
				}
			}else{
				echo "<tr>";
				echo "<td><input name=\"id\" type=\"radio\" disabled=\"disabled\"></td>";
				echo "<td>Keine Beiträge</td>";
				echo "<td>-</td>";
				echo "<td>-</td>";
				echo "</tr>";
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