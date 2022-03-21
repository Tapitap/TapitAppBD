<?php
/**
 * Obtiene el detalle de una meta especificada por
 * su identificador "username"
 */

require '../Productos.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    if (isset($_GET['id'])) {

        // Obtener parÃ¡metro usernmesa
        $id = $_GET['id'];

        // Tratar retorno
        $retorno = Productos::getById($id);


        if ($retorno) {

            $Precios["estado"] = "1";
            $Precios["Producto"] = $retorno;
            // Enviar objeto json del usuario mesa
            print json_encode($Precios);
        } else {
            // Enviar respuesta de error general
            print json_encode(
                array(
                    'estado' => '-1',
                    'mensaje' => 'No se obtuvo el registro'
                )
            );
        }

    } else {
        // Enviar respuesta de error
        print json_encode(
            array(
                'estado' => '-1',
                'mensaje' => 'Se necesita un identificador'
            )
        );
    }
}
?>