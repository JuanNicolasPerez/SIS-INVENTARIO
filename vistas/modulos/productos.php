
<div class="content-wrapper">

    <section class="content-header">
        <h1>
            Administrar Productos
        </h1>
        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio </a></li>
            <li class="active">Administrar Productos</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Modal box -->
        <div class="box">
            <div class="box-header with-border">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarProducto">
                    Agregar Productos
                </button>
            </div>

            <!-- /.box-body -->
            <div class="box-body">
                <table class="table table-bordered table-striped dt-responsive tablaProductos" style="width:100%">
                    <thead>
                        <tr>
                            <th style="width:10px">#</th>
                            <th>Imagen</th>
                            <th>Codigo</th>
                            <th>Descripcion</th>
                            <th>Categorias</th>
                            <th>stock</th>
                            <th>Precio de compra</th>
                            <th>Precio de venta</th>
                            <th>Agregado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                </table>

                <input type="hidden" value="<?php echo $_SESSION["perfil"]; ?>" id="perfilOculto">

            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.Modal box -->
    </section>
    <!-- /.Main content -->
</div>

<!--==============================
MODAL AGREGAR PRODUCTOS
===============================-->
<div id="modalAgregarProducto" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <form role="form" method="post" enctype="multipart/form-data">

                <!-- CABEZA DE MODAL-->
                <div class="modal-header" style="background:#3c8dbc; color:white">
                    <button type="button" class="close" data-dismiss="modal">x</button>
                    <h4 class="modal-title"> Agregar Productos </h4>
                </div>

                <!-- CUERPO DE MODAL-->
                <div class="modal-body">
                    <div class="box-body">

                        <!-- ENTRADA PARA SELECCIONAR CATEGORIA-->
                        <div class="form-group">                                       
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-th"></i></span>
                                <select class="form-control input-lg" id="nuevaCategoria" name="nuevaCategoria" required>
                                    <option value="">Seleccionar Categoria</option>

                                    <?php
                                    
                                    $item = null;
                                    $valor = null;

                                    $categorias = (new ControladorCategorias) -> ctrMostrarCategorias($item, $valor);

                                    foreach ($categorias as $key => $value) {
                                        echo '<option class="text-uppercase" value="'.$value["id"].'">'.$value["categoria"].'</option>';
                                    }

                                    ?>
                                </select>
                            </div>
                        </div>

                        <!-- ENTRADA CODIGO-->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-code"></i></span>
                                <input type="text" class="form-control input-lg" id="nuevoCodigo" name="nuevoCodigo" placeholder="Ingresar Codigo" required>
                            </div>
                        </div>

                        <!-- ENTRADA DESCRIPCION-->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
                                <input type="text" class="form-control input-lg" name="nuevaDescripcion" placeholder="Ingresar Descripcion" required>
                            </div>
                        </div>

                        <!-- ENTRADA STOCK-->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-check"></i></span>
                                <input type="number" class="form-control input-lg" name="nuevoStock" min="0" placeholder="Stock" required>
                            </div>
                        </div>

                        <!-- ENTRADA PRECIOS-->
                        <div class="form-group row">

                            <!-- ENTRADA PRECIO COMPRA-->
                            <div class="col-xs-12 col-sm-6">    
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span>
                                    <input type="number" class="form-control input-lg" name="nuevoPrecioCompra" id="nuevoPrecioCompra" min="0" step="any" placeholder="Precio de compra" required>
                                </div>
                            </div>

                            <!-- ENTRADA PRECIO VENTA-->
                            <div class="col-xs-12 col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span>
                                    <input type="number" class="form-control input-lg" name="nuevoPrecioVenta" id="nuevoPrecioVenta" min="0" step="any" placeholder="Precio de venta" required>
                                </div>

                                <br>

                                <!-- CHECKBOX PORCENTAJA-->
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label>
                                            <input type="checkbox" class="minimal porcentaje" checked>
                                            Utilizar porcentaje
                                        </label>
                                    </div>
                                </div>

                                <!-- ENTRADA PORCENTAJE-->
                                <div class="col-xs-6" style="padding:0px">
                                    <div class="input-group">
                                        <input type="number" class="form-control input-lg nuevoPorcentaje" min="0" value="24" required>
                                        <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- SUBIR IMAGEN DEL PRODUCTO-->
                        <div class="form-group">
                            <div class="panel"> SUBIR IMAGEN </div>

                            <input type="file" name="nuevaImagen" class="nuevaImagen" required>

                            <p class="help-block">Peso maximo de la imagen 2MB</p>

                            <img src="vistas/img/productos/default/anonymous.png" alt="Foto Producto" class="img-thumbnail previsualizar" width="100px">
                        </div>
                    </div>
                </div>

                <!-- PIE DE MODAL-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary"> Guardar Producto</button>
                </div>
            </form>

            <?php
            
                $crearProducto = new ControladorProductos();
                $crearProducto -> ctrCrearProducto();
            
            ?>

        </div>

    </div>

</div>

<!--==============================
MODAL EDITAR PRODUCTOS
===============================-->
<div id="modalEditarProducto" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <form role="form" method="post" enctype="multipart/form-data">

                <!-- CABEZA DE MODAL-->
                <div class="modal-header" style="background:#3c8dbc; color:white">
                    <button type="button" class="close" data-dismiss="modal">x</button>
                    <h4 class="modal-title"> Editar Productos </h4>
                </div>

                <!-- CUERPO DE MODAL-->
                <div class="modal-body">
                    <div class="box-body">

                        <!-- ENTRADA PARA SELECCIONAR CATEGORIA-->
                        <div class="form-group">                                       
                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                                <select class="form-control input-lg" name="editarCategoria" readonly required>

                                    <option id="editarCategoria"></option>

                                </select>
                            </div>
                        </div>

                        <!-- ENTRADA CODIGO-->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-code"></i></span>
                                <input type="text" class="form-control input-lg" id="editarCodigo" name="editarCodigo" readonly required>
                            </div>
                        </div>

                        <!-- ENTRADA DESCRIPCION-->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
                                <input type="text" class="form-control input-lg" name="editarDescripcion" id="editarDescripcion" required>
                            </div>
                        </div>

                        <!-- ENTRADA STOCK-->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-check"></i></span>
                                <input type="number" class="form-control input-lg" name="editarStock" min="0" id="editarStock" required>
                            </div>
                        </div>

                        <!-- ENTRADA PRECIOS-->
                        <div class="form-group row">

                            <!-- ENTRADA PRECIO COMPRA-->
                            <div class="col-xs-12 col-sm-6">    
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span>
                                    <input type="number" class="form-control input-lg" name="editarPrecioCompra" id="editarPrecioCompra" min="0" step="any" required>
                                </div>
                            </div>

                            <!-- ENTRADA PRECIO VENTA-->
                            <div class="col-xs-12 col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span>
                                    <input type="number" class="form-control input-lg" name="editarPrecioVenta" id="editarPrecioVenta" min="0" step="any" readonly required>
                                </div>

                                <br>

                                <!-- CHECKBOX PORCENTAJA-->
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label>
                                            <input type="checkbox" class="minimal porcentaje" checked>
                                            Utilizar porcentaje
                                        </label>
                                    </div>
                                </div>

                                <!-- ENTRADA PORCENTAJE-->
                                <div class="col-xs-6" style="padding:0px">
                                    <div class="input-group">
                                        <input type="number" class="form-control input-lg nuevoPorcentaje" min="0" value="40" required>
                                        <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- SUBIR IMAGEN DEL PRODUCTO-->
                        <div class="form-group">

                            <div class="panel"> SUBIR IMAGEN </div>

                            <input type="file" name="editarImagen" class="nuevaImagen">

                            <p class="help-block">Peso maximo de la imagen 2MB</p>

                            <img src="vistas/img/productos/default/anonymous.png" alt="Foto Producto" class="img-thumbnail previsualizar" width="100px">

                            <input type="hidden" name="imagenActual" id="imagenActual">

                        </div>

                    </div>

                </div>

                <!-- PIE DE MODAL-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary"> Guardar Cambios</button>
                </div>
            </form>

            <?php
            
            $editarProducto = new ControladorProductos();
            $editarProducto -> ctrEditarProducto();

            ?>
        </div>

    </div>

</div>

<?php
            
    $eliminarProducto = new ControladorProductos();
    $eliminarProducto -> ctrEliminarProducto();

?>