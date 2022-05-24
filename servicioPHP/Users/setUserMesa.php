<?php
/**
 * Obtiene el detalle de una meta especificada por
 * su identificador "username"
 */

require '../Users.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	$isset = isset($_POST['username']) and isset($_POST['log']) and isset($_POST['enable'])
    if () {

        // Obtener parÃ¡metro usernmesa
        $username = $_POST['username'];
		$log = $_POST['log'];
		$enable = $_POST['enable'];

        // Tratar retorno
        $retorno = Users::setUserMesa($username,$enable,$log);

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