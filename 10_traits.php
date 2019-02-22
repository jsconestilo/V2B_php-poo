<?php  

/**
 * Los traits contienen métodos genericos que otras clases no relacionadas entre si podrían utilzar.
 * Con ello, es un intento de satisfacer herencia multiple a la herencia simple que implementa PHP
 *
 * LOs traits pueden acceder a atributos de las clases, pero para ello debemos asegurarnos que en las clases que lo USEN TENGAN DECLARADO DICHO ATRIBUTO.
 */

trait Utilities {

	//Todas las clases que usen este TRAIT, tendran a su disposición estos nuevos métodos
	public function about() {
		echo "Hola, yo soy {$this->name} y estoy a tu servicio <br>"; 
	}

	public function technicalData() {
		echo "CLASE: ". __CLASS__ . " METODO: " . __METHOD__ . " CLASE PADRE: ". get_parent_class() ." - TRAIT: ". __TRAIT__ ."<br>" ;
	}

}

trait Info {
	
	public function getSO() {
		echo "Estas bajo un entorno: " . $this->so . "<br>";
	}

	public function getServerWeb() {
		echo "Servidor Web: " . $this->web_server . "<br>";
	}
}



abstract class Animal {
	abstract public function makeSound();
}

class Dog extends Animal {
	//Para usar un TRAIT se hace uso de la palabra reservada use
	use Utilities;
	private $name;

	public function __construct($nombre) {
		$this->name = $nombre;
	}
	public function makeSound() {
		echo "Soy un perro y guagu guau...<br>";
	}
}

class SmartPhone {
	use Utilities;
	private $name;

	public function __construct($nombre) {
		$this->name = $nombre;
	}
	public function callReceived() {
		echo "ring ring <br>";
	}
}

interface iDB {
	public function connect();
}

class MySQL implements iDB {
	//Para usar mas de un TRAIT, es necesario separarlos con comas.
	use  Info, Utilities;
	private $so = "Linux";
	private $web_server = "Apache v3";

	private $name = "Mysql V5";
	
	public function connect() {
		echo "Conectado correctamente <br>";
	}
}



$perro = new Dog("Mongo");
$perro->makeSound();
//Invocar metodos declarados en el trait que usa la clase de este objeto
$perro->about();
$perro->technicalData();
echo "<hr>";

$telefono = new SmartPhone("MotoG 6 - Octava Generación");
$telefono->callReceived();
$telefono->about();
$telefono->technicalData();
echo "<hr>";

$mysql = new MySQL;
$mysql->connect();
$mysql->about();
$mysql->technicalData();
$mysql->getSo();
$mysql->getServerWeb();

?>