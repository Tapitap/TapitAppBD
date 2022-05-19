<?php

require '../Users.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    if (isset($_POST['id_mesa'])) {
        
        $id_mesa = $_POST['id_mesa'];
        
        $retorno = Comandas::insertComanda($id_mesa);
        
        if ($retorno) {
            
            //print json_encode(array($retorno));
            //$json = json_encode($retorno);
            //$json = json_decode($json, true);
            
            $json["estado"] = "1";
            $json["id"] = $retorno;
            
			print json_encode($json);
			//print $json;
            
        }else{
            print json_encode(
                array('estado' => '-1', 'mensaje' => 'Id comanda no devuelta')
            );
        }
        
    }else{
        print json_encode(
            array('estado' => '-1', 'mensaje' => 'Debe enviar una id de mesa')
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