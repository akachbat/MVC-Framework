<?php

require_once 'Framework/controller.php';
require_once 'Model/article.php';
require_once 'Model/commentaire.php';

class articleController extends Controller {

    private $article;
    private $commentaire;

    public function __construct() {
        $this->article = new Article();
        $this->commentaire = new Commentaire();
    }

    // Affiche les détails sur un article
    public function index() {
        $idArticle = $this->request->getParametre("id");
            
        $article = $this->article->getArticle($idArticle);
        $commentaires = $this->commentaire->getCommentaires($idArticle);
            
        $this->genererVue(array('article' => $article, 
          'commentaires' => $commentaires));
    }

    // Ajoute un commentaire à un article
    public function commenter() {
        $auteur = $this->request->getParametre("auteur");
        $contenu = $this->request->getParametre("contenu");
        $idArticle = $this->request->getParametre("id");
        // Sauvegarde du commentaire
        $this->commentaire->addCommentaire($auteur, $contenu, $idArticle);
        // Actualisation de l'affichage du article
        /*$this->article($idArticle);*/
        $this->request->setParametre('id',$idArticle);
        $this->executeAction("index");
    }

}

