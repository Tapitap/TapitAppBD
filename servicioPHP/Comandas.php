<?php

require '../../Database.php';

class Comandas
{
    function __construct()
    {
    }
    
	public static function getAll($id_manager)
	{
		$consulta="SELECT c.id,c.fecha,c.id_cuenta,c.id_mesa FROM comanda c LEFT JOIN mesa m ON c.id_mesa = m.id WHERE m.id_manager=?";
		try {
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            $comando->execute(array($id_manager));
            $comandas=$comando->fetchAll(PDO::FETCH_ASSOC);
			$i = 0;
			foreach($comandas as $comanda){
				//$lineas = getlineasById($comanda['id']);
				$consulta="SELECT * FROM linea WHERE id_comanda=?";
				$comando = Database::getInstance()->getDb()->prepare($consulta);
				$comando->execute(array($comanda['id']));
				$lineas = $comando->fetchAll(PDO::FETCH_ASSOC);
				$comanda['lineas'] = $lineas;
				$resultado[$i] = $comanda;
				$i++;
			}
			return $resultado;
        }catch (PDOException $e) {
            return -1;
        }
	}
	
	public static function getById($id){
		$consulta="SELECT * FROM producto p WHERE p.id=?";
        try {
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            $comando->execute(array($id));
            $producto = $comando->fetch(PDO::FETCH_ASSOC);
			$consulta="SELECT p.id,p.tipo,p.cuantia FROM precio p WHERE p.id_producto=?";
			$comando = Database::getInstance()->getDb()->prepare($consulta);
			$comando->execute(array($producto['id']));
			$precios = $comando->fetchAll(PDO::FETCH_ASSOC);
			$producto['precios'] = $precios;
			return $producto;
        }catch (PDOException $e) {
            return -1;
        }
	}
}

?>