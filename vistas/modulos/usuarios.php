<?php

    if ($_SESSION["perfil"] == "Supervisor" ||$_SESSION["perfil"] == "Vendedor") {

        echo '<script>
        
                window.location = "inicio";

                </script>';

        return;

    }

?>


<div class="content-wrapper">

    <section class="content-header">
        <h1>
            Administrar Usuarios
        </h1>
        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio </a></li>
            <li class="active">Administrar Usuarios</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Modal box -->
        <div class="box">
            <div class="box-header with-border">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">
                    Agregar Usuario
                </button>
            </div>

            <!-- /.box-body -->
            <div class="box-body">
                <table class="table table-bordered table-striped dt-responsive tablas" style="width:100%">
                    <thead>
                        <tr>
                            <th style="width:10px">#</th>
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

                        <?php
                            $item = null;
                            $valor = null;

                            $usuarios = (new ControladorUsuarios) -> ctrMostrarUsuarios($item, $valor);

                            foreach ($usuarios as $key => $value) {
                                echo '
                                    <tr>
                                        <td>'.($key+1).'</td>
                                        <td>'.$value["nombre"].'</td>
                                        <td>'.$value["usuario"].'</td>';

                                        if ($value["foto"] != "") {
                                            echo '<td><img src="'.$value["foto"].'" class="img-thumbnail" width="40px"></td>';
                                        } else {
                                            echo '<td><img src="vistas/img/usuarios/default/usuario.png" class="img-thumbnail" width="40px"></td>';
                                        }

                                        echo '<td>'.$value["perfil"].'</td>';

                                        if ($value["estado"] != 0) {
                                            echo '<td><button class="btn btn-success btn-xs btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="0">Activado</button></td>';
                                        }else{
                                            echo '<td><button class="btn btn-danger btn-xs btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="1">Desactivado</button></td>';
                                        }

                                        echo '<td>'.$value["ultimo_login"].'</td>

                                        <td>
                                            <div class="btn group">
                                                <button class="btn btn-warning btnEditarUsuario" idUsuario="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fa fa-pencil"></i></button>
                                                <button class="btn btn-danger btnEliminarUsuario" idUsuario="'.$value["id"].'" usuario="'.$value["usuario"].'" fotoUsuario="'.$value["foto"].'"><i class="fa fa-times"></i></button>
                                            </div>
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
MODAL AGREGAR USUARIO
===============================-->
<div id="modalAgregarUsuario" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <form role="form" method="post" enctype="multipart/form-data">

                <!-- CABEZA DE MODAL-->
                <div class="modal-header" style="background:#3c8dbc; color:white">
                    <button type="button" class="close" data-dismiss="modal">x</button>
                    <h4 class="modal-title"> Agregar Usuario </h4>
                </div>

                <!-- CUERPO DE MODAL-->
                <div class="modal-body">
                    <div class="box-body">
                        <!-- Entrada Nombre-->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control input-lg" name="nuevoNombre"
                                    placeholder="Ingresar Nombre" required>
                            </div>
                        </div>

                        <!-- Entrada Usuario-->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                <input type="text" class="form-control input-lg" name="nuevoUsuario" id="nuevoUsuario"
                                    placeholder="Ingresar Usuario" required>
                            </div>
                        </div>

                        <!-- Entrada Contraseña-->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" class="form-control input-lg" name="nuevoPassword"
                                    placeholder="Ingresar Contraseña" required>
                            </div>
                        </div>

                        <!-- Entrada Perfil-->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                                <select class="form-control input-lg" name="nuevoPerfil">
                                    <option value="">Selecionar Perfil</option>
                                    <option value="Administrador">Administrador</option>
                                    <option value="Supervisor">Supervisor</option>
                                    <option value="Vendedor">Vendedor</option>
                                </select>
                            </div>
                        </div>

                        <!-- Entrada foto-->
                        <div class="form-group">
                            <div class="panel">SUBIR FOTO</div>
                            <input type="file" name="nuevaFoto" class="nuevaFoto" required>
                            <p class="help-block">Peso Maximo de la foto 2 MB.</p>
                            <img src="vistas/img/usuarios/default/usuario.png" alt="Foto Usuario" class="img-thumbnail previsualizar"
                                style="width:100px">
                        </div>
                    </div>
                </div>

                <!-- PIE DE MODAL-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary"> Guardar Usuario</button>
                </div>
            <?php
                $crearUsuario = new ControladorUsuarios();
                $crearUsuario -> ctrCrearUsuario();
            ?>
            </form>

        </div>

    </div>

</div>

<!--==============================
MODAL EDITAR USUARIO
===============================-->
<div id="modalEditarUsuario" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <form role="form" method="post" enctype="multipart/form-data">

                <!-- CABEZA DE MODAL-->
                <div class="modal-header" style="background:#3c8dbc; color:white">
                    <button type="button" class="close" data-dismiss="modal">x</button>
                    <h4 class="modal-title"> Editar Usuario </h4>
                </div>

                <!-- CUERPO DE MODAL-->
                <div class="modal-body">
                    <div class="box-body">

                        <!-- Entrada Nombre-->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control input-lg" id="editarNombre" name="editarNombre"
                                    value="" required>
                            </div>
                        </div>

                        <!-- Entrada Usuario-->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                <input type="text" class="form-control input-lg" id="editarUsuario" name="editarUsuario"
                                    value="" readonly>
                            </div>
                        </div>

                        <!-- Entrada Contraseña-->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" class="form-control input-lg" name="editarPassword"
                                    placeholder="Ingresar nueva Contraseña" required>
                                <input type="hidden" id="passwordActual" name="passwordActual">
                            </div>
                        </div>

                        <!-- Entrada Perfil-->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                                <select class="form-control input-lg" name="editarPerfil">
                                    <option value="" id="editarPerfil">Selecionar Perfil</option>
                                    <option value="Administrador">Administrador</option>
                                    <option value="Supervisor">Supervisor</option>
                                    <option value="Vendedor">Vendedor</option>
                                </select>
                            </div>
                        </div>

                        <!-- Entrada foto-->
                        <div class="form-group">
                            <div class="panel">SUBIR FOTO</div>
                            <input type="file" name="editarFoto" class="nuevaFoto">
                            <p class="help-block">Peso Maximo de la foto 2 MB.</p>
                            <img src="vistas/img/usuarios/default/usuario.png" alt="Foto Usuario" class="img-thumbnail previsualizar"
                                width="100px">
                            <input type="hidden" name="fotoActual" id="fotoActual">
                        </div>
                    </div>
                </div>

                <!-- PIE DE MODAL-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary"> Modificar Usuario</button>
                </div>
                
                <?php
                    $editarUsuario = new ControladorUsuarios();
                    $editarUsuario -> ctrEditarUsuario();
                ?> 

            </form>

        </div>

    </div>

</div>

<?php
    $borrarUsuario = new ControladorUsuarios();
    $borrarUsuario -> ctrBorrarUsuario();
?> 