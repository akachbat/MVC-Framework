<?php

require_once 'framework/model.php';
/**
 * Fournit les services d'accès aux genres musicaux 
 * 
 * @author Baptiste Pesquet
 */
class Commentaire extends Model {

// Renvoie la liste des commentaires associés à un billet
    public function getCommentaires($idArticle) {
        $sql = 'SELECT auteur,commentaire as contenu FROM commentaires WHERE id_article=?';
        $commentaires = $this->executeRequest($sql, array($idArticle));
        return $commentaires;
    }

    // Ajoute un commentaire dans la base
    public function addCommentaire($auteur, $contenu, $idArticle) {
        $sql = 'INSERT INTO 
            commentaires(auteur,commentaire,id_article,date_commentaire)
            VALUES(?,?,?,NOW())';
        $this->executeRequest($sql, array($auteur, $contenu, $idArticle));
    }
}