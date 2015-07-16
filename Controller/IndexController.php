<?php

require_once 'Framework/controller.php';
require_once 'Model/article.php';

class indexController extends Controller {

    private $article;

    public function __construct() {
        $this->article = new Article();
    }

	// Affiche la liste de tous les articles du blog
    public function index() {
        $articles = $this->article->getArticles();
        $this->genererVue(array('articles'=>$articles));
    }
}

