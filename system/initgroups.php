<?php
	/**
	 * Initialize the script
	 *
	 * @package CentidoMS
	 */	
	$output = $db->query("SELECT * FROM ".$sys["mysql"]["prefix"]."groups");
	$result = $db->processing($output, "multi");
	
	$output2 = $db->query("SELECT * FROM ".$sys["mysql"]["prefix"]."permissions");
	$result2 = $db->processing($output2, "multi");
	
	$count = 0;
	while(isset($result[$count])){
		$data = $result[$count];
		
		$count2 = 0;
		while(isset($result2[$count2])){
			$sys["groups"][$data["shortcut"]][$result2[$count2]["name"]] = 0;
			$count2++;
		}
		
		$permissions = unserialize($result[$count]["permissions"]);
		$count3 = 0;
		while(isset($permissions[$count3])){
			$sys["groups"][$data["shortcut"]][$permissions[$count3]] = 1;
			$count3++;
		}
		
		$count++;
	}
?>