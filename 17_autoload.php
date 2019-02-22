<?php  
use xpsmart\myclass\v1\Person;
/**
 * Anteriormente en PHP para hacer uso de una o varias clases, era necesario requerirlas al inicio mediante un script que hacia referencia a muchos require_once(). 
 *
 * Ahora existe una funcionalidad más transparente, que manda a llamar nuestras clases según las vayamos requiriendo, es decir, con cada instancia o referencia a la clase, PHP en automático buscara dicha clase y la requerira para poder utilziarla antes de lanzar un error fatal.
 *
 * 
 */

//Requerimos el autoload - requerira nuestras clases de manera automática
require_once("autoload.php");
//Para el caso de clases que no usen namaspece... Se tendrían que cargar de forma manual si estas se encuentran dentro de directorios muy densos.
require_once("xpsmart/myclass/thirds/Math.php");

//Lo recomendable es diseñar nuestras clases aplicando namespace. Con ello es más facil hacer referencia a ellas y evitar colosiones.
//
//IMPORTANTE:
//No crear carpetas con el nombre de class u otra palabra reservada. DA PROBLEMAS. Por ello cambié el nombre de la carpeta class a myclass.

//$alejandro = new xpsmart\myclass\v1\Person("Alejandro", "González");

//Esto es posible si al inicio indico un use haciendo referencia al namespace completo para esta clase. El autoload también lo registra
$alejandro = new Person("Alejandro", "González");
$alejandro->getFullName();
$alejandro->getConnection();

//Hace uso de una clase de terceros (simulada) que no tiene espacio de nombres
$alejandro->getPI();

?>