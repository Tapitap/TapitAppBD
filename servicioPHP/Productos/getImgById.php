<?php
/**
 * Obtiene el detalle de una meta especificada por
 * su identificador "username"
 */

require '../Productos.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    if (isset($_GET['id'])) {

        // Obtener parÃ¡metro usernmesa
        $id = $_GET['id'];

        // Tratar retorno
        $retorno = Productos::getImgById($id);


        if ($retorno->num_rows > 0) {
			
			header("Content-type: image/png"); 
            echo $retorno['imagen'];
        } else {
            // Enviar respuesta de error general
            print json_encode(
                array(
                    'estado' => '-1',
                    'mensaje' => 'No se obtuvo la imagen'
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