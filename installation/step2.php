<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php getlang("LANG_INSTALLATION_GENERAL_CENTIDOMS_INSTALLATION"); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- CSS -->
    <link href="installation/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">

      /* Sticky footer styles
      -------------------------------------------------- */

      html,
      body {
        height: 100%;
        /* The html and body elements cannot have any padding or margin. */
      }

      /* Wrapper for page content to push down footer */
      #wrap {
        min-height: 100%;
        height: auto !important;
        height: 100%;
        /* Negative indent footer by it's height */
        margin: 0 auto -60px;
      }

      /* Set the fixed height of the footer here */
      #push,
      #footer {
        height: 60px;
      }
      #footer {
        background-color: #1B1B1B;
      }

      /* Lastly, apply responsive CSS fixes as necessary */
      @media (max-width: 767px) {
        #footer {
          margin-left: -20px;
          margin-right: -20px;
          padding-left: 20px;
          padding-right: 20px;
        }
      }



      /* Custom page CSS
      -------------------------------------------------- */
      /* Not required for template or sticky footer method. */

      #wrap > .container {
        padding-top: 60px;
      }
      .container .credit {
        margin: 20px 0;
      }

      code {
        font-size: 80%;
      }

    </style>
    <link href="installation/css/bootstrap-responsive.min.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="installation/js/html5shiv.js"></script>
    <![endif]-->
  </head>

  <body>


    <!-- Part 1: Wrap all page content here -->
    <div id="wrap">

      <!-- Fixed navbar -->
      <div class="navbar navbar-fixed-top navbar-inverse">
        <div class="navbar-inner">
          <div class="container">
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="brand"><?php getlang("LANG_INSTALLATION_GENERAL_CENTIDOMS_INSTALLATION"); ?></a>
            <div class="nav-collapse collapse">
				<ul class="nav">
					<li><a><?php getlang("LANG_INSTALLATION_GENERAL_STEP"); ?> 1</a></li>
					<li class="active"><a><?php getlang("LANG_INSTALLATION_GENERAL_STEP"); ?> 2</a></li>
					<li><a><?php getlang("LANG_INSTALLATION_GENERAL_STEP"); ?> 3</a></li>
					<li><a><?php getlang("LANG_INSTALLATION_GENERAL_STEP"); ?> 4</a></li>
					<li><a><?php getlang("LANG_INSTALLATION_GENERAL_STEP"); ?> 5</a></li>
				</ul>
            </div><!--/.nav-collapse -->
          </div>
        </div>
      </div>

      <!-- Begin page content -->
      <div class="container">
        <div class="page-header">
          <h1><?php getlang("LANG_INSTALLATION_GENERAL_STEP"); ?> 2 - <?php getlang("LANG_INSTALLATION_STEP2_TITLE"); ?></h1>
        </div>
        <p class="lead">
			<?php getlang("LANG_INSTALLATION_STEP2_LEAD"); ?>
		</p>
		<p>
			<?php getlang("LANG_INSTALLATION_STEP2_DESCRIPTION"); ?>
		</p>
		<?php clearstatcache(); ?>
		<div class="row">
			<div class="span3">
				<b>/</b><br />
				<b>index.php</b><br />
				<b>contents/images</b><br />
				<b>contents/mods</b><br />
				<b>contents/plugins</b><br />
				<b>contents/posts</b><br />
				<b>contents/themes</b><br />
				<b>contents/uploads</b><br />
				<b>admin/index.php</b><br />
				<b>admin/extensions</b><br />
				<b>system/database.class.php</b><br />
				<b>system/user.class.php</b><br />
				<b>system/post.class.php</b><br />
				<b>system/system.class.php</b><br />
				<b>system/category.class.php</b><br />
				<b>system/menu.class.php</b><br />
				<b>system/load.class.php</b><br />
			</div>
			<div class="span3">
				<?php checkpermission(getcwd(), "writeable", "0775"); ?>
				<?php checkpermission("_index.php", "readable", "0664"); ?>
				<?php checkpermission("contents/images", "writeable", "0775"); ?>
				<?php checkpermission("contents/mods", "writeable", "0775"); ?>
				<?php checkpermission("contents/plugins", "writeable", "0775"); ?>
				<?php checkpermission("contents/posts", "writeable", "0775"); ?>
				<?php checkpermission("contents/themes", "writeable", "0775"); ?>
				<?php checkpermission("contents/uploads", "writeable", "0775"); ?>
				<?php checkpermission("admin/index.php", "readable", "0664"); ?>
				<?php checkpermission("admin/extensions", "writeable", "0775"); ?>
				<?php checkpermission("system/database.class.php", "readable", "0664"); ?>
				<?php checkpermission("system/user.class.php", "readable", "0664"); ?>
				<?php checkpermission("system/post.class.php", "readable", "0664"); ?>
				<?php checkpermission("system/system.class.php", "readable", "0664"); ?>
				<?php checkpermission("system/category.class.php", "readable", "0664"); ?>
				<?php checkpermission("system/menu.class.php", "readable", "0664"); ?>
				<?php checkpermission("system/load.class.php", "readable", "0664"); ?>
			</div>
			<div class="span6">
			</div>
		</div>
		<div class="form-actions">
			<a href="<?php echo $urlroot ?>index.php?step=2&action=0&lang=<?php echo $_GET["lang"] ?>" class="btn btn-primary"><?php getlang("LANG_INSTALLATION_GENERAL_REFRESH"); ?></a>
			<a href="<?php echo $urlroot ?>index.php?step=3&action=0&lang=<?php echo $_GET["lang"] ?>" class="btn btn-primary pull-right"><?php getlang("LANG_INSTALLATION_GENERAL_NEXT"); ?></a>
		</div>

      </div>

      <div id="push"></div>
    </div>

    <div id="footer">
      <div class="container">
        <p class="muted credit"><?php getlang("LANG_INSTALLATION_GENERAL_FOOTER"); ?></p>
      </div>
    </div>



    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="installation/js/jquery.js"></script>
    <script src="installation/js/bootstrap.min.js"></script>

  </body>
</html>
