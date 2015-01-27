<?php
	/**
	 * Add post
	 *
	 * @package CentidoMS
	 */
	if($user->checkperm("addpost")){
		title(getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_ADD_POST_HEADING", false), true);
?>
<script type="text/javascript">
	disableButton = true;

	window.onload = firstLoad;

	function firstLoad(){
		checkButton();
	}

	function checkButton(){
		if(disableButton == true){
			$("#button").html("<a class=\"btn\" href=\"<?php echo $sys['general']['urlroot']."admin/index.php?page=content/posts"; ?>\"><?php getlang("LANG_ADMIN_DEFAULT_GENERAL_CANCEL"); ?></a><button name=\"btn\" value=\"0\" class=\"btn right disabled\" type=\"submit\" disabled=\"disabled\"><?php getlang("LANG_ADMIN_DEFAULT_GENERAL_SAVE"); ?></button><hr><button class=\"btn btn-primary disabled\" disabled=\"disabled\"><?php getlang("LANG_ADMIN_DEFAULT_GENERAL_PUBLISH"); ?></button>");
		}else{
			$("#button").html("<a class=\"btn\" href=\"<?php echo $sys['general']['urlroot']."admin/index.php?page=content/posts"; ?>\"><?php getlang("LANG_ADMIN_DEFAULT_GENERAL_CANCEL"); ?></a><button name=\"btn\" value=\"0\" class=\"btn right\" type=\"submit\"><?php getlang("LANG_ADMIN_DEFAULT_GENERAL_SAVE"); ?></button><hr><button name=\"btn\" value=\"1\" class=\"btn btn-primary\" type=\"submit\"><?php getlang("LANG_ADMIN_DEFAULT_GENERAL_PUBLISH"); ?></button>");
		}
	}

	function checkTitle() {			   
				var titleValue = document.addpost.title.value;
				
				if(titleValue == ""){
				// Disable the publish and save button
				disableButton = true;
			   
				// Warning for input title
				$("#control-group-title").html("<div class=\"control-group error\" id=\"title\"><div class=\"controls\"><input class=\"span3\" name=\"title\" type=\"text\" placeholder=\"<?php getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_GENERAL_POST_TITLE"); ?>\" onchange=\"checkTitle()\" /><span class=\"help-inline\"><?php getlang("LANG_ADMIN_DEFAULT_GENERAL_HELP_FILL_OUT"); ?></span></div>");
				}else{
					// Enable the publish and save button
					disableButton = false;
					
					$("#control-group-title").html("<div class=\"control-group\" id=\"title\"><div class=\"controls\"><input class=\"span3\" name=\"title\" type=\"text\" placeholder=\"<?php getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_GENERAL_POST_TITLE"); ?>\" onchange=\"checkTitle()\" /></div>");
				}
				
				document.addpost.title.value = titleValue;
				
				checkButton();
	}
</script>
<div class="post-header">
	<h1><?php getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_ADD_POST_HEADING"); ?></h1>
</div>
<hr>
<form action="<?php echo $sys["general"]["urlroot"]; ?>admin/content/addpost2.php" method="post" name="addpost">
	<div class="row">
		<div class="span8">
			<div id="message"></div>
			<div id="control-group-title">
				<div class="control-group" id="title">
					<div class="controls">
						<input class="span3" name="title" type="text" placeholder="<?php getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_GENERAL_POST_TITLE"); ?>" for="title" onchange="checkTitle()" />
					</div>
				</div>
			</div>
			<div id="control-group-permlink">
				<div class="control-group" id="title">
					<div class="controls">
						<input class="span3" name="permlink" type="text" placeholder="<?php getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_GENERAL_POST_PERMALINK"); ?>" for="title" onchange="checkPermlink()" />
					</div>
				</div>
			</div>
			<label><?php getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_GENERAL_POST_CONTENT"); ?></label>
			<textarea name="content" type="text" class="tinymce"></textarea>
		</div>
		<div class="span4">
			<div class="accordion" id="accordion2">
				<div class="accordion-group">
					<div class="accordion-heading">
						<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#publish">
						<?php getlang("LANG_ADMIN_DEFAULT_GENERAL_PUBLISH"); ?>
						</a>
					</div>
					<div id="publish" class="accordion-body collapse in">
						<div class="accordion-inner">
							<b><?php getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_ADD_POST_PAGE_QUESTION"); ?></b>
							<label class="radio"><input type="radio" name="page" value="1"><?php getlang("LANG_ADMIN_DEFAULT_GENERAL_YES"); ?></label>
							<label class="radio"><input type="radio" name="page" value="0" checked="checked"><?php getlang("LANG_ADMIN_DEFAULT_GENERAL_NO"); ?></label>
							<hr>
							<div id="button">
							</div>
						</div>
					</div>
				</div>
				<div class="accordion-group">
					<div class="accordion-heading">
						<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#category">
						<?php getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_GENERAL_CATEGORY_CATEGORIES"); ?>
						</a>
					</div>
					<div id="category" class="accordion-body collapse">
						<div class="accordion-inner">
							<?php $category->showliststyle(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
<?php
	}else{
		error(2);
	}
?>