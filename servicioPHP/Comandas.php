<?php

require '../../Database.php';

class Comandas
{
    function __construct()
    {
    }
    
	public static function getAll($id_manager)
	{
		$consulta="SELECT c.id,c.fecha,c.servida,c.id_cuenta,c.id_mesa FROM comanda c LEFT JOIN mesa m ON c.id_mesa = m.id WHERE m.id_manager=?";
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
	
	public static function insertComanda($id_mesa){
		$consulta="INSERT INTO comanda(id_mesa) VALUES(?)";
        try {
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            $comando->execute(array(
				$id_mesa
			));
            $id = $comando->fetch(PDO::lastInsertId());
			return $id;
        }catch (PDOException $e) {
            return -1;
        }
	}
}

?>