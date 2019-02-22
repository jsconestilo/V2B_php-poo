<?php  

//Esta función cargara automáticamente las clases que mandemos a llamar, ya sea a través de la creación de una instancia o invocando la propia clase. Una vez cargadas, procedemos a requerirlas dentro del cuerpo de la función callback.
spl_autoload_register(function($className) {

	//Puede existir más lógica para que cargue desde otras partes dichas clases, segun el nombre de las mismas.
	//Pero lo recomendable es mantener lo mas limpio este apartado, con ayuda de los namespace...
	//
	//
	//Recordar que en linux cambiar los \ del namespace por /
	
	$className = str_replace('\\', '/', $className);
	//echo $className . ".php";
	require_once $className . ".php";
});

?>