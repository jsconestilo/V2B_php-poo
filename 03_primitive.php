<?php  

	class Pet {

		public $name = "Mascota callejera";

		public function __construct($name=null) {
			if(isset($name)) {
				$this->name = $name;
			}
		}

	}

	class Person {

		public $name;
		public $age;

		public function __construct($name, $age) {
			$this->name = $name;
			$this->age = $age;
		}

		public function run() {
			echo "Estoy corriendo en el cerro <br>";
		}

		public function walk() {
			echo "Estoy dando un paseo con mi novia <br>";
		}

		public function greet(Person $other_person) {
			echo "Hola, soy " . $this->name . ", excelente día " . $other_person->name . "<br>";
		}

		public function adopt(Pet $animal) {
			echo "He adoptado a una mascota de nombre " . $animal->name . "<br>";
		}
	}

	$alejandro = new Person("Alejandro", 33);
	$jose = new Person("José", 41);
	$maria = new Person("María", 62);

	$mascota = new Pet;
	$monguito = new Pet("Monguito");
	$solovino = new Pet("Solovino");

	$alejandro->greet($jose);
	$alejandro->greet($maria);
	$maria->greet($alejandro);

	$jose->adopt($mascota);
	$alejandro->adopt($monguito);
	$maria->adopt($solovino);

?>