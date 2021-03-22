<?php 

class personController{

	public $table = "persona";
	 /*____________________________________________________/
	/*SAVE REGISTER PERSON*/
	/*____________________________________________________*/
	 static public function createPersonRegisterController(){
	 	ob_start();
	 	// sirve para indicarle a PHP que se ha de iniciar el buffering de la salida, es decir, que debe empezar a guardar la salida en un bufer interno, en vez de enviarla al cliente. De modo que, aunque se escriba código HTML con echo o directamente fuera del código PHP, no se enviará al navegador hasta que se ordene explícitamente. O eventualmente, hasta que se acabe el procesamiento de todo el archivo PHP.
	 	// 
	 	//   
	 $table = "persona";
	 if (isset($_POST["documento"]) && 
	 				$_POST["fecha"] && 
	 				$_POST["estatura"] && 
	 				$_POST["peso"] && 
	 				$_POST["edad"] && 
	 				$_POST["tiposangre"] && 
	 				$_POST["nombresyapellidos"] &&
	 				$_POST["direccion"]) {

	 	$photo = $_FILES["foto"]["tmp_name"];

	 	$aleatory = mt_rand(10000,99999); 
	 	$route = "views/img/ " .$aleatory.".jpg";

	 	list($new_width, $new_height)= getimagesize($photo);

	 	$new_width = 292;
	 	$new_height = 336;

	 	$origin = imagecreatefromjpeg($photo);
		$destination = imagecreatetruecolor($new_width, $new_height);
		imagecopyresized($destination,$origin,0,0,0,0,$new_width, $new_height, $new_width, $new_height);

		imagejpeg($destination, $route);

	 	$dataController = array("document" => $_POST["documento"],
	 											  "fechanac"=>	$_POST["fecha"], 
	 											  "estatura"=>$_POST["estatura"], 
	 											  "peso"=>$_POST["peso"], 
	 											  "edad"=>$_POST["edad"], 
	 											  "tiposangre"=>$_POST["tiposangre"],
	 											  "nombresyapellidos"=>$_POST["nombresyapellidos"], 
	 											  "direccion"=>$_POST["direccion"],
	 											  "foto"=>$route);




	  $answer = personModel::createPersonRegisterModel($dataController , $table);

	  if ($answer == 1) {

	 	echo '<script >swal({

						title: "¡Registro exitoso!",
						text: "¡El registro se ha creado exitosamente!",
						type: "success",
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
						},

						function(isConfirm){

							if (isConfirm) {


								window.location = "home";
							}


								});

								</script>';
	  	
	  }else{

	  		echo '<script >swal({

						title: "¡Error en registro!",
						text: "¡El registro no se ha creado, intente nuvamente!",
						type: "error",
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
						},

						function(isConfirm){

							if (isConfirm) {


								window.location = "home";
							}


								});

								</script>';
					  }
	 	
	 		ob_end_flush();
			  }

	 }
		
	 /*____________________________________________________/
	/*FIND PERSON*/
	/*____________________________________________________*/
	  static public function findPersonController($dataAjax){



	  $table = "persona";
	  $dataController = $dataAjax;
	  $answer = personModel::findPersonModel($dataController, $table);
	  $newDate = date("d/m/yy", strtotime($answer["fechaReg"]));
			
			if ($answer!="") {
					
					echo ' 
								<img class="img-responsive" style="margin-right: 250px; width: 150px"src="'.$answer["foto"].'" name="'.$answer["foto"].'">

								<div class="input-group input-group-sm ">	
								<label class="label label-info"><strong>Documento:   </strong>'.$answer["document"].'</label>
								</div>

								<input type="number" class="form-control form-control-sm"  name="document" value="'.$answer["document"].'" required readonly style="display:none">

								<div class="input-group input-group-sm">	
								<label class="label label-info"><strong>Nombres y Apellidos: </strong> '.$answer["nombresyapellidos"].'</label>
								</div>

								<div class="input-group input-group-sm">	
								<label class="label label-info"><strong>Dirección: </strong>  '.$answer["direccion"].'</label>
								</div>	

								<div class="input-group input-group-sm">	
								<label class="label label-info"><strong>Edad:  </strong> '.$answer["edad"].'</label>
								</div>
								
								<div class="input-group input-group-sm">	
								<label class="label label-info"><strong>Tipos de sangre: </strong>  '.$answer["tiposangre"].'</label>
								</div>

								<div class="input-group input-group-sm">	
								<label class="label label-info"><strong>Peso:  </strong> '.$answer["peso"].'</label>
								</div>

								<div class="input-group input-group-sm">	
								<label class="label label-info"><strong>Estatura:  </strong> '.$answer["estatura"].'</label>
								</div>

								<div class="input-group input-group-sm">	
								<label class="label label-info"><strong>Registrad@ el: </strong>  '. $newDate.'</label>
								</div>	

								

								<input  type="submit" class="btn btn-danger" value="Borrar registro">';

			}else{

					 echo '<script >swal({

						title: "Sin registros!",
						text: "¡El documento de identidad no se encuentra registrado!",
						type: "error",
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
						},

						function(isConfirm){

							if (isConfirm) {


								window.location = "find";
							}


								});

								</script>';
			}

	  }

	/*____________________________________________________/
	/*DELTE PERSON*/
	/*____________________________________________________*/
	   static public function deletePersonController(){

	   	if (isset($_POST["document"])) {
	   	ob_start();
	 	// sirve para indicarle a PHP que se ha de iniciar el buffering de la salida, es decir, que debe empezar a guardar la salida en un bufer interno, en vez de enviarla al cliente. De modo que, aunque se escriba código HTML con echo o directamente fuera del código PHP, no se enviará al navegador hasta que se ordene explícitamente. O eventualmente, hasta que se acabe el procesamiento de todo el archivo PHP.
	 	// 
	  $table = "persona";
	  $dataController = $_POST["document"];
	  // BUSCAR DOCUMENTO DE IDENTIDAD PARA BORRAR LA RUTA DE LA IMAGEN
	
	   	$answer = personModel::deletePersonModel($dataController, $table);

	   			if ($answer ==1) {

	   					 echo '<script >swal({

						title: "¡Registro borrado exitosamente!",
						text: "¡El registro se ha borrado de la base de datos!",
						type: "success",
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
						},

						function(isConfirm){

							if (isConfirm) {


								window.location = "find";
							}


								});

								</script>';
	   				
	   			}else{

	   				 echo '<script >swal({

						title: "¡Error al borrar el registro!",
						text: "¡Error al borrar el registro, intente nuevamente!",
						type: "error",
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
						},

						function(isConfirm){

							if (isConfirm) {


								window.location = "find";
							}


								});

								</script>';
	   			}

	   	ob_end_flush();
	   		}

	   }

	/*____________________________________________________/
	/*EDIT PERSON*/
	/*____________________________________________________*/

	    static public function editPersonController(){

	    	if (isset($_POST["document"])) {

	    		$table ="persona";
	    		$dataController = $_POST["document"];


	    		$answer = personModel::findPersonModel($dataController,$table);

	    		if ($answer !="") {
	    			# code...
	
							echo '	

						
							<img style="margin-right: 250px; width: 150px"src="'.$answer["foto"].'" name="'.$answer["foto"].'">

							<div class="input-group input-group-sm mb-3">
							<div class="input-group-prepend">
							<span class="input-group-text" id="inputGroup-sizing-sm">Documento</span>
							</div>
							<input type="text" class="form-control" aria-label="Small" ariadescribedby="inputGroup-sizing-sm" readonly=""  value="'.$answer["document"].'"  name="documentEdit">
							</div>

							<div class="input-group input-group-sm mb-3">
							<div class="input-group-prepend">
							<span class="input-group-text" id="inputGroup-sizing-sm">Nombres y Apellidos</span>
							</div>
							<input type="text" class="form-control" aria-label="Small" ariadescribedby="inputGroup-sizing-sm" value="'.$answer["nombresyapellidos"].'" name="nombresyapellidos" required>
							</div>		

							<div class="input-group input-group-sm mb-3">
							<div class="input-group-prepend">
							<span class="input-group-text" id="inputGroup-sizing-sm">Dirección</span>
							</div>
							<input type="text" class="form-control" aria-label="Small" ariadescribedby="inputGroup-sizing-sm" value="'.$answer["direccion"].'" name="direccion" required>
							</div>	

							<div class="input-group input-group-sm mb-3">
							<div class="input-group-prepend">
							<span class="input-group-text" id="inputGroup-sizing-sm">Fecha de nac.</span>
							</div>
							<input type="date" class="form-control" aria-label="Small" ariadescribedby="inputGroup-sizing-sm" value="'.$answer["fechanac"].'" name="fechanac" required>
							</div>

							<div class="input-group input-group-sm mb-3">
							<div class="input-group-prepend">
							<span class="input-group-text" id="inputGroup-sizing-sm">Estatura</span>
							</div>
							<input type="number" class="form-control" aria-label="Small" ariadescribedby="inputGroup-sizing-sm" value="'.$answer["estatura"].'" name="estatura" required>
							</div>

							<div class="input-group input-group-sm mb-3">
							<div class="input-group-prepend">
							<span class="input-group-text" id="inputGroup-sizing-sm">Peso</span>
							</div>
							<input type="text" class="form-control" aria-label="Small" ariadescribedby="inputGroup-sizing-sm"  value="'.$answer["peso"].'" name="peso" required>
							</div>

							<div class="input-group input-group-sm mb-3">
							<div class="input-group-prepend">
							<span class="input-group-text" id="inputGroup-sizing-sm">Edad</span>
							</div>
							<input type="number" class="form-control" aria-label="Small" ariadescribedby="inputGroup-sizing-sm" value="'.$answer["edad"].'" name="edad" required>
							</div>

							<div class="input-group input-group-sm mb-3">
							<div class="input-group-prepend">
							<span class="input-group-text" id="inputGroup-sizing-sm">Tipo de sangre</span>
							</div>
							<input type="text" class="form-control" aria-label="Small" ariadescribedby="inputGroup-sizing-sm" value="'.$answer["tiposangre"].'" name="tiposangre" required>
							</div>	

							<input type="file"  class="input-sm" class="form-control" id="imagen" name="foto" required>';
									
							 }else{

							 	 	echo '<script >swal({

						 									title: "¡Sin registro!",
															text: "¡El documento de identidad no se encuentra registrado!",
														type: "error",
						 									confirmButtonText: "Cerrar",
														closeOnConfirm: false
														},

					 					function(isConfirm){

											if (isConfirm) {
												window.location = "edit";
						 						}


												});

					 							</script>';

							 }
							     		}
				

							if (isset($_POST["documentEdit"])) {

								$table ="persona";
								$photo = $_FILES["foto"]["tmp_name"];
								$aleatory = mt_rand(10000,99999); 
								$route = "views/img/ " .$aleatory.".jpg";

								list($new_width, $new_height)= getimagesize($photo);

								$new_width = 292;
								$new_height = 336;

								$origin = imagecreatefromjpeg($photo);
								$destination = imagecreatetruecolor($new_width, $new_height);
								imagecopyresized($destination,$origin,0,0,0,0,$new_width, $new_height, $new_width, $new_height);

								imagejpeg($destination, $route);

									$dataController =array("document"=>$_POST["documentEdit"], 
																		  	 "nombresyapellidos"=>$_POST["nombresyapellidos"],
																			 "direccion"=>$_POST["direccion"],
																			"fechanac"=>$_POST["fechanac"],
																			"estatura"=>$_POST["estatura"],
																			"peso"=>$_POST["peso"],
																			"edad"=>$_POST["edad"],
																			"tiposangre"=>$_POST["tiposangre"], 
																			"foto"=>$route);


									
									$answer= personModel::editPersonController($dataController, $table);

								if ($answer==1) {

									 	echo '<script >swal({

															title: "¡Registro Actualizado!",
															text: "¡El registro se ha actualizado exitosamente!",
															type: "success",
															confirmButtonText: "Cerrar",
															closeOnConfirm: false
															},

											function(isConfirm){

												if (isConfirm) {
													window.location = "edit";
												}


													});

													</script>';
									
						}				
	    	
			}
		}

}