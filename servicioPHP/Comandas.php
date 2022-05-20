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
		$consultaId="SELECT id_manager FROM mesa WHERE id=?";
		$consulta="INSERT INTO comanda(id_mesa,id_manager) VALUES(?,?)";
        try {
            $conn = Database::getInstance()->getDb();
			$comando = $conn->prepare($consultaId);
			$comando->execute(array($id_mesa))
			$id_manager = $comando->fetch(PDO::FETCH_ASSOC)
			$comando = $conn->prepare($consulta);
            $comando->execute(array(
				$id_mesa,
				$id_manager
			));
            $id = $conn->lastInsertId();
			return $id;
        }catch (PDOException $e) {
            return -1;
        }
	}
	
	public static function insertLinea($id_comanda,$id_producto,$cuantia,$cantidad){
		$consulta="INSERT INTO linea (id_comanda, id_producto, cuantia, cantidad) VALUES (?,?,?,?)";
        try {
			
			$comando = Database::getInstance()->getDb()->prepare($consulta);
            return $comando->execute(array($id_comanda,$id_producto,$cuantia,$cantidad));
			
        }catch (PDOException $e) {
            return -1;
        }
	}
	
	public static function servirComanda($id){
		$consulta="UPDATE comanda SET servida = 1 WHERE id=?";
        try {
			
			$comando = Database::getInstance()->getDb()->prepare($consulta);
            return $comando->execute(array($id));
			
        }catch (PDOException $e) {
            return -1;
        }
	}
}

?>