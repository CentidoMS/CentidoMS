<?php
	// System load
	include("../../sysload.php");
	
	/**
	 * Extension installer
	 *
	 * @package CentidoMS
	 */
	
	if($user->checkperm("addextensions")){
		
		if($_FILES["file"]["error"] > 0){
			redirect("admin/index.php?page=extension/installer&message=1");
		}elseif($_FILES["file"]["type"] != "application/zip"){
			redirect("admin/index.php?page=extension/installer&message=2");
		}elseif($_FILES["file"]["size"] > 2097100){
			redirect("admin/index.php?page=extension/installer&message=3");
		}else{
			$filename = explode(".", $_FILES["file"]["name"]);
			
			// Move uploaded file, to the upload directory
			move_uploaded_file($_FILES["file"]["tmp_name"], $sys["general"]["abspfathroot"]."contents/uploads/".$_FILES["file"]["name"]);
			
			// Unzip the uploaded file
			unzip($sys["general"]["abspfathroot"]."contents/uploads/".$_FILES["file"]["name"], $sys["general"]["abspfathroot"]."contents/uploads");
			
			// Check whether the ExtensionInfo-File exists
			if(!file_exists($sys["general"]["abspfathroot"]."contents/uploads/".$filename[0]."/ExtensionInfo.xml")){
				unlink($sys["general"]["abspfathroot"]."contents/uploads/".$_FILES["file"]["name"]);
				del($sys["general"]["abspfathroot"]."contents/uploads/".$filename[0]);
				
				redirect("admin/index.php?page=extension/installer&message=4");
			}
			
			// Read all ExtensionInfo-Contents
			$ExtensionInfo = simplexml_load_file($sys["general"]["abspfathroot"]."contents/uploads/".$filename[0]."/ExtensionInfo.xml");
			
			// Save every information in their own variable
			$ext["name"] = $ExtensionInfo->name;
			$ext["typ"] = $ExtensionInfo->type;
			$ext["vers"] = $ExtensionInfo->version;
			$ext["auth"] = $ExtensionInfo->author;
			$ext["dat"] = $ExtensionInfo->date;
			$ext["lic"] = $ExtensionInfo->license;
			$ext["desc"] = $ExtensionInfo->description;
			$ext["devc"] = $ExtensionInfo->data->info->devcode;
			$ext["updurl"] = $ExtensionInfo->data->info->updateurl;
			$ext["insurl"] = $ExtensionInfo->data->installurl;
			$ext["uniurl"] = $ExtensionInfo->data->uninstallurl;
			$ext["edurl"] = $ExtensionInfo->data->editurl;
			
			// Check whether the extension exists,
			if(is_dir($sys["general"]["abspfathroot"]."contents/".$ext["typ"]."s/".$ext["typ"]."_".$ext["name"]) == true){
				unlink($sys["general"]["abspfathroot"]."contents/uploads/".$_FILES["file"]["name"]);
				del($sys["general"]["abspfathroot"]."contents/uploads/".$filename[0]);
				
				redirect("admin/index.php?page=extension/installer&message=5");
				exit();
			}
			
			// Move the extension to the right place
			$dir = "none";
			$type = "none";
			switch($ext["typ"]){
				case "theme":
					$dir = "themes";
					$type = "theme";
					break;
				case "plugin":
					$dir = "plugins";
					$type = "plugin";
					break;
				case "mod";
					$dir = "mods";
					$type = "mod";
					break;
			}
			copy($sys["general"]["abspfathroot"]."contents/uploads/".$_FILES["file"]["name"], $sys["general"]["abspfathroot"]."contents/".$dir."/".$_FILES["file"]["name"]);
			
			// Delete the files in the upload directory
			unlink($sys["general"]["abspfathroot"]."contents/uploads/".$_FILES["file"]["name"]);
			del($sys["general"]["abspfathroot"]."contents/uploads/".$filename[0]);
			
			// Unzip the extension, unlink the archive and rename the directory with the extension
			unzip($sys["general"]["abspfathroot"]."contents/".$dir."/".$_FILES["file"]["name"], $sys["general"]["abspfathroot"]."contents/".$dir);
			unlink($sys["general"]["abspfathroot"]."contents/".$dir."/".$_FILES["file"]["name"]);
			rename($sys["general"]["abspfathroot"]."contents/".$dir."/".$filename[0], $sys["general"]["abspfathroot"]."contents/".$dir."/".$type."_".$ext["name"]);
			
			// Save the Extension in the database
			switch($type){
				case "theme":
					$count = 0;
					$position = array();
					while(!empty($ExtensionInfo->data->positions->position[$count])){
						$position[] = $ExtensionInfo->data->positions->position[$count];
					
						$count++;
					}
				
					$count = 0;
					$menu = array();
					while(!empty($ExtensionInfo->data->menus->menu[$count])){
						$menu[] = $ExtensionInfo->data->menus->menu[$count];
					
						$count++;
					}
					
					$ext["maurl"] = $ExtensionInfo->data->mainurl;
					$ext["pos"] = implode(",", $position);
					$ext["men"] = implode(",", $menu);
				
					$stmt = $db->connection->prepare("INSERT INTO ".$sys["mysql"]["prefix"].$dir." (`name`, `type`, `version`, `author`, `date`, `license`, `description`, `devcode`, `updateurl`, `installurl`, `uninstallurl`, `mainurl`, `editurl`, `positions`, `menus`, `default`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 0)");
					$stmt->bind_param('sssssssssssssss', $ext["name"], $ext["typ"], $ext["vers"], $ext["auth"], $ext["dat"], $ext["lic"], $ext["desc"], $ext["devc"], $ext["updurl"], $ext["insurl"], $ext["uniurl"], $ext["maurl"], $ext["edurl"], $ext["pos"], $ext["men"]);
					break;
				case "plugin":
					$ext["maurl"] = $ExtensionInfo->data->mainurl;
					
					$stmt = $db->connection->prepare("INSERT INTO ".$sys["mysql"]["prefix"].$dir." (`name`, `type`, `version`, `author`, `date`, `license`, `description`, `devcode`, `updateurl`, `installurl`, `uninstallurl`, `mainurl`, `editurl`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
					$stmt->bind_param('sssssssssssss', $ext["name"], $ext["typ"], $ext["vers"], $ext["auth"], $ext["dat"], $ext["lic"], $ext["desc"], $ext["devc"], $ext["updurl"], $ext["insurl"], $ext["uniurl"], $ext["maurl"], $ext["edurl"]);
					break;
				case "mod":
					$stmt = $db->connection->prepare("INSERT INTO ".$sys["mysql"]["prefix"].$dir." (`name`, `type`, `version`, `author`, `date`, `license`, `description`, `devcode`, `updateurl`, `installurl`, `uninstallurl`, `editurl`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
					$stmt->bind_param('ssssssssssss', $ext["name"], $ext["typ"], $ext["vers"], $ext["auth"], $ext["dat"], $ext["lic"], $ext["desc"], $ext["devc"], $ext["updurl"], $ext["insurl"], $ext["uniurl"], $ext["edurl"]);
					break;
			}
			$stmt->execute();
			$stmt->close();
			
			// Check whether an edit page exists
			if($ext["edurl"] != "none"){
				copy($sys["general"]["abspfathroot"]."contents/".$dir."/".$type."_".$ext["name"]."/".$ext["edurl"], $sys["general"]["abspfathroot"]."admin/extensions/".$type."_".$ext["name"]."/".$ext["edurl"]);
			}
			
			if($ext["insurl"] == "none"){
				redirect("admin/index.php?page=extension/installer&message=0");
			}else{
				redirect("contents/".$dir."/".$type."_".$ext["name"]."/".$ext["insurl"]);
			}
			
		}
	}else{
		error(2, true);
	}
?>