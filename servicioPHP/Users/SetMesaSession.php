<?php
/**
 * Obtiene el detalle de una meta especificada por
 * su identificador "username"
 */

require '../Users.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    if (isset($_GET['id']) and isset($_GET['value'])) {

        // Obtener parÃ¡metro usernmesa
        $id = $_GET['id'];
		$value = $_GET['value'];

        // Tratar retorno
        $retorno = Users::setMesaSession($id,$value);

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