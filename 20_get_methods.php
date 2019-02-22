<?php 

/**
 * En ocasiones necesitamos saber que metodos se encuentran declarados en una determinada clase.
 * Para ello tenemos la función get_class_methods().
 * La cual nos retorna un array con todos los metodos PUBLICOS registrados en dicha clase.
 */

class Controller {
	public function getModel() {

	}
}

class AlumnoController extends Controller {
	public function __construct(){

	}
	public function index(){

	}
	public function show($id){

	}
	public function create(){

	}
	public function store(){

	}
	public function edit($id){

	}
	public function update(){

	}
	public function destroy($id){

	}
}

abstract class Model {
	public function find($id) {}
	public function all() {}
}



$controller = new AlumnoController;
//Verifico que metodos publicos tiene el objeto de la clase AlumnoController
print_r(get_class_methods($controller));
echo "<hr>";

//Verifico que metodos publicos tiene la clase abstracta Model.
//Recordar que no puedo generar objetos, por ello le paso el nombre de la clase
print_r(get_class_methods("Model"));
echo "<hr>";

//No es necesario pasar un objeto explicito, por ello instancio la clase y genero un objeto anonimo
//de la clase Controller
print_r(get_class_methods(new Controller));

?>