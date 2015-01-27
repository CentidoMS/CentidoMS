<?php
	// System load
	include("../sysload.php");
	
	/**
	 * Login
	 *
	 * @package CentidoMS
	 */
	
	if(isset($_GET["redirect"])){ // Check if the User have a defined destination
		$redirect = "?redirect=".$_GET["redirect"]; // Save the destination in a variable
	}else{
		$redirect = "";
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>CentidoMS</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Le styles -->
		<link href="css/bootstrap.min.css" rel="stylesheet" />
		<link href="css/bootstrap-responsive.min.css" rel="stylesheet" />
		<link href="css/login.css" rel="stylesheet" />
		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		<script src="../assets/js/html5shiv.js"></script>
		<![endif]-->
	</head>

	<body>
		<div class="container">
			<div class="span4">
			</div>
			<div class="span4 marginleftnone">
			<?php
				if(isset($_GET["message"])){
					switch($_GET["message"]){
						case 0:
							echo "<div class=\"alert alert-success \">";
							getlang("LANG_ADMIN_DEFAULT_LOGIN_MESSAGE_LOGOUT_SUCCESFULL");
							echo "</div>";
							break;
				
						case 1:
							echo "<div class=\"alert alert-error\">";
							getlang("LANG_ADMIN_DEFAULT_LOGIN_MESSAGE_LOGIN_FAILED");
							echo "</div>";
							break;
							
						case 2:
							echo "<div class=\"alert alert-error\">";
							getlang("LANG_ADMIN_DEFAULT_LOGIN_MESSAGE_SESSION_EXPIRED");
							echo "</div>";
							break;
					}
				}
			?>
			</div>
			<div class="span4">
			</div>
			<form class="form-signin" action="<?php echo $sys['general']['urlroot']; ?>admin/auth.php<?php echo $redirect; ?>" method="post">
				<h2 class="form-signin-heading">CentidoMS</h2>
				<label><?php getlang("LANG_ADMIN_DEFAULT_LOGIN_USERNAME"); ?></label>
				<input name="username" type="text" class="input-block-level" placeholder="Benutzername" />
				<label><?php getlang("LANG_ADMIN_DEFAULT_LOGIN_PASSWORD"); ?></label>
				<input name="pass" type="password" class="input-block-level" placeholder="Passwort" />
				<button class="btn btn-primary right marginbottom" type="submit"><?php getlang("LANG_ADMIN_DEFAULT_LOGIN_SIGNIN"); ?></button>
			</form>
		</div>

		<!-- Placed at the end of the document so the pages load faster -->
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>
<?php
	unset($redirect); // Empty the Variable with the destination
?>