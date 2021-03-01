<?php


require_once "../Controller/usuarios.controller.php";
require_once "../Model/usuarios.model.php";

	class AjaxUsuarios{

		/*

		*/

		public $idUsuario;

		public function ajaxEditarUsuario(){

			$item="id";
			$valor=$this->idUsuario;
			$respuesta= ControllerUsuario::ctrMostrarUsuarios($item,$valor);

			echo json_encode($respuesta);

		}

		//activar usuario 

		public $activarUsuario;
		public $activarId;

		public function ajaxActivarUsuario(){

			$tabla="usuarios";

			$item1="estado";
			$valor1=$this->activarUsuario;

			$item2="id";
			$valor2=$this->activarId;



			$respuesta=ModelUsuarios::mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2);


		}

	/*=============================================
	=            validar si el usuario existe           =
	=============================================*/

		public $validarUsuario;

		public function ajaxValidarUsuario()
		{

			$item="nick";
			$valor=$this->validarUsuario;
			$respuesta= ControllerUsuario::ctrMostrarUsuarios($item,$valor);

			echo json_encode($respuesta);

		}

	}

	/*=============================================
	=            Editar Usuario           =
	=============================================*/
	
if(isset($_POST["idUsuario"])){

	$editar =new AjaxUsuarios();
	$editar->idUsuario= $_POST["idUsuario"];
	$editar->ajaxEditarUsuario();
}

	/*=============================================
	=            Activar Usuario           =
	=============================================*/

if(isset($_POST["activarUsuario"])){

	$activarUsuario= new AjaxUsuarios();
	$activarUsuario -> activarUsuario= $_POST["activarUsuario"];
	$activarUsuario -> activarId=$_POST["activarId"];
	$activarUsuario -> ajaxActivarUsuario();


}

/*=============================================
	=            validar si existe el usuario          =
	=============================================*/

if(isset($_POST["validarUsuario"])){

	$activarUsuario= new AjaxUsuarios();
	$activarUsuario -> validarUsuario= $_POST["validarUsuario"];
	$activarUsuario -> ajaxValidarUsuario();


}



