<?php  
namespace xpsmart\myclass\v1; 

class Config {

	const ENVIOREMENT = "production";
	const HOST_NAME = "xpsmart.com.mx";

	public static function getConfig() {
		$string = "Enviorement: " . self::ENVIOREMENT . " - Host: " . self::HOST_NAME;
		return $string;
	}
}

?>