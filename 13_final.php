<?php  

/**
 * En ocasiones se abusa de la herencia, y cuando nos damos cuenta ya tenemos una estructura desendiente de clases exagerada.
 * 
 * Para ello tenemos la instruccion final. Lo que nos permite impedir que la clase que la define no se pueda heredar.
 *
 * Lo mismo pasa con los metodos finales. Son metodos que si se heredan pero no pueden ser redeclarados o sobre-escritos, puesto que son finales.
 * 
 */

abstract class Animal {
	abstract public function makeSound();
	abstract public function greet();

	//Un metodo declarado como final, no puede ser sobre-escrito por las clases que lo heredan
	final public function run() {
		echo "Corriendo como todos los demas animales <br>";
	}
}


abstract class Dog extends Animal {
	private $name;

	abstract public function description();

	public function __construct($name) {
		$this->name = $name;
		echo "El perro de nombre <strong>{$name}</strong> ha sido creado <br>";
	}

	public function __destruct() {
		echo "<strong>" . $this->name . "</strong> ha muerto...<br>";
	}
	
	public function makeSound() {
		echo "Guau... <br>";
	}
	
	public function greet() {
		echo "Moviendo la colita y brincando <br>";
	}
}


class Cat extends Animal {
	private $name;

	public function __construct($name) {
		$this->name = $name;
		echo "El gato de nombre <strong>{$name}</strong> ha sido creado <br>";
	}

	public function __destruct() {
		echo "<strong>" . $this->name . "</strong> ha muerto...<br>";
	}
	
	public function makeSound() {
		echo "Miauss... <br>";
	}
	
	public function greet() {
		echo "Ronroneando y pegandome a los pies de mi amo <br>";
	}
}


//La clase Chihuahua es una raza como tal y NO tiene por que ser heredable para otras clases. POR TANTO SE DECLARA COMO FINAL....
final class Chihuahua extends Dog {
	public function __construct($name) {
		parent::__construct($name);
	}

	public function description() {
		echo "La raza " . __CLASS__ . " es de complexión pequeñita pero muy agresiva...<br>";
	}

	//Al ser heredable este metodo de forma predeterminada puede ser sobre-escrito por esta clase.... PERO EN ESCENARIOS MUY ESPECIFICOS ESTO NO TIENE POR QUE SER ASI. para ello esta la instruccion final en los metodos.
	
	/*public function run() {
		echo "Un chihuahua corre bien chistoso... <br>";	
	}*/
}


final class Ruso extends Cat {
	public function __construct($name) {
		parent::__construct($name);
	}

	public function description() {
		echo "La raza " . __CLASS__ . " es de pelo muy corto, orejas en punta y complexión delgada <br>";
	}
}


//No tiene sentido crear una nueva clase descendiente de Chihuahua. Puesto que esta es una raza como tal y no hay derivados....

/*class OtherChihuahua extends Chihuahua {

}*/


$perro_chihuahua = new Chihuahua("Sanzón");
$gato_pichis = new Ruso("Pichis");

$perro_chihuahua->description();
$perro_chihuahua->greet();
$perro_chihuahua->run();
echo "<hr>";
$gato_pichis->description();
$gato_pichis->greet();
$gato_pichis->run();

?>