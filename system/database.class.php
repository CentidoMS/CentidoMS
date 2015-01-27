<?php
	/**
	 * Database Class
	 *
	 * @package Jambox
	 */
	
	class database{
		// A variable to save the Information of a connection
		public $connection;
		public $statement;
		
		// A function to make a connection to the database
		public function connect($host, $user, $password, $database){
			$this->connection = mysqli_connect($host, $user, $password, $database);
			if(mysqli_connect_errno() != 0){
				error(3);
			}
		}
		
		// A function to run a query in the database
		public function query($sql){
			$sql = str_replace(";", "", $sql);
			$sql = str_replace("-", "", $sql);
			$result = $this->connection->query($sql);
			return $result;
		}
		
		// A function to process the results to read them in PHP
		public function processing($input, $mode){
			switch($mode){
				case "single":
					$result = $input->fetch_assoc();
					break;
				
				case "multi":
					$count = 0;
					while($row = $input->fetch_assoc()){
						$result[$count] = $row;
						$count++;
					}
					break;
			}
			return $result;
		}
		
		// For count how many of something is in the database
		public function count($sql){
			$output = $this->query($sql);
			$result = $this->processing($output, "single");
			return $result["COUNT(*)"];
		}
	}
?>