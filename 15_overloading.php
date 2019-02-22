<?php  

/**
 * PHP tiene un concepto diferente de la sobrecarga de funciones.
 *
 * En este caso hace referencia a crear funciones de manera dinámica si por alguna razón se mandan a llamar.
 */

class Person {

	private $name;
	private $lastname;
	private $phone;
	private $mobile;

	public function __construct($name, $last_name, $phone, $mobile) {
		$this->name = $name;
		$this->lastname = $last_name;
		$this->phone = $phone;
		$this->mobile = $mobile;
	}

	/*
	* Este metodo mágico como metodo es invocado automáticamente en el momento que se mande a llamar un metodo que no esta definido o es innaccesible desde el objeto. 
	*/
	public function __call($method, $arguments) {
		$prefix = substr($method, 0, 3);
		$accesible = false;
		
		//Verificamos el prefijo si es un get  ( getName() )
		if($prefix == "get") {
			$accesible = true;
			//todo a minusculas y obtenemos todo lo que este despues de 3 caracteres ( Name )
			$getterName = strtolower(substr($method, 3));
			//Verificamos si esa propiedad esta declarada en este objeto (en la clase)
			if(property_exists($this, $getterName)) {
				//Pues como estamos generando un getter dinámico, retornamos el valor de ese atributo
				return $this->$getterName;
			} else {
				//En caso contrario lanzamos una excepción
				throw new Exception("El método <strong>{$method}</strong> no existe en la clase");
			}
		}

		if($prefix == "set") {
			$accesible = true;
			$setterName = strtolower(substr($method, 3));

			if(property_exists($this, $setterName)) {
				//Para el caso de los setter, por regla general se espera recibir un solo parametro. Pero en este caso recibe un array por eso recupero el primero.
				$this->$setterName = $arguments[0];
			} else {
				throw new Exception("El método <strong>{$method}</strong> no existe en la clase");
				
			}
		}

		// Llegar a este punto, significa que el usuairo de la clase a invocado un metodo NO SETTER / GETTER
		if(!$accesible) 
			throw new Exception("El metodo invocado no existe. Imposible emularlo");
		
	}

}

try {
	$alex = new Person("Alejandro", "González", "713 1020100", "713 1085064");
	echo $alex->getName();
	echo "<br>";
	echo $alex->getLastName();
	echo "<br>";
	echo $alex->getPhone();
	echo "<br>";
	echo $alex->getMobile();
	echo "<br>";	
	$alex->setLastName("González Reyes");
	echo "<br>";	
	echo $alex->getLastName();
	echo "<br>";	
	
	/*Estas dos lineas lanzan una expeción ya que no hay propiedades con sufijo Email.*/

	//echo $alex->getEmail();
	//$alex->setEmail("alex@correo.com");
	//$alex->informacion();


} catch(Exception $e) {
	echo "Ha ocurrido un error: " . $e->getMessage();
}

?>