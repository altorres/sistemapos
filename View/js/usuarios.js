/*=============================================
=            subir foto         =
=============================================*/

$(".nuevaFoto").change(function(){
	var imagen=this.files[0];


/*=============================================
=            validar foto        =
=============================================*/
if(imagen["type"]!="image/jpeg" && imagen["type"] != "image/png" ){

	$(".nuevaFoto").val("");

	swal({
		title:"Error al subir la imagen",
		text: "¡La imagen debe estar en formato JPG o PNG!",
		type:"error",
		confirmButtonText:"¡Cerrar!"
	});
}
else if(imagen["size"]> 5000000){

	$(".nuevaFoto").val("");

	swal({
		title:"Error al subir la imagen",
		text: "¡La imagen no debe pesar mas de 5MB!",
		type:"error",
		confirmButtonText:"¡Cerrar!"
	});
}
else
{
	var datosImagen= new FileReader;
	datosImagen.readAsDataURL(imagen);

	$(datosImagen).on("load",function(event){
		var rutaImagen=event.target.result;

		$(".previsualizar").attr("src",rutaImagen);


	})
}


})

/*----------------------------------> 
    <!-----------Editar usuario---------->    
    <!---------------------------------->*/  

$(document).on("click", ".btnEditarUsuario", function(){

	var idUsuario =$(this).attr("idUsuario");

		var datos =new FormData();

	datos.append("idUsuario", idUsuario);


	$.ajax({
		url:"ajax/usuarios.ajax.php",
		method:"post",
		data:datos,
		cache:false,
		contentType:false,
		processData:false,
		dataType:"json",
		success: function(respuesta){

			$("#editarNombre").val(respuesta["nombre"]);
			$("#editarNick").val(respuesta["nick"]);
			$("#editarPerfil").html(respuesta["perfil"]);
			$("#editarPerfil").val(respuesta["perfil"]);
			$("#passwordActual").val(respuesta["password"]);
			$("#fotoActual").val(respuesta["foto"]);
			if(respuesta["foto"]!=""){
				$(".previsualizar").attr("src",respuesta["foto"]);
			}


			
		}

	});

});    


/*----------------------------------> 
    <!-----------activar usuario---------->    
    <!---------------------------------->*/  

$(document).on("click", ".btnActivar", function(){


	var idUsuario = $(this).attr("idUsuario");
	var estadoUsuario= $(this).attr("estadoUsuario");



	var datos =new FormData();
	datos.append("activarId",idUsuario);
	datos.append("activarUsuario",estadoUsuario);

	$.ajax({

		url:"ajax/usuarios.ajax.php",
		method:"post",
		data:datos,
		cache:false,
		contentType:false,
		processData:false,
	
		success: function(respuesta){

			 	if(window.matchMedia("(max-width:767px)").matches){

      		 swal({
		      title: "El usuario ha sido actualizado",
		      type: "success",
		      confirmButtonText: "¡Cerrar!"
		    }).then(function(result) {
		        if (result.value) {

		        	window.location = "usuarios";

		        }


			});

      	}

      }

  	})

  	if(estadoUsuario == 0){

  		$(this).removeClass('btn-success');
  		$(this).addClass('btn-danger');
  		$(this).html('Desactivado');
  		$(this).attr('estadoUsuario',1);

  	}else{

  		$(this).addClass('btn-success');
  		$(this).removeClass('btn-danger');
  		$(this).html('Activado');
  		$(this).attr('estadoUsuario',0);

  	}

 
});

/*=============================================
=   Revisar el usuario  ya registrado                  =
=============================================*/


$("#nuevoNick").change(function(){

	$(".alert").remove();

	var usuario = $(this).val();
	var datos=new FormData();
	datos.append("validarUsuario",usuario);

	$.ajax({

		url:"ajax/usuarios.ajax.php",
		method:"post",
		data:datos,
		cache:false,
		contentType:false,
		processData:false,
		dataType:"json",
		success: function(respuesta){

			if(respuesta){

				$("#nuevoNick").parent().after('<div class="alert alert-warning"> Este usuario ya existe </div>');

				$("#nuevoNick").val("");
			}
		

		}

	})
 



});
$(document).on("click", ".btnEliminarUsuario", function(){


	var idUsuario = $(this).attr("idUsuario");
	var fotoUsuario= $(this).attr("fotoUsuario");
	var nick= $(this).attr("nick");

	swal({
			 type:"warning",
			 title:"¿Esta seguro de borrar el Usuario?",
			 text:"¡Si no lo está puede cancelar la acción!",
			 showCancelButton:true,
			 showConfirmButton:true,
			 confirmButtonColor:"#3085d6",
			 cancelButtonColor:"#d33",
			 confirmButtonText:"Si, borrar usuario!",
			 cancelButtonText:"Cancelar",
			 claseOnConfirm:false
		}).then((result)=>{
			
			if(result.value){
				
				window.location="index.php?ruta=usuarios&idUsuario="+idUsuario+"&fotosUsuario="+fotoUsuario+"&nick="+nick;
			}
		});

});



