<?php

require '../Productos.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
	$isset = isset($_POST['id_manager']) and isset($_POST['nombre']) and isset($_POST['descripcion']) and isset($_POST['tipo']) and isset($_POST['oferta']);
    if ($isset) {
        
        $id_manager = $_POST['id_manager'];
		$nombre = $_POST['nombre'];
		$descripcion = $_POST['descripcion'];
		$tipo = $_POST['tipo'];
		$oferta = $_POST['oferta'];
        
        $retorno = Productos::insertProducto($id_manager,$nombre,$descripcion,$tipo,$oferta);
        
        if ($retorno) {
            
            $json["estado"] = "1";
            $json["id"] = $retorno;
            
			print json_encode($json);
			//print $json;
            
        }else{
            print json_encode(
                array('estado' => '-1', 'mensaje' => 'Id producto no devuelto')
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