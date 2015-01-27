<?php
	/**
	 * Edit link item from a menu
	 *
	 * @package CentidoMS
	 */
	
	if($user->checkperm("editmenuitem")){
?>
<script type="text/javascript">
	$(document).ready(function(){
					  $("#editlinkbtn").click(function() {
											  nameValue = document.editlink.name.value;
											  urlValue = document.editlink.url.value;
										 
											  if(nameValue == ""){
											  $("#control-group-newlinkname").html("<div class=\"control-group error\"><div class=\"controls\"><input name=\"name\" type=\"text\" placeholder=\"Linkname\" /><span class=\"help-inline\"><?php getlang("LANG_ADMIN_DEFAULT_GENERAL_HELP_FILL_OUT"); ?></span></div>");
										 
											  document.editlink.name.value = nameValue;
											  }else if(urlValue == ""){
											  $("#control-group-newlinkname").html("<div class=\"control-group success\"><div class=\"controls\"><input name=\"name\" type=\"text\" placeholder=\"Linkname\" /><span class=\"help-inline\">Dieses Feld ist korrekt ausgefüllt.</span></div>");
										 
											  $("#control-group-newlinkurl").html("<div class=\"control-group error\"><div class=\"controls\"><input name=\"url\" type=\"text\" placeholder=\"Url\" /><span class=\"help-inline\"><?php getlang("LANG_ADMIN_DEFAULT_GENERAL_HELP_FILL_OUT"); ?></span></div>");
										 
											  document.editlink.name.value = nameValue;
											  document.editlink.url.value = urlValue;
											  }else{
											  document.editlink.submit();
											  }
										 
											  return false;
											  });
					  });	
</script>
<form name="editlink" method="post" action="<?php echo $sys["general"]["urlroot"]; ?>admin/content/editlinkmenu.php?menu=<?php echo $active; ?>&item=<?php echo $_GET["item"]; ?>">
	<label><?php getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_MENUS_LINK_NAME"); ?></label>
	<div id="control-group-newlinkname">
		<div class="control-group">
			<div class="controls">
				<input name="name" type="text" placeholder="<?php getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_MENUS_LINK_NAME"); ?>" value="<?php echo $result["name"]; ?>" />
			</div>
		</div>
	</div>
	<label><?php getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_MENUS_LINK_URL"); ?></label>
	<div id="control-group-newlinkurl">
		<div class="control-group">
			<div class="controls">
				<input name="url" type="text" placeholder="<?php getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_MENUS_LINK_URL"); ?>" value="<?php echo $result["value"]; ?>" />
			</div>
		</div>
	</div>
	<label><?php getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_MENUS_HIGHER"); ?></label>
	<?php $menu->showselectstyle($active, 0, $result["target"]); ?>
	<hr>
	<?php
		if($user->checkperm("delmenuitem")){
	?>
	<button id="dellinkbtn" type="submit" name="btn" value="0" class="btn btn-danger"><?php getlang("LANG_ADMIN_DEFAULT_GENERAL_DELETE"); ?></button>
	<?php
		}
	?>
	<div class="pull-right">
		<button id="editlinkbtn" type="submit" name="btn" value="1" class="btn btn-primary"><?php getlang("LANG_ADMIN_DEFAULT_GENERAL_UPDATE"); ?></button>
	</div>
	<div class="clearfix"></div>
</form>
<?php
	}else{
		error(2, true);
	}
?>