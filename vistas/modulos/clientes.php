<?php

    if ($_SESSION["perfil"] == "Supervisor") {

        echo '<script>
        
                window.location = "inicio";

                </script>';

        return;

    }

?>

<div class="content-wrapper">

    <section class="content-header">
        <h1>
            Administrar Clientes
        </h1>
        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio </a></li>
            <li class="active">Administrar Clientes</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Modal box -->
        <div class="box">
            <div class="box-header with-border">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCliente">
                    Agregar Clientes
                </button>
            </div>

            <!-- /.box-body -->
            <div class="box-body">
                <table class="table table-bordered table-striped dt-responsive tablas" style="width:100%">
                    <thead>
                        <tr>
                            <th style="width:10px">#</th>
                            <th>Nombre </th>
                            <th>Documento</th>
                            <th>Email</th>
                            <th>Telefono</th>
                            <th>Direccion</th>
                            <th>Fecha de nacimiento</th>
                            <th>Total de compras</th>
                            <th>Ultima compra</th>
                            <th>Ingreso sistema</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php

                            $item = null;

                            $valor= null;

                            $clientes = (new ControladorClientes) -> ctrMostrarClientes($item, $valor);

                            foreach ($clientes as $key => $value) {

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

                                            <div class="btn group">

                                                <button class="btn btn-warning btnEditarCliente" data-toggle="modal" data-target="#modalEditarCliente" idCliente="'.$value["id"].'">
                                                    <i class="fa fa-pencil"></i>
                                                </button>';

                                                if ($_SESSION["perfil"] == "Administrador") {

                                                    echo '
                                                            <button class="btn btn-danger btnEliminarCliente" idCliente="'.$value["id"].'"">
                                                                <i class="fa fa-times"></i>
                                                            </button>
                                                        ';
                                                }

                                        echo '</div>

                                        </td>

                                    </tr>';
                            }

                        ?>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.Modal box -->
    </section>
    <!-- /.Main content -->
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

<!--==============================
MODAL EDITAR CLIENTES
===============================-->
<div id="modalEditarCliente" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <form role="form" method="post">

                <!-- CABEZA DE MODAL-->
                <div class="modal-header" style="background:#3c8dbc; color:white">
                    <button type="button" class="close" data-dismiss="modal">x</button>
                    <h4 class="modal-title"> Editar Clientes </h4>
                </div>

                <!-- CUERPO DE MODAL-->
                <div class="modal-body">
                    <div class="box-body">
                        <!-- Entrada Nombre-->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control input-lg" name="editarCliente" id="editarCliente" required>
                                <input type="hidden" name="idCliente" id="idCliente">
                            </div>
                        </div>

                        <!-- Entrada Documento-->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                <input type="number" min="0" class="form-control input-lg" name="editarDocumento" id="editarDocumento"
                                    required>
                            </div>
                        </div>

                        <!-- Entrada Email-->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input type="email" class="form-control input-lg" name="editarEmail" id="editarEmail"
                                    required>
                            </div>
                        </div>

                        <!-- Entrada Telefono-->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                <input type="text" class="form-control input-lg" name="editarTelefono"
                                id="editarTelefono" data-inputmask="'mask': '(99) 999-9999999'" data-mask required>
                            </div>
                        </div>

                        <!-- Entrada Direccion-->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                <input type="text" class="form-control input-lg" name="editarDireccion"
                                id="editarDireccion" required>
                            </div>
                        </div>

                        <!-- Entrada Fecha de nacimiento-->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                <input type="text" class="form-control input-lg" name="editarFechaNacimiento"
                                id="editarFechaNacimiento" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask required>
                            </div>
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
                $editarClientes = new ControladorClientes();
                $editarClientes -> ctrEditarCliente();
            ?> 

        </div>

    </div>

</div>

<?php
    $eliminarClientes = new ControladorClientes();
    $eliminarClientes -> ctrEliminarCliente();
?> 