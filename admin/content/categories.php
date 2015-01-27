<?php
	/**
	 * Categories
	 *
	 * @package CentidoMS
	 */
	
	if($user->checkperm("addcategory")){
		title(getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_GENERAL_CATEGORY_CATEGORIES", false), true);
		
		if(isset($_GET["message"])){
			switch($_GET["message"]){
				case 0:
					echo "<div class=\"alert alert-success\">";
					getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_CATEGORIES_MESSAGE_ADD_SUCCESSFULL");
					echo "</div>";
					break;
				
				case 1:
					echo "<div class=\"alert alert-success\">";
					getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_CATEGORIES_MESSAGE_DELETE_SUCCESSFULL");
					echo "</div>";
					break;
			
				case 2:
					echo "<div class=\"alert alert-success\">";
					getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_CATEGORIES_MESSAGE_UPDATE_SUCCESSFULL");
					echo "</div>";
					break;
				
				case 3:
					echo "<div class=\"alert alert-error\">";
					getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_CATEGORIES_MESSAGE_DELETE_MOVE_ALL_LOWER_CATEGORIES");
					echo "</div>";
					break;
				
				case 4:
					echo "<div class=\"alert alert-error\">";
					getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_CATEGORIES_MESSAGE_DELETE_MOVE_ALL_POSTS");
					echo "</div>";
					break;
					
				case 5:
					echo "<div class=\"alert alert-error\">";
					getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_CATEGORIES_MESSAGE_DELETE_SET_OTHER_DEFAULT_CATEGORY");
					echo "</div>";
					break;
					
				case 6:
					echo "<div class=\"alert alert-success\">";
					getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_CATEGORIES_MESSAGE_CHANGE_DEFAULT_CATEGORY_SUCCESSFULL");
					echo "</div>";
					break;
			}
		}
?>
<script type="text/javascript">
	function selectedCategory(id){
		window.location = "<?php echo $sys["general"]["urlroot"]; ?>admin/index.php?page=content/categories&id="+id;
	}

	$(document).ready(function(){
					  $("#addbtn").click(function() {
										 // Load the validation script
										 $.ajax({
												url:"content/checkslugcategory.php",
												type: "POST",
												data: {
												'value': document.newcategory.slug.value,
												},
												success:function(result){
												newcategoryValue = document.newcategory.categoryname.value;
												newslugValue = document.newcategory.slug.value;
												if(newcategoryValue == ""){
											   
												// Warning, if categoryname-input is empty
												$("#control-group-newname").html("<div class=\"control-group error\"><div class=\"controls\"><input name=\"categoryname\" type=\"text\" placeholder=\"Kategoriename\" /><span class=\"help-inline\"><?php getlang("LANG_ADMIN_DEFAULT_GENERAL_HELP_FILL_OUT"); ?></span></div>");
												document.newcategory.categoryname.value = newcategoryValue;
												document.newcategory.slug.value = newslugValue;
												}else if(newslugValue == ""){
												
												// Warning, if slug-input is empty
												$("#control-group-newname").html("<div class=\"control-group success\"><div class=\"controls\"><input name=\"categoryname\" type=\"text\" placeholder=\"Kategoriename\" /><span class=\"help-inline\"><?php getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_CATEGORIES_HELP_NAME_IS_OK"); ?></span></div>");
											   
												$("#control-group-newslug").html("<div class=\"control-group error\"><div class=\"controls\"><input name=\"slug\" type=\"text\" placeholder=\"Slug\" /><span class=\"help-inline\"><?php getlang("LANG_ADMIN_DEFAULT_GENERAL_HELP_FILL_OUT"); ?></span></div>");
												document.newcategory.categoryname.value = newcategoryValue;
												document.newcategory.slug.value = newslugValue;
												}else if(result != "true"){
											   
												// Warning, if slug-value is reserved
												$("#control-group-newname").html("<div class=\"control-group success\"><div class=\"controls\"><input name=\"categoryname\" type=\"text\" placeholder=\"Kategoriename\" /><span class=\"help-inline\"><?php getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_CATEGORIES_HELP_NAME_IS_OK"); ?></span></div>");
											   
												$("#control-group-newslug").html("<div class=\"control-group error\"><div class=\"controls\"><input name=\"slug\" type=\"text\" placeholder=\"Slug\" /><span class=\"help-inline\"><?php getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_CATEGORIES_HELP_SLUG_IS_RESERVED"); ?></span></div>");
												document.newcategory.categoryname.value = newcategoryValue;
												document.newcategory.slug.value = newslugValue;
												}else{
											   
												// Submit the form
												document.newcategory.submit();
												}
												}});
										 return false;
										 });
					  });
</script>
<div class="post-header">
	<h1><?php getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_GENERAL_CATEGORY_CATEGORIES"); ?></h1>
</div>
<hr>
<div class="row">
	<div class="span4">
		<div class="accordion" id="accordion">
			<div class="accordion-group">
				<div class="accordion-heading">
					<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#addcategory">
						<?php getlang("LANG_ADMIN_DEFAULT_GENERAL_ADD"); ?>
					</a>
				</div>
				<div id="addcategory" class="accordion-body collapse in">
					<div class="accordion-inner">
						<form name="newcategory" method="post" action="<?php echo $sys["general"]["urlroot"]; ?>admin/content/addcategory.php">
							<label><?php getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_GENERAL_CATEGORY_NAME"); ?></label>
							<div id="control-group-newname">
								<div class="control-group">
									<div class="controls">
										<input name="categoryname" type="text" placeholder="<?php getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_GENERAL_CATEGORY_NAME"); ?>" />
									</div>
								</div>
							</div>
							<label><a class="help" data-placement="right" title="<?php getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_CATEGORIES_TOOLTIP_SLUG"); ?>"><?php getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_GENERAL_CATEGORY_SLUG"); ?></a></label>
							<div id="control-group-newslug">
								<div class="control-group">
									<div class="controls">
										<input name="slug" type="text" placeholder="<?php getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_GENERAL_CATEGORY_SLUG"); ?>" />
									</div>
								</div>
							</div>
							<label><?php getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_GENERAL_CATEGORY_HIGHER"); ?></label>
							<?php $category->showselectstyle(); ?>
							<hr>
							<div id="addbuttons">
								<div class="pull-right">
									<button id="addbtn" type="submit" class="btn btn-primary"><?php getlang("LANG_ADMIN_DEFAULT_GENERAL_ADD"); ?></button>
								</div>
							</div>
							<div class="clearfix"></div>
						</form>
					</div>
				</div>
			</div>
			<?php
				if($user->checkperm("editcategory")){
			?>
			<div class="accordion-group">
				<div class="accordion-heading">
					<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#editcategory">
						<?php getlang("LANG_ADMIN_DEFAULT_GENERAL_EDIT"); ?>
					</a>
				</div>
				<div id="editcategory" class="accordion-body collapse in">
					<div class="accordion-inner">
							<?php
								if(isset($_GET["id"])){
									include("content/categorysmallfunc.php");
									include("content/editcategory.php");
								}else{
									getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_CATEGORIES_DESCRIPTION_SELECT_CATEGORY");
								}
							?>
					</div>
				</div>
			</div>
			<?php
				}
			?>
		</div>
	</div>
 
	<div class="span8">
		<?php
			if(isset($_GET["id"])){
				$category->showblockstyle(0, $_GET["id"]);
			}else{
				$category->showblockstyle(0);
			}
		?>
	</div>
</div>
<?php
	}else{
		error(2);
	}
?>