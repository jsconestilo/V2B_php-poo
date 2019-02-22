<?php  
/**
 * En ocasiones los usuarios de la clase tienden a imprimir el objeto instanciado. De forma predeterminada un objeto no puede ser convertido a cadena. Sin embargo, con el método mágico __toString() podemos retornar información relevante para este tipo de casos.
 */
class Person {

	private $name;
	private $last_name;

	public function __construct($name, $last_name) {
		$this->name = $name;
		$this->last_name = $last_name;
	}

	//Al mandar a imprimir el objeto se mostrara la informacion contenida dentro de este metodo mágico
	public function __toString() {
		return "La clase " . __CLASS__ . " contiene: {$this->name} {$this->last_name}";
	}

}

$alejandro = new Person("Alejandro", "González");
//De manera predeterminada esto ocasiona un error, pero si la clase implementa el metodo mágico __toString() se muestra información según lo indique el programador de la clase.
echo $alejandro;

?>