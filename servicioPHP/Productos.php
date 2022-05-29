<?php

require '../../Database.php';

class Productos
{
    function __construct()
    {
    }
    
	public static function getAll($id_manager)
	{
		$consulta="SELECT * FROM producto p WHERE p.id_manager=?";
		try {
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            $comando->execute(array($id_manager));
            $productos=$comando->fetchAll(PDO::FETCH_ASSOC);
			$i = 0;
			$resultado;
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
			$comando->execute(array($producto['id']));
			$precios = $comando->fetchAll(PDO::FETCH_ASSOC);
			$producto['precios'] = $precios;
			return $producto;
        }catch (PDOException $e) {
            return -1;
        }
	}
	
	public static function insertProducto($id_manager,$nombre,$descripcion,$tipo,$oferta){
		$consulta="INSERT INTO producto (id_manager,nombre,descripcion,tipo,oferta) VALUES(?,?,?,?,?)";
        try {
            $conn = Database::getInstance()->getDb();
			$comando = $conn->prepare($consulta);
            $comando->execute(array(
				$id_manager,
				$nombre,
				$descripcion,
				$tipo,
				$oferta
			));
            $id = $conn->lastInsertId();
			return $id;
        }catch (PDOException $e) {
            return -1;
        }
	}
	
	public static function insertPrecio($id_producto,$tipo,$cuantia){
		$consulta="INSERT INTO precio (id_producto,tipo,cuantia) VALUES(?,?,?)";
        try {
            $conn = Database::getInstance()->getDb();
			$comando = $conn->prepare($consulta);
            $comando->execute(array(
				$id_producto,
				$tipo,
				$cuantia
			));
            $id = $conn->lastInsertId();
			return $id;
        }catch (PDOException $e) {
            return -1;
        }
	}
	
	public static function updateProducto($id,$descripcion,$enable){
		$consulta="UPDATE producto SET descripcion=?, enable=? WHERE id=?";
        try {
			$comando = Database::getInstance()->getDb()->prepare($consulta);
            return $comando->execute(array(
				$descripcion,
				$enable,
				$id
			));
        }catch (PDOException $e) {
            return -1;
        }
	}
	
	public static function unpdatePrecio($id,$cuantia){
		$consulta="UPDATE precio SET cuantia=? WHERE id=?";
        try {
			$comando = Database::getInstance()->getDb()->prepare($consulta);
            return $comando->execute(array(
				$cuantia,
				$id
			));
        }catch (PDOException $e) {
            return -1;
        }
	}
	
	public static function deletePrecio($id){
		$consulta="DELETE FROM precio WHERE id=?";
        try {
			$comando = Database::getInstance()->getDb()->prepare($consulta);
            return $comando->execute(array(
				$id
			));
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