<?php
/**
 * Obtiene el detalle de una meta especificada por
 * su identificador "username"
 */

require '../Users.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	$isset = isset($_POST['id_manager']) and isset($_POST['password'])
    if ($isset) {

        // Obtener parÃ¡metro usernmesa
        $id_manager = $_POST['id_manager'];
		$password = $_POST['password'];

        // Tratar retorno
        $retorno = Users::setUserMesaPassword($id_manager,$password);

        if ($retorno) {

            $json["estado"] = "1";
            // Enviar objeto json del usuario mesa
            print json_encode($json);
        } else {
            // Enviar respuesta de error general
            print json_encode(
                array(
                    'estado' => '-1',
                    'mensaje' => 'No se actualizo la mesa'
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