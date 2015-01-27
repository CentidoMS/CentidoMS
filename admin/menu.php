<?php
	/**
	 * Backend menu
	 *
	 * @package CentidoMS
	 */
?>
<div class="navbar navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			<a class="brand" href="http://www.centidoms.org">CentidoMS</a>
			<div class="nav-collapse collapse">
				<ul class="nav">
					<li><a href="<?php echo $sys['general']['urlroot']."admin/"; ?>index.php"><?php getlang("LANG_ADMIN_DEFAULT_MAINMENU_DASHBOARD"); ?></a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php getlang("LANG_ADMIN_DEFAULT_MAINMENU_CONTENT"); ?><b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li class="nav-header"><?php getlang("LANG_ADMIN_DEFAULT_MAINMENU_POST"); ?></li>
							<?php
								if($user->checkperm("editpost")){
							?>
							<li><a href="<?php echo $sys['general']['urlroot']."admin/"; ?>index.php?page=content/posts"><?php getlang("LANG_ADMIN_DEFAULT_MAINMENU_ALL_POSTS"); ?></a></li>
							<?php
								}
							?>
							<?php
								if($user->checkperm("addpost")){
							?>
							<li><a href="<?php echo $sys['general']['urlroot']."admin/"; ?>index.php?page=content/addpost"><?php getlang("LANG_ADMIN_DEFAULT_MAINMENU_ADD_POST"); ?></a></li>
							<?php
								}
							?>
							<?php
								if($user->checkperm("addcategory")){
							?>
							<li><a href="<?php echo $sys['general']['urlroot']."admin/"; ?>index.php?page=content/categories"><?php getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_GENERAL_CATEGORY_CATEGORIES"); ?></a></li>
							<?php
								}
							?>
							<li class="divider"></li>
							<li class="nav-header"><?php getlang("LANG_ADMIN_DEFAULT_MAINMENU_MENU"); ?></li>
							<?php
								if($user->checkperm("addmenuitem")){
							?>
							<li><a href="<?php echo $sys['general']['urlroot']."admin/"; ?>index.php?page=content/menus"><?php getlang("LANG_ADMIN_DEFAULT_MAINMENU_ALL_MENUS"); ?></a></li>
							<?php
								}
							?>
							<li class="divider"></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php getlang("LANG_ADMIN_DEFAULT_MAINMENU_USER_MANAGEMENT"); ?><b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li class="nav-header"><?php getlang("LANG_ADMIN_DEFAULT_MAINMENU_USER"); ?></li>
							<li><a href="<?php echo $sys['general']['urlroot']."admin/"; ?>index.php?page=user/curuser"><?php getlang("LANG_ADMIN_DEFAULT_MAINMENU_CURRENT_USER"); ?></a></li>
							<?php
								if($user->checkperm("edituser")){
							?>
							<li><a href="<?php echo $sys['general']['urlroot']."admin/"; ?>index.php?page=user/users"><?php getlang("LANG_ADMIN_DEFAULT_MAINMENU_ALL_USERS"); ?></a></li>
							<?php
								}
								
								if($user->checkperm("adduser")){
							?>
							<li><a href="<?php echo $sys['general']['urlroot']."admin/"; ?>index.php?page=user/adduser"><?php getlang("LANG_ADMIN_DEFAULT_MAINMENU_ADD_USER"); ?></a></li>
							<?php
								}
							?>
							<li class="divider"></li>
							<li class="nav-header"><?php getlang("LANG_ADMIN_DEFAULT_MAINMENU_GROUP"); ?></li>
							<?php
								if($user->checkperm("editgroup")){
							?>
							<li><a href="<?php echo $sys['general']['urlroot']."admin/"; ?>index.php?page=user/groups"><?php getlang("LANG_ADMIN_DEFAULT_MAINMENU_ALL_GROUPS"); ?></a></li>
							<?php
								}
								
								if($user->checkperm("addgroup")){
							?>
							<li><a href="<?php echo $sys['general']['urlroot']."admin/"; ?>index.php?page=user/addgroup"><?php getlang("LANG_ADMIN_DEFAULT_MAINMENU_ADD_GROUP"); ?></a></li>
							<?php
								}
							?>
							<li class="divider"></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php getlang("LANG_ADMIN_DEFAULT_MAINMENU_EXTENSIONS"); ?><b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li class="nav-header"><?php getlang("LANG_ADMIN_DEFAULT_MAINMENU_EXTENSIONS"); ?></li>
							<?php
								if($user->checkperm("addextensions")){
							?>
							<li><a href="<?php echo $sys['general']['urlroot']."admin/"; ?>index.php?page=extension/installer"><?php getlang("LANG_ADMIN_DEFAULT_MAINMENU_EXTENSION_INSTALLER"); ?></a></li>
							<?php
								}
							?>
							<li class="divider"></li>
							<li class="nav-header"><?php getlang("LANG_ADMIN_DEFAULT_MAINMENU_PLUGINS"); ?></li>
							<?php
								if($user->checkperm("editextensions")){
							?>
							<li><a href="<?php echo $sys['general']['urlroot']."admin/"; ?>index.php?page=extension/plugins"><?php getlang("LANG_ADMIN_DEFAULT_MAINMENU_ALL_PLUGINS"); ?></a></li>
							<?php
								}
							?>
							<li class="divider"></li>
							<li class="nav-header"><?php getlang("LANG_ADMIN_DEFAULT_MAINMENU_MODS"); ?></li>
							<?php
								if($user->checkperm("editextensions")){
							?>
							<li><a href="<?php echo $sys['general']['urlroot']."admin/"; ?>index.php?page=extension/mods"><?php getlang("LANG_ADMIN_DEFAULT_MAINMENU_ALL_MODS"); ?></a></li>
							<?php
								}
							?>
							<li class="divider"></li>
							<li class="nav-header"><?php getlang("LANG_ADMIN_DEFAULT_MAINMENU_THEMES"); ?></li>
							<?php
								if($user->checkperm("editextensions")){
							?>
							<li><a href="<?php echo $sys['general']['urlroot']."admin/"; ?>index.php?page=extension/themes"><?php getlang("LANG_ADMIN_DEFAULT_MAINMENU_ALL_THEMES"); ?></a></li>
							<?php
								}
							?>
							<li class="divider"></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php getlang("LANG_ADMIN_DEFAULT_MAINMENU_SYSTEM"); ?><b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li class="nav-header"><?php getlang("LANG_ADMIN_DEFAULT_MAINMENU_SYSTEM"); ?></li>
							<?php
								if($user->checkperm("addextensions")){
							?>
							<li><a href="<?php echo $sys['general']['urlroot']."admin/"; ?>index.php?page=system/editsettings"><?php getlang("LANG_ADMIN_DEFAULT_MAINMENU_SETTINGS"); ?></a></li>
							<?php
								}
							?>
							<li class="divider"></li>
						</ul>
					<li>
				</ul>
				<ul class="nav pull-right">
					<li><a href="<?php echo $sys['general']['urlroot']."admin/"; ?>logout.php"><?php getlang("LANG_ADMIN_DEFAULT_MAINMENU_LOG_OUT"); ?></a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<?php
?>