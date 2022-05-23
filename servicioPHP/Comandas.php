<?php

require '../../Database.php';

class Comandas
{
    function __construct()
    {
    }
    
	public static function getAll($id_manager)
	{
		$consulta="SELECT c.id,c.fecha,c.servida,c.id_cuenta,c.id_mesa FROM comanda c WHERE c.id_manager=?";
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
			$comando->execute(array($id_mesa));
			$id_manager = $comando->fetch(PDO::FETCH_ASSOC);
			$comando2 = $conn->prepare($consulta);
            $comando2->execute(array(
				$id_mesa,
				$id_manager["id_manager"]
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
	
	public static function getLineasServidas($id_mesa){
		$consulta = "SELECT l.id, p.nombre, l.cuantia, l.cantidad FROM linea l INNER JOIN producto p ON p.id = l.id_producto LEFT JOIN comanda c ON c.id = l.id_comanda WHERE c.id_mesa=? AND c.servida = 1";
		try {
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            $comando->execute(array($id_mesa));
            return $comando->fetchAll(PDO::FETCH_ASSOC);
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
	
	public static function pagarComanda($id,$id_cuenta){
		$consulta="UPDATE comanda SET id_cuenta=?, id_mesa=NULL WHERE id=?";
        try {
			
			$comando = Database::getInstance()->getDb()->prepare($consulta);
            return $comando->execute(array($id_cuenta,$id));
			
        }catch (PDOException $e) {
            return -1;
        }
	}
	
	public static function getNuevasComandas($id_manager,$fecha){
		$consulta="SELECT * FROM comanda WHERE id_manager=? AND (fecha > STR_TO_DATE(?, '%d/%m/%Y %T') AND fecha <= current_timestamp())";
        try {
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            $comando->execute(array($id_manager,$fecha));
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
}

?>