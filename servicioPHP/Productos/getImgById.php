<?php
/**
 * Obtiene el detalle de una meta especificada por
 * su identificador "username"
 */

require '../Productos.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    if (isset($_GET['id']) {

        // Obtener parÃ¡metro usernmesa
        $id = $_GET['id_manager'];

        // Tratar retorno
        $retorno = Productos::getImgById($id);


        if ($retorno) {

            $Productos["estado"] = "1";
            $Productos["Imagen"] = $retorno;
            // Enviar objeto json del usuario mesa
            print json_encode($Productos);
        } else {
            // Enviar respuesta de error general
            print json_encode(
                array(
                    'estado' => '-1',
                    'mensaje' => 'No se obtuvo la imagen'
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