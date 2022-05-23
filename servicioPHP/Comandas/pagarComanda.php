<?php

require '../Comandas.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $isset = isset($_POST['id']) and isset($_POST['id_cuenta']);
    if ($isset) {
		
        $id = $_POST['id'];
		$id_cuenta = $_POST['id_cuenta'];
        
        $retorno = Comandas::pagarComanda($id,$id_cuenta);
        
        if ($retorno) {
            
            $json["estado"] = "1";
            
			print json_encode($json);
        }else{
            print json_encode(
                array('estado' => '-1', 'mensaje' => 'Comanda no pagada')
            );
        }
        
    }else{
        print json_encode(
            array('estado' => '-1', 'mensaje' => 'Debe enviar los datos necesarios')
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