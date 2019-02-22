<?php  

	class MyProfile {

		//No puede ser accedido desde fuera de la clase o clases hijas
		private $email;

		public $name;
		public $last_name;

		public function __construct() {

		}

		public function setEmail($email) {
			//Implementar reglas de validación para email. Los atributos es mejor protegerlos, con seters realizamos acciones de validación o saneamiento de información.
			$user = $this->emailGenerate($email);
			$this->email = $user . "@xpsmart.com.mx";
		}

		public function getEmail() {
			return $this->email;
		}

		//No puede ser accedido desde fuera de la clase o por clases hijas
		private function emailGenerate($email) {
			$user = explode("@", $email);
			return $user[0];
		}

		public function getFullName() {
			return $this->name . " " . $this->last_name;
		}


	}

	$usuario = new MyProfile;

	$usuario->name = "Alejandro";
	$usuario->last_name = "González Reyes";
	$usuario->setEmail("alex@correo.com");
	

	echo $usuario->name;
	echo "<br>";
	echo $usuario->getFullName();
	echo "<br>";
	echo $usuario->getEmail();
?>