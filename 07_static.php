<?php  
	/*
	Los atributos y métodos estaticos pueden ser llamados sin la necesidad de crear una instancia de la clase donde se encuentran definidos.
	Estos pertenecen a la clase, no a los objetos.
	Por ello que su acceso es mediante el nombre de la clase y no mediante un objeto, o mediante self:: en lugar de $this->

	 */
	class DBStatic {

		protected static $db_user = "gonzalez";
		protected static $db_pass = "123456";
		protected static $db_name = "db_proyectos";
		protected $table_name = null;
		protected $primary_key = null;

		protected static function connect() {
			echo "Conectando con: sgbs://" . self::$db_user . ":" . self::$db_pass . ":" . self::$db_name;
		}
	}

	class Model extends DBStatic {

		public function __construct() {
			self::connect();
		}

	}

	class Product extends Model {

		protected $table_name = "products";
		protected $primary_key = "id";

		public function find($id) {
			echo "Consultar producto con id = " . $id . " en la tabla " . $this->table_name; 
		}

		public function all() {
			echo "Consultar todos los productos en la tabla " . $this->table_name;
		}

		public function delete() {
			echo "Eliminar todo de la tabla productos";
		}

		public function generatePassword($password) {
			$salt = md5($password) . $this->encryptNameDatabase();
			echo $salt;
			//echo self::$db_user;   si se puede hacer esto....
		}

		private function encryptNameDatabase() {
			return sha1(self::$db_name);
		}

	}

/*echo DBStatic::$db_user;
echo "<br>";
echo DBStatic::$db_pass;
echo "<br>";
echo DBStatic::$db_name;
echo "<br>";
DBStatic::connect();*/

$products = new Product;
echo "<br>";
$products->find(5);
echo "<br>";
$products->all();
echo "<br>";
$products->generatePassword("123456");
echo "<br>";



//Una mala práctica es acceder a los métodos y propiedades no declarados como estaticos mediante el nombre de la clase, con el operador de resolución de ámbito ::. PHP LO PERMITE SOLO POR COMPATIBILIDAD CON ALGUNAS OTRAS FUNCIONES. PERO CON error_reporting(-1) nos lanza un warning.

//Product::delete();

?>