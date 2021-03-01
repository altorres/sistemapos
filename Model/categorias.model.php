<?php 

require_once"coneccion.php";
/**
 * 
 */
class ModelCategoria 
{
	
	static public function mdlIngresarCategoria($tabla,$datos){

	 $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(categoria) VALUES (:categoria)");

		$stmt->bindParam(":categoria", $datos, PDO::PARAM_STR);
		


		if($stmt->execute()){
		  return "ok";
		}
		else{
		  return "error";	 	
		}
		$stmt->close();
	    $stmt=null;




	}


	static public function mdlMostrarCategoria($tabla,$item,$valor){

		if($item != null)
		{
			$stmt=Conexion::conectar()->prepare("Select * from $tabla where $item = :$item");
				    $stmt->bindParam(":".$item,$valor, PDO::PARAM_STR);

				    $stmt->execute();

				    return $stmt -> fetch();

				    $stmt->close();
				    $stmt=null;

		}
		else
		{
          $stmt=Conexion::conectar()->prepare("Select * from $tabla");
				    
 
				    $stmt->execute();

				    return $stmt -> fetchAll();

				    $stmt->close();
				    $stmt=null;
		}

	}




	static public function mdlEditarCategoria($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET categoria= :categoria where id= :id");

		$stmt->bindParam(":categoria", $datos["categoria"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datos["idCategoria"], PDO::PARAM_STR);


		if($stmt->execute()){
		  return "ok";
		}
		else{
		  return "error";	 	
		}
		$stmt->close();
	    $stmt=null;




	}


	static public function mdlBorrarCategoria($tabla,$datos){

		 $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla where id=:id");

		 $stmt->bindParam(":id", $datos, PDO::PARAM_STR);

			if($stmt->execute()){
					  return "ok";
					}
					else{
					  return "error";	 	
					}
					$stmt->close();
				    $stmt=null;

				}

				
}