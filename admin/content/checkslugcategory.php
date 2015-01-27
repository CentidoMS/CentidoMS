<?php
	// System load
	include("../../sysload.php");
	
	/**
	 * Check, if exist the post title
	 *
	 * @package CentidoMS
	 */
	
	$stmt = $db->connection->prepare("SELECT COUNT(*) FROM ".$sys["mysql"]["prefix"]."categories WHERE `slug` = ?");
	$stmt->bind_param('s', $_POST["value"]);
	$stmt->execute();
	$stmt->bind_result($count);
	$stmt->fetch();
	$stmt->close();
	
	if($count == 0){
		echo "true";
	}else{
		if(isset($_POST["valuesaved"])){
			if($_POST["valuesaved"] == $_POST["value"]){
				echo "true";
			}else{
				echo "false";
			}
		}else{
			echo "false";
		}
	}
?>