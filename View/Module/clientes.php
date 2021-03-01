<?php
  if ($_SESSION["perfil"]=="Especial") {

    echo '<script> 
            windows.location ="inicio";
    
    </script>';

    return;
    # code...
  }

?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Administrar Clientes
      
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Administrar Clientes</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">


          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCliente">
            
            Agregar Cliente
          </button>


        </div>


        <div class="box-body">

          
          <table class="table table-bordered table-striped tablas dt-responsive">

            <thead>
              <tr>
                <th style="width: 10px" >#</th>
                <th>Nombre Cliente</th>
                <th>Documento ID </th>
                <th>Correo Electronico</th>
                <th>Telefono </th>
                <th>Direccion</th>
                <th>Fecha nacimiento </th>
                <th>Total Compras </th>
                <th>Ultima Compra </th>
                <th>Ingreso al sistema </th>
                <th>Acciones</th>

              </tr>
            </thead>
            <tbody>

              <?php

                  $item=null;
                  $valor=null;

                  $clientes =ControllerCliente::ctrMostrarClientes($item,$valor);


                  foreach ($clientes as $key => $value) {
                    # code...

                    echo '<tr>
                          <td>'.($key+1).'</td>
                          <td>'.$value["nombre"].'</td>
                          <td>'.$value["documento"].'</td>
                          <td>'.$value["email"].'</td>
                          <td>'.$value["telefono"].'</td>
                          <td>'.$value["direccion"].'</td>
                          <td>'.$value["fecha_nacimiento"].'</td>
                          <td>'.$value["compras"].'</td>
                          <td>'.$value["ultima_compra"].'</td>
                          <td>'.$value["fecha"].'</td>
                         
                          <td>
                            <div class="btn-group">

                              <button class="btn btn-warning btnEditarCliente" data-toggle="modal" data-target="#modalEditarCliente" idCliente="'.$value["id"].'"><i class="fa fa-pencil" ></i></button>';

                              if($_SESSION["perfil"]=="Administrador"){

                            echo'  <button class="btn btn-danger btnEliminarCliente" data-toggle="modal" data-target="#modalEliminarCliente" idCliente="'.$value["id"].'"><i class="fa fa-times" ></i></button>';}
                            echo'
                            </div>

                          </td>
                          </tr> ';
                        


                  }

              ?>
              

            </tbody>
            
          </table>
        </div>
        



      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>

    <!----------------------------------> 
    <!-----------Modal Agregar---------->    
    <!---------------------------------->    


<div id="modalAgregarCliente" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <form class="form" method="post" >

        <div class="modal-header" style="background:#3c8dbc; color: white; ">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agregar Cliente</h4>
        </div>
        <div class="modal-body">
            <div class="box-body">
              <!--Input Nombre-->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                  <input type="text" name="nuevoCliente" class="form-control input-lg" placeholder="Ingresar Nombre" required>

              
                </div>
                
              </div>

              <!--Input Documento-->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-key"></i></span>
                  <input type="number" name="nuevoId" min="0" class="form-control input-lg" placeholder="Ingresar Documento" required> 
                 
                </div>
                
              </div>

              <!--Input correo-->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                  <input type="email" name="nuevoCorreo" class="form-control input-lg" placeholder="Ingresar Correo Electronico" required> 
                  
                </div>
                
              </div>

              <!--Input telefono-->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-phone"></i></span> 
                  <input type="text" name="nuevoTelefono" class="form-control input-lg"  placeholder="Ingresar telefono" data-inputmask="'mask':'(999)999-9999'" data-mask required> 
                  
                </div>
                
              </div>
               <!--Input direccion-->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-map-marker"></i></span> 
                  <input type="text" name="nuevaDireccion" class="form-control input-lg"  placeholder="Ingresar Direccion" required> 
                  
                </div>
                
              </div>
            
               <!--Input fecha nacimientro-->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 
                  <input type="text" name="nuevaFechaNacimiento" class="form-control input-lg"  placeholder="Ingresar Fecha Nacimiento " data-inputmask="'alias':'yyyy/mm/dd'" data-mask required> 
                  
                </div>
                
              </div>
            
            </div>
        </div>
        
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">salir</button>
          <button type="submit" class="btn btn-primary">Guardar Cliente</button>
        </div>

    </form>
        <?php
          $crearCliente =new ControllerCliente();
          $crearCliente ->ctrCrearCliente();

        ?>

    </div>

  </div>
</div>

    <!----------------------------------> 
    <!-----------Modal Editar---------->    
    <!---------------------------------->    
<div id="modalEditarCliente" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <form class="form" method="post" >

        <div class="modal-header" style="background:#3c8dbc; color: white; ">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar Cliente</h4>
        </div>
        <div class="modal-body">
            <div class="box-body">
              <!--Input Nombre-->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                  <input type="text" name="editarCliente" id="editarCliente"  class="form-control input-lg"  required> <input type="hidden" name="idCliente" id="idCliente"  class="form-control input-lg" >
              
                </div>
                
              </div>

              <!--Input Documento-->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-key"></i></span>
                  <input type="number" name="editarId" id="editarId" min="0" class="form-control input-lg"  required> 
                 
                </div>
                
              </div>

              <!--Input correo-->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                  <input type="email" name="editarCorreo" id="editarCorreo" class="form-control input-lg"  required> 
                  
                </div>
                
              </div>

              <!--Input telefono-->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-phone"></i></span> 
                  <input type="text" name="editarTelefono" id="editarTelefono" class="form-control input-lg"   data-inputmask="'mask':'(999)999-9999'" data-mask required> 
                  
                </div>
                
              </div>
               <!--Input direccion-->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-map-marker"></i></span> 
                  <input type="text" name="editarDireccion" id="editarDireccion" class="form-control input-lg"   required> 
                  
                </div>
                
              </div>
            
               <!--Input fecha nacimientro-->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 
                  <input type="text" name="editarFechaNacimiento" id="editarFechaNacimiento" class="form-control input-lg"   data-inputmask="'alias':'yyyy/mm/dd'" data-mask required> 
                  
                </div>
                
              </div>
            
            </div>
        </div>
        
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">salir</button>
          <button type="submit" class="btn btn-primary">Guardar Cliente</button>
        </div>

    </form>
        <?php
          $editarCliente =new ControllerCliente();
          $editarCliente ->ctrEditarCliente();

        ?>

    </div>

  </div>
</div>
     <?php
          $eliminarCliente =new ControllerCliente();
          $eliminarCliente ->ctrEliminarCliente();

        ?>