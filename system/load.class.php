<?php
	/**
	 * Load class
	 *
	 * @package CentidoMS
	 */
	
	class load{
		public $db;
		public $sys;
		public $post;
		public $category;
		public $menu;
		public $preview;
		public $system;
		
		// Load position
		public function position($name){
			$count = $this->db->count("SELECT COUNT(*) FROM ".$this->sys["mysql"]["prefix"]."load WHERE `position` = '".$name."'");
			
			if($count != 0){
				$output = $this->db->query("SELECT * FROM ".$this->sys["mysql"]["prefix"]."load WHERE `position` = '".$name."'");
				$result = $this->db->processing($output, "multi");
			
				$count2 = 0;
				while(isset($result[$count2])){
					$stmt = $this->db->connection->prepare("SELECT `name`, `mainurl` FROM ".$this->sys["mysql"]["prefix"]."plugins WHERE `id` = ?");
					$stmt->bind_param('i', $result[$count2]["plugin"]);
					$stmt->execute();
					$stmt->bind_result($name, $mainurl);
					$stmt->fetch();
					$stmt->close();
					
					include($this->sys["general"]["abspfathroot"]."contents/plugins/plugin_".$name."/".$mainurl);
					
					$count2++;
				}
			}
		}
		
		// Load menu
		public function menu($position, $type){
			$stmt = $this->db->connection->prepare("SELECT COUNT(*) FROM ".$this->sys["mysql"]["prefix"]."menus WHERE `position` = ? LIMIT 1");
			$stmt->bind_param('s', $position);
			$stmt->execute();
			$stmt->bind_result($count);
			$stmt->fetch();
			$stmt->close();
			
			if($count == 0){
				echo "Kein Menü ausgewählt";
				return false;
			}
			
			$stmt = $this->db->connection->prepare("SELECT `id` FROM ".$this->sys["mysql"]["prefix"]."menus WHERE `position` = ? LIMIT 1");
			$stmt->bind_param('s', $position);
			$stmt->execute();
			$stmt->bind_result($menuid);
			$stmt->fetch();
			$stmt->close();
			
			switch($type){
				case "ul":
					$this->ulmenu($menuid, 0);
					break;
			}
		}
		
		// Load a menu in ul-lists
		public function ulmenu($menuid, $target = 0){
			$menu = $this->menu->getmenubyid($menuid);
			$ulid = $menu["htmlid"];
			$ulclass = $menu["htmlclasses"];
			
			$countmenu = $this->db->count("SELECT COUNT(*) FROM ".$this->sys["mysql"]["prefix"]."menu_".$menu["name"]." WHERE `target` = ".$target."");
			
			if($countmenu != 0){
				$output = $this->db->query("SELECT * FROM ".$this->sys["mysql"]["prefix"]."menu_".$menu["name"]." WHERE `target` = ".$target." ORDER BY `order`");
				$result = $this->db->processing($output, "multi");
				
				if($ulclass != "none" AND $ulid != "none"){
					echo "<ul id=\"".$ulid."\" class=\"".$ulclass."\">\n";
				}elseif($ulclass != "none" AND $ulid == "none"){
					echo "<ul class=\"".$ulclass."\">\n";
				}elseif($ulclass == "none" AND $ulid != "none"){
					echo "<ul id=\"".$ulid."\">\n";
				}else{
					echo "<ul>\n";
				}
				
				$count = 0;
				while(isset($result[$count])){
					switch($result[$count]["type"]){
						case "category":
							$url = $this->sys["general"]["urlroot"]."index.php?category=".$result[$count]["value"];
							break;
						case "link":
							$url = $result[$count]["value"];
							break;
					}
					echo "<li>\n";
					echo "<a href=\"".$url."\">";
					echo $result[$count]["name"];
					echo "</a>";
					echo "</li>\n";
					$this->ulmenu($menuid, $result[$count]["id"]);
					$count++;
				}
				echo "</ul>\n";
			}
		}
		
		// Load content
		
		public function showcategory($slug){
			$category = $this->category->getbyslug($slug);
			$posts = $this->category->getarticlesbyid($category["id"]);
			
			$posts = array_reverse($posts);
			
			echo "<div class=\"category\">\n";
			echo "<h1>".$category["name"]."</h1>\n";
			if(!empty($posts[0]) AND isset($posts[0])){
				$count = 0;
				$published = 0;
				while(isset($posts[$count])){
					$post = $this->post->getbyid($posts[$count]);
					
					if($post["status"] == 1){
						echo "<h2>".$post["title"]."</h2>\n";
						echo "Autor: ".$post["author"]."<br />\n";
						echo "Erstellt: ".$post["date"]."<br />\n";
				
						$content = explode("[READMORE]", $post["content"]);
						echo $content[0]."\n";
				
						echo "<a class=\"readmore\" href=\"".$this->sys["general"]["urlroot"]."index.php?post=".$post["permlink"]."\">Weiterlesen</a>";
						$published = 1;
					}
				
					$count++;
				}
				echo "</div>\n";
			}elseif(isset($published)){
				if($published == 0){
					echo "Es wurden keine Beitr&auml;ge unter dieser Kategorie gefunden.";
				}else{
					echo "Es wurden keine Beitr&auml;ge unter dieser Kategorie gefunden.";
				}
			}else{
				echo "Es wurden keine Beitr&auml;ge unter dieser Kategorie gefunden.";
			}
		}
		
		public function showpostbyid($id){
			$post = $this->post->getbyid($id);
			
			if($post["status"] == 1){
				echo "<h2>".$post["title"]."</h2>\n";
				echo "Autor: ".$post["author"]."<br />\n";
				echo "Erstellt: ".$post["date"]."<br />\n";
			
				$content = explode("[READMORE]", $post["content"]);
				echo $content[0].$content[1];
			}else{
				echo "<h2>Diese Seite ist noch nicht verf&uuml;gbar.</h2>";
				echo "<a href=\"".$this->sys["general"]["urlroot"]."index.php\">Zur&uuml;ck zur Startseite</a>";
			}
		}
		
		public function showpostbypermlink($permlink){
			$post = $this->post->getbypermlink($permlink);
			
			if($post["status"] == 1){
				echo "<h2>".$post["title"]."</h2>\n";
				echo "Autor: ".$post["author"]."<br />\n";
				echo "Erstellt: ".$post["date"]."<br />\n";
				
				$content = explode("[READMORE]", $post["content"]);
				$count = 0;
				while(isset($content[$count])){
					echo $content[$count];
					
					$count++;
				}
			}else{
				echo "<h2>Diese Seite ist noch nicht verf&uuml;gbar.</h2>";
				echo "<a href=\"".$this->sys["general"]["urlroot"]."index.php\">Zur&uuml;ck zur Startseite</a>";
			}
		}
		
		public function showlatestposts($limit){
			$output = $this->db->query("SELECT `permlink` FROM ".$this->sys["mysql"]["prefix"]."posts WHERE `status` = 1 ORDER BY `id` DESC LIMIT ".$limit);
			$result = $this->db->processing($output, "multi");
			
			$count = 0;
			while(isset($result[$count])){
				$post = $this->post->getbypermlink($result[$count]["permlink"]);
				
				echo "<h2>".$post["title"]."</h2>\n";
				echo "Autor: ".$post["author"]."<br />\n";
				echo "Erstellt: ".$post["date"]."<br />\n";
				
				$content = explode("[READMORE]", $post["content"]);
				echo $content[0]."\n";
				
				echo "<a class=\"readmore\" href=\"".$this->sys["general"]["urlroot"]."index.php?post=".$post["permlink"]."\">Weiterlesen</a>";
				
				$count++;
			}
		}
	}
?>