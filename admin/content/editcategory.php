<?php
	/**
	 * Edit category
	 *
	 * @package CentidoMS
	 */
	
	$result = $category->getbyid($_GET["id"]);
	if($user->checkperm("editcategory")){
?>

<script type="text/javascript">
	$(document).ready(function(){
					  valueSaved = decodeURIComponent('<?php echo urlencode($result["slug"]);?>');
					  
					  $("#updatebtn").click(function() {
											$.ajax({
												   url:"content/checkslugcategory.php",
												   type: "POST",
												   data: {
												   'value': document.editcategory.slug.value,
												   'valuesaved': valueSaved,
												   },
												   success:function(result){
												   slugValue = document.editcategory.slug.value;
												   categoryValue = document.editcategory.categoryname.value;
												   
												   if(categoryValue == ""){
												   // Warning, if categoryname-input is empty
												   $("#control-group-editname").html("<div class=\"control-group error\"><div class=\"controls\"><input name=\"categoryname\" type=\"text\" placeholder=\"<?php getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_GENERAL_CATEGORY_NAME"); ?>\" /><span class=\"help-inline\"><?php getlang("LANG_ADMIN_DEFAULT_GENERAL_HELP_FILL_OUT"); ?></span></div>");
												   document.editcategory.slug.value = slugValue;
												   document.editcategory.categoryname.value = categoryValue;
												   }else if(slugValue == ""){
												   // Warning, if slug-input is empty
												   $("#control-group-editname").html("<div class=\"control-group success\"><div class=\"controls\"><input name=\"categoryname\" type=\"text\" placeholder=\"<?php getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_GENERAL_CATEGORY_NAME"); ?>\" /><span class=\"help-inline\"><?php getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_CATEGORIES_HELP_NAME_IS_OK"); ?></span></div>");
												   $("#control-group-editslug").html("<div class=\"control-group error\"><div class=\"controls\"><input name=\"slug\" type=\"text\" placeholder=\"<?php getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_GENERAL_CATEGORY_SLUG"); ?>\" /><span class=\"help-inline\"><?php getlang("LANG_ADMIN_DEFAULT_GENERAL_HELP_FILL_OUT"); ?></span></div>");
												   document.editcategory.slug.value = slugValue;
												   document.editcategory.categoryname.value = categoryValue;
												   }else if(result == "false"){
												   // Warning, if slug-value is reserved
												   $("#control-group-editname").html("<div class=\"control-group success\"><div class=\"controls\"><input name=\"categoryname\" type=\"text\" placeholder=\"<?php getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_GENERAL_CATEGORY_NAME"); ?>\" /><span class=\"help-inline\"><?php getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_CATEGORIES_HELP_NAME_IS_OK"); ?></span></div>");
												   $("#control-group-editslug").html("<div class=\"control-group error\"><div class=\"controls\"><input name=\"slug\" type=\"text\" placeholder=\"<?php getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_GENERAL_CATEGORY_SLUG"); ?>\" /><span class=\"help-inline\"><?php getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_CATEGORIES_HELP_SLUG_IS_RESERVED"); ?></span></div>");
												   document.editcategory.slug.value = slugValue;
												   document.editcategory.categoryname.value = categoryValue;
												   }else{
												   // Submit the form
												   document.editcategory.submit();
												   }
												   
												   }});
											return false;
											});
					  });
</script>

<form name="editcategory" method="post" action="<?php echo $sys["general"]["urlroot"]; ?>admin/content/categories2.php?id=<?php echo $result["id"]; ?>">
	<div class="clearfix"></div>
	<label><?php getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_GENERAL_CATEGORY_NAME"); ?></label>
	<div id="control-group-editname">
		<div id="slug-control" class="control-group">
			<div class="controls">
				<input name="categoryname" type="text" placeholder="<?php getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_GENERAL_CATEGORY_NAME"); ?>" value="<?php echo $result["name"]; ?>" />
			</div>
		</div>
	</div>
	<label><a class="help" data-placement="right" title="<?php getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_CATEGORIES_TOOLTIP_SLUG"); ?>"><?php getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_GENERAL_CATEGORY_SLUG"); ?></a></label>
	<div id="control-group-editslug">
		<div id="slug-control" class="control-group">
			<div class="controls">
				<input name="slug" type="text" placeholder="<?php getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_GENERAL_CATEGORY_SLUG"); ?>" value="<?php echo $result["slug"]; ?>" />
			</div>
		</div>
	</div>
	<label><?php getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_GENERAL_CATEGORY_HIGHER"); ?></label>
	<?php $category->showselectstyle(0, $result["target"]); ?>
	<hr>
	<div id="editbuttons">
		<?php
			if($user->checkperm("delcategory")){
		?>
		<button name="btn" value="0" type="submit" class="btn btn-danger" id="delbtn"><?php getlang("LANG_ADMIN_DEFAULT_GENERAL_DELETE"); ?></button>
		<?php
			}
		?>
		<div class="pull-right">
			<button class="btn btn-primary" id="updatebtn"><?php getlang("LANG_ADMIN_DEFAULT_GENERAL_UPDATE"); ?></button>
		</div>
		<div class="clearfix"></div>
	</div>
</form>
<?php
	}else{
		error(2);
	}
?>