<?php 

class pageModel{


	 static public function pageRouteModel($dataModel){

if ($dataModel == "home" ||
	$dataModel == "find" ||
	$dataModel == "edit") {

	$module = "views/modules/".$dataModel.".php";

		}elseif ($dataModel == "index") {

			$module = "views/modules/home.php";
			
		}else {
			$module = "views/modules/home.php";
		}
		return $module;
	 }
}