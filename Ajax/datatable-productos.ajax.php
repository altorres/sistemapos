<?php

require_once "../Model/productos.model.php";
require_once "../Controller/productos.controller.php";
require_once "../Model/categorias.model.php"; 
require_once "../Controller/categorias.controller.php";

/**
 * 
 */
class TablaProductos 
{
	/*=============================================
=            mostrar productos          =
=============================================*/
	public function mostrarTablaProductos(){

		$item = null;

		$valor=null; 
		$orden='id';

		$productos=ControllerProductos::ctrMostrarProductos($item,$valor,$orden); 	

			

			
		$datosJson = '{
		  "data": [';

		  		for($i = 0; $i < count($productos); $i++){

		  					/*=============================================
				 	 			TRAEMOS LA IMAGEN
				  			=============================================*/ 
				  			if ($productos[$i]["imagen"]!=""){

				  				$imagen = "<img src='".$productos[$i]["imagen"]."' class='img-thumbnail' width='40px'>";

				  			}
				  			else
				  			{
				  				$imagen = "<img src='View/img/productos/default/anonymous.png' class='img-thumbnail' width='40px'>";
				  			}
				  			/*=============================================
				 	 		TRAEMOS LA CATEGORÍA
				  			=============================================*/ 

						  	$item = "id";
						  	$valor = $productos[$i]["id_categoria"];

						  	$categorias = ControllerCategoria::ctrMostrarCategoria($item,$valor);

						  	/*=============================================
				 	 		STOCK
				  			=============================================*/ 

				  			if($productos[$i]["stock"] <= 10){

				  				$stock = "<button class='btn btn-danger'>".$productos[$i]["stock"]."</button>";

				  			}else if($productos[$i]["stock"] > 11 && $productos[$i]["stock"] <= 15){

				  				$stock = "<button class='btn btn-warning'>".$productos[$i]["stock"]."</button>";

				  			}else{

				  				$stock = "<button class='btn btn-success'>".$productos[$i]["stock"]."</button>";

				  			}
				  			/*=============================================
				 	 		ACCIONES
				  			=============================================*/ 


				  			if(isset($_GET["perfilOculto"]) && $_GET["perfilOculto"]=="Especial"){

				  			 $botones = "<button class='btn btn-warning btnEditarProducto' idProducto='".$productos[$i]["id"]."' data-toggle='modal' data-target='#modalEditarProducto'><i class='fa fa-pencil'></i></button>";

							}else{
								$botones =  "<div class='btn-group'><button class='btn btn-danger btnEliminarProducto' idProducto='".$productos[$i]["id"]."' codigo='".$productos[$i]["codigo"]."' imagen='".$productos[$i]["imagen"]."'><i class='fa fa-times'></i></button></div>"; 
							}

		  			

		  		$datosJson .= '[
						  "'.($i+1).'",
					      "'.$imagen.'",
					      "'.$productos[$i]["codigo"].'",
					      "'.$productos[$i]["descripcion"].'",
					      "'.$categorias["categoria"].'",
					      "'.$stock.'",
					      "'.$productos[$i]["precio_compra"].'",
					      "'.$productos[$i]["precio_venta"].'",
					      "'.$productos[$i]["fecha"].'",
					      "'.$botones.'"
						],';


		  		}

 		$datosJson = substr($datosJson, 0, -1);
		$datosJson .=   '] 

		 }';  		

		echo $datosJson;
			
		

	}
}

/*=============================================
=            activar tabla productos          =
=============================================*/

	$activarProductos= new TablaProductos();
	$activarProductos->mostrarTablaProductos();


