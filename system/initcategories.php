<?php
	/**
	 * Initialize the categories
	 *
	 * @package CentidoMS
	 */
	
	$output = $db->query("SELECT * FROM ".$sys["mysql"]["prefix"]."categories");
	$result = $db->processing($output, "multi");
	
	$countposts = $db->count("SELECT COUNT(*) FROM ".$sys["mysql"]["prefix"]."posts");
	if($countposts != 0){
		$output2 = $db->query("SELECT * FROM ".$sys["mysql"]["prefix"]."posts");
		$result2 = $db->processing($output2, "multi");
		$noposts = false;
	}else{
		$noposts = true;
	}
	
	$count = 0;
	while(isset($result[$count])){
		$id = $result[$count]["id"];
		
		if($noposts == false){
			$count2 = 0;
			while(isset($result2[$count2])){
				$postcategories = explode(",", $result2[$count2]["categories"]);
				$key = array_search($id, $postcategories);
				if($key !== false){
					$sys["categories"][$result[$count]["id"]][$result2[$count2]["id"]] = true;
				}else{
					$sys["categories"][$result[$count]["id"]][$result2[$count2]["id"]] = false;
				}
			
				$count2++;
			}
		}
		
		$count++;
	}
?>