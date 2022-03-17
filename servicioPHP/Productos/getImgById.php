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
			
			$retorno = Productos::getImgById($id);
			
			header("Content-type: image/png"); 
			echo $retorno;
		}else{
			print json_encode(
                array(
                    'estado' => '-1',
                    'mensaje' => 'Se necesita un id'
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