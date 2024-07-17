<?php

require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

class AjaxProductos{

    /*--==============================
    GENERAR CODIGO A PARTIR DE ID CATEGORIA
    ===============================-*/
    public $idCategoria;

    public function ajaxCrearCodigoProducto(){

        $item = "id_categoria";

        $valor = $this->idCategoria;

        $orden = "id";

        $respuesta = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);

        echo json_encode($respuesta);

    }

    /*--==============================
    EDITAR
    ===============================-*/
    public $idProducto;
    public $traerProductos;
    public $nombreProducto;

    public function ajaxEditarProducto(){

        if ($this->traerProductos == "ok") {
            
            $item = null;

            $valor = null;

            $orden = "id";

            $respuesta = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);
    
            echo json_encode($respuesta);

        }elseif($this->nombreProducto != ""){

            $item = "descripcion";

            $valor = $this->nombreProducto;

            $orden = "id";

            $respuesta = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);
    
            echo json_encode($respuesta);

        } else {

            $item = "id";

            $valor = $this->idProducto;

            $orden = "id";

            $respuesta = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);
    
            echo json_encode($respuesta);

        }


    }
}

/*--==============================
GENERAR CODIGO A PARTIR DE ID CATEGORIA
===============================-*/
if (isset($_POST["idCategoria"])) {

    $codigoProducto = new AjaxProductos();
    $codigoProducto -> idCategoria = $_POST["idCategoria"];
    $codigoProducto -> ajaxCrearCodigoProducto();
}

/*--==============================
EDITAR PRODUCTO
===============================-*/
if (isset($_POST["idProducto"])) {

    $editarProducto = new AjaxProductos();
    $editarProducto -> idProducto = $_POST["idProducto"];
    $editarProducto -> ajaxEditarProducto();
}

/*--==============================
TRAER PRODUCTOS
===============================-*/
if (isset($_POST["traerProductos"])) {

    $traerProducto = new AjaxProductos();
    $traerProducto -> traerProductos = $_POST["traerProductos"];
    $traerProducto -> ajaxEditarProducto();
}

/*--==============================
NOMBRE PRODUCTO
===============================-*/
if (isset($_POST["nombreProducto"])) {

    $traerProducto = new AjaxProductos();
    $traerProducto -> nombreProducto = $_POST["nombreProducto"];
    $traerProducto -> ajaxEditarProducto();
}