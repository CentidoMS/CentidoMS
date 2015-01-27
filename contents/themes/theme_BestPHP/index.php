<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
<title><?php echo $system->readsetting("sitename"); ?></title>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link href="<?php echo $sys["general"]["themepfath"]; ?>css/style.css" rel="stylesheet">
	</head>
	<body>
		<div id="body">
			<div id="topmenu">
				<?php $load->menu("topmenu", "ul"); ?>
			</div>

			<div id="wrapper">
				<div id="content">
					<?php
						if(isset($_GET["post"])){
							$load->showpostbypermlink($_GET["post"]);
						}elseif(isset($_GET["category"])){
							$load->showcategory($_GET["category"]);
						}elseif($system->readsetting("homepage") != "none"){
							$homepage = $system->readsetting("homepage");
							$load->showpostbypermlink($homepage);
						}else{
							$load->showlatestposts(10);
						}
					?>
				</div>

				<div id="sidebar">
					<p>
						<?php $load->position("sidebar"); ?>
					</p>
				</div>
			
				<div id="widget">
					<?php $load->position("widget"); ?>
				</div>
			
			</div>
		</div>
		<div id="footer">
			GNU/GPL - Design by CentidoMS
		</div>
		
	</body>
</html>