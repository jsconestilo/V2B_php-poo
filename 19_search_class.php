<?php  

/**
 * En ocasiones cuando se esta trabajando es necesario conocer anticipadamente si una determinada clase existe en el contexto actual.
 * Para ello se tiene la función class_exists(). que retorna true o false segun sea el caso
 *
 * Esto viene bien cuando se invocan clases de manera dinámica...
 *
 * Esto es lo que hacen los frameworks cuando en el url detectan que se esta invocando un controlador en particular. No lo adivinan, toman ese trozo de información lo sanean y verifican si existe determinada clase.. si es asi lo llaman de manera programatica 
 */


//Si requiero este script, contiene la clase Person. Por tanto, estaria definida esta clase en el contexto actual.
//require_once("01_clases.php");


class Animal {
	public function getType() {
		return "Soy un Animal <br>";
	}
}

class Dog {
	public function getType() {
		return "Soy un Perro <br>";
	}
}

class Cat {
	public function getType() {
		return "Soy un Gato <br>";
	}
}

class Mouse {
	public function getType() {
		return "Soy un Ratón <br>";
	}
}

//echo class_exists("Person");


//Ejemplo de carga dinámica de clases.
$myclasses = ['Mongo', 'Animal', 'Person', 'Car', 'Dog', 'Mouse', 'Jet', 'Cat'];

foreach ($myclasses as $clase) {
	echo "<strong>".$clase."</strong>" . (class_exists($clase) ? " [existe]" : " [no existe]") . "<br>";

	//Podríamos instanciar objetos de las clases que si existen de manera programatica
	if(class_exists($clase)) {
		//Guardamos el objeto en una variable de variable (es decir, la variable se llama igual que el valor de la clase)
		//$$clase = new $clase;
		

		//Mejor El nombre del objeto lo paso a minusculas... por buenas prácticas
		$miObjeto = strtolower($clase);
		//Ahora creo una instancia de dicha clase y lo guardo en el objeto (genero nuevamente una variable de variable)
		//si la cadena es "cat" con variable de variables ahora es... $cat 
		$$miObjeto = new $clase;
	}
}

//No existe este objeto, puesto que no se encuentra la clase Mongo dentro de este contexto.
//$Mongo->getType();
echo "<hr>";
/*echo $Dog->getType();
echo $Animal->getType();
echo $Cat->getType();
echo $Mouse->getType();*/

echo $dog->getType();
echo $animal->getType();
echo $cat->getType();
echo $mouse->getType();

?>