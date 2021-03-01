<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Administrar Usuarios
      
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Administrar usuarios</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">


          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgragarUsuario">
            
            Agregar Usuario
          </button>


        </div>


        <div class="box-body">

          
          <table class="table table-bordered table-striped tablas dt-responsive">

            <thead>
              <tr>
                <th style="width: 10px" >#</th>
                <th>Nombre</th>
                <th>Usuario</th>
                <th>Foto</th>
                <th>Perfil</th>
                <th>Estado</th>
                <th>Ultimo Login</th>
                <th>Acciones</th>

              </tr>
            </thead>
            <tbody>
              <td>1</td>
              <td>Admin</td>
              <td>Admin</td>
              <td><img src="View/img/usuarios/default/anonymous.png" class="img-thumbnail" width="40px" ></td>
              <td>Admin</td>
              <td><button class="btn btn-success btn-xs">Activado</button></td>
              <td>2018-12-11</td>
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


<div id="modalAgragarUsuario" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <form class="form" method="post" enctype="multipart/form-darta">

        <div class="modal-header" style="background:#3c8dbc; color: white; ">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agregar Usuario</h4>
        </div>
        <div class="modal-body">
          <div class="box-body">

            <!--Input Nombre-->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                  <input type="text" name="nuevoNonmbre" class="form-control input-lg" placeholder="Ingresar Nombre" required> 
                  
                </div>
                
              </div>
            <!--Input nick -->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-key"></i></span>
                  <input type="text" name="nuevoNick" class="form-control input-lg" placeholder="Ingresar Nombre de Usuario" required> 
                  
                </div>
                
              </div>

             <!-- input password-->
             
             <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                  <input type="text" name="nuevoPassword" class="form-control input-lg" placeholder="Ingresar Contraseña" required> 
                  
                </div>
                
              </div> 
              <!-- input perfil-->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-users"></i></span>
                  <select name="nuevoPerfil" class="form-control input-lg">
                    <option>Seleccionar Perfil</option>
                    <option value="Administrador">Administrador</option>
                    <option value="Especial">Especial</option>
                    <option value="Vendedor">Vendedor</option>
                    
                  </select> 
                  
                </div>
                
              </div>

              <!--SUbir Foto-->

              <div class="form-group">
                <div class="panel">SUBIR FOTO</div>
                <input type="file" name="nuevaFoto" id="nuevaFoto">
                <p class="help-block">Peso máximo de la goto 200mb</p>
                <img src="View/img/usuarios/default/anonymous.png" width="100px" class="img-thumbnail">
              </div>



          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">salir</button>
          <button type="submit" class="btn btn-primary">Guardar Usuario</button>
        </div>

    </form>

    </div>

  </div>
</div>
     