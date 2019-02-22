<?php  
namespace agsistemas\mx;
/**
 * Los namespace son espacios virtuales donde podemos agrupar nuestras clases con la finalidad de tener una mejor organización. Sobre todo nos ayudan a prevenir la colisión de nombres de clases. Puesto que si dos clases se llaman igual y estan localizadas en directorios fisicos distintos, podemos requerirlas en la misma clase solo con asignarles diferentes espacios de nombres y al usarlas, colocando alias de nombres para que no entren en conflicto.
 *
 *
 * Aqui estoy indicando que esta clase se encuentra registrada en el namespace, agsistemas\mx;
 * Si bien pude haber colocado otro nombre diferente o simple. Es recomendable seguir la nomenclatura de ubicación de directorios.
 * Lo anterior beneficia en la carga automática de clases.
 * Así funcionan los frameworks
 */

class Post {

	public function getPosts() {
		$posts = [
			['title' => 'Titulo Publicación 1', 'content' => 'Contenido 1'],
			['title' => 'Titulo Publicación 2', 'content' => 'Contenido 2'],
			['title' => 'Titulo Publicación 3', 'content' => 'Contenido 3'],
			['title' => 'Titulo Publicación 4', 'content' => 'Contenido 4'],
			['title' => 'Titulo Publicación 5', 'content' => 'Contenido 5'],
			['title' => 'Titulo Publicación 6', 'content' => 'Contenido 6'],
		];
		return $posts;
	}
}

?>