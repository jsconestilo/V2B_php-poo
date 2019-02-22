<?php  

	class BaseProfile {

		private $connection_data = null;
		
		/*public function __construct() {
			$this->connect2DB();
		}*/

		protected function connect2DB() {
			//Reglas para conectarse a una base de datos.
			$this->connection_data = "Conexión realizada satisfactoriamente";
			echo $this->connection_data;
		}

	}

	class MyProfile extends BaseProfile {

		public $name;
		public $last_name;

		/*Con el enfoque de herencia y atributos protegidos, tenemos que la clase padre realizar la conexion al banco de datos, mientras que la clase hija se dedica a realizar las consultas necesarias, requiriendo para ello la conexión del padre*/
		public function __construct() {
			echo "Desde MyProfile ";
			//parent::__construct();
			$this->connect2DB();
		}

		public function add() {
			echo "Añadir registro";
		}

		public function delete() {
			echo "Eliminar registro";
		}

	}

	//$instBase = new BaseProfile;

	$perfil = new MyProfile;
	/*Con herencia el usuario de la clase no necesita preocuparse por realizar la conexion con la base de datos, ya que la clase se encarga de realizarla desde su constructor invocando metodos heredados*/
	
	//$perfil->connect2DB(); error, un acceso protegido solo es accesible desde la clase que lo define y sus clases heredadas
	
	echo "<br>";
	$perfil->add();
	echo "<br>";
	$perfil->delete();

?>