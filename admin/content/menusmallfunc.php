<?php
	/**
	 * Give the buttons for order categories
	 *
	 * @package CentidoMS
	 */
	if($user->checkperm("editmenuitem")){
		$menuname = $menu->getmenuname($active);
		$result = $menu->getitembyid($active, $_GET["item"]);
	
		$higherorder = $result["order"] + 1;
	
		$lowerorder = $result["order"] - 1;
	
		$stmt = $db->connection->prepare("SELECT COUNT(*) FROM ".$sys["mysql"]["prefix"]."menu_".$menuname." WHERE `order` = ? AND `target` = ?");
		$stmt->bind_param('ii', $lowerorder, $result["target"]);
		$stmt->execute();
		$stmt->bind_result($countlower);
		$stmt->fetch();
		$stmt->close();
	
		$stmt = $db->connection->prepare("SELECT COUNT(*) FROM ".$sys["mysql"]["prefix"]."menu_".$menuname." WHERE `order` = ? AND `target` = ?");
		$stmt->bind_param('ii', $higherorder, $result["target"]);
		$stmt->execute();
		$stmt->bind_result($counthigher);
		$stmt->fetch();
		$stmt->close();
	
		if($countlower != 0){
			$lower = true;
		}else{
			$lower = false;
		}
	
		if($counthigher != 0){
			$higher = true;
		}else{
			$higher = false;
		}
	
		$helpmessage = getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_MENUS_TOOLTIP_ORDER", false);
		echo "<a class=\"help\" data-placement=\"right\" title=\"".$helpmessage."\">".getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_MENUS_ORDER", false)."</a><br />";
		echo "<p>";
		echo "<form method=\"post\" action=\"".$sys["general"]["urlroot"]."admin/content/setordermenu.php?menu=".$active."&item=".$_GET["item"]."\">";
		if($higher AND $lower){
			echo "<div class=\"btn-group\">";
			echo "<button class=\"btn btn-small\" value=\"up\" name=\"direction\"><i class=\"icon-arrow-up\"></i></button>";
			echo "<button class=\"btn btn-small\" value=\"down\" name=\"direction\"><i class=\"icon-arrow-down\"></i></button>";
			echo "</div>";
		}elseif($higher){
			echo "<div class=\"btn-group\">";
			echo "<button class=\"btn btn-small\" value=\"down\" name=\"direction\"><i class=\"icon-arrow-down\"></i></button>";
			echo "</div>";
		}elseif($lower){
			echo "<div class=\"btn-group\">";
			echo "<button class=\"btn btn-small\" value=\"up\" name=\"direction\"><i class=\"icon-arrow-up\"></i></button>";
			echo "</div>";
		}else{
			getlang("LANG_ADMIN_DEFAULT_CONTENT_MANAGEMENT_MENUS_ORDER_UNREMOVABLE");
		}
		echo "</form>";
		echo "</p>";
	}else{
		error(2, true);
	}
?>