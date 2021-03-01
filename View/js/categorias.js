$("#nuevaCategoria").change(function(){

	$(".alert").remove();

	var categoria = $(this).val();
	var datos=new FormData();
	datos.append("validarCategoria",categoria);

	$.ajax({

		url:"ajax/categorias.ajax.php",
		method:"post",
		data:datos,
		cache:false,
		contentType:false,
		processData:false,
		dataType:"json",
		success: function(respuesta){

			if(respuesta){

				$("#nuevaCategoria").parent().after('<div class="alert alert-warning"> Esta categoria ya existe </div>');

				$("#nuevaCategoria").val("");
			}
		

		}

	})
});

$(".btnEditarCategoria").click(function(){
	var idCategoria = $(this).attr("idCategoria");
	var datos= new FormData();
	datos.append("idCategoria",idCategoria);

	$.ajax({

			url:"ajax/categorias.ajax.php",
			method:"post",
			data:datos,
			cache:false,
			contentType:false,
			processData:false,
			dataType:"json",
			success: function(respuesta){

				if(respuesta){
					
					$("#editarCategoria").val(respuesta["categoria"]);
					$("#idCategoria").val(respuesta["id"]);
				}
			

			}

	})



})


$(".btnEliminarCategoria").click(function(){
	var idCategoria = $(this).attr("idCategoria");

	swal({
			 type:"warning",
			 title:"¿Esta seguro de borrar la categoría?",
			 text:"¡Si no lo está puede cancelar la acción!",
			 showCancelButton:true,
			 showConfirmButton:true,
			 confirmButtonColor:"#3085d6",
			 cancelButtonColor:"#d33",
			 confirmButtonText:"Si, borrar categoría!",
			 cancelButtonText:"Cancelar",
			 claseOnConfirm:false
		}).then((result)=>{
			
			if(result.value){
				
				window.location="index.php?ruta=categorias&idCategoria="+idCategoria;
			}
		});



	



})