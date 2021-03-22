<?php 

//  Rutas para el rediccionamiento de la pagina
//  ____________________________________

class pageController{

	 static public function template(){

	 		include "views/template.php";

	 }

	  static public function pageRouteController(){

	  	if (isset($_GET["action"])) {
	  			
	  			$dataController = $_GET["action"];

	  		}else{

	  			$dataController = "index";
	  		}

	  		$answer = pageModel::pageRouteModel($dataController);

	  		include $answer;

	  }
}