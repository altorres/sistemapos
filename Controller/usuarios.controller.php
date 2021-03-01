<?php


class ControllerUsuario{

	static public function ctrIngresoUsuario()
	{
		if(isset($_POST["usuario"])){
			if(preg_match('/^[a-zA-Z0-9]+$/',$_POST["usuario"])&& 
				preg_match('/^[a-zA-Z0-9]+$/',$_POST["password"]))
			{
				$tabla= "usuarios";

				$item="nick";

				$valor=$_POST["usuario"];

				$respuesta=ModelUsuarios::MdlMostrarUsuarios($tabla,$item,$valor);

				$encriptar = crypt($_POST["password"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				if($respuesta["nick"]== $_POST["usuario"] && $respuesta["password"]==$encriptar){

					if($respuesta["estado"] ==1 ){

						$_SESSION["logeo"] = "ok";
					$_SESSION["id"] = $respuesta["id"];
					$_SESSION["nombre"] = $respuesta["nombre"];
					$_SESSION["nick"] = $respuesta["nick"];
					$_SESSION["foto"] = $respuesta["foto"];
					$_SESSION["perfil"] = $respuesta["perfil"];
					


					//fecha y hora ultimo login


					date_default_timezone_set('America/Bogota');

					$fecha= date('Y-m-d ');
					$hora=date('H:i:s');

					$fechaActual =$fecha." ".$hora;

					$item1="ultimo_login";
					$valor1=$fechaActual;

					$item2="id";
					$valor2=$respuesta["id"];

					$ultimologin=ModelUsuarios::mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2);
						
					if($ultimologin=="ok"){

						echo'<script> 
 					    window.location = "inicio";
					</script>';
					}
					

					}else
					{

						echo'<br/><div class="alert alert-danger">El usuario esta desactivado </div>';
					}


					


				}else{

					echo'<br/><div class="alert alert-danger">Error al ingresar, vuelve a intentar </div>';
				}

			}
		}
	}



	static public function ctrCrearUsuario(){

		if(isset($_POST["nuevoNick"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/',$_POST["nuevoNombre"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoNick"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoPassword"])){
				
				$ruta="";

				if(isset($_FILES["nuevaFoto"]["tmp_name"])){

					

				  list($ancho,$alto)=getimagesize($_FILES["nuevaFoto"]["tmp_name"]);

				  $nuevoAncho=500;
				  $nuevoAlto=500;

				  $directorio="View/img/usuarios/fotoUsuarios/".$_POST["nuevoNick"];

					
				   mkdir($directorio, 0755, true);
				 if($_FILES["nuevaFoto"]["type"] == "image/jpeg")
				  {
				  	$aleatorio=mt_rand(100,999);
				  	$ruta="View/img/usuarios/fotoUsuarios/".$_POST["nuevoNick"]."/".$_POST["nuevoNick"]."-".$aleatorio.".png";

				  	$origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);						
					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

					imagejpeg($destino, $ruta);
				  }
				  if($_FILES["nuevaFoto"]["type"] == "image/png")
				  {
				  	$aleatorio=mt_rand(100,999);
				  	$ruta="View/img/usuarios/fotoUsuarios/".$_POST["nuevoNick"]."/".$_POST["nuevoNick"]."-".$aleatorio.".png";

				  	$origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);						
					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

					imagepng($destino, $ruta);
				  }

				}

					$tabla="usuarios";
					$encriptar = crypt($_POST["nuevoPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

					$datos= array("nombre" => $_POST["nuevoNombre"],
								  "nick"=>  $_POST["nuevoNick"],
							      "password"=> $encriptar,
							      "perfil"=> $_POST["nuevoPerfil"],
							  	  "ruta"=>$ruta);

					

					$respuesta=ModelUsuarios::mdlIngresarUsuario($tabla,$datos);

					if($respuesta=="ok"){

						echo '<script> 

						swal({
							type:"success",
							title:"¡El usuario ha sido guardado correctamente!",
							showConfirmButton:true,
							confirmButtonText:"cerrar",
							claseOnConfirm:false
							}).then((result)=>{

								if(result.value){
									window.location="usuarios";
								}

								});

					 </script>';
					}else{
							

						
						echo '<script> 

						swal({
							type:"error",
							title:"¡Problemas al agregar el usuario!",
							showConfirmButton:true,
							confirmButtonText:"cerrar",
							claseOnConfirm:false
							}).then((result)=>{

								if(result.value){
									window.location="usuarios";
								}

								});


							

					 </script>';

					}
			}
			else{

				echo '<script> 

						swal({
							type:"error",
							title:"¡El nick no puede ser vacio o llevar caracteres especiales!",
							showConfirmButton:true,
							confirmButtonText:"cerrar",
							claseOnConfirm:false
							}).then((result)=>{

								if(result.value){
									window.location="usuarios";
								}

								});


							

					 </script>';

			}

		}
	}


	static public function ctrMostrarUsuarios($item,$valor){
		$tabla="usuarios";

		$respuesta=ModelUsuarios::MdlMostrarUsuarios($tabla,$item,$valor);


		return $respuesta;

	}

	static public function ctrEditarUsuario(){

		if(isset($_POST["editarNick"])){


			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/',$_POST["editarNombre"])){

				$ruta=$_POST["fotoActual"];

				if(isset($_FILES["editarFoto"]["tmp_name"]) && !empty($_FILES["editarFoto"]["tmp_name"])){

					

				  list($ancho,$alto)=getimagesize($_FILES["editarFoto"]["tmp_name"]);

				  $nuevoAncho=500;
				  $nuevoAlto=500;

				  $directorio="View/img/usuarios/fotoUsuarios/".$_POST["editarNick"];


				  //preguntar si existe la foto
					
					if(!empty($_POST["fotoActual"]))	{

						unlink($_POST["fotoActual"]);

					}else{

						mkdir($directorio, 0755, true);

					}
				   
				 if($_FILES["editarFoto"]["type"] == "image/jpeg")
				  {
				  	$aleatorio=mt_rand(100,999);
				  	$ruta="View/img/usuarios/fotoUsuarios/".$_POST["editarNick"]."/".$_POST["editarNick"]."-".$aleatorio.".png";

				  	$origen = imagecreatefromjpeg($_FILES["editarFoto"]["tmp_name"]);						
					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

					imagejpeg($destino, $ruta);
				  }
				  if($_FILES["editarFoto"]["type"] == "image/png")
				  {
				  	$aleatorio=mt_rand(100,999);
				  	$ruta="View/img/usuarios/fotoUsuarios/".$_POST["editarNick"]."/".$_POST["editarNick"]."-".$aleatorio.".png";

				  	$origen = imagecreatefrompng($_FILES["editarFoto"]["tmp_name"]);						
					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

					imagepng($destino, $ruta);
				  }

				}

					$tabla="usuarios";


					if($_POST["editarPassword"]!="")
					{ 
						if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarPassword"])){

							$encriptar = crypt($_POST["editarPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
						}
						else{

							echo '<script> 

								swal({
									type:"error",
									title:"¡la contraseña no puede ir vacia o llevar caracteres especiales!",
									showConfirmButton:true,
									confirmButtonText:"cerrar",
									claseOnConfirm:false
									}).then((result)=>{

										if(result.value){
											window.location="usuarios";
										}

										});


									

							 </script>';

						}
						

					}else{

						$encriptar=$_POST["passwordActual"];
					}
					
					$datos= array("nombre" => $_POST["editarNombre"],
								  "nick"=>  $_POST["editarNick"],
							      "password"=> $encriptar,
							      "perfil"=> $_POST["editarPerfil"],
							  	  "ruta"=>$ruta);

					

					$respuesta=ModelUsuarios::mdlEditarUsuario($tabla,$datos);

					if($respuesta=="ok"){

						echo '<script> 

						swal({
							type:"success",
							title:"¡El usuario ha sido editado correctamente!",
							showConfirmButton:true,
							confirmButtonText:"cerrar",
							claseOnConfirm:false
							}).then((result)=>{

								if(result.value){
									window.location="usuarios";
								}

								});

					 </script>';
					}else{
							

						
						echo '<script> 

						swal({
							type:"error",
							title:"¡Problemas al editar el usuario!",
							showConfirmButton:true,
							confirmButtonText:"cerrar",
							claseOnConfirm:false
							}).then((result)=>{

								if(result.value){
									window.location="usuarios";
								}

								});


							

					 </script>';

					}
			}
			else{

				echo '<script> 

						swal({
							type:"error",
							title:"¡El nombre no puede ser vacio o llevar caracteres especiales!",
							showConfirmButton:true,
							confirmButtonText:"cerrar",
							claseOnConfirm:false
							}).then((result)=>{

								if(result.value){
									window.location="usuarios";
								}

								});


							

					 </script>';

			}
		
		}
	
	}

	/*=============================================
	=            borrar usuario                  =
	=============================================*/
	
	static function ctrBorrarUsuario(){

		if(isset($_GET["idUsuario"])){

			$tabla="usuarios";
			$datos=$_GET["idUsuario"];

			if(isset($_GET["fotosUsuario"])!="")
			{

				unlink($_GET["fotosUsuario"]); 
				rmdir("View/img/usuarios/fotoUsuarios/".$_GET["nick"]);

			}

			$respuesta=ModelUsuarios::mdlBorrarUsuario($tabla,$datos);

			if($respuesta=="ok"){

						echo '<script> 

						swal({
							type:"success",
							title:"¡El usuario ha sido borrado correctamente!",
							showConfirmButton:true,
							confirmButtonText:"cerrar",
							claseOnConfirm:false
							}).then((result)=>{

								if(result.value){
									window.location="usuarios";
								}

								});

					 </script>';
					}




		}

	}
	/*=============================================
	EDITAR VENTA
	=============================================*/

	static public function ctrEditarVenta(){

		if(isset($_POST["editarVenta"])){

			/*=============================================
			FORMATEAR TABLA DE PRODUCTOS Y LA DE CLIENTES
			=============================================*/
			$tabla = "ventas";

			$item = "codigo";
			$valor = $_POST["editarVenta"];

			$traerVenta = ModeloVentas::mdlMostrarVentas($tabla, $item, $valor);

			/*=============================================
			REVISAR SI VIENE PRODUCTOS EDITADOS
			=============================================*/

			if($_POST["listaProductos"] == ""){

				$listaProductos = $traerVenta["productos"];
				$cambioProducto = false;


			}else{

				$listaProductos = $_POST["listaProductos"];
				$cambioProducto = true;
			}

			if($cambioProducto){

				$productos =  json_decode($traerVenta["productos"], true);

				$totalProductosComprados = array();

				foreach ($productos as $key => $value) {

					array_push($totalProductosComprados, $value["cantidad"]);
					
					$tablaProductos = "productos";

					$item = "id";
					$valor = $value["id"];
					$orden= null;

					$traerProducto = ModeloProductos::mdlMostrarProductos($tablaProductos, $item, $valor,$orden);

					$item1a = "ventas";
					$valor1a = $traerProducto["ventas"] - $value["cantidad"];

					$nuevasVentas = ModeloProductos::mdlActualizarProducto($tablaProductos, $item1a, $valor1a, $valor);

					$item1b = "stock";
					$valor1b = $value["cantidad"] + $traerProducto["stock"];

					$nuevoStock = ModeloProductos::mdlActualizarProducto($tablaProductos, $item1b, $valor1b, $valor);

				}

				$tablaClientes = "clientes";

				$itemCliente = "id";
				$valorCliente = $_POST["seleccionarCliente"];

				$traerCliente = ModeloClientes::mdlMostrarClientes($tablaClientes, $itemCliente, $valorCliente);

				$item1a = "compras";
				$valor1a = $traerCliente["compras"] - array_sum($totalProductosComprados);

				$comprasCliente = ModeloClientes::mdlActualizarCliente($tablaClientes, $item1a, $valor1a, $valorCliente);

				/*=============================================
				ACTUALIZAR LAS COMPRAS DEL CLIENTE Y REDUCIR EL STOCK Y AUMENTAR LAS VENTAS DE LOS PRODUCTOS
				=============================================*/

				$listaProductos_2 = json_decode($listaProductos, true);

				$totalProductosComprados_2 = array();

				foreach ($listaProductos_2 as $key => $value) {

					array_push($totalProductosComprados_2, $value["cantidad"]);
					
					$tablaProductos_2 = "productos";

					$item_2 = "id";
					$valor_2 = $value["id"];
					$orden2=null;

					$traerProducto_2 = ModeloProductos::mdlMostrarProductos($tablaProductos_2, $item_2, $valor_2,$orden2);

					$item1a_2 = "ventas";
					$valor1a_2 = $value["cantidad"] + $traerProducto_2["ventas"];

					$nuevasVentas_2 = ModeloProductos::mdlActualizarProducto($tablaProductos_2, $item1a_2, $valor1a_2, $valor_2);

					$item1b_2 = "stock";
					$valor1b_2 = $traerProducto_2["stock"] - $value["cantidad"];

					$nuevoStock_2 = ModeloProductos::mdlActualizarProducto($tablaProductos_2, $item1b_2, $valor1b_2, $valor_2);

				}

				$tablaClientes_2 = "clientes";

				$item_2 = "id";
				$valor_2 = $_POST["seleccionarCliente"];

				$traerCliente_2 = ModeloClientes::mdlMostrarClientes($tablaClientes_2, $item_2, $valor_2);

				$item1a_2 = "compras";
				$valor1a_2 = array_sum($totalProductosComprados_2) + $traerCliente_2["compras"];

				$comprasCliente_2 = ModeloClientes::mdlActualizarCliente($tablaClientes_2, $item1a_2, $valor1a_2, $valor_2);

				$item1b_2 = "ultima_compra";

				date_default_timezone_set('America/Bogota');

				$fecha = date('Y-m-d');
				$hora = date('H:i:s');
				$valor1b_2 = $fecha.' '.$hora;

				$fechaCliente_2 = ModeloClientes::mdlActualizarCliente($tablaClientes_2, $item1b_2, $valor1b_2, $valor_2);

			}

			/*=============================================
			GUARDAR CAMBIOS DE LA COMPRA
			=============================================*/	

			$datos = array("id_vendedor"=>$_POST["idVendedor"],
						   "id_cliente"=>$_POST["seleccionarCliente"],
						   "codigo"=>$_POST["editarVenta"],
						   "productos"=>$listaProductos,
						   "impuesto"=>$_POST["nuevoPrecioImpuesto"],
						   "neto"=>$_POST["nuevoPrecioNeto"],
						   "total"=>$_POST["totalVenta"],
						   "metodo_pago"=>$_POST["listaMetodoPago"]);


			$respuesta = ModeloVentas::mdlEditarVenta($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				localStorage.removeItem("rango");

				swal({
					  type: "success",
					  title: "La venta ha sido editada correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then((result) => {
								if (result.value) {

								window.location = "ventas";

								}
							})

				</script>';

			}

		}

	}

	
	
	
	
	
}
