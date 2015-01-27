<?php
	/**
	 * Menu class
	 *
	 * @package CentidoMS
	 */
	
	class menu{
		public $db;
		public $sys;
		public $post;
		public $categories;
		
		public function addmenu($name){
			$stmt = $this->db->connection->prepare("INSERT INTO ".$this->sys["mysql"]["prefix"]."menus (`name`, `position`, `htmlid`, `htmlclasses`) VALUES (?, 'none', 'none', 'none')");
			$stmt->bind_param('s', $name);
			$stmt->execute();
			$stmt->close();
			
			$table = $this->sys["mysql"]["prefix"]."menu_".$name;

			$stmt = $this->db->connection->prepare("CREATE TABLE ".$table." (
												   `id` int(8) NOT NULL auto_increment,
												   `level` int(8) NOT NULL,
												   `target` int(8) NOT NULL,
												   `order` int(8) NOT NULL,
												   `name` varchar(256) NOT NULL,
												   `value` varchar(256) NOT NULL,
												   `type` varchar (64) NOT NULL,
												   PRIMARY KEY (`id`) );");
			$stmt->execute();
			$stmt->close();
		}
		
		public function editmenu($menuid, $newname, $position, $htmlid, $htmlclasses){
			$menu = $this->getmenuname($menuid);
			
			if($htmlid == ""){
				$htmlid = "none";
			}
			
			if($htmlclasses == ""){
				$htmlclasses = "none";
			}
			
			$stmt = $this->db->connection->prepare("UPDATE ".$this->sys["mysql"]["prefix"]."menus SET `name` = ?, `position` = ?, `htmlid` = ?, `htmlclasses` = ? WHERE `id` = ?");
			$stmt->bind_param('ssssi', $newname, $position, $htmlid, $htmlclasses, $menuid);
			$stmt->execute();
			$stmt->close();
			
			$stmt = $this->db->connection->prepare("RENAME TABLE ".$this->sys["mysql"]["prefix"]."menu_".$menu." TO ".$this->sys["mysql"]["prefix"]."menu_".$newname."");
			$stmt->execute();
			$stmt->close();
		}
		
		public function delmenu($menuid){
			$menu = $this->getmenuname($menuid);
			
			$stmt = $this->db->connection->prepare("DELETE FROM ".$this->sys["mysql"]["prefix"]."menus WHERE `id` = ?");
			$stmt->bind_param('i', $menuid);
			$stmt->execute();
			$stmt->close();
			
			$stmt = $this->db->connection->prepare("DROP TABLE ".$this->sys["mysql"]["prefix"]."menu_".$menu."");
			$stmt->execute();
			$stmt->close();
		}
		
		public function getitembyid($menuid, $itemid){
			$menu = $this->getmenuname($menuid);
			
			$stmt = $this->db->connection->prepare("SELECT * FROM ".$this->sys["mysql"]["prefix"]."menu_".$menu." WHERE `id` = ?");
			$stmt->bind_param('i', $itemid);
			$stmt->execute();
			$stmt->bind_result($result["id"], $result["level"], $result["target"], $result["order"], $result["name"], $result["value"], $result["type"]);
			$stmt->fetch();
			$stmt->close();
			
			return $result;
		}

		public function additem($menuid, $higher, $name, $value, $type){
			$menu = $this->getmenuname($menuid);
			
			// Calculate new order
			$stmt = $this->db->connection->prepare("SELECT COUNT(*) FROM ".$this->sys["mysql"]["prefix"]."menu_".$menu." WHERE `target` = ?");
			$stmt->bind_param('i', $higher);
			$stmt->execute();
			$stmt->bind_result($count);
			$stmt->fetch();
			$stmt->close();
			$count++;
			
			if($higher != 0){
				
				// Calculate new level
				$stmt = $this->db->connection->prepare("SELECT `level` FROM ".$this->sys["mysql"]["prefix"]."menu_".$menu." WHERE `id` = ?");
				$stmt->bind_param('i', $higher);
				$stmt->execute();
				$stmt->bind_result($level);
				$stmt->fetch();
				$stmt->close();
				$level++;
			}else{
				$level = 0;
			}
			
			$stmt = $this->db->connection->prepare("INSERT INTO ".$this->sys["mysql"]["prefix"]."menu_".$menu." (`level`, `target`, `order`, `name`, `value`, `type`) VALUES (?, ?, ?, ?, ?, ?)");
			$stmt->bind_param('iiisss', $level, $higher, $count, $name, $value, $type);
			$stmt->execute();
			$stmt->close();
		}
		
		public function edititem($menuid, $itemid, $higher, $name, $value){
			$menu = $this->getmenuname($menuid);
			$result = $this->getitembyid($menuid, $itemid);
			
			if($result["target"] != $higher){
				
				// Calculate new order
				$stmt = $this->db->connection->prepare("SELECT COUNT(*) FROM ".$this->sys["mysql"]["prefix"]."menu_".$menu." WHERE `target` = ?");
				$stmt->bind_param('i', $higher);
				$stmt->execute();
				$stmt->bind_result($order);
				$stmt->fetch();
				$stmt->close();
				$order++;
				
				if($higher != 0){
					// Calculate new level
					$stmt = $this->db->connection->prepare("SELECT `level` FROM ".$this->sys["mysql"]["prefix"]."menu_".$menu." WHERE `id` = ?");
					$stmt->bind_param('i', $higher);
					$stmt->execute();
					$stmt->bind_result($level);
					$stmt->fetch();
					$stmt->close();
					$level++;
				}else{
					$level = 0;
				}
			}else{
				$order = $result["order"];
				$level = $result["level"];
			}
			
			$stmt = $this->db->connection->prepare("UPDATE ".$this->sys["mysql"]["prefix"]."menu_".$menu." SET `level` = ?, `target` = ?, `order` = ?, `name` = ?, `value` = ? WHERE `id` = ?");
			$stmt->bind_param('iiissi', $level, $higher, $order, $name, $value, $itemid);
			$stmt->execute();
			$stmt->close();
			
			$stmt = $this->db->connection->prepare("SELECT COUNT(*) FROM ".$this->sys["mysql"]["prefix"]."menu_".$menu." WHERE `target` = ?");
			$stmt->bind_param('i', $result["target"]);
			$stmt->execute();
			$stmt->bind_result($targets);
			$stmt->fetch();
			$stmt->close();
			
			if($targets != 0){
				$output = $this->db->query("SELECT * FROM ".$this->sys["mysql"]["prefix"]."menu_".$menu." WHERE `target` = ".$result["target"]." ORDER BY `order`");
				$result = $this->db->processing($output, "multi");
				
				$count2 = 0;
				$count3 = 1;
				while(isset($result[$count2])){
					$stmt = $this->db->connection->prepare("UPDATE ".$this->sys["mysql"]["prefix"]."menu_".$menu." SET `order` = ? WHERE id = ?");
					$stmt->bind_param('ii', $count3, $result[$count2]["id"]);
					$stmt->execute();
					$stmt->close();
					
					$count2++;
					$count3++;
				}
			}
		}
		
		// Delete item
		public function delitem($menuid, $itemid){
			$menu = $this->getmenuname($menuid);
			$result = $this->getitembyid($menuid, $itemid);
			
			$stmt = $this->db->connection->prepare("SELECT COUNT(*) FROM ".$this->sys["mysql"]["prefix"]."menu_".$menu." WHERE `target` = ?");
			$stmt->bind_param('i', $itemid);
			$stmt->execute();
			$stmt->bind_result($count);
			$stmt->fetch();
			$stmt->close();
			
			if($count != 0){
				return 1;
			}else{
				$stmt = $this->db->connection->prepare("DELETE FROM ".$this->sys["mysql"]["prefix"]."menu_".$menu." WHERE `id` = ?");
				$stmt->bind_param('i', $itemid);
				$stmt->execute();
				$stmt->close();
				
				$stmt = $this->db->connection->prepare("SELECT COUNT(*) FROM ".$this->sys["mysql"]["prefix"]."menu_".$menu." WHERE `target` = ?");
				$stmt->bind_param('i', $result["target"]);
				$stmt->execute();
				$stmt->bind_result($targets);
				$stmt->fetch();
				$stmt->close();
				
				if($targets != 0){
					$output = $this->db->query("SELECT * FROM ".$this->sys["mysql"]["prefix"]."menu_".$menu." WHERE `target` = ".$result["target"]." ORDER BY `order`");
					$result = $this->db->processing($output, "multi");
					
					$count2 = 0;
					$count3 = 1;
					while(isset($result[$count2])){
						$stmt = $this->db->connection->prepare("UPDATE ".$this->sys["mysql"]["prefix"]."menu_".$menu." SET `order` = ? WHERE id = ?");
						$stmt->bind_param('ii', $count3, $result[$count2]["id"]);
						$stmt->execute();
						$stmt->close();
						
						$count2++;
						$count3++;
					}
				}
				
				return 0;
			}
		}
		
		public function getmenuname($menuid){
			$stmt = $this->db->connection->prepare("SELECT `name` FROM ".$this->sys["mysql"]["prefix"]."menus WHERE `id` = ?");
			$stmt->bind_param('i', $menuid);
			$stmt->execute();
			$stmt->bind_result($name);
			$stmt->fetch();
			$stmt->close();
			
			return $name;
		}
		
		public function getmenubyid($menuid){
			$stmt = $this->db->connection->prepare("SELECT `name`, `position`, `htmlid`, `htmlclasses` FROM ".$this->sys["mysql"]["prefix"]."menus WHERE `id` = ?");
			$stmt->bind_param('i', $menuid);
			$stmt->execute();
			$stmt->bind_result($return["name"], $return["position"], $return["htmlid"], $return["htmlclasses"]);
			$stmt->fetch();
			$stmt->close();
			
			return $return;
		}
		
		// Return a list with all items in blocks (Radio selection)
		public function showblockstyle($menuid, $target = 0, $selectedid = "none"){
			$menu = $this->getmenuname($menuid);
			
			$countmenu = $this->db->count("SELECT COUNT(*) FROM ".$this->sys["mysql"]["prefix"]."menu_".$menu." WHERE `target` = ".$target."");
			
			if($countmenu != 0){
				$output = $this->db->query("SELECT * FROM ".$this->sys["mysql"]["prefix"]."menu_".$menu." WHERE `target` = ".$target." ORDER BY `order`");
				$result = $this->db->processing($output, "multi");
				
				echo "<ul class=\"menubox\">";
				
				$count = 0;
				while(isset($result[$count])){
					echo "<li>";
					echo "<label class=\"radio\">";
					if($result[$count]["id"] == $selectedid){
						echo "<input type=\"radio\" name=\"category\" onchange=\"selectedItem(".$result[$count]["id"].")\" checked=\"checked\" />";
					}else{
						echo "<input type=\"radio\" name=\"category\" onchange=\"selectedItem(".$result[$count]["id"].")\" />";
					}
					echo $result[$count]["name"];
					switch($result[$count]["type"]){
						case "category":
							echo "<span class=\"muted\"> -- ".getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_GENERAL_CATEGORY", false)."</span>";
							break;
						case "link":
							echo "<span class=\"muted\"> -- ".getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_MENUS_LINK", false)."</span>";
							break;
					}
					echo "</label>";
					echo "</li>";
					$this->showblockstyle($menuid, $result[$count]["id"], $selectedid);
					$count++;
				}
				echo "</ul>";
			}
		}
		
		// Return a list with all items (Select list selection)
		public function showselectstyle($menuid, $target = 0, $selected = 0){
			$menu = $this->getmenuname($menuid);
			
			if($target == 0){
				echo "<select name=\"higher\">";
				echo "<option value=\"0\">---</option>";
			}
			
			$countcategory = $this->db->count("SELECT COUNT(*) FROM ".$this->sys["mysql"]["prefix"]."menu_".$menu." WHERE `target` = ".$target."");
			
			if($countcategory != 0){
				$output = $this->db->query("SELECT * FROM ".$this->sys["mysql"]["prefix"]."menu_".$menu." WHERE `target` = ".$target." ORDER BY `order`");
				$result = $this->db->processing($output, "multi");
				
				$count = 0;
				while(isset($result[$count])){
					if($selected == $result[$count]["id"]){
						echo "<option value=\"".$result[$count]["id"]."\" selected=\"selected\">";
					}else{
						echo "<option value=".$result[$count]["id"].">";
					}
					
					$count2 = 1;
					while($count2 <= $result[$count]["level"]){
						echo "-";
						$count2++;
					}
					echo $result[$count]["name"];
					echo "</option>";
					$this->showselectstyle($menuid, $result[$count]["id"], $selected);
					$count++;
				}
			}
			
			if($target == 0){
				echo "</select>";
			}
		}
		
		public function setorder($menuid, $itemid, $direction){
			$menu = $this->getmenuname($menuid);
			$result = $this->getitembyid($menuid, $itemid);
			
			$oldorder = $result["order"];
			if($direction == "up"){
				$neworder = $result["order"] - 1;
			}elseif($direction == "down"){
				$neworder = $result["order"] + 1;
			}else{
				echo "Unvalid argument: setOrder([id(int)], [direction('up' OR 'down')])";
			}
			
			$stmt = $this->db->connection->prepare("SELECT `id` FROM ".$this->sys["mysql"]["prefix"]."menu_".$menu." WHERE `target` = ? AND `order` = ?");
			$stmt->bind_param('ii', $result["target"], $neworder);
			$stmt->execute();
			$stmt->bind_result($id2);
			$stmt->fetch();
			$stmt->close();
			
			$stmt = $this->db->connection->prepare("UPDATE ".$this->sys["mysql"]["prefix"]."menu_".$menu." SET `order` = ? WHERE `id` = ?");
			$stmt->bind_param('ii', $neworder, $result["id"]);
			$stmt->execute();
			$stmt->close();
			
			$stmt = $this->db->connection->prepare("UPDATE ".$this->sys["mysql"]["prefix"]."menu_".$menu." SET `order` = ? WHERE `id` = ?");
			$stmt->bind_param('ii', $oldorder, $id2);
			$stmt->execute();
			$stmt->close();
		}
	}
?>