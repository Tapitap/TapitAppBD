<?php

require '../Productos.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
	$isset = isset($_POST['id']);
    if ($isset) {
        
        $id = $_POST['id'];
        
        $retorno = Productos::deletePrecio($id);
        
        if ($retorno) {
            
            $json["estado"] = "1";
            
			print json_encode($json);
            
        }else{
            print json_encode(
                array('estado' => '-1', 'mensaje' => 'Precio no eliminado')
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