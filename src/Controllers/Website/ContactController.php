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

        return $this->twig->render('user/contact_success.html.twig')

    }*/

}