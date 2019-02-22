<?php 
namespace Blogger;
/**
 * Los namespace son espacios virtuales donde podemos agrupar nuestras clases con la finalidad de tener una mejor organización. Sobre todo nos ayudan a prevenir la colisión de nombres de clases. Puesto que si dos clases se llaman igual y estan localizadas en directorios fisicos distintos, podemos requerirlas en la misma clase solo con asignarles diferentes espacios de nombres y al usarlas, colocando alias de nombres para que no entren en conflicto.
 *  
 */

//Siempre la declaración del namespace debe ir al inicio del script.
//En este caso estamos indicando a PHP que esta clase se encuentra almacenada dentro del espacio de nomres Blogger, por tanto para invocarla seria...
//   	new \Blogger\Blog()




//Para mantener el ejemplo simple en esta clase voy a generar toda la lógica para hacer uso de mi clase principal Blogger. Por ello requiero el autoloader programado en anteriormente
require_once "autoload.php";


//Estamos indicando que dentro de este script se va a hacer uso de clases registradas en diferentes espacios de nombres. Para no invocarlas como
//		new \agsistemas\us\Post();
//		
//		mejor se hace uso de la palabra reservada use, indicando la ruta completa en el espacio de nombres registrado para dicha clase. Además, en este ejemplo se van a usar clases con el mismo nombre, esto genera un conflicto de nombres, por tanto aquí indicamos que en una de ellas se va a asignar un alias para referirse a ella.
use agsistemas\mx\Post;
use agsistemas\us\Post as PostUS;



class Blog {

	private $posts_mx;
	private $posts_us;

	public function __construct() {
		//Aqui la importancia de los namespace, son clases con el mismo nombre, pero funcionalidad distinta. En lugar de colocarles nombres raros como Libreria_Ventas_Xpsmart.php se les asignan espacios de nombres.
		//Ahora bien, estoy haciendo new Clase, no coloco toda la ruta del namesapce puesto que que he usado la sentencia use... indicando lo propio.
		$this->posts_mx = new Post;
		$this->posts_us = new PostUS;

		//Importante
		//Si requerimos una clase en esta sección y dicha clase pertenece al ambito global de PHP, es necesario anteponer un \ al nombre de la misma, de lo contrario la estaría buscando dentro de este mismo espacio de nombres.
	}

	public function getPostsMX() {
		return $this->posts_mx->getPosts();
	}

	public function getPostsUS() {
		return $this->posts_us->getPosts();
	}

}

//Invoco la clase de esta forma simple, puesto que estoy dentro del script con namespace Blogger, por tanto al hacer esto, PHP entiende que la clase Blog se encuentra dentro de ese namespace
//	Blogger\Blog
//	
$blogger = new Blog;
$mx = $blogger->getPostsMX();
$us = $blogger->getPostsUS();

echo "<h3>Publicaciones Mexicanas</h3>";
foreach ($mx as $post) {
	echo "<li>" . $post["title"] . "</li>";
}

echo "<h3>Publicaciones Americanas</h3>";
foreach ($us as $post) {
	echo "<li>" . $post["title"] . "</li>";
}

?>