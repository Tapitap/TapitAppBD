<?php
/**
 * Obtiene el detalle de una meta especificada por
 * su identificador "username"
 */

require '../Comandas.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    if (isset($_GET['id_manager']) and isset($_GET['fecha'])) {

        // Obtener parÃ¡metro usernmesa
		$id_manager = $_GET['id_manager'];
        $fecha = $_GET['fecha'];

        // Tratar retorno
        $retorno = Comandas::getNuevasComandas($id_manager,$fecha);

        if ($retorno) {

            $Comandas["estado"] = "1";
            $Comandas["Comandas"] = $retorno;
            // Enviar objeto json del usuario mesa
            print json_encode($Comandas);
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
                'estado' => '-1',
                'mensaje' => 'Se necesita un identificador'
            )
        );
    }
}
?>