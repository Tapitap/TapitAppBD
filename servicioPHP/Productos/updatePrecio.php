<?php

require '../Productos.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
	$isset = isset($_POST['id']) and isset($_POST['tipo']) and isset($_POST['cuantia']);
    if ($isset) {
        
        $id = $_POST['id'];
		$tipo = $_POST['tipo'];
		$cuantia = $_POST['cuantia'];
        
        $retorno = Productos::unpdatePrecio($id,$tipo,$cuantia);
        
        if ($retorno) {
            
            $json["estado"] = "1";
            
			print json_encode($json);
			//print $json;
            
        }else{
            print json_encode(
                array('estado' => '-1', 'mensaje' => 'Precio no actualizado')
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