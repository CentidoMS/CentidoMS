<?php
	/**
	 * Post class
	 *
	 * @package CentidoMS
	 */
	
	class post{
		public $db;
		public $sys;
		public $category;
		
		// Add post
		public function add($title, $content, $permlink, $author, $status, $date, $page){
			$alias = $this->autoalias();
			
			$content_file = fopen($this->sys["general"]["abspfathroot"]."contents/posts/".$alias.".php", "w+");
			fwrite($content_file, $content);
			fclose($content_file);
			
			$stmt = $this->db->connection->prepare("INSERT INTO ".$this->sys["mysql"]["prefix"]."posts (`title`, `alias`, `permlink`, `categories`, `author`, `date`, `status`, `page`) VALUES (?, ?, ?, NULL, ?, ?, ?, ?)");
			$stmt->bind_param('sssssii', $title, $alias, $permlink, $author, $date, $status, $page);
			$stmt->execute();
			$stmt->close();
		}
		
		// Edit post
		public function edit($id, $title, $content, $permlink, $status, $post){
			$result = $this->getbyid($id);
			
			$content_file = fopen($this->sys["general"]["abspfathroot"]."contents/posts/".$result["alias"].".php", "w+");
			fwrite($content_file, $content);
			fclose($content_file);
			
			$stmt = $this->db->connection->prepare("UPDATE ".$this->sys["mysql"]["prefix"]."posts SET `title` = ?, `permlink` = ?, `status` = ?, `page` = ? WHERE `id` = ?");
			$stmt->bind_param('ssiii', $title, $permlink, $status, $post, $id);
			$stmt->execute();
			$stmt->close();
		}
		
		// Delete post
		public function del($id){
			$stmt = $this->db->connection->prepare("SELECT `alias` FROM ".$this->sys["mysql"]["prefix"]."posts WHERE `id` = ?");
			$stmt->bind_param('i', $id);
			$stmt->execute();
			$stmt->bind_result($alias);
			$stmt->fetch();
			$stmt->close();
			
			unlink($this->sys["general"]["abspfathroot"]."contents/posts/".$alias.".php");
			
			$stmt = $this->db->connection->prepare("DELETE FROM ".$this->sys["mysql"]["prefix"]."posts WHERE `id` = ?");
			$stmt->bind_param('i', $id);
			$stmt->execute();
			$stmt->close();
		}
		
		// Create a alias for posts
		public function autoalias(){
			$count = 1;
			while($count != 0){
				$result = rand_string(16);
				
				$stmt = $this->db->connection->prepare("SELECT COUNT(*) FROM ".$this->sys["mysql"]["prefix"]."posts WHERE `alias` = ?");
				$stmt->bind_param('s', $result);
				$stmt->execute();
				$stmt->bind_result($count);
				$stmt->fetch();
				$stmt->close();
			}
			
			return $result;
		}
		
		// Get all informations about a post with the id
		public function getbyid($id){
			$stmt = $this->db->connection->prepare("SELECT * FROM ".$this->sys["mysql"]["prefix"]."posts WHERE `id` = ?");
			$stmt->bind_param('i', $id);
			$stmt->execute();
			$stmt->bind_result($result["id"], $result["title"], $result["alias"], $result["permlink"], $result["categories"], $result["author"], $result["date"], $result["status"], $result["page"]);
			$stmt->fetch();
			$stmt->close();
			
			$return["id"] = $result["id"];
			$return["title"] = $result["title"];
			$return["alias"] = $result["alias"];
			$return["permlink"] = $result["permlink"];
			$return["categories"] = $result["categories"];
			$return["author"] = $result["author"];
			$return["date"] = $result["date"];
			$return["status"] = $result["status"];
			$return["page"] = $result["page"];
			$return["content"] = file_get_contents($this->sys["general"]["abspfathroot"]."contents/posts/".$result["alias"].".php");
			
			return $return;
		}
		
		public function getbypermlink($permlink){
			$stmt = $this->db->connection->prepare("SELECT * FROM ".$this->sys["mysql"]["prefix"]."posts WHERE `permlink` = ?");
			$stmt->bind_param('s', $permlink);
			$stmt->execute();
			$stmt->bind_result($result["id"], $result["title"], $result["alias"], $result["permlink"], $result["categories"], $result["author"], $result["date"], $result["status"], $result["page"]);
			$stmt->fetch();
			$stmt->close();
			
			$return["id"] = $result["id"];
			$return["title"] = $result["title"];
			$return["alias"] = $result["alias"];
			$return["permlink"] = $result["permlink"];
			$return["categories"] = $result["categories"];
			$return["author"] = $result["author"];
			$return["date"] = $result["date"];
			$return["status"] = $result["status"];
			$return["page"] = $result["page"];
			$return["content"] = file_get_contents($this->sys["general"]["abspfathroot"]."contents/posts/".$result["alias"].".php");
			
			return $return;
		}
		
		// Add categories
		public function editcategories($categories, $post){
			if($categories[0] != 0){
				$categories = implode(",", $categories);
			}else{
				$categories = "none";
			}
			
			$stmt = $this->db->connection->prepare("UPDATE ".$this->sys["mysql"]["prefix"]."posts SET `categories` = ? WHERE id = ?");
			$stmt->bind_param('si', $categories, $post);
			$stmt->execute();
			$stmt->close();
		}
	}
?>