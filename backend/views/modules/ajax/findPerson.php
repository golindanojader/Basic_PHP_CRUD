<?php 

require_once "../../../controllers/personController.php";
require_once "../../../models/personModel.php";

class ajax{


	public $personData;

	 public function  findPersonAjax(){


	 	
	 	$data = $this->personData;
	 	$answer = personController::findPersonController($data);
	 	return $answer;
		
	 }
}

if (isset($_POST["buscar"])) {

		$a= new ajax();
		$a ->personData = $_POST["buscar"];
		$a->findPersonAjax();
		
}