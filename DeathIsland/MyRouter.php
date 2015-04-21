<?php
/**
 * Created by IntelliJ IDEA.
 * User: nath
 * Date: 21/04/2015
 * Time: 10:57
 */

namespace DeathIsland;


class MyRouter {

    /**
     * @param $app Slim App
     */
    function MyRouter(){ }

    function setup($app){

        $app->get(
            '/',                                // Sur l'url de base "/"
            function() use ($app) {             // on va générer le template général
                $app->render('index.php');
            }
        );


        $app->get(
            '/membre',  // Sur l'url /membre
            function(){ // on appelle cette fonction

                $id = $_SESSION['idMembre'];

                MembreService::findMembreById($id);
            }
        );

        $app->get(          // par la méthode GET
            '/partie',      // Sur l'url /partie
            function($id) use ($app) {  // on récupère la partie dont l'id est passé en paramètre

                $idMembre = $_SESSION['idMembre'];

                $partie = PartieService::findPartieForMembre($id, $idMembre);

                $app->response()->body(json_encode($partie));
            }
        );

        return $app;
    }

}