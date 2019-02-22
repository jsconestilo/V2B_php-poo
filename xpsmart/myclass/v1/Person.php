<?php  
namespace xpsmart\myclass\v1;


//Para este caso no es necesario indicar el use, ya que la clase esta dentro del mismo namespace

//use xpsmart\myclass\v1\Config;


class Person {

	private $name;
	private $last_name;

	public function __construct($name, $last_name) {
		$this->name = $name;
		$this->last_name = $last_name;
	}

	public function getFullName() {
		echo $this->name . " " . $this->last_name . "<br>";
	}

	public function getConnection() {
		//Al invocar la clase de esta forma. Automáticamente PHP tratará de localizarla dentro del namespace indicado al inicio del script.
		//Para este caso aplica. Pero de no ser así, hay que indicar donde tiene que buscarla, para ello se hace uso de la palabra reservada use.
		//En caso de no querer hacerlo con use, se debe especificar aqui toda la ruta del namespace...
		//	\xpsmart\myclass\v1\Config::getConfig()
		//	
		//	
		//Ahora si la ruta es la raíz, entonce se antecede un \Config::metod..
		echo Config::getConfig() . "<br>";
	}

	public function getPI() {
		//Esta clase no se encuentra dentro de un espacio de nombres, entonces hay que indicar que la debe buscar desde el directorio Raiz
		//Estoy obligado a requerir toda la clase de manera manual, ya que al encontrarse dentro de un directorio denso, es necesario hacerlo.
		//Ver 17_autoload.php
		echo \Math::PI();
	}

}
?>