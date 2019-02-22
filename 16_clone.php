<?php  
/**
 * En ocasiones pensamos que para copiar un objeto solo se necesita hacer una simple asignación, tal como $nuevoObjeto = $objetoAnterior.
 *
 * Sin embargo no es así, ya que $nuevoObjeto apunta a la misma dirección de memoria que $objetoAnterior. Por tanto se trata del mismo objeto, pero referenciado con distintos nombres de variables.
 *
 * Para ello esta la clonación de objetos.
 * Que nos permite generar un nuevo objeto con estado diferente a partir de otros objetos... $nuevoObjeto = clone $objetoAnterior
 */


 final class DB {
	private static $instance;
	private $driver;

	//Al declarar un constructor como protected o private, la clase en automático no puede ser instanciada. (Patrón Singleton)
	//Si bien tampoco puede ser heredada. Si la hija sobre-escribe el constructor, entonces si se puede.... (para ello se declaro como final)
	protected function __construct(){}

	public static function getInstance() {
		if(static::$instance == null) {
			static::$instance = new static(); 
		}
		return static::$instance;
	}

	public function setDriver($driver) {
		$this->driver = $driver;
	}

	public function getDriver() {
		echo $this->driver . "<br>";
	}
}

//Si se declara un constructor en el padre como protected o private, en automático esa clase no puede ser heredada, a salvo que la clase hija sobre-escriba el constructor.
//Para ello es mejor declararla como final. Asi garantizamos que no se pueda heredar....

/*class Otra extends DB {
	public function __construct() {
		echo "Soy una hija de DB, <br>";
		//parent::__construct();
	}
}

$otraclase = new Otra;*/

//Marca error puesto que la clase no puede ser instanciada directamente, tampoco quiero que se heredable, por ello no la marco como abstracta.
//$db = new DB;

//Aparentente resultan ser diferentes
$mysql = DB::getInstance();
$mysql->setDriver("MySQL");
$mysql->getDriver();

$oracle = DB::getInstance();
$oracle->setDriver("ORACLE");
$oracle->getDriver();

$sql_server = DB::getInstance();
$sql_server->setDriver("SQL Server");
$sql_server->getDriver();

echo "<hr>";
//Pero no es así, al ser la misma instancia, estamos hablando del mismo objeto referenciado por distintos objetos que apuntal a la misma dirección de memoria
$mysql->getDriver();
$oracle->getDriver();
$sql_server->getDriver();





echo "<hr>";
//Al tratar de hacer una asignación, en teoría esperamos que el resultado se trate de una nueva instancia, pero nuevamente no es así.
$oracle_copia = $mysql;
$oracle_copia->setDriver("Oracle Copia");
$oracle_copia->getDriver();
//Probamos lo antes dicho
$mysql->getDriver();
$oracle->getDriver();
$sql_server->getDriver();





echo "<hr>";
//La solución ante esto es generar un clon del objeto. COn ello se tiene un nuevo objeto con su propio estado.
$oracle_clon = clone $mysql;
$oracle_clon->setDriver("Oracle Generado como Clon");
$oracle_clon->getDriver();
//Comprobamos lo dicho
$mysql->getDriver();
$oracle->getDriver();
$sql_server->getDriver();
?>