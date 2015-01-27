<?php
	/**
	 * Category class 
	 *
	 * @package CentidoMS
	 */
	
	class plugin{
		public $sys;
		public $db;
    
    public function editposition($id, $positions){
      $stmt = $this->db->connection->prepare("DELETE FROM ".$this->sys["mysql"]["prefix"]."load WHERE `plugin` = ?");
      $stmt->bind_param('i', $id);
      $stmt->execute();
      $stmt->close();
      
      if($positions){
        $count = 0;
        while(isset($_POST["positions"][$count])){
          $stmt = $this->db->connection->prepare("INSERT INTO ".$this->sys["mysql"]["prefix"]."load (`plugin`, `position`) VALUES (?, ?)");
          $stmt->bind_param('is', $id, $positions[$count]);
          $stmt->execute();
          $stmt->close();
          
          $count++;
        }
      }
    }
    
    // Get all informations about a plugin with a id
		public function getbyid($id){
			$stmt = $this->db->connection->prepare("SELECT * FROM ".$this->sys["mysql"]["prefix"]."plugins WHERE `id` = ?");
			$stmt->bind_param('i', $id);
			$stmt->execute();
			$stmt->bind_result($result["id"], $result["name"], $result["type"], $result["version"], $result["author"], $result["date"], $result["license"], $result["description"], $result["devcode"], $result["updateurl"], $result["installurl"], $result["uninstallurl"], $result["mainurl"], $result["editurl"]);
			$stmt->fetch();
			$stmt->close();
			
			return $result;
		}
	}
?>