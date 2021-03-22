$(document).ready(function(){

$("#buscar").click(function(){

var data = $("#document").val();

var dataAjax = new FormData();
dataAjax.append("buscar", data);

$.ajax({

	url: "views/modules/ajax/findPerson.php",
	method:"POST",
	data:dataAjax,
	cache:false,
	contentType: false,
	processData: false,
	success:function(respuesta){

		 console.log(respuesta);

		$("label[for='person']").html(respuesta);

			}
	})
	
});




})