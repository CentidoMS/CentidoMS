<?php
	/**
	 * All general Functions
	 *
	 * @package Jambox
	 */
	
	function includefilter($file){
		$file = strtolower($file);
		$file = preg_replace("/[^a-z0-9\-\/]/i","",$file);
		if($file[0] == "/"){
			$file = substr($file,1);
		}
		$file = $file.".php";
		if(!file_exists($file)){
			$file = "error1.php";
		}
		return $file;
	}
	
	function error($error, $redirect = false){
		$errorstr = (string) $error;
		if($redirect){
			redirect("admin/index.php?page=error".$error."");
		}else{
			include("error".$errorstr.".php");
		}
	}
	
	function zip($sourcePath, $destinationPath){
		$archiv = new ZipArchive();
		$archiv->open($destinationPath, ZipArchive::CREATE);
		$dirIter = new RecursiveDirectoryIterator($sourcePath);
		$iter = new RecursiveIteratorIterator($dirIter);
		
		
		foreach($iter as $element) {
			$dir = str_replace($sourcePath, '', $element->getPath()) . '/';
			if ($element->isDir()) {
				$archiv->addEmptyDir($dir);
			} elseif ($element->isFile()) {
				$file = $element->getPath().'/'.$element->getFilename();
				$fileInArchiv = $dir . $element->getFilename();
				$archiv->addFile($file, $fileInArchiv);
			}
		}
		
		$archiv->close();

	}
	
	function unzip($zip, $unzipto){
		$archive = new ZipArchive;
		if($archive->open($zip) === TRUE){
			$archive->extractTo($unzipto);
			$archive->close();
			return true;
		}else{
			return false;
		}
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
	
	function nametodir($name){
		$name = strtolower($name);
		$name = str_replace(" ", "_", $name);
		$name = str_replace("ä", "ae", $name);
		$name = str_replace("ö", "oe", $name);
		$name = str_replace("ü", "ue", $name);
		
		$name = preg_replace("/[^\w]/si", "@", $name);
		
		return $name;
	}
	
	function redirect($url){
		global $sys;
		header("Location: ".$sys['general']['urlroot'].$url);
	}
	
	function title($title, $centidoms = false){
		if($centidoms){
			$title = "CentidoMS - ".$title;
		}
		
		echo "<script type=\"text/javascript\">document.title=\"".$title."\";</script>";
	}
	
	function rand_string($len, $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'){
		$string = '';
		for($i = 0; $i < $len; $i++){
			$pos = rand(0, strlen($chars)-1);
			$string .= $chars{$pos};
		}
		return $string;
	}
	
	function del($path){
		if(is_dir($path) === true){
			$files = array_diff(scandir($path), array('.', '..'));
			
			// Durch die vorhandenen Dateien laufen
			foreach($files as $file){
				del(realpath($path).'/'.$file);
			}
			return rmdir($path);
		}else if(is_file($path) === true){
			return unlink($path);
		}else{
			return false;
		}
	}
	
	function save_uploadfile($files, $uploaddir){
		$uploadfile = $uploaddir.basename($files["userfile"]["name"]);
		
		if (move_uploaded_file($files["userfile"]["tmp_name"], $uploadfile)) {
			return 0;
		} else {
			return 1;
		}
	}
?>