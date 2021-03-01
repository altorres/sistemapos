<?php

require_once "../Controller/categorias.controller.php";
require_once "../Model/categorias.model.php";


class AjaxCategoria{


/*=============================================
	=            validar si la categoria existe           =
	=============================================*/

		public $validarCategoria;

		public function ajaxValidarCategoria()
		{

			$item="categoria";
			$valor=$this->validarCategoria;
			$respuesta= ControllerCategoria::ctrMostrarCategoria($item,$valor);

			echo json_encode($respuesta);

		}
/*=============================================
	=            validar si la categoria existe editar categoria

	================================*/

		public $idCategoria;

		public function ajaxEditarCategoria()
		{

			$item="id";
			$valor=$this->idCategoria;
			$respuesta= ControllerCategoria::ctrMostrarCategoria($item,$valor);

			echo json_encode($respuesta);

		}

}




/*=============================================
	=            validar si existe el usuario          =
	=============================================*/

if(isset($_POST["validarCategoria"])){

	$activarCategoria= new AjaxCategoria();
	$activarCategoria -> validarCategoria= $_POST["validarCategoria"];
	$activarCategoria -> ajaxValidarCategoria();


}

if(isset($_POST["idCategoria"])){
	
	$idCategoria= new AjaxCategoria();
	$idCategoria -> idCategoria= $_POST["idCategoria"];
	$idCategoria -> ajaxEditarCategoria();

}