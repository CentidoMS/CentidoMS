<?php
	/**
	 * Category class 
	 *
	 * @package CentidoMS
	 */
	
	class theme{
		public $sys;
		public $db;
    
    // Get all informations about a theme with a id
		public function getbyid($id){
			$stmt = $this->db->connection->prepare("SELECT * FROM ".$this->sys["mysql"]["prefix"]."posts WHERE `id` = ?");
			$stmt->bind_param('i', $id);
			$stmt->execute();
			$stmt->bind_result($result["id"], $result["name"], $result["type"], $result["version"], $result["author"], $result["date"], $result["license"], $result["description"], $result["devcode"], $result["updateurl"], $result["installurl"], $result["uninstallurl"], $result["mainurl"], $result["editurl"]);
			$stmt->fetch();
			$stmt->close();
			
			return $result;
		}
	}
?>