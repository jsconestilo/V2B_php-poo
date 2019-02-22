<?php  

	class Animal {
		protected $sound_type = "sonido desconocido";

		public function __construct() {
			echo "Ha nacido un animal <br>";
		}

		public function run() {
			echo get_class($this) . " corriendo como loco <br>";
		}

		public function walk() {
			//echo __CLASS__ . " caminando pacificamente <br>";
			echo get_class($this) . " caminando pacificamente <br>";
		}

		public function getSound() {
			echo get_class($this) . " emite sonido de " . $this->sound_type . "<br>";
		}
	}

	class Dog extends Animal {
		protected $sound_type = "Guau";

		public function __construct() {
			echo "Ha nacido un perrito <br>";
		}
	}

	class Cat extends Animal {
		protected $sound_type = "Miau";
	}

	class Mouse extends Animal {
		protected $sound_type = "rrrtiipi";

		public function __construct() {
			parent::__construct();
			echo "Ha nacido un ratón <br>";
		}
	}

	$dog = new Dog;
	$dog->run();
	$dog->getSound();

	echo "<br>";

	$cat = new Cat;
	$cat->walk();
	$cat->getSound();

	echo "<br>";

	$mouse = new Mouse;
	$mouse->run();
	$mouse->getSound();

	echo "<br>";
	if($dog instanceof Animal) {
		echo get_class($dog) . " es una instancia de Animal";
		echo "<br>";
	}
	if($dog instanceof Dog) {
		echo get_class($dog) . " es una instancia de Dog";
		echo "<br>";
	}
	if(!$cat instanceof Mouse) {
		echo get_class($cat) . " no es una instancia de Mouse";
		echo "<br>";
	}

?>