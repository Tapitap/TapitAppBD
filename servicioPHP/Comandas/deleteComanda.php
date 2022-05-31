<?php

require '../Comandas.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    if (isset($_POST['id'])) {
        
        $id = $_POST['id'];
        
        $retorno = Comandas::deleteComanda($id);
        
        if ($retorno) {
            
            //print json_encode(array($retorno));
            //$json = json_encode($retorno);
            //$json = json_decode($json, true);
            
            $json["estado"] = "1";
            
			print json_encode($json);
			//print $json;
            
        }else{
            print json_encode(
                array('estado' => '-1', 'mensaje' => 'Comanda no eliminada')
            );
        }
        
    }else{
        print json_encode(
            array('estado' => '-1', 'mensaje' => 'Debe enviar una id de comanda')
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