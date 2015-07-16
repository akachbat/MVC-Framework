<?php 

class Configuration {

	private static $parametres;

  	// Renvoie la valeur d'un paramètre de configuration
	public static function get($key, $defaultValue = null) {
		if (isset(self::getParametres()[$key])) {
  			$value = self::getParametres()[$key];
		}
		else {
	  		$value = $defaultValue;
		}
		return $value;
	}

  	// Renvoie le tableau des paramètres en le chargeant au besoin
	private static function getParametres() {
		if (self::$parametres == null) {
	  		$fname = "Config/prod.ini";
	  		if (!file_exists($fname)) {
		    	$fname = "Config/dev.ini";
		  	}	
		  	if (!file_exists($fname)) {
		    	throw new Exception("Aucun fichier de configuration trouvé");
		  	}
	 	 	else {
				self::$parametres = parse_ini_file($fname);
		  	}
		}
		return self::$parametres;
	}
}