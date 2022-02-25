<?php

/**
 * Representa el la estructura de los users
 * almacenadas en la base de datos
 */
require '../../Database.php';

class Users
{
    function __construct()
    {
    }
    
    public static function login($username,$password)
    {
        $consulta="SELECT a.authority FROM users u INNER JOIN authorities a ON u.username = a.username WHERE u.username=? AND u.password=?";
        try {
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            $comando->execute(array($username,$password));
            return $comando->fetch(PDO::FETCH_ASSOC);
        }catch (PDOException $e) {
            return -1;
        }
    }

    /**
     * Obtiene los campos de una mesa con un identificador
     * determinado
     *
     * @param $username Identificador de la mesa
     * @return mixed
     */
    public static function getMesaByUsername($username)
    {
        $consulta = "SELECT u.username, u.enable, a.authority, m.id, m.numero, m.id_manager 
						FROM users u INNER JOIN mesa m INNER JOIN authorities a 
							ON u.username = m.username AND u.username = a.username 
								WHERE u.username = ?";

        try {
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            $comando->execute(array($username));
            $row = $comando->fetch(PDO::FETCH_ASSOC);
            return $row;

        } catch (PDOException $e) {
            return -1;
        }
    }
	public static function getManagerByUsername($username){
		
	}
}

?>