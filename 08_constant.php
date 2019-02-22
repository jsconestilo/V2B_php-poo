<?php  
/*Las constantes de clase son herramientas que nos permiten declarar información en nuestra clase que no van a cambiar durante el proceso de ejecución
Las constantes son elementos de clase, por tanto se accede a ellas mediante self:: o el nombre de la Clase::
Si se trata de sobre-escribirlas, lanza un error
Por tanto se deben declarar e inicializar al mismo momento*/

class Config {
	const DB_USER_NAME = "alexgonzalezreyes";
	const DB_USER_PASS = "12346ABC";
	const DB_DATABASE_NAME = "myDatabase";
	const ENVIROMENT = "production";
}

class BaseProfile extends Config {
	protected static $connection_data = NULL;

	public function __construct($domain) {
		switch(self::ENVIROMENT) {
			case "production":
			case "staging":
				$this->connect2DB($domain);
				break;
			case "development":
				self::$connection_data = "mysql://127.0.0.1/otra_cosa";
				break;
			default:
				die("Especifica un entorno de trabajo correcto");
		}
	}
	protected function connect2DB($domain="localhost") {
		self::$connection_data = "sgdb://".$domain.";dbname=".self::DB_DATABASE_NAME.";user=".self::DB_USER_NAME.";password=".$this->encryptPassword(self::DB_USER_PASS);
	}
	private function encryptPassword($password) {
		return sha1($password);
	}
	/*public function getConnection() {
		return $this->connection_data;   -- si no fuese estatica, se accede mediante el objeto
	}*/
}


class MyProfile extends BaseProfile {

	const DOMAIN_NAME = "xpsmart.com.mx";
	private $email;
	private $name;
	private $last_name;

	public function __construct($name, $last_name) {
		parent::__construct(self::DOMAIN_NAME);
		
		$this->name = $name;
		$this->last_name = $last_name;
		$this->generateEmail();

		echo self::DOMAIN_NAME . " dese constructor " . __CLASS__;
	}
	private function generateEmail() {
		//Alguna otra lógica para retirar acentos y caracteres especiales no presentes en el correo electrónico, ademas de verificar que este correo no este previamente registrado (generar uno nuevo)
		$this->email = strtolower($this->name).".".strtolower($this->last_name)."@".self::DOMAIN_NAME;
	}
	public function getFullName() {
		echo $this->name . " " . $this->last_name;
	}
	public function getEmail() {
		echo $this->email;
	}
	public static function getConnection() {
		echo self::$connection_data;
	}

}

$perfil = new MyProfile("Alejandro", "González");
echo "<br>";
$perfil->getFullName();
echo "<br>";
$perfil->getEmail();
echo "<br>";
MyProfile::getConnection();
echo "<br>";

echo MyProfile::DOMAIN_NAME;
echo "<br>";
echo MyProfile::DB_DATABASE_NAME;


?>