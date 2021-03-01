<?php

class ControllerCliente{

/*=============================================
=            Crear Categoria            =
=============================================*/


	static public function ctrCrearCliente(){

		if(isset($_POST["nuevoCliente"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoCliente"]) &&
			   preg_match('/^[0-9]+$/', $_POST["nuevoId"]) &&
			   preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["nuevoCorreo"]) && 
			   preg_match('/^[+()\-0-9 ]+$/', $_POST["nuevoTelefono"]) && 
			   preg_match('/^[#\.\-a-zA-Z0-9 ]+$/', $_POST["nuevaDireccion"])){

				$tabla="clientes";

				$datos = array("nombre"=>$_POST["nuevoCliente"],
					           "documento"=>$_POST["nuevoId"],
					           "email"=>$_POST["nuevoCorreo"],
					           "telefono"=>$_POST["nuevoTelefono"],
					           "direccion"=>$_POST["nuevaDireccion"],
					           "fecha_nacimiento"=>$_POST["nuevaFechaNacimiento"]);

				$respuesta=ModelCliente::mdlIngresarCliente($tabla, $datos);


				if($respuesta=="ok"){

					echo '<script> 

						swal({
							type:"success",
							title:"¡El cliente ha sido creado correctamente!",
							showConfirmButton:true,
							confirmButtonText:"cerrar",
							claseOnConfirm:false
							}).then((result)=>{

								if(result.value){
									window.location="clientes";
								}

								});

					 </script>';

				}

			}
			else{

				echo '<script> 

						swal({
							type:"error",
							title:"El cliente no puede ir vacia o llevar caracteres especiales!",
							showConfirmButton:true,
							confirmButtonText:"cerrar",
							claseOnConfirm:false
							}).then((result)=>{

								if(result.value){
									window.location="clientes";
								}

								});


							

					 </script>';


			}

		}


	}

	/*=============================================
	MOSTRAR CLIENTES
	=============================================*/

	static public function ctrMostrarClientes($item, $valor){

		$tabla = "clientes";

		$respuesta = ModelCliente::mdlMostrarClientes($tabla, $item, $valor);

		return $respuesta;

	}

	

}	