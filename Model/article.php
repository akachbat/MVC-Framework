<?php

require_once 'framework/model.php';

/**
 * Fournit les services d'accès aux genres musicaux 
 * 
 * @author Baptiste Pesquet
 */
class Article extends Model {

    /** Renvoie la liste des billets du blog
     * 
     * @return PDOStatement La liste des billets
     */
    public function getArticles() {
        $sql = 'SELECT *,date_format(date_creation,\'%d/%m/%Y\') as date FROM articles';
        $articles = $this->executeRequest($sql);
        return $articles;
    }

    /** Renvoie les informations sur un billet
     * 
     * @param int $id L'identifiant du billet
     * @return array Le billet
     * @throws Exception Si l'identifiant du billet est inconnu
     */
    public function getArticle($idArticle) {
        $sql = 'SELECT *,date_format(date_creation,\'%d/%m/%Y\') as date FROM articles WHERE id=?';
        $Article = $this->executeRequest($sql, array($idArticle));
        if ($Article->rowCount() > 0)
            return $Article->fetch();  // Accès à la première ligne de résultat
        else
            throw new Exception("Aucun Article ne correspond à l'identifiant '$idArticle'");
    }

}