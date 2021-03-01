<?php

require_once "../Controller/productos.controller.php";
require_once "../Model/productos.model.php";


/*=============================================
=   generar codigo desde id categoria         =
=============================================*/
class AjaxProductos
{
	
	
	
	public function ajaxCrearCodigoProducto(){

		$item="id_categoria";
		$valor=$this->idCategoria;
		$orden="id";

	  $respuesta= ControllerProductos::ctrMostrarProductos($item, $valor,$orden);

	  	echo json_encode($respuesta);


	}
/*=============================================
=            Editar Producto            =
=============================================*/
	public $idProducto;
	public $traerProductos;
	public $nombreProducto;

	public function ajaxEditarCodigoProducto(){

	 if($this->traerProductos =="ok"){
	    $item =null;
		$valor=null;
		$orden="id";

		$respuesta = ControllerProductos::ctrMostrarProductos($item ,$valor,$orden);

		echo json_encode($respuesta);


	 }elseif($this->nombreProducto !=""){

		$item ="descripcion";
		$valor= $this->nombreProducto;
		$orden="id";

		$respuesta = ControllerProductos::ctrMostrarProductos($item ,$valor, $orden);

		echo json_encode($respuesta);


	 }

	 else
	 {
	 	$item ="id";
		$valor= $this->idProducto;
		$orden="id";

		$respuesta = ControllerProductos::ctrMostrarProductos($item ,$valor,$orden);

		echo json_encode($respuesta);
	 }


		


	}
}

/*=============================================
=   generar codigo desde id categoria         =
=============================================*/

if(isset($_POST["idCategoria"])){

	$codigoProducto= new AjaxProductos();
	$codigoProducto->idCategoria=$_POST["idCategoria"];
	$codigoProducto->ajaxCrearCodigoProducto();

}
/*=============================================
=            Editar Producto            =
=============================================*/
if(isset($_POST["idProducto"])){

	$editarProducto= new AjaxProductos();
	$editarProducto->idProducto=$_POST["idProducto"];
	$editarProducto->ajaxEditarCodigoProducto();

}
/*=============================================
=            Traer Productos           =
=============================================*/
if(isset($_POST["traerProductos"])){ 

	$traerProducto= new AjaxProductos();
	$traerProducto -> traerProductos =$_POST["traerProductos"];
	$traerProducto->ajaxEditarCodigoProducto();

}

/*=============================================
=           nombreProducto           =
=============================================*/
if(isset($_POST["nombreProducto"])){ 

	$nombreProducto= new AjaxProductos();
	$nombreProducto -> nombreProducto =$_POST["nombreProducto"];
	$nombreProducto->ajaxEditarCodigoProducto();

}



