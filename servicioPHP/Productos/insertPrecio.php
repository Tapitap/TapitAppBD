<?php

require '../Productos.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
	$isset = isset($_POST['id_producto']) and isset($_POST['tipo']) and isset($_POST['cuantia']);
    if ($isset) {
        
        $id_producto = $_POST['id_producto'];
		$tipo = $_POST['tipo'];
		$cuantia = $_POST['cuantia'];
        
        $retorno = Productos::insertPrecio($id_producto,$tipo,$cuantia);
        
        if ($retorno) {
            
            $json["estado"] = "1";
            $json["id"] = $retorno;
            
			print json_encode($json);
			//print $json;
            
        }else{
            print json_encode(
                array('estado' => '-1', 'mensaje' => 'Id precio no devuelto')
            );
        }
        
    }else{
        print json_encode(
            array('estado' => '-1', 'mensaje' => 'Debe enviar valores')
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