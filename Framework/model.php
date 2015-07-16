<?php

require_once 'configuration.php';
/**
 * Classe abstraite Modèle.
 * Centralise les services d'accès à une base de données.
 * Utilise l'API PDO
 *
 * @author Baptiste Pesquet
 */
abstract class Model {

    /** Objet PDO d'accès à la BD */
    private static $db;

    /**
     * Exécute une requête SQL éventuellement paramétrée
     * 
     * @param string $sql La requête SQL
     * @param array $valeurs Les valeurs associées à la requête
     * @return PDOStatement Le résultat renvoyé par la requête
     */
    protected function executeRequest($sql, $params = null) {
        if ($params == null) {
            $resultat = $this->getBd()->query($sql); // exécution directe
        }
        else {
            $resultat = $this->getBd()->prepare($sql);  // requête préparée
            $resultat->execute($params);
        }
        return $resultat;
    }

    /**
     * Renvoie un objet de connexion à la BD en initialisant la connexion au besoin
     * 
     * @return PDO L'objet PDO de connexion à la BDD
     */
    private static function getBd() {
        if (self::$db == null) {
            // Récupération des paramètres de configuration BD
            $connection = Configuration::get("connection");
            $login = Configuration::get("login");
            $password = Configuration::get("password");
            // Création de la connexion
            self::$db = new PDO($connection,$login,$password,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        return self::$db;
    }

}