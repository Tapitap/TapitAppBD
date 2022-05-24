<?php

require '../Users.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    if (isset($_POST['username']) and isset($_POST['password'])) {
        
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $retorno = Users::login($username,$password);
        
        if ($retorno) {
            
            if($retorno["enable"]==1){
				
				$json["estado"] = "1";
				$json["authority"] = $retorno["authority"];
				
			}else{
				
				$json["estado"] = "2";
				$json["mensaje"] = 'Usuario inhabilitado';
				
			}
            
			print json_encode($json);
            
        }else{
            print json_encode(
                array('estado' => '-1', 'mensaje' => 'El usuario no existe o la contraseña es incorrecta')
            );
        }
        
    }else{
        print json_encode(
            array('estado' => '-1', 'mensaje' => 'Debe enviar un usuario y contraseÃ±a')
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