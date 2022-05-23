<?php
/**
 * Obtiene el detalle de una meta especificada por
 * su identificador "username"
 */

require '../Comandas.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    if (isset($_GET['id_mesa'])) {

        // Obtener parÃ¡metro usernmesa
		$id_mesa = $_GET['id_mesa'];

        // Tratar retorno
        $retorno = Comandas::getLineasServidas($id_mesa);

        if ($retorno) {

            $Lineas["estado"] = "1";
            $Lineas["lineas"] = $retorno;
            // Enviar objeto json del usuario mesa
            print json_encode($Lineas);
        } else {
            // Enviar respuesta de error general
            print json_encode(
                array(
                    'estado' => '2',
                    'mensaje' => 'No hay lineas servidas'
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