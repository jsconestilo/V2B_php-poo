<?php  
//Esta clase no hace uso de espacio de nombres, por tanto. Se debe requerir al viejo estilo.
//Si se puede con el autoload, pero al estar dentro de un directorio denso, no se puede hacer esto \dir\dir2\Class::Metodo(). Puesto que PHP pensara que se encuetra dentro de un namespace. Lo carga pero, al invocarla así dicha clase se entiende que es parte de un grupo de espacio. 

class Math {

	public static function PI() {
		return M_PI;
	}

}

?>