<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Administrar Producto
      
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Administrar Producto</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">


          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgragarProducto">
            
            Agregar Producto
          </button>


        </div>


        <div class="box-body">

          
          <table class="table table-bordered table-striped tablas dt-responsive">

            <thead>
              <tr>
                <th style="width: 10px" >#</th>
                <th>Imagen</th>
                <th>Código</th>
                <th>Descripcion</th>
                <th>Categoria</th>
                <th>Stock</th>
                <th>Precio de compra</th>
                <th>Precio de venta</th>
                <th>Agregado</th>
                <th>Acciones</th>

              </tr>
            </thead>
            <tbody>
              <td>1</td>
              <td><img src="View/img/productos/default/anonymous.png" class="img-thumbnail" width="40px" ></td>
              <td>123456</td>
              <td>descripcion del producto</td>
              <td>papeleria</td>
              <td>20</td>
              <td>5.00</td>
              <td>10.00</td>
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


<div id="modalAgragarProducto" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <form class="form" method="post" enctype="multipart/form-darta">

        <div class="modal-header" style="background:#3c8dbc; color: white; ">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agregar Producto</h4>
        </div>
        <div class="modal-body">
          <div class="box-body">

            <!--Input Codigo-->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-code"></i></span>
                  <input type="text" name="nuevoCodigo" class="form-control input-lg" placeholder="Ingresar Código" required> 
                  
                </div>
                
              </div>
            <!--Input descripcion -->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
                  <input type="text" name="nuevoDescripcion" class="form-control input-lg" placeholder="Ingresar descripcion" required> 
                  
                </div>
                
              </div>

              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-th"></i></span>
                  <select name="nuevaCategoria" class="form-control input-lg">
                    <option>Seleccionar Categoría</option>
                    <option value="taladros">Administrador</option>
                    <option value="al">Especial</option>
                    <option value="Vendedor">Vendedor</option>
                    
                  </select> 
                  
                </div>
                
              </div>
              
              <!--Input descripcion -->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-check"></i></span>
                  <input type="number" name="nuevoStok" class="form-control input-lg" min="0" placeholder="Ingresar Stock" required> 
                  
                </div>
                
              </div>

 
              <!--Input compra-->
              <div class="form-group row">

                  <div class="col-xs-6">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span>
                      <input type="number" name="nuevoPrecioCompra" class="form-control input-lg" min="0" placeholder=" Precio de compra" required> 
                      
                    </div>
                  </div>
                

              <!--Input compra-->
                <div class="col-xs-6">
                  <div class="input-group ">                  
                    <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span>
                    <input type="number" name="nuevoPrecioVenta" class="form-control input-lg" min="0" placeholder=" Precio de venta" required> 
                    
                  </div>

                  <br/>
                      <!--checkbox para porcentaje-->
                  <div class="col-xs-6">
                    
                    <div class="form-group">

                        <label>
                          <input type="checkbox" class="minimal porcentaje"  checked>
                          Utilizar Porcentaje

                        </label>
                    </div>  


                  </div>

                  <!--entrada para porcentaje-->
                  <div class="col-xs-6" style="padding: 0">
                    
                    <div class="input-group">

                        
                          <input type="number" class="form-control input-lg nuevoPorcentaje" value="40"  required>
                          <span class="input-group-addon"><i class="fa fa-percent "></i></span>

                        
                    </div>  


                  </div>

                </div>  
              </div>




                        

              <!--SUbir imagen-->

              <div class="form-group">
                <div class="panel">SUBIR FOTO</div>
                <input type="file" name="nuevaImagen" id="nuevaImagen">
                <p class="help-block">Peso máximo de la goto 5mb</p>
                <img src="View/img/productos/default/anonymous.png" width="100px" class="img-thumbnail">
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
     