<?php
	// System load
	include("../sysload.php");
	
	/**
	 * Load all tools for administration
	 *
	 * @package CentidoMS
	 */
	
	if($_SESSION["status"] == 1){
?>
<!DOCTYPE html>
<html lang="de">
	<head>
		<meta charset="utf-8">
		<title>CentidoMS</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Bootstrap -->
		<link href="<?php echo $sys["general"]["urlroot"]; ?>admin/css/bootstrap.min.css" rel="stylesheet" />
		<link href="<?php echo $sys["general"]["urlroot"]; ?>admin/css/bootstrap-responsive.min.css" rel="stylesheet" />
		<link href="<?php echo $sys["general"]["urlroot"]; ?>admin/css/main.css" rel="stylesheet">
		<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	</head>

	<body>
		<div class="container">
			<?php
				// Include the menu
				include("menu.php");
				
				// Content
				if(isset($_GET["page"])){
					$file = includefilter($_GET["page"]);
					include($file);
					unset($file);
				}else{
					include("dashboard.php");
				}
			?>

			<div class="footer">
				<hr>
				<div class="progress progress-striped active" style="width: 100%;">
					<div class="bar" style="width: 0%;"></div>
				</div>
				<hr>
				<p>
					GNU/GPL - CentidoMS Version 0.0.02-Alpha
				</p>
			</div>
		</div>

		<!-- Bootstrap -->
		<script src="<?php echo $sys["general"]["urlroot"]; ?>admin/js/jquery.js"></script>
		<script type="text/javascript" src="<?php echo $sys["general"]["urlroot"]; ?>admin/js/bootstrap.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
							  $(".help").tooltip({
												 container: 'body',
												 });
							  
							  number = 1;
							  time = 9;
							  var progress = setInterval(function() {
														 var $bar = $('.bar');
														 
														 if (number == 100) {
														 clearInterval(progress);
														 $('.progress').removeClass('active');
														 }else if(number == 87){
														 $('.progress').addClass('progress-warning');
														 }else if(number == 93){
														 $('.progress').removeClass('progress-warning');
														 $('.progress').addClass('progress-danger');
														 }
														 
														 var percent = number + "%";
														 $bar.width(percent);
														 if(number == 100){
														 $bar.text("Die Zeit ist abgelaufen!");
														 }else{
														 $bar.text(time + "s/900s");
														 }
														 
														 number = number + 1;
														 time = time + 9;
														 }, 9000);
							  });
							  
		</script>

		<!-- Tinymce -->
		<script type="text/javascript" src="<?php echo $sys["general"]["urlroot"]; ?>admin/js/tinymce/tinymce.min.js"></script>
		<script type="text/javascript" src="<?php echo $sys["general"]["urlroot"]; ?>admin/js/readmore.js"></script>
		<script type="text/javascript">
		tinymce.init({
					selector: "textarea.tinymce",
					 plugins: [
					 "advlist autolink lists link image charmap print preview anchor",
					 "searchreplace visualblocks code fullscreen",
					 "insertdatetime media table contextmenu paste readmore"
					 ],
					 toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | readmore link image",
					 language : "de",
					 schema: "html5",
					 });
		</script>
	</body>
</html>

<?php
	}else{
		if(isset($_GET["page"])){ // Check if the User have a defined destination in the url
			redirect("admin/login.php?redirect=".$_GET["page"]); // Save the destination and redirect to the login
		}else{
			redirect("admin/login.php"); // Redirect to the login
		}
	}
?>
