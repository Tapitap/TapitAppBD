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
			$exite=false;
			$directory="../../img/";
			$dirint = dir($directory);
			while (($archivo = $dirint->read()) !== false)
			{
				if($archivo == ($id.".png")){
					$exite = true;
				}
			}
			if ($exite) {
				$imagen = file_get_contents($directory.$id.".png");
				header("Content-type: image/png"); 
				echo $imagen;
			} else {
				print json_encode(
					array(
						'estado' => '-1',
						'mensaje' => 'No se obtuvo la imagen'
					)
				);
			}
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