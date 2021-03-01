<?php

require_once "../../Controller/ventas.controller.php";
require_once "../../Model/ventas.model.php";
require_once "../../Controller/clientes.controller.php";
require_once "../../Model/clientes.model.php";
require_once "../../Controller/usuarios.controller.php";
require_once "../../Model/usuarios.model.php";

$reporte = new ControllerVentas();
$reporte -> ctrDescargarReporte();