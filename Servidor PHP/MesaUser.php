<?php

/**
 * Representa el la estructura de las metas
 * almacenadas en la base de datos
 */
require '../../Database.php';

class MesaUser
{
    function __construct()
    {
    }
    
    public static function login($username,$password)
    {
        $consulta="SELECT u.username, u.password FROM users u WHERE username=? AND password=?";
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
    public static function getByUsername($username)
    {
        // Consulta de la meta
        $consulta = "SELECT u.username, u.enable, m.numero, m.id_manager, a.authority 
						FROM users u INNER JOIN mesa m INNER JOIN authorities a 
							ON u.username = m.username AND u.username = a.username 
								WHERE u.username = ?";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($username));
            // Capturar primera fila del resultado
            $row = $comando->fetch(PDO::FETCH_ASSOC);
            return $row;

        } catch (PDOException $e) {
            // AquÃ­ puedes clasificar el error dependiendo de la excepciÃ³n
            // para presentarlo en la respuesta Json
            return -1;
        }
    }
}

?>