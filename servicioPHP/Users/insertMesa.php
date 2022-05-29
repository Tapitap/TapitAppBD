<?php

require '../Users.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
	$isset = isset($_POST['username']) and isset($_POST['password']) and isset($_POST['id_manager']) and isset($_POST['numero']);
    if ($isset) {
        
        $username = $_POST['username'];
		$password = $_POST['password'];
		$id_manager = $_POST['id_manager'];
		$numero = $_POST['numero'];
        
		$retorno = Users::insertUser($username,$password);
		
        if($retorno!=-1){
			
			$retorno = Users::insertAuthority($username);
			
			if($retorno!=-1){
				
				$retorno = Users::insertMesa($username,$id_manager,$numero);
				
				if ($retorno!=-1) {
            
					$json["estado"] = "1";
					$json["id"] = $retorno;
					
					print json_encode($json);
					//print $json;
					
				}else{
					print json_encode(
						array('estado' => '-1', 'mensaje' => 'Id mesa no devuelta')
					);
				}
			}else{
				print json_encode(
					array('estado' => '-1', 'mensaje' => 'Authority no insertado')
				);
			}
		}else{
			print json_encode(
				array('estado' => '-1', 'mensaje' => 'User no insertado')
			);
		}
    }else{
        print json_encode(
            array('estado' => '-1', 'mensaje' => 'Debe enviar parametros')
        );
    }
    
}else {
        // Enviar respuesta de error
        print json_encode(
            array(
                'estado' => '-1',
                'mensaje' => 'Debe ser una peticion POST'
            )
        );
    }
?>