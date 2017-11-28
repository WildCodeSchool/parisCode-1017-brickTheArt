<?php

namespace BrickTheArt\Controllers\Website;

use BrickTheArt\Controllers\DefaultController;
use BrickTheArt\Model\Repository\ContactManager;

/**
 * Class DefaultManagerController
 * @package MyApp\ManagerController
 */
class BricktourController extends DefaultController
{
    /**
     * Render Bricktour
     */
    public function displayAction()
    {
        $contactManager = new ContactManager();
        $coordonnees = $contactManager->getCoordonnees();
        return $this->twig->render('user/bricktour.html.twig', array(
            "coordonnees" => $coordonnees
        ));

    }



    //gestion des erreurs, avec au départ $errors = 0. (header:"Location:index.php?page=success", etc)

}