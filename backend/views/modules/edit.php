<div class="row container-fluid">
<h4>Registro de personal</h4>	
</div>

<hr>
<ul class="nav nav-pills col-lg-12 col-md-12 col-sm-12 col-xs-12">

<li class="nav-item">
<a class="nav-link" href="home">Registro</a>
</li>

<li class="nav-item">
<a class="nav-link " href="find">Buscar</a>
</li>

<li class="nav-item">
<a class="nav-link active" href="">Actualizar datos</a>
</li>

</ul>
<hr>

<form action="" method="post" enctype="multipart/form-data" accept-charset="utf-8">

<div class="row container-fluid">

		<div class="col-sm-3 col-lg-3 col-xs-3 col-md-3">

		<input type="text" class="form-control form-control-sm" placeholder="Ingrese documento de identidad" id="document" name="document">
		<br>

		<input type="submit" class="btn-sm  form-control btn btn-info" value="Buscar" >
		
	</div>
		</form>



<div class="col-sm-5 col-xs-5 col-md-5 col-lg-5">

<form action="" method="post" enctype="multipart/form-data" accept-charset="utf-8">

<?php 
	
	$editPerson = new personController();
	$editPerson->editPersonController();

 ?>

<hr>
<input type="submit"  class="btn btn-success btn-sm pull-left" value = "Actualizar Registro">
</div>

</form>