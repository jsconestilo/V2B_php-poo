<?php  

/**
 * Descomentar los bloques 1 y 2 para probar el primer ejemplo
 */

/*
//Simular una clase de intento de conexión si esta se ha cerrado por alguna razón
abstract class Connection {
	public static function getConection() {
		if(rand(0,10) > 8) {
			return true;
		}else{
			return false;
		}
	}
}*/


/**
 * El tratamiento de errores con Exception se deben implementar en estructiras TRY-CATCH
 * Para lanzar un error se usa throw new Exception
 * Para capturarlo se hace en el catch(), que recibe un objeto de la clase Exception lanzada
 */

/*try {
	echo "Lineas de código de ejemplo. Proceso normal<br>";
	if(true) {
		//Lanza una excepción a consecuencia de un error detectado en la sección de intento try (que puede generar un error)
		throw new Exception("Servidor Fuera de Línea");
	}
} catch(Exception $e) {
	//Capturamos el error y lo tratamos según la regla de negocio. En este caso trato de re-conectarme;
	$estado = Connection::getConection();
	if($estado == false){
		echo "Ha ocurrido un error: " . $e->getMessage() . "<br>";
		//Al no haber exito pues salimos del script.
		//Si no coloco esto se va en seco, y continua ejecutando todo lo que esta fuera del trycatch
		exit;
	}else{
		echo "problema resuelto de conexion y sigo....<br>";
	}
}

echo "Paso y puedo hacer mas cosas <br>";*/



//Creamos una clase exception personalizada (para ello hacemos uso de la herencia).
class DBException extends Exception{}

class Database {
	private $host;
	private $user;
	private $pass;

	public function connect($user, $pass, $host=null) {
		//Declaramos un cloque try-catch, pues vamos a intentar conectarnos con una base de datos, y si falla es importante capturar y tratar el error.
		try {
			if($host == "localhost")
				//Lanzamos una exepcion personalizada (enviando un mensaje de error)
				throw new DBException("No se permite trabajar en modo localhost");
			if($host == null)
				//Lanzamos una exepción generica (tambien con el error acotencido)
				throw new Exception("No se ha especificado un servidor");
			//Al parecer todo va bien, por tanto es una conexión exitosa
			$this->host = $host;
			$this->user = $user;
			$this->pass = md5($pass);
			echo "Conectado satisfactoriamente<br>";
		} catch(DBException $e) {
			//Capturamos primero las exepciones mas especificas
			//El orden es importante, de lo contrario por herencia de PHP DBException es de tipo Exception (es una instancia de) y entraría... en un caso generico 
			echo "Ha ocurrido un error especifico: " . $e->getMessage() . "<br>";
			exit;
		} catch(Exception $e) {
			//Al final siempre capturamos la exception generica
			echo "Ha ocurrido un error genérico: " . $e->getMessage() . "<br>";
			exit;
		} finally {
			//En teoría esto siempre se ha de ejecutar, pero no es así si se invoca en el tratamenito del error la instrucción exit.
			//Para nuestro ejemplo suena lógico, pues al no establecer conexión no tengo por que cerrarla.
			//Este bloque no es obligatorio
			echo "Limpiar cache de conexión<br>";
		}
}
}

$conexion = new Database();
//$conexion->connect("alexito", "123456");
//$conexion->connect("alexito", "123456", "localhost");
$conexion->connect("alexito", "123456", "xpsmart");

?>