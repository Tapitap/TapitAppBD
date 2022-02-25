<?php
/**
 * Obtiene el detalle de una meta especificada por
 * su identificador "username"
 */

require '../Users.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    if (isset($_GET['username'])) {

        // Obtener parÃ¡metro usernmesa
        $parametro = $_GET['username'];

        // Tratar retorno
        $retorno = Users::getMesaByUsername($parametro);


        if ($retorno) {

            $mesa["estado"] = "1";
            $mesa["MesaUser"] = $retorno;
            // Enviar objeto json del usuario mesa
            print json_encode($mesa);
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