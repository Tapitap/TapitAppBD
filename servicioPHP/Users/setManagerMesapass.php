<?php
/**
 * Obtiene el detalle de una meta especificada por
 * su identificador "username"
 */

require '../Users.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	$isset = isset($_POST['id_manager']) and isset($_POST['password']);
    if ($isset) {

        // Obtener parÃ¡metro usernmesa
        $id_manager = $_POST['id_manager'];
		$password = $_POST['password'];
		
		$retorno = Users::setManagerMesapass($id_manager,$password);

        if ($retorno) {
			
			$retorno = Users::setUserMesaPassword($id_manager,$password);
			
			if(retorno){
				
				$json["estado"] = "1";
				print json_encode($json);
				
			}else{
				print json_encode(
					array(
						'estado' => '-1',
						'mensaje' => 'No se actualizaron las mesas'
					)
				);
			}
        } else {
            // Enviar respuesta de error general
            print json_encode(
                array(
                    'estado' => '-1',
                    'mensaje' => 'No se actualizo el manager'
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