<?php

require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";

class TablaProductosVentas{

    /*--==============================
    MOSTRAR LA TABLA DINAMICA DE PRODUCTOS
    ===============================-*/
    public function mostrarTablaProductosVentas(){

        $item = null;
        $valor= null;
        $orden = "id";

        $productos = (new ControladorProductos) -> ctrMostrarProductos($item, $valor, $orden);

        $datosJson = '{
            "data":[';

            for ($i=0; $i < count($productos); $i++) { 

                /*--==============================
                TRAEMOS LA IMAGEN A LA TABLA DINAMICA DE PRODUCTOS
                ===============================-*/
                $imagen = "<img src='".$productos[$i]["imagen"]."' alt='Imagen Producto' width='40px'>";

                /*--==============================
                TRAEMOS EL STOCK A LA TABLA DINAMICA DE PRODUCTOS
                ===============================-*/
                if($productos[$i]["stock"] <= 10){
                    $stock = "<button class='btn btn-danger'>".$productos[$i]["stock"]."</button>";

                }else if($productos[$i]["stock"] > 11 && $productos[$i]["stock"] <= 15){
                    $stock = "<button class='btn btn-warning'>".$productos[$i]["stock"]."</button>";

                }else{
                    $stock = "<button class='btn btn-success'>".$productos[$i]["stock"]."</button>";
                }

                /*--==============================
                TRAEMOS LAS ACCIONES A LA TABLA DINAMICA DE PRODUCTOS
                ===============================-*/
                $botones = "<div class='btn-group'><button class='btn btn-primary agregarProducto recuperarBoton' idProducto='".$productos[$i]["id"]."'> Agregar </button></div>";

                $datosJson .= '[
                    "'.($i+1).'",
                    "'.$imagen.'",
                    "'.$productos[$i]["codigo"].'",
                    "'.$productos[$i]["descripcion"].'",
                    "'.$stock.'",
                    "'.$botones.'"
                ],';

            }

            $datosJson = substr($datosJson, 0, -1);

        $datosJson .= '] 

        }';

        echo $datosJson;
    }
}

/*--==============================
ACTIVAR LA TABLA DINAMICA DE PRODUCTOS
===============================-*/
$activarProductosVentas = new TablaProductosVentas();
$activarProductosVentas -> mostrarTablaProductosVentas();