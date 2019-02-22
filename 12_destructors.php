<?php  
/**
* En ocasiones es necesario realizar cierto tipo de actividades cuando nuestro script de PHP ya no hace referencia a una instancia de un determinado objeto.
*
* Para ello se hace uso del metodo destructor, el cual se invoca automáticamente cuando la instancia de un objeto es destruida (unset() o = null) o simplemente deseamos parar la ejecución del script en algun punto (exit) o el objeto no se invoca mas...
*/
class Video {

	private $url;

	public function __construct($url) {
		$this->url = $url;
		echo "Objeto de clase " . __CLASS__ . " creado correctamente <br>";
	}

	//Este metodo se invoca cuando el objeto es destruido implicitamente o explicitamente
	public function __destruct() {
		echo "Objeto de clase " . __CLASS__ . " destruido <br>";
		$this->stop();
	}

	public function play() {
		echo "Reproduciendo video: {$this->url}<br>";
	}

	public function pause() {
		echo "Pausa...<br>";
	}

	public function stop() {
		echo "Stop video...<br>";
	}

}

$video = new Video("/assets/videos/torneo.mp4");
$video->play();
//Se emula mas instrucciones en este script
for($i=0; $i<20; $i++) {
	echo "{$i} <br>";
	//En la iteracion 15 se para el script (exit), o se destruye explicitamente el objeto con (unset o = null)
	if($i > 15) {
		//exit;
		//unset($video);
		//$video = null;
	}
}

//En caso de no destruirlo explicitamente, al no hacer mas referencia al onjeto este se destruye automáticamente

?>