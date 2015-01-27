<?php
	/**
	 * User class
	 *
	 * @package CentidoMS
	 */
	
	class user{
		public $db;
		public $sys;
		public $shortcut;
		
		// Add a user
		public function adduser($firstname, $lastname, $username, $password, $group, $groupdn, $lang, $mail, $url , $bio){
			$stmt = $this->db->connection->prepare("INSERT INTO ".$this->sys["mysql"]["prefix"]."users (`first_name`, `last_name`, `username`, `password` , `group`, `groupdn`, `lang`, `mail`, `url`, `bio`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
			$stmt->bind_param( 'ssssssssss', $firstname, $lastname, $username, $password, $group, $groupdn, $lang, $mail, $url, $bio);
			$stmt->execute();
			$stmt->close();
		}
		
		// Delete a user
		public function deluser($id){
			$stmt = $this->db->connection->prepare("DELETE FROM ".$this->sys["mysql"]["prefix"]."users WHERE `id` = ?");
			$stmt->bind_param( 'i', $id);
			$stmt->execute();
			$stmt->close();
		}
		
		// Get informations about a user with a id
		public function getuserbyid($id){
			$stmt = $this->db->connection->prepare("SELECT * FROM ".$this->sys["mysql"]["prefix"]."users WHERE `id` = ?");
			$stmt->bind_param('i', $id);
			$stmt->execute();
			$stmt->bind_result($result["id"], $result["first_name"], $result["last_name"], $result["username"], $result["password"], $result["group"], $result["groupdn"], $result["lang"], $result["mail"], $result["url"], $result["bio"]);
			$stmt->fetch();
			$stmt->close();
			
			return $result;
		}
		
		// Edit user
		public function editusersel($id, $select, $value){
			$stmt = $this->db->connection->prepare("UPDATE ".$this->sys["mysql"]["prefix"]."users SET `".$select."` = ? WHERE id = ?");
			$stmt->bind_param('si', $value, $id);
			$stmt->execute();
			$stmt->close();
		}
		
		// Add a group
		public function addgroup($shortcut, $group, $permissions){
			if(isset($permissions)){
				$permissions = serialize($permissions);
			}else{
				$permissions[0] = "none";
				$permissions = serialize($permissions);
			}
			
			$stmt = $this->db->connection->prepare("INSERT INTO ".$this->sys["mysql"]["prefix"]."groups (`shortcut`, `group`, `permissions`) VALUES (?, ?, ?)");
			$stmt->bind_param('sss', $shortcut, $group, $permissions);
			$stmt->execute();
			$stmt->close();
		}
		
		// Delete a group
		public function delgroup($id){
			$stmt = $this->db->connection->prepare("DELETE FROM ".$this->sys["mysql"]["prefix"]."groups WHERE `id` = ?");
			$stmt->bind_param('i', $id);
			$stmt->execute();
			$stmt->close();
		}
		
		// Edit a group
		public function editgroup($id, $permissions){
			if(isset($permissions)){
				$permissions = serialize($permissions);
			}else{
				$permissions[0] = "none";
				$permissions = serialize($permissions);
			}
			
			$stmt = $this->db->connection->prepare("UPDATE ".$this->sys["mysql"]["prefix"]."groups SET `permissions` = ? WHERE `id` = ?");
			$stmt->bind_param('si', $permissions, $id);
			$stmt->execute();
			$stmt->close();
		}
		
		// Get informations about a group with a id
		public function getgroupbyid($id){
			$stmt = $this->db->connection->prepare("SELECT `shortcut`, `group`, `permissions` FROM ".$this->sys["mysql"]["prefix"]."groups WHERE `id` = ?");
			$stmt->bind_param('i', $id);
			$stmt->execute();
			$stmt->bind_result($result["shortcut"], $result["group"], $result["permissions"]);
			$stmt->fetch();
			$stmt->close();
			
			$return["shortcut"] = $result["shortcut"];
			$return["group"] = $result["group"];
			$return["permissions"] = unserialize($result["permissions"]);
			
			return $return;
		}
		
		// Check the permission of the logged in user
		public function checkperm($permission){
			if($this->sys["groups"][$this->shortcut][$permission] == 1 OR $this->shortcut == "superadmin"){
				return true;
			}else{
				return false;
			}
		}
	}
?>