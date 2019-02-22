<?php  
namespace agsistemas\us;
/**
 * Los namespace son espacios virtuales donde podemos agrupar nuestras clases con la finalidad de tener una mejor organización. Sobre todo nos ayudan a prevenir la colisión de nombres de clases. Puesto que si dos clases se llaman igual y estan localizadas en directorios fisicos distintos, podemos requerirlas en la misma clase solo con asignarles diferentes espacios de nombres y al usarlas, colocando alias de nombres para que no entren en conflicto.
 *
 * Aqui estoy indicando que esta clase se encuentra registrada en el namespace, agsistemas\us;
 * Si bien pude haber colocado otro nombre diferente o simple. Es recomendable seguir la nomenclatura de ubicación de directorios.
 * Lo anterior beneficia en la carga automática de clases.
 * Así funcionan los frameworks 
 * 
 */

class Post {

	public function getPosts() {
		$posts = [
			['title' => 'Post Title 1', 'content' => 'Content 1'],
			['title' => 'Post Title 2', 'content' => 'Content 2'],
			['title' => 'Post Title 3', 'content' => 'Content 3'],
			['title' => 'Post Title 4', 'content' => 'Content 4'],
			['title' => 'Post Title 5', 'content' => 'Content 5'],
			['title' => 'Post Title 6', 'content' => 'Content 6'],
		];
		return $posts;
	}
}

?>