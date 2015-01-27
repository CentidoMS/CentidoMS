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
					  $("#editcategorybtn").click(function() {
												  nameValue = document.editcategory.name.value;
										 
												  if(nameValue == ""){
												  $("#control-group-newcategoryname").html("<div class=\"control-group error\"><div class=\"controls\"><input name=\"name\" type=\"text\" placeholder=\"<?php getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_MENUS_CATEGORY_NAME"); ?>\" /><span class=\"help-inline\"><?php getlang("LANG_ADMIN_DEFAULT_GENERAL_HELP_FILL_OUT"); ?></span></div>");
										 
												  document.editcategory.name.value = nameValue;
												  }else{
												  document.editcategory.submit();
												  }
										 
												  return false;
												  });
					  });	
</script>
<form name="editcategory" method="post" action="<?php echo $sys["general"]["urlroot"]; ?>admin/content/editcategorymenu.php?menu=<?php echo $active; ?>&item=<?php echo $_GET["item"]; ?>">
	<label><?php getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_MENUS_CATEGORY_NAME"); ?></label>
	<div id="control-group-newcategoryname">
		<div class="control-group">
			<div class="controls">
				<input name="name" type="text" placeholder="<?php getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_MENUS_CATEGORY_NAME"); ?>" value="<?php echo $result["name"]; ?>" />
			</div>
		</div>
	</div>
	<label><?php getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_GENERAL_CATEGORY"); ?></label>
	<?php
		$cat = $category->getbyslug($result["value"]);
		
		$category->showselectstyle(0, $cat["id"], "category");
	?>
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
		<button id="editcategorybtn" type="submit" name="btn" value="1" class="btn btn-primary"><?php getlang("LANG_ADMIN_DEFAULT_GENERAL_UPDATE"); ?></button>
	</div>
	<div class="clearfix"></div>
</form>
<?php
	}else{
		error(2, true);
	}
?>