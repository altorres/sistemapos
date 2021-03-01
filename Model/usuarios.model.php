<?php

require_once "coneccion.php";

class ModelUsuarios{


	static public function mdlMostrarUsuarios($tabla,$item,$valor){

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

	static public function mdlIngresarUsuario($tabla,$datos){


		/*$stmt = Conexion::conectar()->prepare("insert into $tabla(nombre, nick, password, perfil) values (:nombre,:nick,:password,:perfil)");

		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
		$stmt->bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
		$stmt->bindParam(":nick", $datos["nick"], PDO::PARAM_STR);*/

       $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, nick, password, perfil,foto) VALUES (:nombre, :nick, :password, :perfil,:ruta)");

		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":nick", $datos["nick"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
		$stmt->bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
		$stmt->bindParam(":ruta", $datos["ruta"], PDO::PARAM_STR);


		if($stmt->execute()){
		  return "ok";
		}
		else{
		  return "error";	 	
		}
		$stmt->close();
	    $stmt=null;

	}

	static public function mdlEditarUsuario($tabla,$datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre=:nombre,  password=:password, perfil=:perfil,foto=:ruta WHERE nick=:nick");

		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
		$stmt->bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
		$stmt->bindParam(":ruta", $datos["ruta"], PDO::PARAM_STR);
		$stmt->bindParam(":nick", $datos["nick"], PDO::PARAM_STR);


		if($stmt->execute()){
		  return "ok";
		}
		else{
		  return "error";	 	
		}
		$stmt->close();
	    $stmt=null;
   	}



	static public function mdlActualizarUsuario($tabla,$item1,$valor1, $item2, $valor2){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1=:$item1 WHERE $item2 =:$item2");

		
		$stmt->bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt->bindParam(":".$item2, $valor2, PDO::PARAM_STR);
		
		if($stmt->execute()){
		  return "ok";
		}
		else{
		  return "tabla-".$tabla." item1->".$item1."valor->".$valor1."item2->".$item2."valoe->".$valor2;	 	
		}
		$stmt->close();
	    $stmt=null;

	}


	static public function mdlBorrarUsuario($tabla, $datos){

	
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		
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
