<?php

require '../Comandas.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $isset = isset($_POST['id_comanda']) and isset($_POST['id_producto']) and isset($_POST['cuantia']) and isset($_POST['cantidad']);
    if ($isset) {
		
        $id_comanda = $_POST['id_comanda'];
		$id_producto = $_POST['id_producto'];
		$cuantia = $_POST['cuantia'];
		$cantidad = $_POST['cantidad'];
        
        $retorno = Comandas::insertLinea($id_comanda,$id_producto,$cuantia,$cantidad);
        
        if ($retorno==1) {
            
            //print json_encode(array($retorno));
            //$json = json_encode($retorno);
            //$json = json_decode($json, true);
            
            $json["estado"] = "1";
            
			print json_encode($json);
			//print $json;
            
        }else{
            print json_encode(
                array('estado' => '-1', 'mensaje' => 'Linea no insertada')
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