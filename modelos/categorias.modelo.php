<?php
require_once "conexion.php";

class ModelosCategorias{

    /*--==============================
    CREAR CATEGORIAS
    ===============================-*/
    static public function mdlIngresarCategoria($tabla, $datos){

        $stmt = (new Conexion) -> conectar() -> prepare("INSERT INTO $tabla(categoria) VALUES (:categoria)");

        $stmt -> bindParam(":categoria", $datos, PDO::PARAM_STR);

        if ($stmt -> execute()) {
            return "ok";
        } else {
            return "error";
        }
        
        $stmt -> close();
    
        $stmt = null;
    }

    /*--==============================
    MOSTRAR CATEGORIAS
    ===============================-*/
    static public function mdlMostrarCategorias($tabla, $item, $valor){

        if ($item != null) {

            $stmt = (new Conexion) -> conectar() -> prepare("SELECT * FROM $tabla WHERE $item = :$item");

            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

            $stmt -> execute();

            return $stmt -> fetch();

        }else {

            $stmt = (new Conexion) -> conectar() -> prepare("SELECT * FROM $tabla");

            $stmt -> execute();

            return $stmt -> fetchAll();
        }

        $stmt -> close();

        $stmt = null;
    }

    /*--==============================
    EDITAR CATEGORIAS
    ===============================-*/
    static public function mdlEditarCategoria($tabla, $datos){

        $stmt = (new Conexion) -> conectar() -> prepare("UPDATE $tabla SET categoria = :categoria WHERE id = :id");

        $stmt -> bindParam(":categoria", $datos["categoria"], PDO::PARAM_STR);

        $stmt -> bindParam(":id", $datos["id"], PDO::PARAM_STR);

        if ($stmt -> execute()) {
            return "ok";
        } else {
            return "error";
        }
        
        $stmt -> close();
    
        $stmt = null;
    }

    /*--==============================
    BORRAR CATEGORIAS
    ===============================-*/
    static public function mdlBorrarCategoria($tabla, $datos){

        $stmt = (new Conexion) -> conectar() -> prepare("DELETE FROM $tabla WHERE id = :id");

        $stmt -> bindParam(":id", $datos, PDO::PARAM_STR);

        if ($stmt -> execute()) {
            return "ok";
        } else {
            return "error";
        }
        
        $stmt -> close();
    
        $stmt = null;
    }
}