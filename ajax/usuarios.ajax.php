<?php

require_once "../controladores/usuarios.controlador.php";
require_once "../modelos/usuarios.modelo.php";

class AjaxUsuarios{

    /*--==============================
    EDITAR USUARIO
    ===============================-*/
    public $idUsuario;

    public function  AjaxEditarUsuarios(){

        $item = "id";
        $valor = $this -> idUsuario;

        $respuesta = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

        echo json_encode($respuesta);

    }

    /*--==============================
    ACTIVAR USUARIO
    ===============================-*/
    public $activarUsuario;
    public $activarId;

    public function  AjaxActivarUsuarios(){

        $tabla = "usuarios";

        $item1 = "estado";
        $valor1 = $this->activarUsuario;

        $item2 = "id";
        $valor2 = $this->activarId;

        $respuesta = ModeloUsuarios::mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2);

    }

    /*--==============================
    EVITAR REPETIR USUARIO
    ===============================-*/
    public $validarUsuario;

    public function  AjaxValidarUsuarios(){

        $item = "usuario";
        $valor = $this -> validarUsuario;

        $respuesta = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

        echo json_encode($respuesta);

    }
}

/*--==============================
EDITAR USUARIO
===============================-*/
if (isset($_POST["idUsuario"])) {
    $editar = new AjaxUsuarios();
    $editar -> idUsuario = $_POST["idUsuario"];
    $editar -> AjaxEditarUsuarios();
}

/*--==============================
ACTIVAR USUARIO
===============================-*/
if (isset($_POST["activarUsuario"])) {
    $activarUsuario = new AjaxUsuarios();
    $activarUsuario -> activarUsuario = $_POST["activarUsuario"];
    $activarUsuario -> activarId = $_POST["activarId"];
    $activarUsuario -> AjaxActivarUsuarios();
}

/*--==============================
EVITAR REPETIR USUARIO
===============================-*/
if (isset($_POST["validarUsuario"])) {
    $valUsuario = new AjaxUsuarios();
    $valUsuario -> validarUsuario = $_POST["validarUsuario"];
    $valUsuario -> AjaxValidarUsuarios();
}