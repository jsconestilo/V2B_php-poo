<?php  

	class Person {

		public $name;
		public $age;

		public function __construct($name, $age) {
			$this->name = $name;
			$this->age = $age;
		}

		public function run() {
			echo "Estoy corriendo a mis " . $this->age . " años <br>";
		}

	}

	$person = new Person("Alejandro", 33);
	echo $person->name ."<br>";
	$person->run();

	$person2 = new Person("Bernardo", 43);
	echo $person2->name . "<br>";
	$person2->run();

?>