<?php
/**
 * Obtiene el detalle de una meta especificada por
 * su identificador "username"
 */

require '../Users.php';

// Tratar retorno
$retorno = Users::getAllManager();


if ($retorno) {

	$managers["estado"] = "1";
	$managers["Managers"] = $retorno;
	// Enviar objeto json del usuario mesa
	print json_encode($managers);
} else {
	// Enviar respuesta de error general
	print json_encode(
		array(
			'estado' => '2',
			'mensaje' => 'No se obtuvo registro'
		)
	);
}

?>