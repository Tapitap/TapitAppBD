<?php
/**
 * Obtiene el detalle de una meta especificada por
 * su identificador "username"
 */

require '../MesaUser.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    if (isset($_GET['username'])) {

        // Obtener parámetro usernmesa
        $parametro = $_GET['username'];

        // Tratar retorno
        $retorno = MesaUser::getByUsername($parametro);


        if ($retorno) {

            $mesa["estado"] = "1";
            $mesa["MesaUser"] = $retorno;
            // Enviar objeto json del usuario mesa
            print json_encode($mesa);
        } else {
            // Enviar respuesta de error general
            print json_encode(
                array(
                    'estado' => '2',
                    'mensaje' => 'No se obtuvo el registro'
                )
            );
        }

    } else {
        // Enviar respuesta de error
        print json_encode(
            array(
                'estado' => '3',
                'mensaje' => 'Se necesita un identificador'
            )
        );
    }
}