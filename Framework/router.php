<?php

require_once 'request.php';
require_once 'view.php';

class Router {
    
    // Contrôleur par défaut
    private $defaultController = 'index';
    private $defaultAction = 'index';
  
    // Route une requête entrante : exécution l'action associée
    public function routeRequest() {
        try {
            // Fusion des paramètres GET et POST de la requête
            $request = new Request(array_merge($_GET, $_POST));
            $controller = $this->createController($request);
            $action = $this->createAction($request);
            $controller->executeAction($action);
        }
        catch (Exception $e) {
            $this->manageError($e);
        }
    }

    // Crée le contrôleur approprié en fonction de la requête reçue
    private function createController(Request $request) {
        $controller = $this->defaultController;  
        if ($request->isParamExist('controller')) {
            $controller = $request->getParametre('controller');
            // Première lettre en majuscule
            $controller = ucfirst(strtolower($controller));
        }
        // Création du nom du fichier du contrôleur
        $controllerClass = $controller . "Controller";
        $controllerFile = "Controller/" . $controllerClass . ".php";
        if (file_exists($controllerFile)) {
            // Instanciation du contrôleur adapté à la requête
            require($controllerFile);
            $controller = new $controllerClass();
            $controller->setRequest($request);
            return $controller;
        }
        else
          throw new Exception("Fichier '$controllerFile' introuvable");
    }

    // Détermine l'action à exécuter en fonction de la requête reçue
    private function createAction(Request $request) {
        $action = $this->defaultAction;  // Action par défaut
        if ($request->isParamExist('action')) {
          $action = $request->getParametre('action');
        }
        return $action;
    }    

    // Affiche une erreur
    private function manageError($errorMsg) {
        $vue = new View("error");
        $vue->render(array('errorMsg' => $errorMsg));
    }

 

}
