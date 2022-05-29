<?php

require '../Productos.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
	$isset = isset($_POST['id']) and isset($_POST['descripcion']) and isset($_POST['enable']);
    if ($isset) {
        
        $id = $_POST['id'];
		$descripcion = $_POST['descripcion'];
		$enable = $_POST['enable'];
        
        $retorno = Productos::unpdateProducto($id,$descripcion,$enable);
        
        if ($retorno) {
            
            $json["estado"] = "1";
            
			print json_encode($json);
			//print $json;
            
        }else{
            print json_encode(
                array('estado' => '-1', 'mensaje' => 'Producto no actualizado')
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