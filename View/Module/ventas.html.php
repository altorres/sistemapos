<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Administrar ventas
      
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Administrar Venta</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">

          <a href="crear-ventas">
          <button class="btn btn-primary" >
            
            Agregar Venta
          </button>


        </div>


        <div class="box-body">

          
          <table class="table table-bordered table-striped tablas dt-responsive">

            <thead>
              <tr>
                <th style="width: 10px" >#</th>
                <th>Codigo Factura</th>
                <th>Cliente</th>
                <th>Vendedor</th>
                <th>Forma de Pago </th>
                <th>Neto</th>
                <th>Total </th>
                <th>Fecha</th>
                <th>Acciones</th>

              </tr>
            </thead>
            <tbody>
              <?php
                  $item = null;
                  $valor= null;

                  $respuesta = ControllerVentas::ctrMostrarVentas($item, $valor);

                  
              ?>
              <td>1</td>
              <td>1112</td>
              <td>pepe</td>
              <td>julio</td>
              <td>efectivo</td>
              <td>50000</td>
              <td>60000</td>
              <td>2017-12-12</td>
                                        
              <td>
                <div class="btn-group">

                  <button class="btn btn-info"><i class="fa fa-print" ></i></button>
                  <button class="btn btn-danger"><i class="fa fa-times" ></i></button>
                </div>

              </td>

            </tbody>
            
          </table>
        </div>
        



      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
   
