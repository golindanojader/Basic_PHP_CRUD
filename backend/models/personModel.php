<?php 


require_once "connection.php";

class personModel{

	/*____________________________________________________/
	/*SAVE REGISTER PERSON*/
	/*____________________________________________________*/
	 static public function createPersonRegisterModel($dataModel, $table){

	 	$query = bdConnection::connect()->prepare("INSERT INTO $table(document, 
	 																															fechanac, 
	 																															estatura, 
	 																															peso, 
	 																															edad, 
	 																															tiposangre, 
	 																															nombresyapellidos,
	 																															 direccion, foto) 
	 																															 VALUES(
	 																															 :document, 
	 																															 :fechanac,
	 																															  :estatura, 
	 																															  :peso, 
	 																															  :edad, 
	 																															  :tiposangre, 
	 																															  :nombresyapellidos, 
	 																															  :direccion, :foto)") ;
		$query -> bindParam(":document", $dataModel["document"], PDO::PARAM_STR);
		$query -> bindParam(":fechanac", $dataModel["fechanac"], PDO::PARAM_STR);
		$query -> bindParam(":estatura", $dataModel["estatura"], PDO::PARAM_INT);
		$query -> bindParam(":peso", $dataModel["peso"], PDO::PARAM_INT);
		$query -> bindParam(":edad", $dataModel["edad"], PDO::PARAM_INT);
		$query -> bindParam(":tiposangre", $dataModel["tiposangre"], PDO::PARAM_STR);
		$query -> bindParam(":nombresyapellidos", $dataModel["nombresyapellidos"], PDO::PARAM_STR);
		$query -> bindParam(":direccion", $dataModel["direccion"], PDO::PARAM_STR);
		$query -> bindParam(":foto", $dataModel["foto"], PDO::PARAM_STR);


if ($query -> execute()) {
	
	return 1;

			}else{

				return 0;
			}

			$query -> close();

			$query = null;
	 }

	  /*____________________________________________________/
	/*FIND PERSON*/
	/*____________________________________________________*/
	  static public function findPersonModel($dataModel, $table){

	  	$query = bdConnection::connect()->prepare("SELECT document, fechaReg, fechanac, estatura, peso, edad, tiposangre, nombresyapellidos, direccion, foto FROM $table WHERE document = :document" );
	  	$query -> bindParam(":document", $dataModel, PDO::PARAM_STR);
	  	$query->execute();

	  	return $query->fetch();
	  	
	  	$query->close();

	  	
	  
}

	  /*____________________________________________________/
	/*DELETE PERSON*/
	/*____________________________________________________*/

	 static public function deletePersonModel($dataModel, $table){

	 	$query = bdConnection::connect()->prepare("DELETE FROM $table WHERE document = $dataModel");


		if ($query->execute()) {

			return 1;
			
		}else{

			return 0;
		}

			$query -> close();

			$query = null;

	 }
	  /*____________________________________________________/
	/*EDIT PERSON*/
	/*____________________________________________________*/
	  static public function editPersonController($dataModel, $table){

	  	$query = bdConnection::connect()->prepare("UPDATE $table SET nombresyapellidos=:nombresyapellidos,
	  																															direccion=:direccion, 
	  																															fechanac=:fechanac, 
	  																															estatura=:estatura, 
	  																															peso=:peso,
	  																															edad=:edad, 
	  																															tiposangre=:tiposangre,
	  																															 foto=:foto 
	  																															 WHERE document=:document");

	  	  	$query -> bindParam(":document", $dataModel["document"], PDO::PARAM_STR);
	  	  	$query -> bindParam(":nombresyapellidos", $dataModel["nombresyapellidos"], PDO::PARAM_STR);
	  	  	$query -> bindParam(":direccion", $dataModel["direccion"], PDO::PARAM_STR);
	  	  	$query -> bindParam(":fechanac", $dataModel["fechanac"], PDO::PARAM_STR);
	  	  	$query -> bindParam(":estatura", $dataModel["estatura"], PDO::PARAM_INT);
	  	    $query -> bindParam(":peso", $dataModel["peso"], PDO::PARAM_INT);
	  	  	$query -> bindParam(":edad", $dataModel["edad"], PDO::PARAM_INT);
	  	  	$query -> bindParam(":tiposangre", $dataModel["tiposangre"], PDO::PARAM_STR);
	  	  	$query -> bindParam(":foto", $dataModel["foto"], PDO::PARAM_STR);


	  	 if ($query->execute()) {

			return 1;
			
		}else{

			return 0;
		}

			$query -> close();

			$query = null;

	  }


}