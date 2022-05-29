<?php

require '../Users.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
	$isset = isset($_POST['username']) and isset($_POST['password']) and isset($_POST['name']) and isset($_POST['tipo']) and isset($_POST['mesapass']);
    if ($isset) {
        
        $username = $_POST['username'];
		$password = $_POST['password'];
		$name = $_POST['name'];
		$tipo = $_POST['tipo'];
		$mesapass = $_POST['mesapass'];
        
		$retorno = Users::exitUsername($username);
		
		if($retorno['num']>0){
			print json_encode(
				array('estado' => '2', 'mensaje' => 'El nombre de usuario "' . $username . '" ya existe')
			);
		}else{
			$retorno = Users::insertUser($username,$password);
		
			if($retorno){
				
				$retorno = Users::insertAuthority($username,"manager");
				
				if($retorno){
					
					$retorno = Users::insertManager($username,$name,$tipo,$mesapass);
					
					if ($retorno) {
				
						$json["estado"] = "1";
						
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