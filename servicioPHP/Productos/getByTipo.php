<?php
/**
 * Obtiene el detalle de una meta especificada por
 * su identificador "username"
 */

require '../Productos.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    if (isset($_GET['id_manager']) and isset($_GET['tipo'])) {

        // Obtener parÃ¡metro usernmesa
        $id_manager = $_GET['id_manager'];
		$tipo = $_GET['tipo'];

        // Tratar retorno
        $retorno = Productos::getByTipo($id_manager,$tipo);


        if ($retorno) {

            $Productos["estado"] = "1";
            $Productos["Productos"] = $retorno;
            // Enviar objeto json del usuario mesa
            print json_encode($Productos);
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