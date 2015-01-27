<?php
	/**
	 *  System class
	 *
	 * @package CentidoMS
	 */
	
	class system{
		public $sys;
		public $db;
		
		public function readsetting($property){
			$stmt = $this->db->connection->prepare("SELECT `value` FROM ".$this->sys["mysql"]["prefix"]."settings WHERE `property` = ?");
			$stmt->bind_param('s', $property);
			$stmt->execute();
			$stmt->bind_result($value);
			$stmt->fetch();
			$stmt->close();
			
			return $value;
		}
		
		public function writesetting($property, $value){
			$stmt = $this->db->connection->prepare("UPDATE ".$this->sys["mysql"]["prefix"]."settings SET `value`= ? WHERE `property`= ?");
			$stmt->bind_param('ss', $value, $property);
			$stmt->execute();
			$stmt->close();
		}
	}
?>