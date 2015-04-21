<?php

namespace DeathIsland;

use DBConnexion;


class MembreService {

    /**
     * Inscrit un membre � partir des param�tres donn�s
     * @param array $params
     */
    static function inscription($params = []){

        // R�cup�ration de la connexion � la bd
        $bdd = DBConnexion::getInstance()->getBdd();

        // Travail sur les param�tres

        // Si une erreur survient, on peut lever une exception
        throw new \Exception("Une erreur est survenue...");

        // On peut retourner le nouveau membre cr��
        return [
            id => 1234,
            pseudo => "machin"
        ];
    }

    /**
     * Retourne le membre dont l'id est donn� en param�tre
     * @param $id
     */
    static function findMembreById($id){

        return [
            id => 1234,
            pseudo => "machin"
        ];
    }

}