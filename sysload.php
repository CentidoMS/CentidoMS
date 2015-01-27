<?php
	/**
	 * Include all classes
	 *
	 * @package CentidoMS
	 */
	
	// Start PHP-Session
	session_start();
	$logout = false;
	
	// Include all settings
	include("settings.php");
	
	if(!isset($_SESSION["status"])){
		$_SESSION["status"] = 0;
		$_SESSION["lang"] = $sys["general"]["defaultlang"];
	}elseif($_SESSION["status"] == 1){
		// Session expire
		if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 900)) {
			$logout = true;
		}else{
			$_SESSION['LAST_ACTIVITY'] = time();
		}
	}
	
	// Load language
	include("admin/lang/lang_admin_default_".$_SESSION["lang"].".php");
	
	// PHP error setting
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	
	// Include the datebase class
	include("system/database.class.php");
	
	// Include the datebase class
	include("system/system.class.php");
	
	// Include the user class
	include("system/user.class.php");
	
	// Include the article class
	include("system/post.class.php");
	
	// Include the category class
	include("system/category.class.php");
	
	// Include the menu class
	include("system/menu.class.php");
  
  // Include the plugin class
	include("system/plugin.class.php");
  
  // Include the theme class
	include("system/theme.class.php");
  
  // Include the mod class
	include("system/mod.class.php");
	
	// Include the load class
	include("system/load.class.php");
	
	// Include the functions
	include("system/functions.php");
	
	// If session expired
	if($logout){
		session_unset();
		session_destroy();
		
		if(isset($_GET["page"]) AND !empty($_GET["page"])){
			redirect("admin/login.php?message=2&redirect=".$_GET["page"]);
		}else{
		   redirect("admin/login.php?message=2");
		}
		
		exit();
	}
	
	// Initialize the datebase class
	$db = new database();
	$db->connect($sys["mysql"]["host"], $sys["mysql"]["user"], $sys["mysql"]["password"], $sys["mysql"]["db"]); // Make a connection
	
	// Initialize the system class
	$system = new system();
	
	// Initialize the user class
	$user = new user();
	include("system/initgroups.php");
	if(isset($_SESSION["group"])){
		$user->shortcut = $_SESSION["group"];
	}
	
	// Initialize the post class
	$post = new post();
	
	// Initialize the category class
	$category = new category();
	include("system/initcategories.php");
	
	// Initialize the menu class
	$menu = new menu();
  
  // Initialize the plugin class
	$plugin = new plugin();
  
  // Initialize the plugin class
	$theme = new theme();
  
  // Initialize the plugin class
	$mod = new mod();
	
	// Initialize the load class
	$load = new load();
	
	// Give all classes the database connetion
	$user->db = $db;
	$post->db = $db;
	$category->db = $db;
	$system->db = $db;
	$menu->db = $db;
  $plugin->db = $db;
  $theme->db = $db;
  $mod->db = $db;
	$load->db = $db;
	
	// Give all classes the system variable
	$user->sys = $sys;
	$post->sys = $sys;
	$category->sys = $sys;
	$system->sys = $sys;
	$menu->sys = $sys;
  $plugin->sys = $sys;
  $theme->sys = $sys;
  $mod->sys = $sys;
	$load->sys = $sys;
	
	// Give load class some references to other classes
	$load->post = $post;
	$load->category = $category;
	$load->menu = $menu;
?>