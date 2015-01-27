<?php
	/**
	 * Add post
	 *
	 * @package CentidoMS
	 */
	if($user->checkperm("editpost")){
		title(getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_EDIT_POST_HEADING", false), true);
		$result = $post->getbyid($_GET["id"]);
		if(isset($_GET["message"])){
			switch($_GET["message"]){
				case 0:
					echo "<div class=\"alert alert-success\">";
					getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_ALL_POSTS_MESSAGE_UPDATE_SUCCESSFULL");
					echo "</div>";
					break;
			}
		}
		
		if($result["status"] == 0){
			$disabledbutton = "<a class=\"btn\" href=\"".$sys['general']['urlroot']."admin/index.php?page=content/posts\">".getlang("LANG_ADMIN_DEFAULT_GENERAL_CANCEL", false)."</a><button class=\"btn right disabled\" disabled=\"disabled\">".getlang("LANG_ADMIN_DEFAULT_GENERAL_SAVE", false)."</button><hr><button class=\"btn btn-primary disabled\" disabled=\"disabled\">".getlang("LANG_ADMIN_DEFAULT_GENERAL_PUBLISH", false)."</button>";

			$enabledbutton = "<a class=\"btn\" href=\"".$sys['general']['urlroot']."admin/index.php?page=content/posts\">".getlang("LANG_ADMIN_DEFAULT_GENERAL_CANCEL",false)."</a><button name=\"btn\" value=\"0\" class=\"btn right\" type=\"submit\">".getlang("LANG_ADMIN_DEFAULT_GENERAL_SAVE", false)."</button><hr><button name=\"btn\" value=\"1\" class=\"btn btn-primary\" type=\"submit\">".getlang("LANG_ADMIN_DEFAULT_GENERAL_PUBLISH", false)."</button>";
		}else{
			$disabledbutton = "<a class=\"btn\" href=\"".$sys['general']['urlroot']."admin/index.php?page=content/posts\">".getlang("LANG_ADMIN_DEFAULT_GENERAL_CANCEL", false)."</a><button class=\"btn btn-inverse right disabled\" disabled=\"disabled\">".getlang("LANG_ADMIN_DEFAULT_GENERAL_DEPUBLISH", false)."</button><hr><button class=\"btn btn-primary disabled\" disabled=\"disabled\">".getlang("LANG_ADMIN_DEFAULT_GENERAL_UPDATE", false)."</button>";
			
			$enabledbutton = "<a class=\"btn\" href=\"".$sys['general']['urlroot']."admin/index.php?page=content/posts\">".getlang("LANG_ADMIN_DEFAULT_GENERAL_CANCEL",false)."</a><button name=\"btn\" value=\"0\" class=\"btn btn-inverse right\" type=\"submit\">".getlang("LANG_ADMIN_DEFAULT_GENERAL_DEPUBLISH", false)."</button><hr><button name=\"btn\" value=\"1\" class=\"btn btn-primary\" type=\"submit\">".getlang("LANG_ADMIN_DEFAULT_GENERAL_UPDATE", false)."</button>";
		}
?>
<script type="text/javascript">
	// Check the form with AJAX
	disableButton = false;
	titleSaved = decodeURIComponent('<?php echo urlencode($result["title"]);?>');
	disabledButton = decodeURIComponent('<?php echo $disabledbutton; ?>');
	enabledButton = decodeURIComponent('<?php echo $enabledbutton; ?>');

	window.onload = firstLoad;

	function firstLoad(){
		checkButton();
	}

	function checkButton(){
		if(disableButton == true){
			$("#button").html(disabledButton);
		}else{
			$("#button").html(enabledButton);
		}
	}

	function checkTitle() {
		var titleValue = document.editpost.title.value;
		
		if(titleValue == ""){
		
			// Disable the publish and save button
			disableButton = true;
		
			// Warning for input title
			$("#control-group-title").html("<div class=\"control-group error\" id=\"title\"><div class=\"controls\"><input class=\"span3\" name=\"title\" type=\"text\" placeholder=\"<?php getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_GENERAL_POST_TITLE"); ?>\" onchange=\"checkTitle()\" onkeyup=\"firstChange()\" /><span class=\"help-inline\"><?php getlang("LANG_ADMIN_DEFAULT_GENERAL_HELP_FILL_OUT"); ?></span></div>");
		}else{
			// Enable the publish and save button
			disableButton = false;
			
			$("#control-group-title").html("<div class=\"control-group\" id=\"title\"><div class=\"controls\"><input class=\"span3\" name=\"title\" type=\"text\" placeholder=\"<?php getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_GENERAL_POST_TITLE"); ?>\" onchange=\"checkTitle()\" onkeyup=\"firstChange()\" /></div>");
		}
		
		document.editpost.title.value = titleValue;
		
		checkButton();
	}
</script>
<div class="post-header">
	<h1><?php getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_EDIT_POST_HEADING"); ?></h1>
</div>
<hr>
<form action="<?php echo $sys["general"]["urlroot"]; ?>admin/content/editpost2.php?id=<?php echo $_GET["id"]; ?>" method="post" name="editpost">
	<div class="row">
		<div class="span8">
			<div id="message"></div>
			<div id="control-group-title">
				<div class="control-group" id="title">
					<div class="controls">
						<input class="span3" name="title" type="text" value="<?php echo $result["title"]; ?>" for="title" onchange="checkTitle()" onkeyup="firstChange()" />
					</div>
				</div>
			</div>
			<div id="control-group-permlink">
				<div class="control-group" id="title">
					<div class="controls">
						<input class="span3" name="permlink" type="text" value="<?php echo $result["permlink"]; ?>" for="title" onchange="checkPermlink()" onkeyup="firstChange()" />
					</div>
				</div>
			</div>
			<label><?php getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_GENERAL_POST_CONTENT"); ?></label>
			<textarea name="content" type="text" class="tinymce"><?php echo $result["content"]; ?></textarea>
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
							<b>Soll dieser Inhalt als Seite verwendet werden?</b>
							<?php
								if($result["page"] == 1){
									echo "<label class=\"radio\"><input type=\"radio\" name=\"page\" value=\"1\" checked=\"checked\">Ja</label>";
									echo "<label class=\"radio\"><input type=\"radio\" name=\"page\" value=\"0\">Nein</label>";
								}else{
									echo "<label class=\"radio\"><input type=\"radio\" name=\"page\" value=\"1\">Ja</label>";
									echo "<label class=\"radio\"><input type=\"radio\" name=\"page\" value=\"0\" checked=\"checked\">Nein</label>";
								}
							?>
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
							<?php $category->showliststyle(0, $_GET["id"]); ?>
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