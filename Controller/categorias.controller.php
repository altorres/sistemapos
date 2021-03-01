<?php


class ControllerCategoria{

/*=============================================
=            Crear Categoria            =
=============================================*/


	static public function ctrCrearCategoria(){

		if(isset($_POST["nuevaCategoria"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/',$_POST["nuevaCategoria"])){

				$tabla="categorias";

				$datos=$_POST["nuevaCategoria"];

				$respuesta=ModelCategoria::mdlIngresarCategoria($tabla, $datos);


				if($respuesta=="ok"){

					echo '<script> 

						swal({
							type:"success",
							title:"¡La categoria ha sido creada correctamente!",
							showConfirmButton:true,
							confirmButtonText:"cerrar",
							claseOnConfirm:false
							}).then((result)=>{

								if(result.value){
									window.location="categorias";
								}

								});

					 </script>';

				}

			}
			else{

				echo '<script> 

						swal({
							type:"error",
							title:"¡La categoria no puede ir vacia o llevar caracteres especiales!",
							showConfirmButton:true,
							confirmButtonText:"cerrar",
							claseOnConfirm:false
							}).then((result)=>{

								if(result.value){
									window.location="categorias";
								}

								});


							

					 </script>';


			}

		}


	}	

/*=============================================
=            Mostrar Categoria            =
=============================================*/
static public function ctrMostrarCategoria($item,$valor){
		
		$tabla="categorias";

		$respuesta=ModelCategoria::MdlMostrarCategoria($tabla,$item,$valor);


		return $respuesta;

	}


/*=============================================
=            editar Categoria            =
=============================================*/
static public function ctrEditarCategoria(){
	
	if(isset($_POST["editarCategoria"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/',$_POST["editarCategoria"])){

				$tabla="categorias";

				$datos=  array('categoria' => $_POST["editarCategoria"], 'idCategoria'=>$datos=$_POST["idCategoria"]); 
				

				$respuesta=ModelCategoria::mdlEditarCategoria($tabla, $datos);


				if($respuesta=="ok"){

					echo '<script> 

						swal({
							type:"success",
							title:"¡La categoria ha sido editada correctamente!",
							showConfirmButton:true,
							confirmButtonText:"cerrar",
							claseOnConfirm:false
							}).then((result)=>{

								if(result.value){
									window.location="categorias";
								}

								});

					 </script>';

				}

			}
			else{

				echo '<script> 

						swal({
							type:"error",
							title:"¡La categoria no puede ir vacia o llevar caracteres especiales!",
							showConfirmButton:true,
							confirmButtonText:"cerrar",
							claseOnConfirm:false
							}).then((result)=>{

								if(result.value){
									window.location="categorias";
								}

								});


							

					 </script>';


			}

		}



}


static public function ctrBorrarCategoria(){

	if(isset($_GET["idCategoria"])){

		$tabla="categorias";
		$datos=$_GET["idCategoria"];

		$respuesta= ModelCategoria::mdlBorrarCategoria($tabla,$datos);


		if($respuesta == "ok")
		{

				echo '<script> 

						swal({
							type:"success",
							title:"¡La categoria ha sido eliminda correctamente!",
							showConfirmButton:true,
							confirmButtonText:"cerrar",
							claseOnConfirm:false
							}).then((result)=>{

								if(result.value){
									window.location="categorias";
								}

								});

					 </script>';

		}



	}
}







}


