<?php
require_once 'configuration.php';
class View {

    // Nom du fichier associé à la vue
    private $fname;    
    // Titre de la vue (défini dans le fichier vue)
    private $title;
    // Fichiers CSS à inclure avant la balise </Head>
    private $css = array();
    // Fichiers JS à inclure avant la balise </BODY>
    private $js = array();

    public function __construct($action, $controleur = "") {
        // Détermination du nom du fichier vue à partir de l'action et du constructeur
        $fname = "View/";
        if ($controleur != "") {
            $fname = $fname . $controleur . "/";
        }
        $this->fname = $fname . $action . ".php";
    }

    // Génère et affiche la vue
    public function render($data) {
        // Génération de la partie spécifique de la vue
        $content = $this->renderFile($this->fname, $data);
        // Génération du gabarit commun utilisant la partie spécifique
        // On définit une variable locale accessible par la vue pour la racine Web
        // Il s'agit du chemin vers le site sur le serveur Web
        // Nécessaire pour les URI de type controleur/action/id
        $webRoot = Configuration::get("webRoot", "/");
        $view = $this->renderFile('View/template.php',
                    array(
                        'webRoot' => $webRoot,
                        'title'   => $this->title, 
                        'content' => $content
                    )
                );
        // Renvoi de la vue au navigateur
        echo $view;
    }

    // Génère un fichier vue et renvoie le résultat produit
    private function renderFile($fname, $data) {
        if (file_exists($fname)) {
            // Rend les éléments du tableau $data accessibles dans la vue
            extract($data);
            // Démarrage de la temporisation de sortie
            ob_start();
            // Inclut le fichier vue
            // Son résultat est placé dans le tampon de sortie
            require $fname;
            // Arrêt de la temporisation et renvoi du tampon de sortie
            return ob_get_clean();
        }
        else {
            throw new Exception("Fichier '$fname' introuvable");
        }
    }

    //inclure un fichier CSS
    private function includeCSS($fname){
        array_push($this->css, sprintf('<link rel="stylesheet" href="%s"/>',$fname));
    }

    //inclure un fichier JS
    private function includeJS($fname){
        array_push($this->js, sprintf('<script type="text/javascript" src="%s"/></script>',$fname));
    }

    private function fetch($var){
        foreach ($this->{$var} as $v) {
            echo $v . "\r\n";
        }
        return ;
    }

    // Nettoie une valeur insérée dans une page HTML
    private function clean($valeur) {
        return htmlspecialchars($valeur, ENT_QUOTES, 'UTF-8', false);
    }
}