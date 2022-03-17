<?php
/**
 * Obtiene el detalle de una meta especificada por
 * su identificador "username"
 */

require '../Productos.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        if(!empty($id)){
			
			header("Content-type: image/png"); 
			$imagen = Productos::getImgById($id);
			
			echo $imagen;
		}else{
			print json_encode(
                array(
                    'estado' => '-1',
                    'mensaje' => 'El parametro id esta vacio'
                )
            );
		}
    } else {
        // Enviar respuesta de error
        print json_encode(
            array(
                'estado' => '-1',
                'mensaje' => 'Se necesita un paramtero id'
            )
        );
    }
}
?>