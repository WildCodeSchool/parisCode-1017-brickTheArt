<?php

namespace BrickTheArt\Controllers\Website;

use BrickTheArt\Controllers\DefaultController;
use BrickTheArt\Model\Repository\ContactManager;

/**
 * Class DefaultManagerController
 * @package MyApp\ManagerController
 */
class ContactController extends DefaultController
{
    /**
     * @return string
     */
    public function displayAction(){

        $contactManager = new ContactManager();
        $coordonnees = $contactManager->getCoordonnees();
        return $this->twig->render('user/contact.html.twig',array(
            "coordonnees"=>$coordonnees
        ));

        //gestion des erreurs, avec au départ $errors = 0. (header:"Location:index.php?page=success", etc)

    }

    /**
     * @return string
     */

    /*public function successAction(){

        On répertorie les erreurs dans un tableau $error

        Si on se trouve en méthode POST
            * Si $erreur de firstname, lastname, email, city ou message > 0 -> render la vue page de contact avec les champs pré-remplis
            * Sinon -> render la vue page de succès ;
                    -> envoi des infos par email;
        Sinon, on demeure par défaut dans la page de contact




        }

        return $this->twig->render('user/contact_success.html.twig')

    }*/

}