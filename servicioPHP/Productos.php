<?php

require '../../Database.php';

class Productos
{
    function __construct()
    {
    }
	
	private static $directory = "../../Imagenes/";
    
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
        $exite = false;
		$dirint = dir($directory."ico/");
		while (($archivo = $dirint->read()) !== false)
		{
			if($archivo == ($id.".png")){
				$exite = true;
			}
		}
		if ($exite) {
			$dir = $directory.$id.".png";
			return file_get_contents($dir);
		} else {
			$dir = $directory."0.png";
			return file_get_contents($dir);
		}
    }
	
	public static function getImgById($id)
    {
        $exite = false;
		$dirint = dir($directory."img/");
		while (($archivo = $dirint->read()) !== false)
		{
			if($archivo == ($id.".png")){
				$exite = true;
			}
		}
		if ($exite) {
			$dir = $directory.$id.".png";
			return file_get_contents($dir);
		} else {
			$dir = $directory."0.png";
			return file_get_contents($dir);
		}
    }
}

?>