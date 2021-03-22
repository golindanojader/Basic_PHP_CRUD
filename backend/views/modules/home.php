
<div class="row container-fluid">
<h4>Registro de personal</h4>	
</div>

<hr>

<ul class="nav nav-pills col-lg-12 col-md-12 col-sm-12 col-xs-12">

<li class="nav-item">
<a class="nav-link active" href="home">Registro</a>
</li>

<li class="nav-item">
<a class="nav-link " href="find">Buscar</a>
</li>

<li class="nav-item">
<a class="nav-link" href="edit">Actualizar datos</a>
</li>

</ul>
<hr>

<form action="" method="post" enctype="multipart/form-data" accept-charset="utf-8">

<div class="row container-fluid">

	<div class="col-sm-5 col-xs-5 col-md-5 col-lg-5">

		<input type="text" class="form-control form-control-sm" placeholder="Documento de identidad" name="documento" value="" required>
		<br>
		<input type="text" class="form-control form-control-sm" placeholder="Nombres y Apellidos" name="nombresyapellidos" value="" required>
		<br>

	
		<div class="input-group input-group-sm mb-3">
		<div class="input-group-prepend">
		<span class="input-group-text" id="inputGroup-sizing-sm">Fecha de nac.</span>
		</div>
		<input type="date" class="form-control" aria-label="Small" ariadescribedby="inputGroup-sizing-sm" name="fecha">
		</div>




		<input type="number" class="form-control form-control-sm" placeholder="Estatura" name="estatura" value="" required>
		<br>
		<input type="number" class="form-control form-control-sm" placeholder="Peso" name="peso" value="" required>
		<br>
		<input type="number" class="form-control form-control-sm" placeholder="Edad" name="edad" value="" required>
		<br>
		<input type="text" class="form-control form-control-sm" placeholder="Tipo de sangre" name="tiposangre" value="" required>
		<br>

		<input type="text" class="form-control form-control-sm" placeholder="Dirección" name="direccion" value="" required>
		<br>

		<input type="file"  class="input-sm" class="form-control" id="imagen" name="foto" required>
		
	<hr>
	<button type="submit"  class="btn btn-success btn-sm" name="" >Guardar Registro</button>

		<?php 
		$send = new personController();
		$send ->createPersonRegisterController();

		 ?>



	</div>
	</form>

	
</div>







