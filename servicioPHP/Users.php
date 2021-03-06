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
        $consulta="SELECT a.authority, u.enable FROM users u INNER JOIN authorities a ON u.username = a.username WHERE u.username=? AND u.password=?";
        try {
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            $comando->execute(array($username,$password));
            return $comando->fetch(PDO::FETCH_ASSOC);
        }catch (PDOException $e) {
            return -1;
        }
    }
	
	public static function exitUsername($username){
		$consulta="SELECT COUNT(*) as 'num' FROM users u WHERE u.username=?";
        try {
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            $comando->execute(array($username));
            return $comando->fetch(PDO::FETCH_ASSOC);
        }catch (PDOException $e) {
            return -1;
        }
	}
	
	public static function getUserSession($username){
		$consulta="SELECT u.log FROM users u WHERE u.username=?";
        try {
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            $comando->execute(array($username));
            return $comando->fetch(PDO::FETCH_ASSOC);
        }catch (PDOException $e) {
            return -1;
        }
	}
	
	public static function setUserMesa($username,$enable,$log){
		$consulta="UPDATE users u SET u.enable=?, u.log=? WHERE u.username=?";
        try {
			
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            return $comando->execute(array($enable,$log,$username));
            
        }catch (PDOException $e) {
            return -1;
        }
	}
	
	public static function setManagerMesapass($id_manager,$mesapass){
		$consulta="UPDATE manager m SET m.mesapass=? WHERE m.id=?";
        try {
			
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            return $comando->execute(array($mesapass,$id_manager));
            
        }catch (PDOException $e) {
            return -1;
        }
	}
	
	public static function setUserMesaPassword($id_manager,$password){
		$consulta="UPDATE users u INNER JOIN mesa m ON m.username = u.username SET u.password=? WHERE m.id_manager=?";
        try {
			
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            return $comando->execute(array($password,$id_manager));
            
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
	public static function getManagerByUsername($username)
	{
		$consulta = "SELECT u.username, u.enable, a.authority, m.id, m.name, m.tipo, m.mesapass
						FROM users u INNER JOIN manager m INNER JOIN authorities a 
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
	
	public static function getAllManager(){
		$consulta = "SELECT u.username, u.enable, a.authority, m.id, m.name, m.tipo, m.mesapass
						FROM users u INNER JOIN manager m INNER JOIN authorities a 
							ON u.username = m.username AND u.username = a.username";
		try {
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            $comando->execute();
            return $comando->fetchAll(PDO::FETCH_ASSOC);
        }catch (PDOException $e) {
            return -1;
        }
	}
	
	public static function getAllMesasByIdManager($id_manager)
	{
		$consulta = "SELECT m.id, m.username, m.numero, m.id_manager, a.authority, u.password, u.enable, u.log
						FROM mesa m INNER JOIN users u INNER JOIN authorities a ON m.username = u.username AND m.username = a.username 
							WHERE m.id_manager = ?";
		try {
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            $comando->execute(array($id_manager));
            return $comando->fetchAll(PDO::FETCH_ASSOC);
        }catch (PDOException $e) {
            return -1;
        }
	}
	
	public static function insertManager($username,$name,$tipo,$mesapass){
		$sqlMesa = "INSERT INTO manager(username,name,tipo,mesapass) VALUES(?,?,?,?)";
		try {
			$conn = Database::getInstance()->getDb();
			$comando = $conn->prepare($sqlMesa);
			$comando->execute(array(
				$username,
				$name,
				$tipo,
				$mesapass
			));
			$id = $conn->lastInsertId();
			return $id;
		}catch (PDOException $e) {
            return '-1';
        }
	}
	
	public static function insertMesa($username,$id_manager,$numero){
		$sqlMesa = "INSERT INTO mesa(id_manager,numero,username) VALUES(?,?,?)";
		try {
			$conn = Database::getInstance()->getDb();
			$comando = $conn->prepare($sqlMesa);
			$comando->execute(array(
				$id_manager,
				$numero,
				$username
			));
			$id = $conn->lastInsertId();
			return $id;
		}catch (PDOException $e) {
            return '-1';
        }
	}
	
	public static function insertUser($username,$password){
		$sqlUser = "INSERT INTO users(username,password) VALUES(?,?)";
		try {
			$conn = Database::getInstance()->getDb();
			$comando = $conn->prepare($sqlUser);
            return $comando->execute(array(
				$username,
				$password
			));
		}catch (PDOException $e) {
            return '-1';
        }
	}
	
	public static function insertAuthority($username,$authority){
		$sqlAthority = "INSERT INTO authorities(username,authority) VALUES(?,?)";
		try {
			$conn = Database::getInstance()->getDb();
			$comando = $conn->prepare($sqlAthority);
            return $comando->execute(array(
				$username,
				$authority
			));
		}catch (PDOException $e) {
            return '-1';
        }
	}
}

?>