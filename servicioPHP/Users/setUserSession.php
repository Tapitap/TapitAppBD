<?php
/**
 * Obtiene el detalle de una meta especificada por
 * su identificador "username"
 */

require '../Users.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['username']) and isset($_POST['value'])) {

        // Obtener parÃ¡metro usernmesa
        $username = $_POST['username'];
		$value = $_POST['value'];

        // Tratar retorno
        $retorno = Users::setUserSession($username,$value);

        if ($retorno) {

            $json["estado"] = "1";
            // Enviar objeto json del usuario mesa
            print json_encode($json);
        } else {
            // Enviar respuesta de error general
            print json_encode(
                array(
                    'estado' => '-1',
                    'mensaje' => 'No se actualizo la sesion'
                )
            );
        }
    } else {
        // Enviar respuesta de error
        print json_encode(
            array(
                'estado' => '-1',
                'mensaje' => 'Se necesita valores'
            )
        );
    }
}
?>