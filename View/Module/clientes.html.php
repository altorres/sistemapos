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
              <td>1</td>
              <td>usuario</td>
              <td>11111111111</td>
              <td>usuario@123.com</td>
              <td>785222</td>
              <td>calle falsa 123</td>
              <td>2019-08-25</td>
              <td>5</td>
              <td>0000-00-00</td>
              <td>0000-00-00</td>
              

              
              <td>
                <div class="btn-group">

                  <button class="btn btn-warning"><i class="fa fa-pencil" ></i></button>
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
                  <input type="text" name="nuevoCliente" class="form-control input-lg" placeholder="Ingresar Categoria" required> 
                  
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
                  <input type="text" name="nuevoTelefono" class="form-control input-lg"  placeholder="Ingresar telefono" data-inputmask="'mask':'(+57)999-999-9999'" data-mask required> 
                  
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
                  <input type="text" name="nuevaFechanacimiento" class="form-control input-lg"  placeholder="Ingresar Fecha Nacimiento " data-inputmask="'alias':'yyyy/mm/dd'" data-mask required> 
                  
                </div>
                
              </div>
           
          </div>
        
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">salir</button>
          <button type="submit" class="btn btn-primary">Guardar Cliente</button>
        </div>

    </form>

    </div>

  </div>
</div>
     