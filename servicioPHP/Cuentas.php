<?php

require '../../Database.php';

class Cuentas
{
    function __construct()
    {
    }
    
	public static function getAll($id_manager)
	{
		$consulta = "SELECT c.id,c.fecha,c.formapago,c.total,c.id_mesa FROM cuenta c LEFT JOIN mesa m ON c.id_mesa = m.id WHERE m.id_manager=?";
		try {
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            $comando->execute(array($id_manager));
            return $comando->fetchAll(PDO::FETCH_ASSOC);
        }catch (PDOException $e) {
            return -1;
        }
	}
	
	public static function insertCuenta($total, $formapago, $id_mesa){
		$consulta="INSERT INTO cuenta(total,formapago,id_mesa) VALUES(?,?,?)";
        try {
            $conn = Database::getInstance()->getDb();
			$comando = $conn->prepare($consulta);
            $comando->execute(array(
				$total,
				$formapago,
				$id_mesa
			));
            $id = $conn->lastInsertId();
			return $id;
        }catch (PDOException $e) {
            return -1;
        }
	}
}

?>