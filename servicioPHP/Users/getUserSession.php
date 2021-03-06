<?php
/**
 * Obtiene el detalle de una meta especificada por
 * su identificador "username"
 */

require '../Users.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    if (isset($_GET['username'])) {

        // Obtener parÃ¡metro usernmesa
        $username = $_GET['username'];

        // Tratar retorno
        $retorno = Users::getUserSession($username);


        if ($retorno) {

            $json["estado"] = "1";
            $json["log"] = $retorno["log"];
            // Enviar objeto json del usuario mesa
            print json_encode($json);
        } else {
            // Enviar respuesta de error general
            print json_encode(
                array(
                    'estado' => '-1',
                    'mensaje' => 'No se obtuvo la sesion'
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