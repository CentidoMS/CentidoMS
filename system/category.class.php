<?php
	/**
	 * Category class 
	 *
	 * @package CentidoMS
	 */
	
	class category{
		public $sys;
		public $db;
		public $post;
		
		// Add category
		public function add($name, $slug, $higher){
			
			// Calculate new order
			$stmt = $this->db->connection->prepare("SELECT COUNT(*) FROM ".$this->sys["mysql"]["prefix"]."categories WHERE `target` = ?");
			$stmt->bind_param('i', $higher);
			$stmt->execute();
			$stmt->bind_result($count);
			$stmt->fetch();
			$stmt->close();
			$count++;
			
			if($higher != 0){
				
				// Calculate new level
				$stmt = $this->db->connection->prepare("SELECT `level` FROM ".$this->sys["mysql"]["prefix"]."categories WHERE `id` = ?");
				$stmt->bind_param('i', $higher);
				$stmt->execute();
				$stmt->bind_result($level);
				$stmt->fetch();
				$stmt->close();
				$level++;
			}else{
				$level = 0;
			}
			
			if(empty($slug)){
				$slug = nametodir($name);
			}else{
				$slug = nametodir($slug);
			}
			
			$stmt = $this->db->connection->prepare("INSERT INTO ".$this->sys["mysql"]["prefix"]."categories (`level`, `target`, `order`, `name`, `slug`, `default`) VALUES (?, ?, ?, ?, ?, 0)");
			$stmt->bind_param('iiiss', $level, $higher, $count, $name, $slug);			
			$stmt->execute();
			$stmt->close();
		}
		
		// Edit category
		public function edit($id, $name, $slug, $higher){
			$result = $this->getbyid($id);
			
			// Check, if the higher category is changed
			if($higher != $result["target"]){
				// Check, if the category is the highest
				if($higher != 0){
					
					// Calculate new order
					$stmt = $this->db->connection->prepare("SELECT COUNT(*) FROM ".$this->sys["mysql"]["prefix"]."categories WHERE `target` = ?");
					$stmt->bind_param('i', $higher);
					$stmt->execute();
					$stmt->bind_result($count);
					$stmt->fetch();
					$stmt->close();
					$count++;
					
					// Calculate new level
					$stmt = $this->db->connection->prepare("SELECT `level` FROM ".$this->sys["mysql"]["prefix"]."categories WHERE `id` = ?");
					$stmt->bind_param('i', $higher);
					$stmt->execute();
					$stmt->bind_result($level);
					$stmt->fetch();
					$stmt->close();
					$level++;
				}else{
					
					// Calculate new order
					$stmt = $this->db->connection->prepare("SELECT COUNT(*) FROM ".$this->sys["mysql"]["prefix"]."categories WHERE `target` = ?");
					$stmt->bind_param('i', $higher);
					$stmt->execute();
					$stmt->bind_result($count);
					$stmt->fetch();
					$stmt->close();
					$count++;
					
					$level = 0;
				}
			}else{
				$count = $result["order"];
				$level = $result["level"];
			}
			
			if(empty($slug)){
				$slug = nametodir($name);
			}else{
				$slug = nametodir($slug);
			}
			
			$stmt = $this->db->connection->prepare("UPDATE ".$this->sys["mysql"]["prefix"]."categories SET `level` = ?, `target` = ?, `order` = ?, `name` = ?, `slug` = ? WHERE `id` = ?");
			$stmt->bind_param('iiissi', $level, $higher, $count, $name, $slug, $id);
			$stmt->execute();
			$stmt->close();
			
			$stmt = $this->db->connection->prepare("SELECT COUNT(*) FROM ".$this->sys["mysql"]["prefix"]."categories WHERE `target` = ?");
			$stmt->bind_param('i', $result["target"]);
			$stmt->execute();
			$stmt->bind_result($targets);
			$stmt->fetch();
			$stmt->close();
			
			if($targets != 0){
				$output = $this->db->query("SELECT * FROM ".$this->sys["mysql"]["prefix"]."categories WHERE `target` = ".$result["target"]." ORDER BY `order`");
				$result = $this->db->processing($output, "multi");
				
				$count2 = 0;
				$count3 = 1;
				while(isset($result[$count2])){
					$stmt = $this->db->connection->prepare("UPDATE ".$this->sys["mysql"]["prefix"]."categories SET `order` = ? WHERE id = ?");
					$stmt->bind_param('ii', $count3, $result[$count2]["id"]);
					$stmt->execute();
					$stmt->close();
					
					$count2++;
					$count3++;
				}
			}
		}
		
		// Delete category
		public function del($id){
			$result = $this->getbyid($id);
			
			$stmt = $this->db->connection->prepare("SELECT COUNT(*) FROM ".$this->sys["mysql"]["prefix"]."categories WHERE `target` = ?");
			$stmt->bind_param('i', $id);
			$stmt->execute();
			$stmt->bind_result($count);
			$stmt->fetch();
			$stmt->close();
			
			$posts = $this->getarticlesbyid($id);
			
			if($count != 0){
				return 1;
			}elseif(!empty($posts)){
				return 2;
			}elseif($result["default"] == 1){
				return 3;
			}else{
				$this->db->query("DELETE FROM ".$this->sys["mysql"]["prefix"]."categories WHERE `id` = ".$id);
				
				$stmt = $this->db->connection->prepare("SELECT COUNT(*) FROM ".$this->sys["mysql"]["prefix"]."categories WHERE `target` = ?");
				$stmt->bind_param('i', $result["target"]);
				$stmt->execute();
				$stmt->bind_result($targets);
				$stmt->fetch();
				$stmt->close();
				
				if($targets != 0){
					$output = $this->db->query("SELECT * FROM ".$this->sys["mysql"]["prefix"]."categories WHERE `target` = ".$result["target"]." ORDER BY `order`");
					$result = $this->db->processing($output, "multi");
					
					$count2 = 0;
					$count3 = 1;
					while(isset($result[$count2])){
						$stmt = $this->db->connection->prepare("UPDATE ".$this->sys["mysql"]["prefix"]."categories SET `order` = ? WHERE id = ?");
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
		
		// Set category to default
		public function setdefault($id){
			// Set old default category to normal category
			$this->db->query("UPDATE ".$this->sys["mysql"]["prefix"]."categories SET `default` = 0 WHERE `default` = 1");
			
			// Set new default category
			$stmt = $this->db->connection->prepare("UPDATE ".$this->sys["mysql"]["prefix"]."categories SET `default` = 1 WHERE id = ?");
			$stmt->bind_param('i', $id);
			$stmt->execute();
			$stmt->close();
		}
		
		// Get all articles in the same category
		public function getarticlesbyid($id){
			$return = array_keys($this->sys["categories"][$id], true);
			
			return $return;
		}
		
		// Get category informations with id
		public function getbyid($id){
			$stmt = $this->db->connection->prepare("SELECT * FROM ".$this->sys["mysql"]["prefix"]."categories WHERE `id` = ?");
			$stmt->bind_param('i', $id);
			$stmt->execute();
			$stmt->bind_result($result["id"], $result["level"], $result["target"], $result["order"], $result["name"], $result["slug"], $result["default"]);
			$stmt->fetch();
			$stmt->close();
			
			return $result;
		}
		
		// Get category informations with slug
		public function getbyslug($slug){
			$stmt = $this->db->connection->prepare("SELECT * FROM ".$this->sys["mysql"]["prefix"]."categories WHERE `slug` = ?");
			$stmt->bind_param('s', $slug);
			$stmt->execute();
			$stmt->bind_result($result["id"], $result["level"], $result["target"], $result["order"], $result["name"], $result["slug"], $result["default"]);
			$stmt->fetch();
			$stmt->close();
			
			return $result;
		}
		
		// Get id by slug
		public function getslugbyid($id){
			$stmt = $this->db->connection->prepare("SELECT `slug` FROM ".$this->sys["mysql"]["prefix"]."categories WHERE `id` = ?");
			$stmt->bind_param('i', $id);
			$stmt->execute();
			$stmt->bind_result($result);
			$stmt->fetch();
			$stmt->close();
			
			return $result;
		}
		
		// Return a list with all categories in blocks (Radio selection)
		public function showblockstyle($target = 0, $id = "none"){
			$countcategory = $this->db->count("SELECT COUNT(*) FROM ".$this->sys["mysql"]["prefix"]."categories WHERE `target` = ".$target."");
			
			if($countcategory != 0){
				$output = $this->db->query("SELECT * FROM ".$this->sys["mysql"]["prefix"]."categories WHERE `target` = ".$target." ORDER BY `order`");
				$result = $this->db->processing($output, "multi");
			
				echo "<ul class=\"categorybox\">";
			
				$count = 0;
				while(isset($result[$count])){
					echo "<li>";
					echo "<label class=\"radio\">";
					if($result[$count]["id"] == $id){
						echo "<input type=\"radio\" name=\"category\" onchange=\"selectedCategory(".$result[$count]["id"].")\" checked=\"checked\" />";
					}else{
						echo "<input type=\"radio\" name=\"category\" onchange=\"selectedCategory(".$result[$count]["id"].")\" />";
					}
					echo $result[$count]["name"];
					if($result[$count]["default"] == 1){
						echo "<span class=\"muted\"> -- ".getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_GENERAL_CATEGORY_DEFAULT_CATEGORY", false)."</span>";
					}
					echo "</label>";
					echo "</li>";
					$this->showblockstyle($result[$count]["id"], $id);
					$count++;
				}
				echo "</ul>";
			}
		}
		
		// Return a list with all categories (Checkbox selection)
		public function showliststyle($target = 0, $id = "none"){
			
			$countcategory = $this->db->count("SELECT COUNT(*) FROM ".$this->sys["mysql"]["prefix"]."categories WHERE `target` = ".$target."");
			
			if($id != "none"){
				$stmt = $this->db->connection->prepare("SELECT `categories` FROM ".$this->sys["mysql"]["prefix"]."posts WHERE `id` = ?");
				$stmt->bind_param('i', $id);
				$stmt->execute();
				$stmt->bind_result($checkedcategories);
				$stmt->fetch();
				$stmt->close();
				
				$categories = explode(",", $checkedcategories);
			}else{
				$categories = "none";
			}
			
			if($countcategory != 0){
				$output = $this->db->query("SELECT * FROM ".$this->sys["mysql"]["prefix"]."categories WHERE `target` = ".$target." ORDER BY `order`");
				$result = $this->db->processing($output, "multi");
				
				echo "<ul class=\"category\">";
			
				$count = 0;
				while(isset($result[$count])){
					echo "<li>";
					echo "<label class=\"checkbox\">";
					if($id != "none"){
						if(!in_array($result[$count]["id"], $categories, true)){
							echo "<input type=\"checkbox\" name=\"category[]\" value=\"".$result[$count]["id"]."\" />";
						}else{
							echo "<input type=\"checkbox\" name=\"category[]\" value=\"".$result[$count]["id"]."\" checked=\"checked\" />";
						}
					}else{
						echo "<input type=\"checkbox\" name=\"category[]\" value=\"".$result[$count]["id"]."\" />";
					}
					echo $result[$count]["name"];
					echo "</label>";
					echo "</li>";
					$this->showliststyle($result[$count]["id"], $id);
					$count++;
				}
				echo "</ul>";
			}
		}
		
		// Return a list with all categories (Select list selection)
		public function showselectstyle($target = 0, $selected = 0, $name = "higher"){
			if($target == 0){
				echo "<select name=\"".$name."\">";
				echo "<option value=\"0\">---</option>";
			}
			
			$countcategory = $this->db->count("SELECT COUNT(*) FROM ".$this->sys["mysql"]["prefix"]."categories WHERE `target` = ".$target."");
			
			if($countcategory != 0){
				$output = $this->db->query("SELECT * FROM ".$this->sys["mysql"]["prefix"]."categories WHERE `target` = ".$target." ORDER BY `order`");
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
					$this->showselectstyle($result[$count]["id"], $selected);
					$count++;
				}
			}
			
			if($target == 0){
				echo "</select>";
			}
		}
		
		public function setorder($id, $direction){
			$result = $this->getbyid($id);
			
			$oldorder = $result["order"];
			if($direction == "up"){
				$neworder = $result["order"] - 1;
			}elseif($direction == "down"){
				$neworder = $result["order"] + 1;
			}else{
				echo "Unvalid argument: setOrder([id(int)], [direction('up' OR 'down')])";
			}
			
			$stmt = $this->db->connection->prepare("SELECT `id` FROM ".$this->sys["mysql"]["prefix"]."categories WHERE `target` = ? AND `order` = ?");
			$stmt->bind_param('ii', $result["target"], $neworder);
			$stmt->execute();
			$stmt->bind_result($id2);
			$stmt->fetch();
			$stmt->close();
			
			$stmt = $this->db->connection->prepare("UPDATE ".$this->sys["mysql"]["prefix"]."categories SET `order` = ? WHERE `id` = ?");
			$stmt->bind_param('ii', $neworder, $result["id"]);
			$stmt->execute();
			$stmt->close();
			
			$stmt = $this->db->connection->prepare("UPDATE ".$this->sys["mysql"]["prefix"]."categories SET `order` = ? WHERE `id` = ?");
			$stmt->bind_param('ii', $oldorder, $id2);
			$stmt->execute();
			$stmt->close();
		}
	}
?>