
<div class="content-wrapper">

    <section class="content-header">
        <h1>
            Crear Ventas
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio </a></li>
            <li class="active">Crear Ventas</li>
        </ol>
    </section>

    <section class="content">

        <div class="row">

            <!--==============================
            FORMULARIO
            ===============================-->
            <div class="col-lg-5 col-xs-12">

                <div class="box box-success">

                    <div class="box-header with-border"></div>

                    <form rol="form" method="post" class="formularioVenta">

                        <div class="box-body">

                            <div class="box">

                                <!--==============================
                                ENTRADA DEL VENDEDOR
                                ===============================-->
                                <div class="form-group">

                                    <div class="input-group">

                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        
                                        <input type="text" class="form-control input-lg" id="nuevoVendedor" value="<?php echo $_SESSION["nombre"]; ?>" readonly>

                                        <input type="hidden" name="idVendedor" value="<?php echo $_SESSION["id"]; ?>">

                                    </div>

                                </div>

                                <!--==============================
                                ENTRADA DEL CODIGO
                                ===============================-->
                                <div class="form-group">

                                    <div class="input-group">

                                        <span class="input-group-addon"><i class="fa fa-key"></i></span>

                                        <?php

                                            $item = null;

                                            $valor= null;

                                            $ventas = ControladorVentas::ctrMostrarVentas($item, $valor);

                                            if(!$ventas){

                                                echo '<input type="text" class="form-control input-lg" id="nuevaVenta" name="nuevaVenta"
                                                value="10001" readonly>';

                                            }else{

                                                foreach ($ventas as $key => $value) {
                                                    # code...
                                                }

                                                $codigo = $value["codigo"] +1;

                                                echo '<input type="text" class="form-control input-lg" id="nuevaVenta" name="nuevaVenta"
                                                value="'.$codigo.'" readonly>';

                                            }

                                        ?>

                                    </div>

                                </div>

                                <!--==============================
                                ENTRADA DEL CLIENTE
                                ===============================-->
                                <div class="form-group">

                                    <div class="input-group">

                                        <span class="input-group-addon"><i class="fa fa-users"></i></span>
                                        
                                        <select name="seleccionarCliente" id="seleccionarCliente" class="form-control" required>

                                            <option value="">Seleccionar cliente</option>

                                            <?php

                                                $item = null;

                                                $valor = null;

                                                $categorias = ControladorClientes::ctrMostrarClientes($item, $valor);

                                                foreach ($categorias as $key => $value) {
                                                    echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';
                                                }

                                            ?>

                                        </select>

                                        <span class="input-group-addon">
                                            
                                            <button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modalAgregarCliente" data-dismiss="modal">
                                                Agregar Cliente
                                            </button>

                                        </span>

                                    </div>

                                </div>

                                <!--==============================
                                ENTRADA AGREGAR PRODUCTO
                                ===============================-->
                                <div class="form-group row nuevoProducto">  </div>

                                <input type="hidden" name="listaProductos" id="listaProductos">

                                <!--==============================
                                BOTON AGREGAR PRODUCTO
                                ===============================-->
                                <button type="button" class="btn btn-default hidden-lg btnAgregarProducto">Agregar Producto</button>

                                <hr>

                                <div class="row">

                                    <!--==============================
                                    ENTRADA IMPUESTOS Y TOTAL
                                    ===============================-->
                                    <div class="col-xs-8 pull-right">
                    
                                        <table class="table">

                                        <thead>

                                            <tr>
                                            <th>Impuesto</th>
                                            <th>Total</th>      
                                            </tr>

                                        </thead>

                                        <tbody>
                                        
                                            <tr>
                                            
                                                <td style="width: 50%">
                                                    
                                                    <div class="input-group">
                                                
                                                        <input type="number" class="form-control input-lg" min="0" id="nuevoImpuestoVenta" name="nuevoImpuestoVenta" placeholder="0" required>

                                                        <input type="hidden" name="nuevoPrecioImpuesto" id="nuevoPrecioImpuesto" required>

                                                        <input type="hidden" name="nuevoPrecioNeto" id="nuevoPrecioNeto" required>

                                                        <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                                                
                                                    </div>

                                                </td>

                                                <td style="width: 50%">
                                                    
                                                    <div class="input-group">
                                                
                                                        <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

                                                        <input type="text" class="form-control input-lg" id="nuevoTotalVenta" name="nuevoTotalVenta" total="" placeholder="00000" readonly required>

                                                        <input type="hidden" name="totalVenta" id="totalVenta">

                                                    </div>

                                                </td>

                                            </tr>

                                        </tbody>

                                        </table>

                                    </div>

                                </div>

                                <hr>

                                <!--==============================
                                METODO DE PAGO
                                ===============================-->
                                <div class="form-group">

                                    <div class="col-xs-6">

                                        <div class="input-group" style="padding-right:0px">

                                            <select name="nuevoMetodoPago" id="nuevoMetodoPago" class="form-control" required>

                                                <option value="">Seleccione Metodo de Pago</option>
                                                <option value="Efectivo">Efectivo</option>
                                                <option value="TC">Tarjeta Credito</option>
                                                <option value="TD">Tarjeta Dedito</option>

                                            </select>

                                        </div>

                                    </div>

                                    <!--==============================
                                    CAJA METODO DE PAGO
                                    ===============================-->
                                    <div class="cajasMetodoPago"> </div>
                                    <input type="hidden" name="listaMetodoPago" id="listaMetodoPago">

                                </div>

                            </div>

                            <br>

                        </div>

                        <div class="box-footer">

                            <button type="submit" class="btn btn-primary pull-right">Guardar Venta</button>

                        </div>

                    </form>

                    <?php

                        $guardarVenta = new ControladorVentas();
                        $guardarVenta -> ctrCrearVenta();

                    ?>

                </div>

            </div>

            <!--==============================
            LA TABLA DE PRODUCTOS
            ===============================-->
            <div class="col-lg-7 hidden-md hidden-sm hidden-xs">

                <div class="box box-warning">

                    <div class="box-header with-border">

                        <div class="box-body">

                            <table class="table table-bordered table-striped dt-responsive tablaVentas">

                                <thead>

                                    <tr>
                                        <th style="width:10px">#</th>
                                        <th>Imagen</th>
                                        <th>Codigo</th>
                                        <th>Descripcion</th>
                                        <th>Stock</th>
                                        <th>Acciones</th>
                                    </tr>

                                </thead>

                            </table>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

</div>

<!--==============================
MODAL AGREGAR CLIENTES
===============================-->
<div id="modalAgregarCliente" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <form role="form" method="post">

                <!-- CABEZA DE MODAL-->
                <div class="modal-header" style="background:#3c8dbc; color:white">
                    <button type="button" class="close" data-dismiss="modal">x</button>
                    <h4 class="modal-title"> Agregar Clientes </h4>
                </div>

                <!-- CUERPO DE MODAL-->
                <div class="modal-body">
                    <div class="box-body">
                        <!-- Entrada Nombre-->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control input-lg" name="nuevoCliente"
                                    placeholder="Cliente" required>
                            </div>
                        </div>

                        <!-- Entrada Documento-->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                <input type="number" min="0" class="form-control input-lg" name="nuevoDocumento"
                                    placeholder="Documento" required>
                            </div>
                        </div>

                        <!-- Entrada Email-->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input type="email" class="form-control input-lg" name="nuevoEmail"
                                    placeholder="Email" required>
                            </div>
                        </div>

                        <!-- Entrada Telefono-->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                <input type="text" class="form-control input-lg" name="nuevoTelefono"
                                    placeholder="Telefono" data-inputmask="'mask': '(99) 999-9999999'" data-mask required>
                            </div>
                        </div>

                        <!-- Entrada Direccion-->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                <input type="text" class="form-control input-lg" name="nuevaDireccion"
                                    placeholder="Direccion" required>
                            </div>
                        </div>

                        <!-- Entrada Fecha de nacimiento-->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                <input type="text" class="form-control input-lg" name="nuevaFechaNacimiento"
                                    placeholder="Fecha de nacimiento" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask required>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- PIE DE MODAL-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary"> Guardar cliente</button>
                </div>
            </form>

            <?php
                $crearClientes = new ControladorClientes();
                $crearClientes -> ctrCrearCliente();
            ?> 

        </div>

    </div>

</div>
