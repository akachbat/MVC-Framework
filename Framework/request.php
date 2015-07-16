<?php 

 class Request {
	// paramètres de la requête
	private $parametres;

	public function __construct($parametres) {
		$this->parametres = $parametres;
	}

	// Renvoie vrai si le paramètre existe dans la requête
	public function isParamExist($nom) {
		return (isset($this->parametres[$nom]) && !empty($this->parametres[$nom]));
	}
	
	// Renvoie la valeur du paramètre demandé
	// Lève une exception si le paramètre est introuvable
	public function getParametre($name) {
		if ($this->isParamExist($name)) {
			return $this->parametres[$name];
		}
		else
			throw new Exception("Paramètre '$name' absent de la requête");
	}

	public function setParametre($name, $value){
		$this->parametres[$name] = $value;
	}
 }