<?php
	// System load
	include("../../sysload.php");
	
	/**
	 * Redirect to the selected function
	 *
	 * @package CentidoMS
	 */
	
	if(!isset($_GET["id"])){
		redirect("admin/index.php?page=content/categories&message=3");
	}else{
		if(isset($_POST["btn"])){
			if($user->checkperm("delcategory")){
				$result = $category->del($_GET["id"]);
				switch($result){
					case 0:
						redirect("admin/index.php?page=content/categories&message=1");
						break;
					case 1:
						redirect("admin/index.php?page=content/categories&message=3");
						break;
					case 2:
						redirect("admin/index.php?page=content/categories&message=4");
						break;
					case 3:
						redirect("admin/index.php?page=content/categories&message=5");
						break;
				}
			}else{
				error(2, true);
			}
		}else{
			if($user->checkperm("editcategory")){
				$category->edit($_GET["id"], $_POST["categoryname"], $_POST["slug"], $_POST["higher"]);
				redirect("admin/index.php?page=content/categories&message=2");
			}else{
				error(2, true);
			}
			break;
		}
	}
?>