<?php
/**
 * Obtiene el detalle de una meta especificada por
 * su identificador "username"
 */

require '../Productos.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    if (isset($_GET['id'])) {

        
        $id = $_GET['id'];

        if(empty($id)){
			print json_encode(
                array(
                    'estado' => '-1',
                    'mensaje' => 'Se necesita un id'
                )
            );
		}
		$exite=false;
		$directory="../../img/";
		$dirint = dir($directory);
		while (($archivo = $dirint->read()) !== false)
		{
			if($archivo == ($id.".png")){
				$exite = true;
			}
		}
		//$imagen = file_get_contents("../../img/".$id.".png");
        if ($exite) {
			$imagen = $file_get_contents($directory . $id . ".png");
			header("Content-type: image/png"); 
            echo $imagen;
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