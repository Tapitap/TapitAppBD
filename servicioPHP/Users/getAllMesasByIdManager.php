<?php
/**
 * Obtiene el detalle de una meta especificada por
 * su identificador "username"
 */

require '../Users.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    if (isset($_GET['id_manager'])) {

        // Obtener parÃ¡metro id_manager
        $parametro = $_GET['id_manager'];

        // Tratar retorno
        $retorno = Users::getAllMesasByIdManager($parametro);


        if ($retorno) {

            $mesas["estado"] = "1";
            $mesas["ManagerUser"] = $retorno;
            // Enviar objeto json del usuario mesa
            print json_encode($mesas);
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