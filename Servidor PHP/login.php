<?php

require '../MesaUser.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    if (isset($_POST['username']) and isset($_POST['password'])) {
        
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $retorno = MesaUser::login($username,$password);
        
        if ($retorno) {
            
            //print json_encode(array($retorno));
            $json = json_encode($retorno);
            $json = json_decode($json, true);
            
			print json_encode(
				array('estado' => '1')
			);
            
        }else{
            print json_encode(
                array('estado' => '-1', 'mensaje' => 'El usuario no existe o la contraseña es incorrecta')
            );
        }
        
    }else{
        print json_encode(
            array('estado' => '-1', 'mensaje' => 'Debe enviar un usuario y contraseña')
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