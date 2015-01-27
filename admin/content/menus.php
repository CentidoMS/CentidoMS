<?php
	/**
	 * Menus
	 *
	 * @package CentidoMS
	 */
	
	if($user->checkperm("addmenuitem")){
		title(getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_GENERAL_MENUS", false), true);
		
		if(isset($_GET["message"])){
			switch($_GET["message"]){
				case 0:
					echo "<div class=\"alert alert-success\">";
					getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_MENUS_MESSAGE_ADD_MENU_SUCCESSFULL");
					echo "</div>";
					break;
					
				case 1:
					echo "<div class=\"alert alert-success\">";
					getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_MENUS_MESSAGE_UPDATE_MENU_SUCCESSFULL");
					echo "</div>";
					break;
				
				case 2:
					echo "<div class=\"alert alert-success\">";
					getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_MENUS_MESSAGE_DELETE_MENU_SUCCESSFULL");
					echo "</div>";
					break;
					
				case 3:
					echo "<div class=\"alert alert-success\">";
					getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_MENUS_MESSAGE_ADD_ITEM_SUCCESSFULL");
					echo "</div>";
					break;
					
				case 4:
					echo "<div class=\"alert alert-success\">";
					getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_MENUS_MESSAGE_EDIT_ITEM_SUCCESSFULL");
					echo "</div>";
					break;
					
				case 5:
					echo "<div class=\"alert alert-success\">";
					getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_MENUS_MESSAGE_DELETE_ITEM_SUCCESSFULL");
					echo "</div>";
					break;
					
				case 6:
					echo "<div class=\"alert alert-error\">";
					getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_MENUS_MESSAGE_MENU_NAME_RESERVED");
					echo "</div>";
					break;
				
				case 7:
					echo "<div class=\"alert alert-error\">";
					getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_MENUS_MESSAGE_MOVE_ALL_LOWER_ITEMS");
					echo "</div>";
					break;
					
				case 8:
					echo "<div class=\"alert alert-error\">";
					getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_MENUS_MESSAGE_SELECT_CATEGORY");
					echo "</div>";
					break;
					
				case 9:
					echo "<div class=\"alert alert-error\">";
					getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_MENUS_MESSAGE_FILL_OUT");
					echo "</div>";
					break;
			}
		}
?>

<div class="post-header">
	<h1><?php getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_GENERAL_MENUS"); ?></h1>
</div>
<hr>
<ul class="nav nav-tabs">
	<?php
		$count = $db->count("SELECT COUNT(*) FROM ".$sys["mysql"]["prefix"]."menus");
		if($count != 0){
			$output = $db->query("SELECT * FROM ".$sys["mysql"]["prefix"]."menus");
			$result = $db->processing($output, "multi");
			
			$count2 = 0;
			$first = 0;
			while(isset($result[$count2])){
				if(isset($_GET["menu"])){
					if($_GET["menu"] == $result[$count2]["id"]){
						echo "<li class=\"active\"><a href=\"".$sys["general"]["urlroot"]."admin/index.php?page=content/menus&menu=".$result[$count2]["id"]."\">".$result[$count2]["name"]."</a></li>";
						$active = $result[$count2]["id"];
					}else{
						echo "<li><a href=\"".$sys["general"]["urlroot"]."admin/index.php?page=content/menus&menu=".$result[$count2]["id"]."\">".$result[$count2]["name"]."</a></li>";
					}
				}elseif($first == 0){
					echo "<li class=\"active\"><a href=\"".$sys["general"]["urlroot"]."admin/index.php?page=content/menus&menu=".$result[$count2]["id"]."\">".$result[$count2]["name"]."</a></li>";
					$first = 1;
					
					$active = $result[$count2]["id"];
				}else{
					echo "<li><a href=\"".$sys["general"]["urlroot"]."admin/index.php?page=content/menus&menu=".$result[$count2]["id"]."\">".$result[$count2]["name"]."</a></li>";
				}
				
				$count2++;
			}
		}
		if($user->checkperm("addmenu")){
			echo "<li><a href=\"#addmenu\" data-toggle=\"modal\">".getlang("LANG_ADMIN_DEFAULT_GENERAL_ADD", false)."</a></li>";
		}
	?>
</ul>

<script type="text/javascript">
	function selectedItem(id){
		window.location = "<?php echo $sys["general"]["urlroot"]; ?>admin/index.php?page=content/menus&menu=<?php echo $active; ?>&item="+id;
	}

	$(document).ready(function(){
					  $("#addlinkbtn").click(function() {
											 nameValue = document.newlink.name.value;
											 urlValue = document.newlink.url.value;
											 
											 if(nameValue == ""){
											 $("#control-group-newlinkname").html("<div class=\"control-group error\"><div class=\"controls\"><input name=\"name\" type=\"text\" placeholder=\"<?php getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_MENUS_LINK_NAME"); ?>\" /><span class=\"help-inline\"><?php getlang("LANG_ADMIN_DEFAULT_GENERAL_HELP_FILL_OUT"); ?></span></div>");
											 
											 document.newlink.name.value = nameValue;
											 }else if(urlValue == ""){
											 $("#control-group-newlinkname").html("<div class=\"control-group success\"><div class=\"controls\"><input name=\"name\" type=\"text\" placeholder=\"<?php getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_MENUS_LINK_NAME"); ?>\" /><span class=\"help-inline\"><?php getlang("LANG_ADMIN_DEFAULT_GENERAL_HELP_FILL_OUT_OK"); ?></span></div>");
											 
											 $("#control-group-newlinkurl").html("<div class=\"control-group error\"><div class=\"controls\"><input name=\"url\" type=\"text\" placeholder=\"<?php getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_MENUS_LINK_URL"); ?>\" /><span class=\"help-inline\"><?php getlang("LANG_ADMIN_DEFAULT_GENERAL_HELP_FILL_OUT"); ?></span></div>");
											 
											 document.newlink.name.value = nameValue;
											 document.newlink.url.value = urlValue;
											 }else{
											 document.newlink.submit();
											 }
											 						 
											 return false;
											 });
					  
					  $("#addcategorybtn").click(function() {
												  nameValue = document.newcategory.name.value;
												  
												  if(nameValue == ""){
												  $("#control-group-newcategoryname").html("<div class=\"control-group error\"><div class=\"controls\"><input name=\"name\" type=\"text\" placeholder=\"<?php getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_GENERAL_CATERGORY_NAME"); ?>\" /><span class=\"help-inline\"><?php getlang("LANG_ADMIN_DEFAULT_GENERAL_HELP_FILL_OUT"); ?></span></div>");
												  
												  document.newcategory.name.value = nameValue;
												  }else{
												  document.newcategory.submit();
												  }
												  
												  return false;
												  });
					  
					  $("#addmenubtn").click(function() {
											 nameValue = document.addmenu.name.value;
											 
											 if(nameValue == ""){
											 $("#control-group-addmenu").html("<div class=\"control-group error\"><div class=\"controls\"><input name=\"name\" type=\"text\" placeholder=\"<?php getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_MENUS_MENU_NAME"); ?>\" /><span class=\"help-inline\"><?php getlang("LANG_ADMIN_DEFAULT_GENERAL_HELP_FILL_OUT"); ?></span></div>");
											 
											 document.addmenu.name.value = nameValue;
											 }else{
											 document.addmenu.submit();
											 }
											 
											 return false;
											 });
					  });
</script>

<?php
	$activemenu = $menu->getmenubyid($active);
	
	if($activemenu["htmlid"] == "none"){
		$htmlid = "";
	}else{
		$htmlid = $activemenu["htmlid"];
	}
	
	if($activemenu["htmlclasses"] == "none"){
		$htmlclasses = "";
	}else{
		$htmlclasses = $activemenu["htmlclasses"];
	}
	
	if($user->checkperm("editmenu")){
?>

<form class="form-inline" method="post" action="<?php echo $sys['general']['urlroot']."admin/"; ?>content/editmenu.php?menu=<?php echo $active; ?>">
	<input type="text" name="name" class="input-small span2" placeholder="<?php getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_MENUS_MENU_NAME"); ?>" value="<?php echo $activemenu["name"]; ?>" />
	<input type="text" name="id" class="input-small span2" placeholder="<?php getlang("LANG_ADMIN_DEFAULT_GENERAL_ID"); ?>" value="<?php echo $htmlid; ?>" />
	<input type="text" name="classes" class="input-small span2" placeholder="<?php getlang("LANG_ADMIN_DEFAULT_GENERAL_CLASSES"); ?>" value="<?php echo $htmlclasses; ?>" />
	<select name="position" class="span2">
		<option value="none"><?php getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_MENUS_SELECT_POSITION"); ?></option>
		<?php
			$stmt = $db->connection->prepare("SELECT `menus` FROM ".$sys["mysql"]["prefix"]."themes WHERE `default` = 1");
			$stmt->execute();
			$stmt->bind_result($menus);
			$stmt->fetch();
			$stmt->close();
			
			$menus = explode(",", $menus);
			
			$count = 0;
			while(isset($menus[$count])){
				$stmt = $db->connection->prepare("SELECT COUNT(*) FROM ".$sys["mysql"]["prefix"]."menus WHERE `id` = ? AND `position` = ?");
				$stmt->bind_param('is', $active, $menus[$count]);
				$stmt->execute();
				$stmt->bind_result($count2);
				$stmt->fetch();
				$stmt->close();
				
				if($count2 != 0){
					echo "<option value=\"".$menus[$count]."\" selected=\"selected\"> ".$menus[$count]."</label>";
				}else{
					echo "<option value=\"".$menus[$count]."\"> ".$menus[$count]."</label>";
				}
				
				
				$count++;
			}
		?>
	</select>

	<div class="pull-right">
		<button type="submit" name="btn" value="1" class="btn btn-primary"><?php getlang("LANG_ADMIN_DEFAULT_GENERAL_UPDATE"); ?></button>
	<?php
		if($user->checkperm("delmenu")){
	?>
		<button type="submit" name="btn" value="0" class="btn btn-danger"><?php getlang("LANG_ADMIN_DEFAULT_GENERAL_DELETE"); ?></button>
	<?php
		}
	?>
	</div>
</form>
<div class="clearfix"></div>
<?php
	}
?>
<!-- Add menu dialog -->
<div id="addmenu" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="header" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="header"><?php getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_MENUS_ADD_MENU"); ?></h3>
	</div>
	<form name="addmenu" method="post" action="<?php echo $sys['general']['urlroot']."admin/"; ?>content/addmenu.php">
		<div class="modal-body">
			<label><?php getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_MENUS_MENU_NAME"); ?></label>
			<div id="control-group-addmenu">
				<div class="control-group">
					<div class="controls">
						<input name="name" type="text" placeholder="<?php getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_MENUS_MENU_NAME"); ?>" />
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true"><?php getlang("LANG_ADMIN_DEFAULT_GENERAL_CANCEL"); ?></button>
			<button class="btn btn-primary" id="addmenubtn" type="submit"><?php getlang("LANG_ADMIN_DEFAULT_GENERAL_UPDATE"); ?></button>
		</div>
	</form>
</div>
<!-- End add menu dialog -->

<div class="row">
	<div class="span4">
		<div class="accordion" id="accordion2">
			<?php
				if($user->checkperm("editmenuitem")){
			?>
			<!-- Edit -->
			<div class="accordion-group">
				<div class="accordion-heading">
					<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#edit">
						<?php getlang("LANG_ADMIN_DEFAULT_GENERAL_EDIT"); ?>
					</a>
				</div>
				<div id="edit" class="accordion-body collapse in">
					<div class="accordion-inner">
						<?php
							if(isset($_GET["item"])){
								include("content/menusmallfunc.php");
								echo "<hr>";
								$result = $menu->getitembyid($active, $_GET["item"]);
								switch($result["type"]){
									case "link":
										include("content/editlinkformmenu.php");
										break;
										
									case "category":
										include("content/editcategoryformmenu.php");
										break;
								}
							}else{
								getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_MENUS_DESCRIPTION_SELECT_ITEM");
							}
						?>
					</div>
				</div>
			</div>
			<!-- End edit -->
			<?php
				}
				
				if($user->checkperm("addmenuitem")){
			?>
			<!-- Add link -->
			<div class="accordion-group">
				<div class="accordion-heading">
					<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#link">
						<?php getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_MENUS_ADD_LINK"); ?>
					</a>
				</div>
				<div id="link" class="accordion-body collapse">
					<div class="accordion-inner">
						<form name="newlink" method="post" action="<?php echo $sys["general"]["urlroot"]; ?>admin/content/addlinkmenu.php?menu=<?php echo $active; ?>">
							<label><?php getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_MENUS_LINK_NAME"); ?></label>
							<div id="control-group-newlinkname">
								<div class="control-group">
									<div class="controls">
										<input name="name" type="text" placeholder="<?php getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_MENUS_LINK_NAME"); ?>" />
									</div>
								</div>
							</div>
							<label><?php getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_MENUS_LINK_URL"); ?></label>
							<div id="control-group-newlinkurl">
								<div class="control-group">
									<div class="controls">
										<input name="url" type="text" placeholder="<?php getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_MENUS_LINK_URL"); ?>" />
									</div>
								</div>
							</div>
							<label><?php getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_MENUS_HIGHER"); ?></label>
							<?php $menu->showselectstyle($active); ?>
							<hr>
							<div class="pull-right">
								<button id="addlinkbtn" type="submit" class="btn btn-primary"><?php getlang("LANG_ADMIN_DEFAULT_GENERAL_ADD"); ?></button>
							</div>
							<div class="clearfix"></div>
						</form>
					</div>
				</div>
			</div>
			<!-- End add link -->

			<!-- Add category -->
			<div class="accordion-group">
				<div class="accordion-heading">
					<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#category">
						<?php getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_MENUS_ADD_CATEGORY"); ?>
					</a>
				</div>
				<div id="category" class="accordion-body collapse">
					<div class="accordion-inner">
						<form name="newcategory" method="post" action="<?php echo $sys["general"]["urlroot"]; ?>admin/content/addcategorymenu.php?menu=<?php echo $active; ?>">
							<label><?php getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_MENUS_CATEGORY_NAME"); ?></label>
							<div id="control-group-newcategoryname">
								<div class="control-group">
									<div class="controls">
										<input name="name" type="text" placeholder="<?php getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_MENUS_CATEGORY_NAME"); ?>" />
									</div>
								</div>
							</div>
							<label><?php getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_GENERAL_CATEGORY"); ?></label>
							<?php $category->showselectstyle(0, 0, "category"); ?>
							<label><?php getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_MENUS_HIGHER"); ?></label>
							<?php $menu->showselectstyle($active); ?>
							<hr>
							<div class="pull-right">
								<button id="addcategorybtn" type="submit" class="btn btn-primary"><?php getlang("LANG_ADMIN_DEFAULT_GENERAL_ADD"); ?></button>
							</div>
							<div class="clearfix"></div>
						</form>
					</div>
				</div>
			</div>
			<!-- End add category -->
			<?php
				}
			?>

		</div>
	</div>
	<div class="span8">
	<?php
		if(isset($active)){
			if(isset($_GET["item"])){
				$menu->showblockstyle($active, 0, $_GET["item"]);
			}else{
				$menu->showblockstyle($active);
			}
		}else{
			getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_MENUS_NO_MENUS");
		}
	?>
	</div>
</div>
<?php
	}else{
		error(2);
	}
?>