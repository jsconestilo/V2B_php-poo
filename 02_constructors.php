<?php  

	class Person {

		public $age;
		public $name;

		public function __construct() {
			echo "Este objeto [". rand(1,99) ."] se ha creado satisfactoriamente <br>";
		}

		public function run() {
			echo "Estoy corriendo <br>";
		}

		public function walk() {
			echo "Estoy caminando <br>";
		}

		public function greet( $other_person_name ) {
			echo $this->name . " saluda a " . $other_person_name . "<br>";
		}
	}

	for( $i=0; $i<5; $i++) {
		//$person = new Person;
	}

	$person = new Person;
	$person->name = "Alejandro González";
	$person->age = 33;
	$person->run();
	$person->walk();
	$person->greet("General Tamayo");

?>