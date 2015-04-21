<?php

namespace DeathIsland;

use DBConnexion;


class MembreService {

    /**
     * Inscrit un membre à partir des paramètres donnés
     * @param array $params
     */
    static function inscription($params = []){

        // Récupération de la connexion à la bd
        $bdd = DBConnexion::getInstance()->getBdd();

        // Travail sur les paramètres

        // Si une erreur survient, on peut lever une exception
        throw new \Exception("Une erreur est survenue...");

        // On peut retourner le nouveau membre créé
        return [
            id => 1234,
            pseudo => "machin"
        ];
    }

    /**
     * Retourne le membre dont l'id est donné en paramètre
     * @param $id
     */
    static function findMembreById($id){

        return [
            id => 1234,
            pseudo => "machin"
        ];
    }

}