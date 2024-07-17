<?php

    if ($_SESSION["perfil"] == "Vendedor") {

        echo '<script>
        
                window.location = "inicio";

                </script>';

        return;

    }

?>

<div class="content-wrapper">

    <section class="content-header">
        <h1>
            Administrar Categorias
        </h1>
        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio </a></li>
            <li class="active">Administrar Categorias</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Modal box -->
        <div class="box">
            <div class="box-header with-border">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCategoria">
                    Agregar Categorias
                </button>
            </div>

            <!-- /.box-body -->
            <div class="box-body">
                <table class="table table-bordered table-striped dt-responsive tablas" style="width:100%">
                    <thead>
                        <tr>
                            <th style="width:10px">#</th>
                            <th>Categorias</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php

                        $item = null;
                        $valor = null;

                        $categorias = (new ControladorCategorias)->ctrMostrarCategorias($item, $valor);

                        foreach ($categorias as $key => $value) {

                            echo '  <tr>
                                        <td>' . ($key + 1) . '</td>
                                        <td class="text-uppercase">' . $value["categoria"] . '</td>
                                        <td>
                                            <div class="btn group">
                                                <button class="btn btn-warning btnEditarCategoria" idCategoria="' . $value["id"] . '" data-toggle="modal" data-target="#modalEditarCategoria"><i class="fa fa-pencil"></i></button>';

                            if ($_SESSION["perfil"] == "Administrador") {

                                echo ' <button class="btn btn-danger btnEliminarCategoria" idCategoria="' . $value["id"] . '">
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
MODAL AGREGAR CATEGORIAS
===============================-->
<div id="modalAgregarCategoria" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <form role="form" method="post">

                <!-- CABEZA DE MODAL-->
                <div class="modal-header" style="background:#3c8dbc; color:white">
                    <button type="button" class="close" data-dismiss="modal">x</button>
                    <h4 class="modal-title"> Agregar Categorias </h4>
                </div>

                <!-- CUERPO DE MODAL-->
                <div class="modal-body">
                    <div class="box-body">
                        <!-- Entrada Categoria-->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-th"></i></span>
                                <input type="text" class="form-control input-lg" name="nuevaCategoria" placeholder="Ingresar Categoria" required>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- PIE DE MODAL-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary"> Guardar Categoria</button>
                </div>

                <?php
                $crearCategoria = new ControladorCategorias();
                $crearCategoria->ctrCrearCategoria();
                ?>

            </form>

        </div>

    </div>

</div>

<!--==============================
MODAL EDITAR CATEGORIA
===============================-->
<div id="modalEditarCategoria" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <form role="form" method="post">

                <!-- CABEZA DE MODAL-->
                <div class="modal-header" style="background:#3c8dbc; color:white">
                    <button type="button" class="close" data-dismiss="modal">x</button>
                    <h4 class="modal-title"> Editar Categorias </h4>
                </div>

                <!-- CUERPO DE MODAL-->
                <div class="modal-body">
                    <div class="box-body">
                        <!-- Entrada Categoria-->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-th"></i></span>
                                <input type="text" class="form-control input-lg text-uppercase" name="editarCategoria" id="editarCategoria" required>

                                <input type="hidden" name="idCategoria" id="idCategoria" required>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- PIE DE MODAL-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary"> Guardar Cambios </button>
                </div>

                <?php
                $editarCategoria = new ControladorCategorias();
                $editarCategoria->ctrEditarCategoria();
                ?>

            </form>

        </div>

    </div>

</div>

<?php
$borrarCategoria = new ControladorCategorias();
$borrarCategoria->ctrBorrarCategoria();
?>