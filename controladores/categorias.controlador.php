<?php

class ControladorCategorias{

    /*--==============================
    CREAR CATEGORIAS
    ===============================-*/
    static public function ctrCrearCategoria(){
        if (isset($_POST["nuevaCategoria"])) {
            
            if (preg_match('/^[-a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/',$_POST["nuevaCategoria"])){

                $tabla = "categoria";

                $datos = $_POST["nuevaCategoria"];

                $respuesta = ModelosCategorias::mdlIngresarCategoria($tabla, $datos);

                if($respuesta == "ok"){

                    echo    '<script>
                                swal({
                                    type:"success",
                                    title:"!La Categoria ha sido guardada correctamente¡",
                                    showConfirmButton:true,
                                    confirmButtonText:"Cerrar.",
                                    closeOnConfirm:true

                                }).then((result)=>{
                                    if(result.value){
                                        window.location = "categorias";
                                    }
                                });
                            </script>';

                }

            }else{
                echo    '<script>
                            swal({
                                type:"error",
                                title:"!La Categoria no puede ir vacia o llevar caracteres especiales¡",
                                showConfirmButton:true,
                                confirmButtonText:"Cerrar.",
                                closeOnConfirm:false

                            }).then((result)=>{
                                if(result.value){
                                    window.location = "categorias";
                                }
                            });
                        </script>';
            }
        }
    }

    /*--==============================
    MOSTRAR CATEGORIAS
    ===============================-*/
    static public function ctrMostrarCategorias($item, $valor){

        $tabla = "categoria";

        $respuesta = ModelosCategorias::mdlMostrarCategorias($tabla, $item, $valor);

        return $respuesta;

    }

    /*--==============================
    EDITAR CATEGORIAS
    ===============================-*/
    static public function ctrEditarCategoria(){
        if (isset($_POST["editarCategoria"])) {
            
            if (preg_match('/^[-a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/',$_POST["editarCategoria"])){

                $tabla = "categoria";

                $datos = array("categoria" => $_POST["editarCategoria"],
                                "id" => $_POST["idCategoria"]);

                $respuesta = ModelosCategorias::mdlEditarCategoria($tabla, $datos);

                if($respuesta == "ok"){

                    echo    '<script>
                                swal({
                                    type:"success",
                                    title:"!La Categoria ha sido editado correctamente¡",
                                    showConfirmButton:true,
                                    confirmButtonText:"Cerrar.",
                                    closeOnConfirm:false

                                }).then((result)=>{
                                    if(result.value){
                                        window.location = "categorias";
                                    }
                                });
                            </script>';

                }

            }else{
                echo    '<script>
                            swal({
                                type:"error",
                                title:"!La Categoria no puede ir vacia o llevar caracteres especiales¡",
                                showConfirmButton:true,
                                confirmButtonText:"Cerrar.",
                                closeOnConfirm:false

                            }).then((result)=>{
                                if(result.value){
                                    window.location = "categorias";
                                }
                            });
                        </script>';
            }
        }
    }

    /*--==============================
    BORRAR CATEGORIAS
    ===============================-*/
    static public function ctrBorrarCategoria(){

        if(isset($_GET["idCategoria"])){

            $tabla = "categoria";
            $datos = $_GET["idCategoria"];

            $respuesta = ModelosCategorias::mdlBorrarCategoria($tabla, $datos);

            if($respuesta == "ok"){

                echo    '<script>
                            swal({
                                type:"success",
                                title:"!La Categoria ha sido borrado correctamente¡",
                                showConfirmButton:true,
                                confirmButtonText:"Cerrar.",
                                closeOnConfirm:false

                            }).then((result)=>{
                                if(result.value){
                                    window.location = "categorias";
                                }
                            });
                        </script>';

            }
        }
    }
}