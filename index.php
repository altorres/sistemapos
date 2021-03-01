
<?php

require_once "Controller/plantilla.controller.php";
require_once "Controller/usuarios.controller.php";
require_once "Controller/categorias.controller.php";
require_once "Controller/clientes.controller.php";
require_once "Controller/productos.controller.php";
require_once "Controller/ventas.controller.php";



require_once "Model/usuarios.model.php";
require_once "Model/categorias.model.php"; 
require_once "Model/clientes.model.php";
require_once "Model/productos.model.php"; 
require_once "Model/ventas.model.php";


$plantilla=new ControllerPlantilla();
$plantilla->ctrPlantilla();

