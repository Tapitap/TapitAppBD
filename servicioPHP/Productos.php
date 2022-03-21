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
            $productos=$comando->fetchAll(PDO::FETCH_ASSOC);
			$i = 0;
			foreach($productos as $prod){
				//$precios = getPreciosById($prod['id']);
				$consulta="SELECT p.id,p.tipo,p.cuantia FROM precio p WHERE p.id_producto=?";
				$comando = Database::getInstance()->getDb()->prepare($consulta);
				$comando->execute(array($prod['id']));
				$precios = $comando->fetchAll(PDO::FETCH_ASSOC);
				$prod['precios'] = $precios;
				$resultado[$i] = $prod;
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
			$comando->execute(array($prod['id']));
			$precios = $comando->fetchAll(PDO::FETCH_ASSOC);
			$producto['precios'] = $precios;
			return $producto;
        }catch (PDOException $e) {
            return -1;
        }
	}
	
	public static function getIcoById($id)
    {
        $exite = false;
		$directory = "../../Imagenes/ico/";
		$dirint = dir($directory);
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
		$directory = "../../Imagenes/img/";
		$dirint = dir($directory);
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