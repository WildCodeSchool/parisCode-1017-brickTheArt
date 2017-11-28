<?php

namespace BrickTheArt\Controllers\Website;

use BrickTheArt\Controllers\DefaultController;
use BrickTheArt\Model\Repository\ContactManager;

/**
 * Class DefaultManagerController
 * @package MyApp\ManagerController
 */
class HomeController extends DefaultController
{
    /**
     * Render home
     */
    public function displayAction()
    {
        $contactManager = new ContactManager();
        $coordonnees = $contactManager->getCoordonnees();
        return $this->twig->render('user/home.html.twig', array(
            "coordonnees" => $coordonnees
        ));

    }

}