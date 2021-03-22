<div class="row container-fluid">
<h4>Registro de personal</h4>	
</div>

<hr>
<ul class="nav nav-pills col-lg-12 col-md-12 col-sm-12 col-xs-12">

<li class="nav-item">
<a class="nav-link" href="home">Registro</a>
</li>

<li class="nav-item">
<a class="nav-link active" href="find">Buscar</a>
</li>

<li class="nav-item">
<a class="nav-link " href="edit">Actualizar datos</a>
</li>


</ul>
<hr>


<div class="row container-fluid">

	<div class="col-sm-3 col-lg-3 col-xs-3 col-md-3">

		<input type="text" class="form-control form-control-sm" placeholder="Ingrese documento de identidad" id="document">
		<br>

		<input type="button" class="btn-sm  form-control btn btn-info" id="buscar" value="Buscar"  >
		
	</div>


	<form method="POST"  enctype="multipart/form-data" accept-charset="utf-8">
	
	<div  class="col-sm-5 col-lg-5 col-xs-5 col-md-5">

		<label for="person"></label>

	</div>

	<?php 
	$deletePerson = new personController();
	$deletePerson->deletePersonController();
	 ?>
	
	</form>


</div>
</div>