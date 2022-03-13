<?php

require '../../Database.php';

class Productos
{
    function __construct()
    {
    }
    
    public static function getByTipo($id_manager,$tipo)
    {
        $consulta="SELECT * FROM producto p WHERE p.id_manager=? AND p.tipo=? AND p.oferta=0";
        try {
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            $comando->execute(array($id_manager,$tipo));
            return $comando->fetchAll(PDO::FETCH_ASSOC);
        }catch (PDOException $e) {
            return -1;
        }
    }
	
	public static function getIcoById($id)
    {
        $consulta="SELECT i.icono FROM imgProd i WHERE i.id=?";
        try {
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            $comando->execute(array($id_manager,$tipo));
            return $comando->fetch(PDO::FETCH_ASSOC);
        }catch (PDOException $e) {
            return -1;
        }
    }
	
	public static function getImgById($id)
    {
        $consulta="SELECT i.imagen FROM imgProd i WHERE i.id=?";
        try {
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            $comando->execute(array($id_manager,$tipo));
            return $comando->fetch(PDO::FETCH_ASSOC);
        }catch (PDOException $e) {
            return -1;
        }
    }
}

?>