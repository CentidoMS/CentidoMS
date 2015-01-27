<?php
	/**
	 * Installation
	 *
	 * @package CentidoMS
	 */
	
	$dir = str_replace("index.php", "", $_SERVER["PHP_SELF"]);
	$abspfath = str_replace("index.php", "", $_SERVER["SCRIPT_FILENAME"]);
	$urlroot = "http://".$_SERVER["HTTP_HOST"].$dir;
	
	if(isset($_GET["lang"])){
		include("installation/lang/lang_installation_".$_GET["lang"].".php");
	}else{
		include("installation/lang/lang_installation_de_DE.php");
	}
	
	function redirect($url){
		global $urlroot;
		header("Location: ".$urlroot.$url);
	}
	
	function getlang($name, $echo = true){
		if(defined($name)){
			if($echo){
				echo constant($name);
			}else{
				return constant($name);
			}
		}else{
			echo "No Translation!";
		}
	}
	
	function checkpermission($pfath, $mode, $recommend){
		switch($mode){
			case "writeable":
				if(is_writable($pfath)){
					echo "<span style=\"color: green\">".substr(sprintf('%o', fileperms($pfath)), -4)." (".getlang("LANG_INSTALLATION_STEP2_RECOMMEND", false).": ".$recommend.")</span><br />";
				}else{
					echo "<span style=\"color: red\">".substr(sprintf('%o', fileperms($pfath)), -4)." (".getlang("LANG_INSTALLATION_STEP2_RECOMMEND", false).": ".$recommend.")</span><br />";
				}
				break;
		
			case "readable":
				if(is_readable($pfath)){
					echo "<span style=\"color: green\">".substr(sprintf('%o', fileperms($pfath)), -4)." (".getlang("LANG_INSTALLATION_STEP2_RECOMMEND", false).": ".$recommend.")</span><br />";
				}else{
					echo "<span style=\"color: red\">".substr(sprintf('%o', fileperms($pfath)), -4)." (".getlang("LANG_INSTALLATION_STEP2_RECOMMEND", false).": ".$recommend.")</span><br />";
				}
				break;
		}
	}
	
	function rand_string($len, $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'){
		$string = '';
		for($i = 0; $i < $len; $i++){
			$pos = rand(0, strlen($chars)-1);
			$string .= $chars{$pos};
		}
		return $string;
	}
	
	if(isset($_GET["step"]) AND !empty($_GET["step"])){
		$step = $_GET["step"];
		$action = $_GET["action"];
	}else{
		$step = 1;
		$action = 0;
	}
	
	switch($step){
		case 1:
			if($action == 0){
				include("installation/step1.php");
			}else{
				redirect("index.php?step=2&action=0&lang=".$_POST["language"]);
			}
			break;
			
		case 2:
			if($action == 0){
				include("installation/step2.php");
			}
			break;
			
		case 3:
			if($action == 0){
				include("installation/step3.php");
			}else{
				include("installation/step3action.php");
				redirect("index.php?step=4&action=0&lang=".$_GET["lang"]);
			}
			break;
			
		case 4:
			if($action == 0){
				include("installation/step4.php");
			}else{
				include("installation/step4action.php");
				redirect("index.php?step=5&action=0&lang=".$_GET["lang"]);
			}
			break;
			
		case 5:
			if($action == 0){
				include("installation/step5.php");
			}else{
				redirect("index.php?step=5&action=0&lang=".$_GET["lang"]);
			}
			break;
	}
?>