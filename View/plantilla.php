<?php
session_start();


?>
<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Inventario </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  
  <link rel="icon" href="View/img/plantilla/icono-negro.png">


  <!--=====================================
  PLUGINS DE CSS
  ======================================-->


    <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="View/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="View/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="View/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="View/dist/css/AdminLTE.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="View/dist/css/skins/_all-skins.min.css">

  <!-- DataTables -->
  <link rel="stylesheet" href="View/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="View/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="View/plugins/iCheck/all.css">

  <!-- daterange picker -->

  <link rel="stylesheet" type="text/css" href="View/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="View/bower_components/morris.js/morris.css">

  <!--=====================================
  PLUGINS DE JAVASCRIPT
  ======================================-->
  <script src="View/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="View/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="View/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="View/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="View/dist/js/adminlte.min.js"></script>

<!-- DataTables -->
<script src="View/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="View/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="View/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
  <script src="View/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script>

  <!-- SweetAlert 2 -->
  <script src="View/plugins/sweetalert2/sweetalert2.all.js"></script>
  
  <!-- By default SweetAlert2 doesn't support IE. To enable IE 11 support, include Promise polyfill:-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>

  <!-- iCheck 1.0.1 -->
  <script src="View/plugins/iCheck/icheck.min.js"></script>

  <!-- InputMask -->
  <script src="View/plugins/input-mask/jquery.inputmask.js"></script>
  <script src="View/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
  <script src="View/plugins/input-mask/jquery.inputmask.extensions.js"></script>
   <!-- jquery number-->
  <script src="View/plugins/jqueryNumber/jquerynumber.min.js"></script>

  <!-- daterange picker -->
    <script src="View/bower_components/moment/min/moment.min.js"></script>
    <script src="View/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>

  <!-- morris js -->
   <script src="View/bower_components/raphael/raphael.min.js"></script>
    <script src="View/bower_components/morris.js/morris.min.js"></script>

     <!-- ChartJS http://www.chartjs.org/-->
  <script src="View/bower_components/chart.js/Chart.js"></script>

</head>


<body class="hold-transition skin-blue sidebar-collapse sidebar-mini login-page">
<!-- Site wrapper -->

  
<?php


if(isset($_SESSION["logeo"]) && $_SESSION["logeo"] == "ok")
{




    echo'<div class="wrapper">';
    /*=============================================
    =            header           =
    =============================================*/

    include "Module/header.php";

    /*=============================================
    =            menu           =
    =============================================*/

      
      include "Module/menu.php";

      /*=============================================
    =           contenido          =
    =============================================*/
    if(isset($_GET["ruta"]))
    {
      if($_GET["ruta"]== "inicio" || 
        $_GET["ruta"]== "usuarios" ||
        $_GET["ruta"]== "categorias" ||
        $_GET["ruta"]== "productos"||
        $_GET["ruta"]== "clientes" ||
        $_GET["ruta"]== "crear-ventas" ||
        $_GET["ruta"]== "editar-ventas" ||
        $_GET["ruta"]== "ventas"||
        $_GET["ruta"]== "reporte-ventas"||
        $_GET["ruta"]== "salir"
        )

      {

        include "Module/".$_GET["ruta"].".php";
      }
      else
      {
        include"Module/404.php";
      }
      
    }else{
      include"Module/inicio.php";
    }

    /*=============================================
    =           footer          =
    =============================================*/

      include "Module/footer.php";

    echo '</div>';
}
else
{
  
  include"Module/login.php";
}
?>
  <!-- Content Wrapper. Contains page content -->

  

<!-- ./wrapper -->

<!-- jQuery 3 -->


<script src="View/js/plantilla.js"></script>
<script src="View/js/usuarios.js"></script>
<script src="View/js/categorias.js"></script>
<script src="View/js/productos.js"></script>
<script src="View/js/clientes.js"></script>
<script src="View/js/ventas.js"></script>
<script src="View/js/reportes.js"></script>
</body>
</html>
