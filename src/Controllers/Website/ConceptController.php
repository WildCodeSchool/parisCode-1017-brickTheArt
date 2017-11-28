<?php

namespace BrickTheArt\Controllers\Website;

use BrickTheArt\Controllers\DefaultController;
use BrickTheArt\Model\Repository\ContactManager;

/**
 * Class DefaultManagerController
 * @package MyApp\ManagerController
 */
class ConceptController extends DefaultController
{
    /**
     * Render Concept
     */
    public function displayAction()
    {
        $contactManager = new ContactManager();
        $coordonnees = $contactManager->getCoordonnees();
        return $this->twig->render('user/concept.html.twig', array(
            "coordonnees" => $coordonnees
        ));

    }
}