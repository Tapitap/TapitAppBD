<?php

require '../Cuentas.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
	$isset = isset($_POST['total']) and isset($_POST['formapago']) and isset($_POST['id_mesa']);
    if ($isset) {
        
        $total = $_POST['total'];
		$formapago = $_POST['formapago'];
		$id_mesa = $_POST['id_mesa'];
        
        $retorno = Cuentas::insertCuenta($total,$formapago,$id_mesa);
        
        if ($retorno) {
            
            $json["estado"] = "1";
            $json["cuenta"] = $retorno;
            
			print json_encode($json);
			//print $json;
            
        }else{
            print json_encode(
                array('estado' => '-1', 'mensaje' => 'Id cuenta no devuelta')
            );
        }
        
    }else{
        print json_encode(
            array('estado' => '-1', 'mensaje' => 'Debe enviar parametros')
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