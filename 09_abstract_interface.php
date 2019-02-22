<?php  
/**
 * Las clases abstractas no pueden ser instanciadas. Por tanto se deben heredar.
 * La mayoría de sus metodos son también abstractos, por tanto no definen o implementan lógica, solo se muestra su firma.
 * 
 * Una clase que contiene un método abstracto lo debe de implementar (colocar su lógica), o esta clase también debe ser abstracta.
 *
 * Las clases que hereden de una clase abstracta estan obligadas a definir estos metodos abstractos, o de plano tambien declararse como clases abstractas.
 *
 * Los métodos que tienen definida su funcionalad es porque esta es generica, o es la misma para todos los demas.
 * 
 * 
 */

abstract class Animal {

	//Cada animal emite un sonido diferente, y sus cuidados son distintos. Por tanto estos metodos los defino como abstractos, para que cada clase que herede a Animal los defina a su conveniencia
	abstract public function makeSound();
	abstract public function getPrecautions();

	//Todos los animales corren de la misma manera, por tanto si defino la lóga de deste metodo en la clase abstracta
	public function run() {
		echo "Como " . __CLASS__ . " corro de la misma forma que los demas";
	}
}

class Dog extends Animal {

	public function makeSound() {
		echo "Soy un " . __CLASS__ . "; por tanto hago Guau..";
	}

	public function getPrecautions() {
		echo "Un " . __CLASS__ . " debe estar atado porque de seguro me piedro, como huesitos y croquetas, tomo leche de pequeño y agua de grande, y mis necesidades las hago donde sea jajaja";
	}

}

class Cat extends Animal {

	public function makeSound() {
		echo "Soy un " . __CLASS__ . "; y Miauuuu";
	}
	
	public function getPrecautions() {
		echo "Un " . __CLASS__ . " no puede tomar leche caliente y debo tener un espacio con arena para hacer mis necesidades. No debo estar amarrado, soy libre completamente";
	}

}


$perro = new Dog;
$gato = new Cat;

$perro->makeSound();
echo "<br>";
$perro->run();
echo "<br>";
$perro->getPrecautions();
echo "<hr>";
$gato->makeSound();
echo "<br>";
$gato->getPrecautions();
echo "<br>";
$gato->run();
echo "<hr>";


/**
 * Las interfaces son como contratos, en donde obligan a las clases que los implementen, definan su funcionalidad. De lo contrario ese contrato se rompería.
 *
 * A diferencia de las clases abstractas, las interfaces todos sus metodos solo se firman. Jamas se implementa su lógica en algunos de ellos.
 *
 * Como las interfaces se implementan, todos sus metodos deben ser publicos
 */

interface iDB {
	public function connect($srever, $user, $password);
	public function database($db_name);
	public function query($connection, $sql);
}

class MySQL implements iDB {
	private $server = null;
	private $user = null;
	private $password = null;
	private $database = null;

	//Cada clase implementa los métodos contratados de diferente manera. 
	//Al ser un contrato tiene que definirlos todos
	public function connect($server, $user, $pass) {
		$this->server = $server;
		$this->user = $user;
		$this->password = $pass;
		return "mysql//{$server}:user={$user};pass={$pass}";
	}

	public function database($db_name) {
		$this->database = $db_name;
	}
	
	public function query($connection, $sql) {
		//Conectarse intermante con la base de datos para hacer las consultas
		echo "Consulta SQL realizada: " . $sql . "<br>";
		echo $connection;
		//Simular que la consulta retorna un arreglo de todos los registros encontrados
		return [
			["id" => 1, "nombre" => "Alejandro", "telefono" => "123-4521840"],
			["id" => 7, "nombre" => "Fátima", "telefono" => "781-4151515"],
			["id" => 80, "nombre" => "Estela", "telefono" => "333-4451515"],
		];
	}
}

class SQLServer implements iDB {
	private $server;
	private $user;
	private $password;
	private $database;

	//Cada clase implementa los métodos contratados de diferente manera.
	public function connect($server, $user, $pass) {
		$this->server = $server;
		$this->user = $user;
		$this->password = $pass;
		return "slqserver://microsoft.{$server}?user={$user}?pass={$this->encryptPass($pass)}";
	}
	
	public function database($db_name) {
		$this->database = $db_name;
	}
	
	public function query($connection, $sql) {
		//Hacer magia negra para realizar una consulta a SQLServer
		echo "Consulta SQL proporcionada a SQLServer: " . $sql . "<br>";
		echo $connection;
		return [
			["id" => 5, "nombre" => "Estefanía", "telefono" => "123-4524540"],
			["id" => 9, "nombre" => "Mario", "telefono" => "881-4151742"],
			["id" => 18, "nombre" => "Alán", "telefono" => "383-4457895"],
			["id" => 30, "nombre" => "Teresa", "telefono" => "373-4451455"],
			["id" => 7, "nombre" => "Miguel Alberto", "telefono" => "344-2871515"],
		];
	}

	//Al implementar una interface, nada impide que esta clase tenga sus propios metodos.
	private function encryptPass($pass) {
		return md5($pass);
	}
}





$mysql = new MySQL;
$conexion = $mysql->connect("localhost", "root", "123456");
$mysql->database("agenda");
//echo $conexion;
$consulta = "SELECT * FORM alumnos";
$resultado = $mysql->query($conexion, $consulta);
foreach ($resultado as $contacto) {
	echo "<li>Nombre: {$contacto['nombre']} - Teléfono: {$contacto['telefono']}</li>";
}

echo "<hr>";

$sqlserver = new SQLServer;
$conectar = $sqlserver->connect("agseistemas.com", "mongo", "aeiou85");
//echo $conectar;
$sqlserver->database("popotitosdb");
$resultados = $sqlserver->query($conectar, "SELECT * FROM usuarios");
foreach ($resultados as $usuario) {
	echo "<li>ID: {$usuario["id"]} Nombre: {$usuario["nombre"]} - Teléfono: {$usuario["telefono"]}</li>";
}


?>